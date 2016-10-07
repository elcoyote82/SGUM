<?php

/**
 * familias actions.
 *
 * @package    SGUM
 * @subpackage familias
 * @name       familiasActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class familiasActions extends sfActions
{
	/**
	 * Listamos todas las familias de los articulos
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
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
				
		// Creamos la busqueda a BD
		$familias = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$familias->add(FamiliasPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
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
			$crit0 = $c->getNewCriterion(FamiliasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(FamiliasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$familias->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$familias->add(FamiliasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$familias->add(FamiliasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$familias = $this->acc_utilidades->ordenarObjetoXColumna($familias,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$familias = $this->acc_utilidades->ordenarObjetoXColumna($familias,$this->sort."_".$this->type);
			break;
			
			default:
				$familias->addAscendingOrderByColumn(FamiliasPeer::NOMBRE);
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Familias', 15);
		$pager->setCriteria($familias);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  	
	/**
	 * Agregar una Familia
	 */
	public function executeAgregarFamilia()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
				  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		
		// Preguntamos por el nombre para la validacion
		if ($this->nombre != '')
		{
			// Guardamos el objeto Familia, si es todo correcto no devuelve el id del ultimo familia insertado
			$id_familia_save = $this->acc_familias->guardarFamilia($this->nombre);	
			
			// Si se ha guardado correctamente
			if($id_familia_save)
			{	
				$this->msg = "Los datos han sido insertados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido guardar la familia.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de agregar una familia
	 */
	public function handleErrorAgregarFamilia()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
				  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');		
				
		return sfView::SUCCESS;
	}
	
	/**
	 * Editar un Familia
	 */
	public function executeEditarFamilia()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
				
		// Recogemos el id md5 del familia  	
		$this->id_md5_familia = $this->getRequestParameter('id_md5_familia');

		// Obtenemos el objeto familia a partir del Id Md5
		$this->obj_familia = $this->acc_familias->obtenerObjFamiliaXIdMd5($this->id_md5_familia);
		
		// Obtenemos el Id de familias a partir del objeto familia
		$id_familia = $this->obj_familia->getIdFamilia();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		
		// Preguntamos por el nombre para la validacion
		if($this->nombre != '')
		{				  
			// Actualizamos el familia
			$familia_update = $this->acc_familias->actualizarFamilia($id_familia,$this->nombre);
			
			// Comprobamos si todo ha ido correctamente
			if ($familia_update !== false)
			{			
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha actualizado la familia.";	
			}
		}
	}
 
	/**
	 * Validacion de editar familia
	 */
	public function handleErrorEditarFamilia()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
				
		// Recogemos el id md5 del familia  	
		$this->id_md5_familia = $this->getRequestParameter('id_md5_familia');

		// Obtenemos el objeto familia a partir del Id Md5
		$this->obj_familia = $this->acc_familias->obtenerObjFamiliaXIdMd5($this->id_md5_familia);
		
		// Obtenemos el Id de familias a partir del objeto familia
		$id_familia = $this->obj_familia->getIdFamilia();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
			
		return sfView::SUCCESS;
	}
	
	/**
	 * Ejecuta la accion de borrar familias
	 */
	public function executeBorrarFamilia()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Recogemos el id md5 del familia	
		$this->id_md5_familia = $this->getRequestParameter('id_md5_familia');
			
		$id_familia = $this->acc_familias->obtenerIdFamiliaXIdMd5($this->id_md5_familia);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_familias->comprobarFamilia($id_familia);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "La familia tiene artículos asociados, asigne una nueva familia a esos artículos.";
		}
		else
		{	
			// Borramos el Familia que hemos escogido
			$this->acc_familias->borrarFamilia($id_familia);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_familias->obtenerObjFamilia($id_familia); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar la familia.";		
			}
			else
			{
				$this->msg = "La familia se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la accion de ver la ficha de la Familia
	 * 
	 */
	public function executeVerFamilia()
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
				
		// Recogemos el id md5 de la Ubicacion  	
		$this->id_md5_familia = $this->getRequestParameter('id_md5_familia');
		
		// Obtenemos el objeto ubicacion a partir del Id Md5
		$this->obj_familia = $this->acc_familias->obtenerObjFamiliaXIdMd5($this->id_md5_familia);
		
		// obtenemos un array con los articulos de la familia
		$this->ar_articulos = $this->acc_familias->obtenerArticulosXIdFamilia($this->obj_familia->getIdFamilia());
	}
}
