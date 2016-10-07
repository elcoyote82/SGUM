<?php

/**
 * ubicaciones actions.
 *
 * @package    SGUM
 * @subpackage ubicaciones
 * @name       ubicacionesActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class ubicacionesActions extends sfActions
{
	/**
	 * Listamos todas las ubicaciones
	 *
	*/
	public function executeIndex()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		 // Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
				
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_administracion = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
				
		// Creamos la busqueda a BD
		$ubicaciones = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$ubicaciones->add(UbicacionesPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}			
		
		$estado_ubicacion = $this->getRequestParameter('estado_ubicacion');
		$estado_ubicacion = $this->acc_url->parsearRecepcion($estado_ubicacion);
		$this->estado_ubicacion = $estado_ubicacion;
		
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
			$crit0 = $c->getNewCriterion(UbicacionesPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(UbicacionesPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$ubicaciones->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$ubicaciones->add(UbicacionesPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$ubicaciones->add(UbicacionesPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$ubicaciones = $this->acc_utilidades->ordenarObjetoXColumna($ubicaciones,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$ubicaciones = $this->acc_utilidades->ordenarObjetoXColumna($ubicaciones,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Ubicaciones', 15);
		$pager->setCriteria($ubicaciones);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  	
	/**
	 * Agregar una Ubicacion
	 */
	public function executeAgregarUbicacion()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
				  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		
		// Preguntamos por el nombre para la validacion
		if ($this->nombre != '')
		{
			// Guardamos el objeto Ubicacion, si es todo correcto no devuelve el id de la ultima ubicacion insertada
			$id_ubicacion_save = $this->acc_ubicaciones->guardarUbicacion($this->nombre);	
			
			// Si se ha guardado correctamente
			if($id_ubicacion_save)
			{	
				$this->msg = "Los datos han sido insertados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido guardar la ubicación.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de agregar una ubicacion
	 */
	public function handleErrorAgregarUbicacion()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
				  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
				
		return sfView::SUCCESS;
	}
	
	/**
	 * Editar una Ubicacion
	 */
	public function executeEditarUbicacion()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_administracion = new Administracion();
		
		// Obtenemos los estados de las ubicaciones
		$this->ar_estado_ubicaciones = $this->acc_administracion->obtenerSelectEstadoUbicaciones();
				
		// Recogemos el id md5 del ubicacion  	
		$this->id_md5_ubicacion = $this->getRequestParameter('id_md5_ubicacion');

		// Obtenemos el objeto ubicacion a partir del Id Md5
		$this->obj_ubicacion = $this->acc_ubicaciones->obtenerObjUbicacionXIdMd5($this->id_md5_ubicacion);
		
		// Obtenemos el Id de ubicacion a partir del objeto ubicacion
		$id_ubicacion = $this->obj_ubicacion->getIdUbicacion();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
		$this->id_estado_ubicacion = $this->getRequestParameter('id_estado_ubicacion');
		
		// Preguntamos por el nombre para la validacion
		if($this->nombre != '')
		{				  
			// Actualizamos el ubicacion
			$ubicacion_update = $this->acc_ubicaciones->actualizarUbicacion($id_ubicacion,$this->nombre,$this->id_estado_ubicacion);
			
			// Comprobamos si todo ha ido correctamente
			if ($ubicacion_update !== false)
			{			
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha actualizado la ubicación.";	
			}
		}
	}
 
	/**
	 * Validacion de editar ubicacion
	 */
	public function handleErrorEditarUbicacion()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_administracion = new Administracion();
		
		// Obtenemos los estados de las ubicaciones
		$this->ar_estado_ubicaciones = $this->acc_administracion->obtenerSelectEstadoUbicaciones();
				
		// Recogemos el id md5 de la ubicacion  	
		$this->id_md5_ubicacion = $this->getRequestParameter('id_md5_ubicacion');

		// Obtenemos el objeto ubicacion a partir del Id Md5
		$this->obj_ubicacion = $this->acc_ubicaciones->obtenerObjUbicacionXIdMd5($this->id_md5_ubicacion);
		
		// Obtenemos el Id de ubicacion a partir del objeto ubicacion
		$id_ubicacion = $this->obj_ubicacion->getIdUbicacion();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
			
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar ubicaciones
	 */
	public function executeBorrarUbicacion()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Recogemos el id md5 del ubicacion	
		$this->id_md5_ubicacion = $this->getRequestParameter('id_md5_ubicacion');
			
		$id_ubicacion = $this->acc_ubicaciones->obtenerIdUbicacionXIdMd5($this->id_md5_ubicacion);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_ubicaciones->comprobarUbicacion($id_ubicacion);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "La ubicación tiene artículos almacenados, asigne una nueva ubicación a esos artículos.";
		}
		else
		{		
			// Borramos la Ubicacion que hemos escogido
			$this->acc_ubicaciones->borrarUbicacion($id_ubicacion);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_ubicaciones->obtenerObjUbicacion($id_ubicacion); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar la ubicación.";		
			}
			else
			{
				$this->msg = "La ubicación se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de ver la ficha de la Ubicación
	 * 
	 */
	public function executeVerUbicacion()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
				
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Ubicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_administracion = new Administracion();
		
		// Obtenemos los estados de las ubicaciones
		$this->ar_ubicaciones = $this->acc_administracion->obtenerSelectEstadoUbicaciones();
		
		// Recogemos el id md5 de la Ubicacion  	
		$this->id_md5_ubicacion = $this->getRequestParameter('id_md5_ubicacion');
		
		// Obtenemos el objeto ubicacion a partir del Id Md5
		$this->obj_ubicacion = $this->acc_ubicaciones->obtenerObjUbicacionXIdMd5($this->id_md5_ubicacion);
	}
}
