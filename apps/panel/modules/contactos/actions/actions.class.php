<?php

/**
 * contactos actions.
 *
 * @package    SGUM
 * @subpackage contactos
 * @name       contactos.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class contactosActions extends sfActions
{
	/**
	 * Ejecuta la accion de listar todos los contactos de la aplicación
	 */
	public function executeIndex()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Contactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
				
		// Creamos la busqueda a BD
		$contactos = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$contactos->add(ContactosPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}	
				
		$apellidos = $this->getRequestParameter('apellidos');
		$apellidos = $this->acc_url->parsearRecepcion($apellidos);
		$this->apellidos = $apellidos;
		if ($this->apellidos != '')
		{
			$contactos->add(ContactosPeer::APELLIDOS,'%'.$this->apellidos.'%',Criteria::LIKE);
		}
		
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$contactos->add(ContactosPeer::ID_CONTACTADO,$this->id_cliente);
			$contactos->addAnd(ContactosPeer::OPCION,1);
		}
		
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$contactos->add(ContactosPeer::ID_CONTACTADO,$this->id_proveedor);
			$contactos->addAnd(ContactosPeer::OPCION,0);
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
			$crit0 = $c->getNewCriterion(ContactosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(ContactosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$contactos->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$contactos->add(ContactosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$contactos->add(ContactosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$contactos = $this->acc_utilidades->ordenarObjetoXColumna($contactos,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$contactos = $this->acc_utilidades->ordenarObjetoXColumna($contactos,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Contactos', 15);
		$pager->setCriteria($contactos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de listar todos los contactos de los proveedores
	 */
	public function executeAdministrarContactosProveedores()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Contactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
				
		// Creamos la busqueda a BD
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::OPCION,'0');	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$contactos->add(ContactosPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}	
				
		$apellidos = $this->getRequestParameter('apellidos');
		$apellidos = $this->acc_url->parsearRecepcion($apellidos);
		$this->apellidos = $apellidos;
		if ($this->apellidos != '')
		{
			$contactos->add(ContactosPeer::APELLIDOS,'%'.$this->apellidos.'%',Criteria::LIKE);
		}
		
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$contactos->add(ContactosPeer::ID_CONTACTADO,$this->id_proveedor);
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
			$crit0 = $c->getNewCriterion(ContactosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(ContactosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$contactos->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$contactos->add(ContactosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$contactos->add(ContactosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$contactos = $this->acc_utilidades->ordenarObjetoXColumna($contactos,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$contactos = $this->acc_utilidades->ordenarObjetoXColumna($contactos,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Contactos', 15);
		$pager->setCriteria($contactos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
	
	/**
	 * Ejecuta la accion de listar todos los contactos de los clientes
	 */
	public function executeAdministrarContactosClientes()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Contactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
				
		// Creamos la busqueda a BD
		$contactos = new Criteria();	
		$contactos->add(ContactosPeer::OPCION,'1');
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$contactos->add(ContactosPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}	
				
		$apellidos = $this->getRequestParameter('apellidos');
		$apellidos = $this->acc_url->parsearRecepcion($apellidos);
		$this->apellidos = $apellidos;
		if ($this->apellidos != '')
		{
			$contactos->add(ContactosPeer::APELLIDOS,'%'.$this->apellidos.'%',Criteria::LIKE);
		}
		
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$contactos->add(ContactosPeer::ID_CONTACTADO,$this->id_cliente);
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
			$crit0 = $c->getNewCriterion(ContactosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(ContactosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$contactos->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$contactos->add(ContactosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$contactos->add(ContactosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$contactos = $this->acc_utilidades->ordenarObjetoXColumna($contactos,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$contactos = $this->acc_utilidades->ordenarObjetoXColumna($contactos,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Contactos', 15);
		$pager->setCriteria($contactos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  	
	/**
	 * Agregar un Contacto
	 */
	public function executeAgregarContacto()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->utilidades->obtenerSelectProvincias();
		
		// Obtenemos la opcion para saber si agregamos el contacto a un proveedor o cliente
		$this->opcion = $this->getRequestParameter('opcion');
		if($this->opcion == "proveedores")
		{
			$opcion_contacto = '0';
		}
		else
		{
			$opcion_contacto = '1';
		}
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();
				  	  		
		// Recogemos los datos del formulario
		$this->id_contactado = $this->getRequestParameter('id_contactado');		
		$this->id_jefe = $this->getRequestParameter('id_jefe');
		if(is_null($this->id_jefe))
		{
			$this->id_jefe = '0';
		}
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->puesto = $this->getRequestParameter('puesto');
		$this->direccion = $this->getRequestParameter('direccion');
		$this->cp = $this->getRequestParameter('cp');
		if(is_null($this->cp))
		{
			$this->cp = '';
		}
		$this->localidad = $this->getRequestParameter('localidad');
		$this->provincia = $this->getRequestParameter('provincia');
		$this->pais = $this->getRequestParameter('pais');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->ext_telefono = $this->getRequestParameter('ext_telefono');
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		$this->movil = $this->getRequestParameter('movil');
		$this->fax = $this->getRequestParameter('fax');
		$this->email = $this->getRequestParameter('email');
		$this->email_2 = $this->getRequestParameter('email_2');
		$this->email_3 = $this->getRequestParameter('email_3');
		$this->observaciones = $this->getRequestParameter('observaciones');
		
		// Preguntamos por el nombre para la validacion
		if ($this->nombre != '')
		{
			// Guardamos el objeto Contacto, si es todo correcto no devuelve el id del ultimo contacto insertado
			$id_contacto_save = $this->acc_contactos->guardarContacto($this->id_contactado,$this->id_jefe,
					$this->nombre,$this->apellidos,$this->puesto,$this->direccion,$this->cp,$this->localidad,
					$this->provincia,$this->pais,$this->telefono,$this->ext_telefono,$this->telefono_otro,
					$this->telefono_trabajo,$this->movil,$this->fax,$this->email,$this->email_2,$this->email_3,
					$this->observaciones,$opcion_contacto);	
			
			// Si se ha guardado correctamente
			if($id_contacto_save)
			{	
				$this->msg = "Los datos han sido insertados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido guardar el contacto.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de agregar contacto
	 */
	public function handleErrorAgregarContacto()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->utilidades->obtenerSelectProvincias();
		
		// Obtenemos la opcion para saber si agregamos el contacto a un proveedor o cliente
		$this->opcion = $this->getRequestParameter('opcion');
		if($this->opcion == "proveedores")
		{
			$opcion_contacto = '0';
		}
		else
		{
			$opcion_contacto = '1';
		}
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();
				  	  		
		// Recogemos los datos del formulario
		$this->id_contactado = $this->getRequestParameter('id_contactado');		
		$this->id_jefe = $this->getRequestParameter('id_jefe');
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->puesto = $this->getRequestParameter('puesto');
		$this->direccion = $this->getRequestParameter('direccion');
		$this->cp = $this->getRequestParameter('cp');
		$this->localidad = $this->getRequestParameter('localidad');
		$this->provincia = $this->getRequestParameter('provincia');
		$this->pais = $this->getRequestParameter('pais');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->ext_telefono = $this->getRequestParameter('ext_telefono');
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		$this->movil = $this->getRequestParameter('movil');
		$this->fax = $this->getRequestParameter('fax');
		$this->email = $this->getRequestParameter('email');
		$this->email_2 = $this->getRequestParameter('email_2');
		$this->email_3 = $this->getRequestParameter('email_3');
		$this->observaciones = $this->getRequestParameter('observaciones');
				
		return sfView::SUCCESS;
	}
	
	
	/**
	 * Obtenemos el jefe a partir del id del cliente
	 */
	public function executeObtenerJefe()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Creamos objeto Administacion
		$this->acc_admin = new Administracion();
		
		// Creamos objeto AccionesEmpresas
		$this->acc_contactos = new AccionesContactos();
		
		$this->id_contactado = $this->getRequestParameter('id_contactado');
		$this->id_jefe = $this->getRequestParameter('id_jefe');
		$this->opcion = $this->getRequestParameter('opcion');
		
		if(isset($this->id_contactado))
		{		
			if($this->opcion == "proveedores")
			{
				$ar_jefes = $this->acc_contactos->obtenerSelectContactosXIdProveedor($this->id_contactado);	
			}
			else
			{
				$ar_jefes = $this->acc_contactos->obtenerSelectContactosXIdCliente($this->id_contactado);
			}
		}
		else 
		{
			$ar_jefes = false;	
		}		
		$this->ar_jefes = $ar_jefes;
	}
	
	/**
	 * Editar un Contacto
	 */
	public function executeEditarContacto()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del contacto  	
		$this->id_md5_contacto = $this->getRequestParameter('id_md5_contacto');
		
		// Obtenemos el objeto contacto a partir del Id Md5
		$this->obj_contacto = $this->acc_contactos->obtenerObjContactoXIdMd5($this->id_md5_contacto);
		
		// Obtenemos el Id de contactos a partir del objeto contacto
		$id_contacto = $this->obj_contacto->getIdContacto();
		
		// Obtenemos la opcion para saber si agregamos el contacto a un proveedor o cliente
		$this->opcion = $this->getRequestParameter('opcion');
		if($this->opcion == "proveedores")
		{
			$opcion_contacto = '0';
			$this->ar_jefes = $this->acc_contactos->obtenerSelectContactosXIdProveedor($id_contacto);	
		}
		else
		{
			$opcion_contacto = '1';
			$this->ar_jefes = $this->acc_contactos->obtenerSelectContactosXIdCliente($id_contacto);
		}
		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		if(!isset($this->telefono_trabajo))
		{
			$this->telefono_trabajo = $this->obj_contacto->getTelefonoTrabajo();
		}
		else
		{
			$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		}
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		if(!isset($this->telefono_otro))
		{
			$this->telefono_otro = $this->obj_contacto->getTelefonoOtro();
		}
		else
		{
			$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		}				
		$this->email_2 = $this->getRequestParameter('email_2');
		if(!isset($this->email_2))
		{
			$this->email_2 = $this->obj_contacto->getEmailDos();
		}
		else
		{
			$this->email_2 = $this->getRequestParameter('email_2');
		}
		$this->email_3 = $this->getRequestParameter('email_3');
		if(!isset($this->email_3))
		{
			$this->email_3 = $this->obj_contacto->getEmailTres();
		}
		else
		{
			$this->email_3 = $this->getRequestParameter('email_3');
		}
		
		// Preguntamos por el nombre para la validacion
		if($this->nombre != '')
		{					  	  		
			// Recogemos los datos del formulario			
			$this->id_contactado = $this->getRequestParameter('id_contactado');		
			$this->id_jefe = $this->getRequestParameter('id_jefe');
			$this->nombre = $this->getRequestParameter('nombre');
			$this->apellidos = $this->getRequestParameter('apellidos');
			$this->puesto = $this->getRequestParameter('puesto');
			$this->direccion = $this->getRequestParameter('direccion');
			$this->cp = $this->getRequestParameter('cp');
			$this->localidad = $this->getRequestParameter('localidad');
			$this->provincia = $this->getRequestParameter('provincia');
			$this->pais = $this->getRequestParameter('pais');
			$this->telefono = $this->getRequestParameter('telefono');
			$this->ext_telefono = $this->getRequestParameter('ext_telefono');
			$this->movil = $this->getRequestParameter('movil');
			$this->fax = $this->getRequestParameter('fax');
			$this->email = $this->getRequestParameter('email');			
			$this->observaciones = $this->getRequestParameter('observaciones');
			  
			// Actualizamos el contacto
			$contacto_update = $this->acc_contactos->actualizarContacto($id_contacto,$this->id_contactado,
					$this->id_jefe,$this->nombre,$this->apellidos,$this->puesto,$this->direccion,$this->cp,
					$this->localidad,$this->provincia,$this->pais,$this->telefono,$this->ext_telefono,
					$this->telefono_otro,$this->telefono_trabajo,$this->movil,$this->fax,$this->email,
					$this->email_2,$this->email_3,$this->observaciones);
			
			// Comprobamos si todo ha ido correctamente
			if ($contacto_update !== false)
			{			
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha actualizado el contacto.";	
			}
		}
	}
 
	/**
	 * Validacion de editar contacto
	 */
	public function handleErrorEditarContacto()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del contacto  	
		$this->id_md5_contacto = $this->getRequestParameter('id_md5_contacto');
		
		// Obtenemos el objeto contacto a partir del Id Md5
		$this->obj_contacto = $this->acc_contactos->obtenerObjContactoXIdMd5($this->id_md5_contacto);
		
		// Obtenemos el Id de contactos a partir del objeto contacto
		$id_contacto = $this->obj_contacto->getIdContacto();
		
		// Obtenemos la opcion para saber si agregamos el contacto a un proveedor o cliente
		$this->opcion = $this->getRequestParameter('opcion');
		if($this->opcion == "proveedores")
		{
			$opcion_contacto = '0';
			$this->ar_jefes = $this->acc_contactos->obtenerSelectContactosXIdProveedor($id_contacto);	
		}
		else
		{
			$opcion_contacto = '1';
			$this->ar_jefes = $this->acc_contactos->obtenerSelectContactosXIdCliente($id_contacto);
		}		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->id_contactado = $this->getRequestParameter('id_contactado');		
		$this->id_jefe = $this->getRequestParameter('id_jefe');
		$this->nombre = $this->getRequestParameter('nombre');
		$this->apellidos = $this->getRequestParameter('apellidos');
		$this->puesto = $this->getRequestParameter('puesto');
		$this->direccion = $this->getRequestParameter('direccion');
		$this->cp = $this->getRequestParameter('cp');
		$this->localidad = $this->getRequestParameter('localidad');
		$this->provincia = $this->getRequestParameter('provincia');
		$this->pais = $this->getRequestParameter('pais');
		$this->telefono = $this->getRequestParameter('telefono');
		$this->ext_telefono = $this->getRequestParameter('ext_telefono');
		$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		if(!isset($this->telefono_trabajo))
		{
			$this->telefono_trabajo = $this->contacto->getTelefonoTrabajo();
		}
		else
		{
			$this->telefono_trabajo = $this->getRequestParameter('telefono_trabajo');
		}
		$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		if(!isset($this->telefono_otro))
		{
			$this->telefono_otro = $this->contacto->getTelefonoOtro();
		}
		else
		{
			$this->telefono_otro = $this->getRequestParameter('telefono_otro');
		}
		$this->movil = $this->getRequestParameter('movil');
		$this->fax = $this->getRequestParameter('fax');
		$this->email = $this->getRequestParameter('email');					
		$this->email_2 = $this->getRequestParameter('email_2');
		if(!isset($this->email_2))
		{
			$this->email_2 = $this->obj_contacto->getEmailDos();
		}
		else
		{
			$this->email_2 = $this->getRequestParameter('email_2');
		}
		$this->email_3 = $this->getRequestParameter('email_3');
		if(!isset($this->email_3))
		{
			$this->email_3 = $this->obj_contacto->getEmailTres();
		}
		else
		{
			$this->email_3 = $this->getRequestParameter('email_3');
		}
		$this->observaciones = $this->getRequestParameter('observaciones');
			
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar contactos
	 */
	public function executeBorrarContacto()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Recogemos el id md5 del contacto	
		$this->id_md5_contacto = $this->getRequestParameter('id_md5_contacto');
			
		$id_contacto = $this->acc_contactos->obtenerIdContactoXIdMd5($this->id_md5_contacto);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_contactos->comprobarContacto($id_contacto);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El contacto es jefe de algún otro contacto, no puede ser borrado hasta que modifique esta situación.";
		}
		else
		{		
			// Borramos el Contacto que hemos escogido
			$this->acc_contactos->borrarContacto($id_contacto);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_contactos->obtenerObjContacto($id_contacto); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el contacto.";		
			}
			else
			{
				$this->msg = "El contacto se ha borrado correctamente.";
			}
		}
	}

	/**
	 * Ejecuta la accion de ver la ficha del contacto
	 * 
	 */
	public function executeVerContacto()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del contacto  	
		$this->id_md5_contacto = $this->getRequestParameter('id_md5_contacto');
		
		// Obtenemos el objeto contacto a partir del Id Md5
		$this->obj_contacto = $this->acc_contactos->obtenerObjContactoXIdMd5($this->id_md5_contacto);
	}
}
