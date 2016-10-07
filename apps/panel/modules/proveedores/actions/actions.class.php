<?php

/**
 * proveedores actions.
 *
 * @package    SGUM
 * @subpackage proveedores
 * @name       proveedoresActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class proveedoresActions extends sfActions
{
	/**
	 * Ejecuta la accion de listar todos los proveedores de la aplicación
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
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos el id del usuario conectado
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el grupo del usuario conectado
		$this->id_grupo = $this->acc_admin->obtenerIdGrupoXIdUsuario($id_usuario);
		
		// Creamos la busqueda a BD
		$proveedores = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$proveedores->add(ProveedoresPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}	
				
		$cif_nif = $this->getRequestParameter('cif_nif');
		$cif_nif = $this->acc_url->parsearRecepcion($cif_nif);
		$this->cif_nif = $cif_nif;
		if ($this->cif_nif != '')
		{
			$proveedores->add(ProveedoresPeer::CIF_NIF,'%'.$this->cif_nif.'%',Criteria::LIKE);
		}
				
		$pais = $this->getRequestParameter('pais');
		$pais = $this->acc_url->parsearRecepcion($pais);
		$this->pais = $pais;
		if ($this->pais != '')
		{
			$proveedores->add(ProveedoresPeer::PAIS,$this->pais);
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
			$proveedores->add(ProveedoresPeer::PROVINCIA,$this->provincia);
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
			$crit0 = $c->getNewCriterion(ProveedoresPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(ProveedoresPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$proveedores->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$proveedores->add(ProveedoresPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$proveedores->add(ProveedoresPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$proveedores = $this->acc_utilidades->ordenarObjetoXColumna($proveedores,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$proveedores = $this->acc_utilidades->ordenarObjetoXColumna($proveedores,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Proveedores', 15);
		$pager->setCriteria($proveedores);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  	
	/**
	 * Agregar un Proveedor
	 */
	public function executeAgregarProveedor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesProveedores
		$this->acc_proveedores = new AccionesProveedores();
		
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
			// Guardamos el objeto Proveedor, si es todo correcto no devuelve el id del ultimo proveedor insertado
			$id_proveedor_save = $this->acc_proveedores->guardarProveedor($this->nombre,$this->cif_nif,
					$this->direccion,$this->poblacion,$this->provincia,$this->cp,$this->pais,$this->telefono,
					$this->telefono2,$this->movil,$this->fax,$this->email,$this->web);	
			
			// Si se ha guardado correctamente
			if($id_proveedor_save)
			{	
				$this->msg = "Los datos han sido insertados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido guardar el proveedor.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de agregar proveedor
	 */
	public function handleErrorAgregarProveedor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesProveedores
		$this->acc_proveedores = new AccionesProveedores();
		
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
	 * Editar un Proveedor
	 */
	public function executeEditarProveedor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesProveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del proveedor  	
		$this->id_md5_proveedor = $this->getRequestParameter('id_md5_proveedor');

		// Obtenemos el objeto proveedor a partir del Id Md5
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedorXIdMd5($this->id_md5_proveedor);
		
		// Obtenemos el Id de proveedores a partir del objeto proveedor
		$id_proveedor = $this->obj_proveedor->getIdProveedor();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->telefono2 = $this->getRequestParameter('telefono2');
		if(!isset($this->telefono2))
		{
			$this->telefono2 = $this->obj_proveedor->getTelefono2();
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
			  
			// Actualizamos el proveedor
			$proveedor_update = $this->acc_proveedores->actualizarProveedor($id_proveedor,$this->nombre,
					$this->cif_nif,$this->direccion,$this->poblacion,$this->provincia,$this->cp,$this->pais,
					$this->telefono,$this->telefono2,$this->movil,$this->fax,$this->email,$this->web);
			
			// Comprobamos si todo ha ido correctamente
			if ($proveedor_update !== false)
			{			
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha actualizado el proveedor.";	
			}
		}
	}
 
	/**
	 * Validacion de editar proveedor
	 */
	public function handleErrorEditarProveedor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesProveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del proveedor  	
		$this->id_md5_proveedor = $this->getRequestParameter('id_md5_proveedor');

		// Obtenemos el objeto proveedor a partir del Id Md5
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedorXIdMd5($this->id_md5_proveedor);
		
		// Obtenemos el Id de proveedores a partir del objeto proveedor
		$id_proveedor = $this->obj_proveedor->getIdProveedor();		
		  	  		
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
	 * Ejecuta la accion de borrar proveedores
	 */
	public function executeBorrarProveedor()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesProveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Recogemos el id md5 del proveedor	
		$this->id_md5_proveedor = $this->getRequestParameter('id_md5_proveedor');
			
		$id_proveedor = $this->acc_proveedores->obtenerIdProveedorXIdMd5($this->id_md5_proveedor);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_proveedores->comprobarProveedor($id_proveedor);
		
		// Comprobamos si tiene algún contacto
		$usado2 = $this->acc_contactos->comprobarContactosProveedor($id_proveedor);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El proveedor ya ha sido usado, no puede ser borrado.";
		}
		elseif($usado2)
		{
			$this->msg = "El proveedor dispone de contactos, elimine antes los contactos.";
		}
		else
		{			
			// Borramos el Proveedor que hemos escogido
			$this->acc_proveedores->borrarProveedor($id_proveedor);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_proveedores->obtenerObjProveedor($id_proveedor); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el proveedor.";		
			}
			else
			{
				$this->msg = "El proveedor se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la acción de ver la ficha de un proveedor
	 */
	public function executeVerProveedor()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesProveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos= new AccionesContactos();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_admin = new Administracion();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del proveedor	
		$this->id_md5_proveedor = $this->getRequestParameter('id_md5_proveedor');

		// Obtenemos el objeto proveedor a partir del Id Md5
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedorXIdMd5($this->id_md5_proveedor);
		
		// Obtenemos el Id de proveedores a partir del objeto proveedor
		$id_proveedor = $this->obj_proveedor->getIdProveedor();		
	
		//Para obtener la tab activa
		$this->tab = $this->getRequestParameter('tab');
		if ($this->tab == '')
		{
			$this->tab = "tab_proveedor";
		}
				
		/*Obtenemos los pedidos
		//Ordenamos si se elige la columna
		$this->columna_pedidos = $this->getRequestParameter('columna_pedidos');
		$pedidos = $this->acc_compras->obtenerPedidosXIdProveedor($id_proveedor,$this->columna_pedidos);
		$this->pedidos = $pedidos;
		
		//Obtenemos los productos de ese proveedor
		//Ordenamos si se elige la columna
		$this->columna_productos = $this->getRequestParameter('columna_productos');
		$productos = $this->acc_compras->obtenerProductosXIdProveedor($id_proveedor,$this->columna_productos);
		$this->productos = $productos;*/
	}
}
