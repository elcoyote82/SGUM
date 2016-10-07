<?php

/**
 * clientes actions.
 *
 * @package    SGUM
 * @subpackage clientes
 * @name       clientesActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class clientesActions extends sfActions
{
	/**
	 * Ejecuta la accion de listar todos los clientes de la aplicación
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
				
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
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
		$clientes = new Criteria();	
		
		//Recogemos las palabras a buscar si existen
		$nombre = $this->getRequestParameter('nombre');
		$nombre = $this->acc_url->parsearRecepcion($nombre);
		$this->nombre = $nombre;
		if ($this->nombre != '')
		{
			$clientes->add(ClientesPeer::NOMBRE,'%'.$this->nombre.'%',Criteria::LIKE);
		}	
				
		$cif_nif = $this->getRequestParameter('cif_nif');
		$cif_nif = $this->acc_url->parsearRecepcion($cif_nif);
		$this->cif_nif = $cif_nif;
		if ($this->cif_nif != '')
		{
			$clientes->add(ClientesPeer::CIF_NIF,'%'.$this->cif_nif.'%',Criteria::LIKE);
		}
				
		$pais = $this->getRequestParameter('pais');
		$pais = $this->acc_url->parsearRecepcion($pais);
		$this->pais = $pais;
		if ($this->pais != '')
		{
			$clientes->add(ClientesPeer::PAIS,$this->pais);
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
			$clientes->add(ClientesPeer::PROVINCIA,$this->provincia);
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
			$crit0 = $c->getNewCriterion(ClientesPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(ClientesPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$clientes->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$clientes->add(ClientesPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$clientes->add(ClientesPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$clientes = $this->acc_utilidades->ordenarObjetoXColumna($clientes,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$clientes = $this->acc_utilidades->ordenarObjetoXColumna($clientes,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		} 	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Clientes', 15);
		$pager->setCriteria($clientes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
				  
		$this->pager = $pager;
	}
  	
	/**
	 * Agregar un Cliente
	 */
	public function executeAgregarCliente()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesClientes
		$this->acc_clientes = new AccionesClientes();
		
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
			// Guardamos el objeto Cliente, si es todo correcto no devuelve el id del ultimo cliente insertado
			$id_cliente_save = $this->acc_clientes->guardarCliente($this->nombre,$this->cif_nif,
					$this->direccion,$this->poblacion,$this->provincia,$this->cp,$this->pais,$this->telefono,
					$this->telefono2,$this->movil,$this->fax,$this->email,$this->web);	
			
			// Si se ha guardado correctamente
			if($id_cliente_save)
			{	
				$this->msg = "Los datos han sido insertados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido guardar el cliente.";
			}	  		
		}	
	}
	    
	/**
	 * Validacíon de agregar cliente
	 */
	public function handleErrorAgregarCliente()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesClientes
		$this->acc_clientes = new AccionesClientes();
		
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
	 * Editar un Cliente
	 */
	public function executeEditarCliente()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesClientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del cliente  	
		$this->id_md5_cliente = $this->getRequestParameter('id_md5_cliente');

		// Obtenemos el objeto cliente a partir del Id Md5
		$this->obj_cliente = $this->acc_clientes->obtenerObjClienteXIdMd5($this->id_md5_cliente);
		
		// Obtenemos el Id de clientes a partir del objeto cliente
		$id_cliente = $this->obj_cliente->getIdCliente();		
		  	  		
		// Recogemos los datos del formulario
		$this->nombre = $this->getRequestParameter('nombre');
		$this->telefono2 = $this->getRequestParameter('telefono2');
		if(!isset($this->telefono2))
		{
			$this->telefono2 = $this->obj_cliente->getTelefono2();
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
			  
			// Actualizamos el cliente
			$cliente_update = $this->acc_clientes->actualizarCliente($id_cliente,$this->nombre,
					$this->cif_nif,$this->direccion,$this->poblacion,$this->provincia,$this->cp,$this->pais,
					$this->telefono,$this->telefono2,$this->movil,$this->fax,$this->email,$this->web);
			
			// Comprobamos si todo ha ido correctamente
			if ($cliente_update !== false)
			{			
				$this->msg = "Los datos han sido actualizados correctamente.";	
			}
			else
			{
				$this->msg = "No se ha actualizado el cliente.";	
			}
		}
	}
 
	/**
	 * Validacion de editar cliente
	 */
	public function handleErrorEditarCliente()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesClientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Recogemos el id md5 del cliente  	
		$this->id_md5_cliente = $this->getRequestParameter('id_md5_cliente');

		// Obtenemos el objeto cliente a partir del Id Md5
		$this->obj_cliente = $this->acc_clientes->obtenerObjClienteXIdMd5($this->id_md5_cliente);
		
		// Obtenemos el Id de clientes a partir del objeto cliente
		$id_cliente = $this->obj_cliente->getIdCliente();		
		  	  		
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
	 * Ejecuta la accion de borrar clientes
	 */
	public function executeBorrarCliente()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesClientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos = new AccionesContactos();
		
		// Recogemos el id md5 del cliente	
		$this->id_md5_cliente = $this->getRequestParameter('id_md5_cliente');
			
		$id_cliente = $this->acc_clientes->obtenerIdClienteXIdMd5($this->id_md5_cliente);
		
		// Comprobamos si esta siendo usado
		$usado = $this->acc_clientes->comprobarCliente($id_cliente);
		
		// Comprobamos si tiene algún contacto
		$usado2 = $this->acc_contactos->comprobarContactosCliente($id_cliente);
		
		// Si está usado
		if($usado)
		{
			$this->msg = "El cliente ya ha sido usado, no puede ser borrado.";
		}
		elseif($usado2)
		{
			$this->msg = "El cliente dispone de contactos, elimine antes los contactos.";
		}
		else
		{
			// Borramos el Cliente que hemos escogido
			$this->acc_clientes->borrarCliente($id_cliente);		
			
			// Comprobamos que lo hemos borrado	
			$temp = $this->acc_clientes->obtenerObjCliente($id_cliente); 
			      	  	
			if ($temp)
			{
				$this->msg = "No se ha podido borrar el cliente.";		
			}
			else
			{
				$this->msg = "El cliente se ha borrado correctamente.";
			}
		}
	}
	
	/**
	 * Ejecuta la acción de ver la ficha de un cliente
	 */
	public function executeVerCliente()
	{		
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesClientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesContactos
		$this->acc_contactos= new AccionesContactos();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
				
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
				
		// Recogemos el id md5 del cliente	
		$this->id_md5_cliente = $this->getRequestParameter('id_md5_cliente');

		// Obtenemos el objeto proveedor a partir del Id Md5
		$this->obj_cliente = $this->acc_clientes->obtenerObjClienteXIdMd5($this->id_md5_cliente);
		
		// Obtenemos el Id de proveedores a partir del objeto proveedor
		$id_cliente = $this->obj_cliente->getIdCliente();	
	
		//Para obtener la tab activa
		$this->tab = $this->getRequestParameter('tab');
		if ($this->tab == '')
		{
			$this->tab = "tab_cliente";
		}
				
		/*Obtenemos los pedidos
		//Ordenamos si se elige la columna
		$this->columna_ventas = $this->getRequestParameter('columna_ventas');
		$ventas = $this->acc_compras->obtenerVentasXIdCliente($id_cliente,$this->columna_ventas);
		$this->ventas = $ventas;
		
		//Obtenemos los productos de ese proveedor
		//Ordenamos si se elige la columna
		$this->columna_productos = $this->getRequestParameter('columna_productos');
		$productos = $this->acc_compras->obtenerProductosXIdCliente($id_cliente,$this->columna_productos);
		$this->productos = $productos;*/
	}
}
