<?php

/**
 * transporte actions.
 *
 * @package    SGUM
 * @subpackage transporte
 * @name       transporte.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class transporteActions extends sfActions
{
	/**
	 * Ejecuta la accion de listar todos los conductores de la aplicación
	 */
	public function executeIndex()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();		
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
		
		// Obtenemos un select con todas las Empresas de Transporte
		$this->ar_transporte_empresas = $this->acc_transporte->obtenerSelectTransporteEmpresas();
				
		// Creamos la busqueda a BD
		$transporte_conductores = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$transporte_conductores->add(TransporteConductoresPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}	
				
		$apellidos = $this->getRequestParameter('apellidos');
		$apellidos = $this->acc_url->parsearRecepcion($apellidos);
		$this->apellidos = $apellidos;
		if ($this->apellidos != '')
		{
			$transporte_conductores->add(TransporteConductoresPeer::APELLIDOS,'%'.$this->apellidos.'%',Criteria::LIKE);
		}
		
		$id_transporte_empresa = $this->getRequestParameter('id_transporte_empresa');
		$id_transporte_empresa = $this->acc_url->parsearRecepcion($id_transporte_empresa);
		$this->id_transporte_empresa = $id_transporte_empresa;
		if ($this->id_transporte_empresa != '')
		{
			$transporte_conductores->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA,$this->id_transporte_empresa);
		}
		
		$page = $this->getRequestParameter('page');	
		$desde = $this->getRequestParameter('desde');
		$desde = $this->acc_url->parsearRecepcion($desde);
		$this->desde = $desde;
		
		$fecha_ini = $this->getRequestParameter('fecha_ini');
		$fecha_ini = $this->acc_url->parsearRecepcion($fecha_ini);
		$this->fecha_ini = $fecha_ini;			
		
		if ($this->fecha_ini != '')
		{
			if(empty($page))
			{
				$this->fecha_ini_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_ini);
			} 
			else
			{
				$this->fecha_ini_inv = $this->fecha_ini;
			}     
		}
		else
		{
			$this->fecha_ini_inv = '';
		}
		
		// Recogemos las palabras hasta y fecha_fin a buscar si existe
		$hasta = $this->getRequestParameter('hasta');
		$hasta = $this->acc_url->parsearRecepcion($hasta);
		$this->hasta = $hasta;
		$fecha_fin = $this->getRequestParameter('fecha_fin');
		$fecha_fin = $this->acc_url->parsearRecepcion($fecha_fin);
		$this->fecha_fin = $fecha_fin;
			
		if ($this->fecha_fin != '')
		{
			if(empty($page))
			{
				$this->fecha_fin_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_fin);	
			}
			else
			{
				$this->fecha_fin_inv = $this->fecha_fin;
			}		
		}
		else
		{
			$this->fecha_fin_inv = '';
		}		 			 	
		
		if (($this->hasta != '')&&($this->desde != ''))
		{		
			$c = new Criteria();
			$crit0 = $c->getNewCriterion(TransporteConductoresPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(TransporteConductoresPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$transporte_conductores->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$transporte_conductores->add(TransporteConductoresPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$transporte_conductores->add(TransporteConductoresPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			}
		} 	
		
		$type = $this->getRequestParameter('type');
		$type = $this->acc_url->parsearRecepcion($type);
		$this->type = $type;
		$sort = $this->getRequestParameter('sort');
		$sort = $this->acc_url->parsearRecepcion($sort);
		$this->sort = $sort;
		
		switch($this->type) 
		{
			case 'asc':
				$transporte_conductores = $this->acc_utilidades->ordenarObjetoXColumna($transporte_conductores,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$transporte_conductores = $this->acc_utilidades->ordenarObjetoXColumna($transporte_conductores,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		} 	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('TransporteConductores', 15);
		$pager->setCriteria($transporte_conductores);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  	
	/**
	 * Agregar un Conductor
	 */
	public function executeAgregarTransporteConductor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();		
		
		// Obtenemos un select con todos las Empresas de Transporte
		$this->ar_transporte_empresas = $this->acc_transporte->obtenerSelectTransporteEmpresas();
								  	  		
		// Recogemos los datos del formulario
		$this->id_transporte_empresa = $this->getRequestParameter('transporte_empresa');
		$this->empresa_nueva = $this->getRequestParameter('empresa_nueva');
		if (($this->id_transporte_empresa == '0') && ($this->empresa_nueva == ''))
		{
			$this->empresa_error = "↓Debe seleccionar una empresa o crear<br /> una nueva para el conductor↓";
		}
		else
		{
			$this->empresa_error = '';
		}
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		$this->movil = $this->getRequestParameter('movil');
		$this->observaciones = $this->getRequestParameter('observaciones');
		// Preguntamos por el nombre para la validacion
		if ($this->nombre != '' && ($this->empresa_error == ''))
		{
			//Comprobamos si estan creando una nueva empresa
			if ($this->empresa_nueva != '')
			{
				$id_empresa_nueva = $this->acc_transporte->guardarTransporteEmpresaNueva($this->empresa_nueva);
				if ($id_empresa_nueva)
				{
					$this->id_transporte_empresa = $id_empresa_nueva;
				}
			}
			
			// Guardamos el objeto Transporte Conductor, si es todo correcto nos devuelve el id del ultimo conductor insertado
			$id_transporte_conductor_save = $this->acc_transporte->guardarTransporteConductor($this->id_transporte_empresa,
					$this->nombre,$this->apellidos,$this->telefono,$this->telefono_otro,$this->telefono_trabajo,
					$this->movil,$this->observaciones);	
			
			// Si se ha guardado correctamente
			if($id_transporte_conductor_save)
			{	
				$this->msg = "Los datos han sido insertados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido guardar el conductor.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de agregar un conductor
	 */
	public function handleErrorAgregarTransporteConductor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();		
		
		// Obtenemos un select con todos las Empresas de Transporte
		$this->ar_transporte_empresas = $this->acc_transporte->obtenerSelectTransporteEmpresas();
								  	  		
		// Recogemos los datos del formulario
		$this->id_transporte_empresa = $this->getRequestParameter('transporte_empresa');
		$this->empresa_nueva = $this->getRequestParameter('empresa_nueva');
		if (($this->id_transporte_empresa == '0') && ($this->empresa_nueva == ''))
		{
			$this->empresa_error = "↓Debe seleccionar una empresa o crear<br /> una nueva para el conductor↓";
		}
		else
		{
			$this->empresa_error = '';
		}
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		$this->movil = $this->getRequestParameter('movil');
		$this->observaciones = $this->getRequestParameter('observaciones');
		
		return sfView::SUCCESS;
	}
	
	/**
	 * Editar un Conductor
	 */
	public function executeEditarTransporteConductor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();		
		
		// Obtenemos un select con todos las Empresas de Transporte
		$this->ar_transporte_empresas = $this->acc_transporte->obtenerSelectTransporteEmpresas();
		
		// Recogemos el id md5 del transporte conductor  	
		$this->id_md5_transporte_conductor = $this->getRequestParameter('id_md5_transporte_conductor');

		// Obtenemos el objeto TransporteConductor a partir del Id Md5
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductorXIdMd5($this->id_md5_transporte_conductor);
		
		// Obtenemos el Id de transporte conductor a partir del objeto TransporteConductor
		$id_transporte_conductor = $this->obj_transporte_conductor->getIdTransporteConductor();
		
		// Recogemos los datos del formulario
		$this->id_transporte_empresa = $this->getRequestParameter('id_transporte_empresa');
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		if(!isset($this->telefono_trabajo))
		{
			$this->telefono_trabajo = $this->obj_transporte_conductor->getTelefonoTrabajo();
		}
		else
		{
			$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		}
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		if(!isset($this->telefono_otro))
		{
			$this->telefono_otro = $this->obj_transporte_conductor->getTelefonoOtro();
		}
		else
		{
			$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		}	
		$this->movil = $this->getRequestParameter('movil');
		$this->observaciones = $this->getRequestParameter('observaciones');
		
		// Preguntamos por el nombre para la validacion
		if ($this->nombre != '')
		{
			// Actualizamos el objeto Transporte Conductor, si es todo correcto nos devuelve el id del ultimo conductor insertado
			$transporte_conductor_update = $this->acc_transporte->actualizarTransporteConductor($id_transporte_conductor,
					$this->id_transporte_empresa,$this->nombre,$this->apellidos,$this->telefono,
					$this->telefono_otro,$this->telefono_trabajo,$this->movil,$this->observaciones);	
			
			// Si se ha guardado correctamente
			if($transporte_conductor_update !== false)
			{	
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido actualizar el conductor.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de editar un conductor
	 */
	public function handleErrorEditarTransporteConductor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();		
		
		// Obtenemos un select con todos las Empresas de Transporte
		$this->ar_transporte_empresas = $this->acc_transporte->obtenerSelectTransporteEmpresas();
		
		// Recogemos el id md5 del transporte conductor  	
		$this->id_md5_transporte_conductor = $this->getRequestParameter('id_md5_transporte_conductor');

		// Obtenemos el objeto TransporteConductor a partir del Id Md5
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductorXIdMd5($this->id_md5_transporte_conductor);
		
		// Obtenemos el Id de transporte conductor a partir del objeto TransporteConductor
		$id_transporte_conductor = $this->obj_transporte_conductor->getIdTransporteConductor();
		
		// Recogemos los datos del formulario
		$this->id_transporte_empresa = $this->getRequestParameter('id_transporte_empresa');
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		if(!isset($this->telefono_trabajo))
		{
			$this->telefono_trabajo = $this->obj_transporte_conductor->getTelefonoTrabajo();
		}
		else
		{
			$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		}
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		if(!isset($this->telefono_otro))
		{
			$this->telefono_otro = $this->obj_transporte_conductor->getTelefonoOtro();
		}
		else
		{
			$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		}	
		$this->movil = $this->getRequestParameter('movil');
		$this->observaciones = $this->getRequestParameter('observaciones');
				
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar conductor
	 */
	public function executeBorrarTransporteConductor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Recogemos el id md5 del transporte conductor  	
		$this->id_md5_transporte_conductor = $this->getRequestParameter('id_md5_transporte_conductor');
			
		$id_transporte_conductor = $this->acc_transporte->obtenerIdTransporteConductorXIdMd5($this->id_md5_transporte_conductor);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_transporte->comprobarConductor($id_transporte_conductor);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El conductor ha participado en una entrada o salida de mercancías, no puede ser borrado.";
		}
		else
		{	
			
			// Borramos el TransporteConductor que hemos escogido
			$this->acc_transporte->borrarTransporteConductor($id_transporte_conductor);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el conductor.";		
			}
			else
			{
				$this->msg = "El conductor se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de ver la ficha del contacto
	 * 
	 */
	public function executeVerTransporteConductor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
				
		// Recogemos el id md5 del contacto  	
		$this->id_md5_transporte_conductor = $this->getRequestParameter('id_md5_transporte_conductor');
		
		// Obtenemos el objeto contacto a partir del Id Md5
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductorXIdMd5($this->id_md5_transporte_conductor);
		
		// Obtenemos el objeto transporte empresa a partir del Id de la Empresa de Transporte al que pertenece el conductor
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresa($this->obj_transporte_conductor->getIdTransporteEmpresa());
	}
	
	/**
	 * Ejecuta la accion de listar todos las empresas de transporte de la aplicación
	 */
	public function executeAdministrarTransporteEmpresas()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
				
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Creamos la busqueda a BD
		$transporte_empresas = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$transporte_empresas->add(TransporteEmpresasPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}	
				
		$cif_nif = $this->getRequestParameter('cif_nif');
		$cif_nif = $this->acc_url->parsearRecepcion($cif_nif);
		$this->cif_nif = $cif_nif;
		if ($this->cif_nif != '')
		{
			$transporte_empresas->add(TransporteEmpresasPeer::CIF_NIF,'%'.$this->cif_nif.'%',Criteria::LIKE);
		}
				
		$pais = $this->getRequestParameter('pais');
		$pais = $this->acc_url->parsearRecepcion($pais);
		$this->pais = $pais;
		if ($this->pais != '')
		{
			$transporte_empresas->add(TransporteEmpresasPeer::PAIS,$this->pais);
		}
		else
		{
			$this->pais = 'ES';
		}
		
		$provincia = $this->getRequestParameter('provincia');
		$provincia = $this->acc_url->parsearRecepcion($provincia);
		$this->provincia = $provincia;
		if ($this->provincia)
		{
			$transporte_empresas->add(TransporteEmpresasPeer::PROVINCIA,$this->provincia);
		}
		
		$page = $this->getRequestParameter('page');	
		$desde = $this->getRequestParameter('desde');
		$desde = $this->acc_url->parsearRecepcion($desde);
		$this->desde = $desde;
		
		$fecha_ini = $this->getRequestParameter('fecha_ini');
		$fecha_ini = $this->acc_url->parsearRecepcion($fecha_ini);
		$this->fecha_ini = $fecha_ini;			
		
		if ($this->fecha_ini != '')
		{
			if(empty($page))
			{
				$this->fecha_ini_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_ini);
			} 
			else
			{
				$this->fecha_ini_inv = $this->fecha_ini;
			}     
		}
		else
		{
			$this->fecha_ini_inv = '';
		}
		
		// Recogemos las palabras hasta y fecha_fin a buscar si existe
		$hasta = $this->getRequestParameter('hasta');
		$hasta = $this->acc_url->parsearRecepcion($hasta);
		$this->hasta = $hasta;
		$fecha_fin = $this->getRequestParameter('fecha_fin');
		$fecha_fin = $this->acc_url->parsearRecepcion($fecha_fin);
		$this->fecha_fin = $fecha_fin;
			
		if ($this->fecha_fin != '')
		{
			if(empty($page))
			{
				$this->fecha_fin_inv = $this->acc_fechas->cambiarFormatoFecha2($this->fecha_fin);	
			}
			else
			{
				$this->fecha_fin_inv = $this->fecha_fin;
			}		
		}
		else
		{
			$this->fecha_fin_inv = '';
		}		 			 	
		
		if (($this->hasta != '')&&($this->desde != ''))
		{		
			$c = new Criteria();
			$crit0 = $c->getNewCriterion(TransporteEmpresasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(TransporteEmpresasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$transporte_empresas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$transporte_empresas->add(TransporteEmpresasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$transporte_empresas->add(TransporteEmpresasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			}
		} 	
		
		$type = $this->getRequestParameter('type');
		$type = $this->acc_url->parsearRecepcion($type);
		$this->type = $type;
		$sort = $this->getRequestParameter('sort');
		$sort = $this->acc_url->parsearRecepcion($sort);
		$this->sort = $sort;
		
		switch($this->type) 
		{
			case 'asc':
				$transporte_empresas = $this->acc_utilidades->ordenarObjetoXColumna($transporte_empresas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$transporte_empresas = $this->acc_utilidades->ordenarObjetoXColumna($transporte_empresas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		} 	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('TransporteEmpresas', 15);
		$pager->setCriteria($transporte_empresas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  	
	/**
	 * Agregar un TransporteEmpresa
	 */
	public function executeAgregarTransporteEmpresa()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
				  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->cif_nif = $this->getRequestParameter('cif_nif');
		$this->direccion = $this->getRequestParameter('direccion');
		$this->poblacion = $this->getRequestParameter('poblacion');
		$this->provincia = $this->getRequestParameter('provincia');
		$this->cp = $this->getRequestParameter('cp');
		$this->pais = $this->getRequestParameter('pais');
		if (!isset($this->pais))
		{
			$this->pais = 'ES';
		}
		$this->telefono = $this->getRequestParameter('telefono');
		$this->telefono2 = $this->getRequestParameter('telefono2');
		$this->movil = $this->getRequestParameter('movil');
		$this->fax = $this->getRequestParameter('fax');
		$this->email = $this->getRequestParameter('email');
		$this->web = $this->getRequestParameter('web');
		
		// Preguntamos por el nombre para la validacion
		if ($this->nombre != '')
		{
			// Guardamos el objeto TransporteEmpresa, si es todo correcto no devuelve el id del ultimo transporte_empresa insertado
			$id_transporte_empresa_save = $this->acc_transporte->guardarTransporteEmpresa($this->nombre,$this->cif_nif,
					$this->direccion,$this->poblacion,$this->provincia,$this->cp,$this->pais,$this->telefono,
					$this->telefono2,$this->movil,$this->fax,$this->email,$this->web);	
			
			// Si se ha guardado correctamente
			if($id_transporte_empresa_save)
			{	
				$this->msg = "Los datos han sido insertados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido guardar la empresa de transporte.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de agregar transporte_empresa
	 */
	public function handleErrorAgregarTransporteEmpresa()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
				  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->cif_nif = $this->getRequestParameter('cif_nif');
		$this->direccion = $this->getRequestParameter('direccion');
		$this->poblacion = $this->getRequestParameter('poblacion');
		$this->provincia = $this->getRequestParameter('provincia');
		$this->cp = $this->getRequestParameter('cp');
		$this->pais = $this->getRequestParameter('pais');
		if (!isset($this->pais))
		{
			$this->pais = 'ES';
		}
		$this->telefono = $this->getRequestParameter('telefono');
		$this->telefono2 = $this->getRequestParameter('telefono2');
		$this->movil = $this->getRequestParameter('movil');
		$this->fax = $this->getRequestParameter('fax');
		$this->email = $this->getRequestParameter('email');
		$this->web = $this->getRequestParameter('web');
		
				
		return sfView::SUCCESS;
	}
	
	/**
	 * Editar un TransporteEmpresa
	 */
	public function executeEditarTransporteEmpresa()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del transporte_empresa  	
		$this->id_md5_transporte_empresa = $this->getRequestParameter('id_md5_transporte_empresa');

		// Obtenemos el objeto transporte_empresa a partir del Id Md5
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresaXIdMd5($this->id_md5_transporte_empresa);
		
		// Obtenemos el Id de transporte_empresas a partir del objeto transporte_empresa
		$id_transporte_empresa = $this->obj_transporte_empresa->getIdTransporteEmpresa();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->telefono2 = $this->getRequestParameter('telefono2');
		if(!isset($this->telefono2))
		{
			$this->telefono2 = $this->obj_transporte_empresa->getTelefono2();
		}
		else
		{
			$this->telefono2 = $this->getRequestParameter('telefono2');
		}
		
		// Preguntamos por el nombre para la validacion
		if($this->nombre != '')
		{	
			$this->cif_nif = $this->getRequestParameter('cif_nif');
			$this->direccion = $this->getRequestParameter('direccion');
			$this->poblacion = $this->getRequestParameter('poblacion');
			$this->provincia = $this->getRequestParameter('provincia');
			$this->cp = $this->getRequestParameter('cp');
			$this->pais = $this->getRequestParameter('pais');
			$this->telefono = $this->getRequestParameter('telefono');
			$this->movil = $this->getRequestParameter('movil');
			$this->fax = $this->getRequestParameter('fax');
			$this->email = $this->getRequestParameter('email');
			$this->web = $this->getRequestParameter('web');	
			  
			// Actualizamos el transporte_empresa
			$transporte_empresa_update = $this->acc_transporte->actualizarTransporteEmpresa($id_transporte_empresa,$this->nombre,
					$this->cif_nif,$this->direccion,$this->poblacion,$this->provincia,$this->cp,$this->pais,
					$this->telefono,$this->telefono2,$this->movil,$this->fax,$this->email,$this->web);
			
			// Comprobamos si todo ha ido correctamente
			if ($transporte_empresa_update !== false)
			{			
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha actualizado la empresa de transporte.";	
			}
		}
	}
 
	/**
	 * Validacion de editar transporte_empresa
	 */
	public function handleErrorEditarTransporteEmpresa()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del transporte_empresa  	
		$this->id_md5_transporte_empresa = $this->getRequestParameter('id_md5_transporte_empresa');

		// Obtenemos el objeto transporte_empresa a partir del Id Md5
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresaXIdMd5($this->id_md5_transporte_empresa);
		
		// Obtenemos el Id de transporte_empresas a partir del objeto transporte_empresa
		$id_transporte_empresa = $this->obj_transporte_empresa->getIdTransporteEmpresa();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->cif_nif = $this->getRequestParameter('cif_nif');
		$this->direccion = $this->getRequestParameter('direccion');
		$this->poblacion = $this->getRequestParameter('poblacion');
		$this->provincia = $this->getRequestParameter('provincia');
		$this->cp = $this->getRequestParameter('cp');
		$this->pais = $this->getRequestParameter('pais');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->telefono2 = $this->getRequestParameter('telefono2');
		$this->movil = $this->getRequestParameter('movil');
		$this->fax = $this->getRequestParameter('fax');
		$this->email = $this->getRequestParameter('email');
		$this->web = $this->getRequestParameter('web');	
			
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar transporte_empresas
	 */
	public function executeBorrarTransporteEmpresa()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Recogemos el id md5 del transporte_empresa	
		$this->id_md5_transporte_empresa = $this->getRequestParameter('id_md5_transporte_empresa');
			
		$id_transporte_empresa = $this->acc_transporte->obtenerIdTransporteEmpresaXIdMd5($this->id_md5_transporte_empresa);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_transporte->comprobarEmpresaTransporte($id_transporte_empresa);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "La empresa de transporte tiene conductores asociados, debe borrar antes esos conductores.";
		}
		else
		{	
			// Borramos el TransporteEmpresa que hemos escogido
			$this->acc_transporte->borrarTransporteEmpresa($id_transporte_empresa);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_transporte->obtenerObjTransporteEmpresa($id_transporte_empresa); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar la empresa de transporte.";		
			}
			else
			{
				$this->msg = "La empresa de transporte se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la acción de ver la ficha de una empresa de transporte
	 */
	public function executeVerTransporteEmpresa()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
				
		// Recogemos el id md5 del transporte_empresa	
		$this->id_md5_transporte_empresa = $this->getRequestParameter('id_md5_transporte_empresa');
		
		// Obtenemos el objeto transporte empresa a partir del Id Md5
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresaXIdMd5($this->id_md5_transporte_empresa);

		// Obtenemos un array con todos los conductores de la empresa
		$this->ar_conductores = $this->acc_transporte->obtenerConductoresXEmpresa($this->obj_transporte_empresa->getIdTransporteEmpresa());
	}
}
