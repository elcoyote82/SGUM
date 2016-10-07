<?php

/**
 * pedidos actions.
 *
 * @package    SGUM
 * @subpackage pedidos
 * @name       pedidosActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class pedidosActions extends sfActions
{
	/**
	 * Ejecuta la accion del index
	 */
	public function executeIndex()
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
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase Ubicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Creamos la busqueda a BD
		$proveedores = new Criteria();
				
		//Recogemos las palabras a buscar si existen		
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$proveedores->add(ProveedoresPeer::ID_PROVEEDOR,$this->id_proveedor);
		}
		
		$nombre_articulo = $this->getRequestParameter('nombre_articulo');
		$this->nombre_articulo = $nombre_articulo;

		$id_md5_articulo = $this->getRequestParameter('id_md5_articulo');
		if(isset($id_md5_articulo))
		{
			$id_md5_articulo = $this->acc_url->parsearRecepcion($id_md5_articulo);
			$this->id_articulo = $this->acc_articulos->obtenerIdArticuloXIdMd5($id_md5_articulo);
			$obj_articulo = $this->acc_articulos->obtenerObjArticulo($this->id_articulo );
			$this->nombre_articulo = $obj_articulo->getNombre();
		} 
		else
		{			
			$id_articulo = $this->getRequestParameter('id_articulo');
			$id_articulo = $this->acc_url->parsearRecepcion($id_articulo);
			$this->id_articulo = $id_articulo;
		}		
		
		if($this->nombre_articulo != '')
		{			
			$proveedores->add(ArticulosPeer::ID_ARTICULO,$this->id_articulo);
			$crit0 = $proveedores->getNewCriterion(ArticulosPeer::STOCK_BAJO, 1);
			$crit1 = $proveedores->getNewCriterion(ArticulosPeer::STOCK, 0);
			$crit0->addOr($crit1);
			$proveedores->add($crit0);			
			$proveedores->addJoin(ArticulosXProveedorPeer::ID_ARTICULO,ArticulosPeer::ID_ARTICULO,Criteria::INNER_JOIN);
			$proveedores->add(ArticulosXProveedorPeer::ID_ARTICULO,$this->id_articulo);
			$proveedores->addJoin(ArticulosXProveedorPeer::ID_PROVEEDOR,ProveedoresPeer::ID_PROVEEDOR,Criteria::INNER_JOIN);
		}
		if(isset($id_md5_articulo))
		{
			$this->buscar = true;	
		}
		else
		{
			$this->buscar = $this->getRequestParameter('buscar');
		}

		// Llamamos al paginador		
		$pager = new sfPropelPager('Proveedores', 30);
		$pager->setCriteria($proveedores);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	
	/**
	* Ejecuta la acción de Autocompletar el nombre de los Articulos en la busqueda
	*/
	public function executeBuscarProveedorArticulo() 
	{	
		$this->nombre_articulo = $this->getRequestParameter('nombre_articulo'); 
		
		$id_articulo = $this->getRequestParameter('id_articulo');
		
		//Objeto para los articulos
		$articulos = new Criteria();
		$crit0 = $articulos->getNewCriterion(ArticulosPeer::STOCK_BAJO, 1);
		$crit1 = $articulos->getNewCriterion(ArticulosPeer::STOCK, 0);
		$crit0->addOr($crit1);
		$articulos->add($crit0);
	  	
		$this->articulos = ArticulosPeer::doSelect($articulos);  
	}
	
	/**
	 * Ejecuta la accion de Agregar un Pedido
	 */
	public function executeAgregarPedido()
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
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$id_md5_proveedor = $this->getRequestParameter('id_md5_proveedor');
		$id_md5_proveedor = $this->acc_url->parsearRecepcion($id_md5_proveedor);
		$this->id_proveedor = $this->acc_proveedores->obtenerIdProveedorXIdMd5($id_md5_proveedor);
		
		$id_md5_articulo = $this->getRequestParameter('id_md5_articulo');
		$id_md5_articulo = $this->acc_url->parsearRecepcion($id_md5_articulo);
		$this->id_articulo = $this->acc_articulos->obtenerIdArticuloXIdMd5($id_md5_articulo);
		
		$this->id_pedido_temporal = $this->acc_pedidos->guardarPedido($this->id_proveedor,$this->id_articulo);
		
		// Obtenemos el objeto Pedido
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido_temporal);
				
		// Obtenemos el objeto Proveedor
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedor($this->id_proveedor);
		
		$cantidad = $this->getRequestParameter('cantidad');
		
		if($this->id_articulo)
		{
			$id_linea_pedido = $this->acc_pedidos->guardarLineaPedido($this->id_pedido_temporal,$this->id_articulo,$cantidad);	
		}
		
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido_temporal);
	}
	
	/**
	 * Ejecuta la accion de Agregar un Articulo a un Pedido
	 */
	public function executeAgregarArticuloPedido()
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
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();

		// Obtenemos el id del pedido para mantener la trazabilidad		
		$this->id_pedido_temporal = $this->getRequestParameter('id_pedido_temporal');
		
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');	
		
		// Agregamos el articulos a las lineas de pedido
		if($this->id_articulo)
		{
			// Preguntamos si el articulo ya esta guardado para ese pedido
			$obj_linea_pedido = $this->acc_pedidos->obtenerLineasPedido($this->id_pedido_temporal,$this->id_articulo);

			if(!$obj_linea_pedido)
			{
				$id_linea_pedido = $this->acc_pedidos->guardarLineaPedido($this->id_pedido_temporal,$this->id_articulo,$cantidad);	
			}
			else 
			{
				$id_linea_pedido = $obj_linea_pedido->getIdArticuloXPedido();
				$cantidad_old = $obj_linea_pedido->getCantidad();
				$cantidad = $cantidad_old  + 1;
				$linea_pedido_update = $this->acc_pedidos->actualizarLineaPedido($id_linea_pedido,$cantidad);
			}				
		}
		
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido_temporal);
	}
		
	/**
	 * Ejecuta la accion de subir la cantidad de un articulo en un pedido
	 */
	public function executeSubirCantidadArticuloPedido()
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
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	

		// Obtenemos el id del pedido para mantener la trazabilidad		
		$this->id_pedido_temporal = $this->getRequestParameter('id_pedido_temporal');
			
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');
					
		// Obtenemos el id de la linea de pedido a actualizar		
		$this->id_linea_pedido = $this->getRequestParameter('id_linea_pedido');	
		
		$obj_articulo_x_pedido = $this->acc_pedidos->obtenerObjArticulosXPedido($this->id_linea_pedido);
		
		$id_pedido = $obj_articulo_x_pedido->getIdPedido();
		
		if($this->id_linea_pedido)
		{
			$cantidad_old = $obj_articulo_x_pedido->getCantidad();
			$cantidad = $cantidad_old  + 1;
			$linea_pedido_update = $this->acc_pedidos->actualizarLineaPedido($this->id_linea_pedido,$cantidad);
		}
		
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($id_pedido);		
	}
	
	/**
	 * Ejecuta la accion de bajar la cantidad de un articulo en un pedido
	 */
	public function executeBajarCantidadArticuloPedido()
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
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	

		// Obtenemos el id del pedido para mantener la trazabilidad		
		$this->id_pedido_temporal = $this->getRequestParameter('id_pedido_temporal');
			
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');
					
		// Obtenemos el id de la linea de pedido a actualizar		
		$this->id_linea_pedido = $this->getRequestParameter('id_linea_pedido');	
		
		$obj_articulo_x_pedido = $this->acc_pedidos->obtenerObjArticulosXPedido($this->id_linea_pedido);
		
		$id_pedido = $obj_articulo_x_pedido->getIdPedido();
		
		if($this->id_linea_pedido)
		{
			$cantidad_old = $obj_articulo_x_pedido->getCantidad();
			if($cantidad_old == 1)
			{
				$cantidad = $cantidad_old;
			}
			else
			{
				$cantidad = $cantidad_old  - 1;
			}
			$linea_pedido_update = $this->acc_pedidos->actualizarLineaPedido($this->id_linea_pedido,$cantidad);
		}
		
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($id_pedido);		
	}
	
	/**
	 * Ejecuta la accion de Borrar un Articulo de un Pedido
	 */
	public function executeBorrarArticuloPedido()
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
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	

		// Obtenemos el id del pedido para mantener la trazabilidad		
		$this->id_pedido_temporal = $this->getRequestParameter('id_pedido_temporal');
			
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');
					
		// Obtenemos el id de la linea de pedido a actualizar		
		$this->id_linea_pedido = $this->getRequestParameter('id_linea_pedido');	
		
		$obj_articulo_x_pedido = $this->acc_pedidos->obtenerObjArticulosXPedido($this->id_linea_pedido);
		
		$id_pedido = $obj_articulo_x_pedido->getIdPedido();
		
		if($this->id_linea_pedido)
		{
			$linea_pedido_delete = $this->acc_pedidos->borrarLineaPedido($this->id_linea_pedido);	
		}
		
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($id_pedido);		
	}
	
	/**
	* Ejecuta la acción de Autocompletar el nombre de los Articulos en la busqueda
	*/
	public function executeBuscarArticuloPedido() 
	{			
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$this->nombre_articulo = $this->getRequestParameter('nombre_articulo');
		$this->proveedor = $this->getRequestParameter('id_proveedor');
		
		// Objeto para los articulos
		$articulos = new Criteria();
		$crit0 = $articulos->getNewCriterion(ArticulosPeer::STOCK_BAJO,1);
		$crit1 = $articulos->getNewCriterion(ArticulosPeer::STOCK, 0);
		$crit0->addOr($crit1);
		$articulos->add($crit0);
			
		$ar_articulos = ArticulosPeer::doSelect($articulos);
		 
		/*
		$articulos_temp = array();
		foreach ($ar_articulos as $articulo)
		{
			$id_articulo = $articulo->getIdArticulo();
			$acc_articulos = new AccionesArticulos();
			
			$obj_articulo_x_proveedor = $acc_articulos->obtenerObjArticuloXProveedor($id_articulo,$this->proveedor);
			
			if($obj_articulo_x_proveedor)
			{
				array_push($articulos_temp,$obj_articulo_x_proveedor);
			}
		}*/
		
		$this->articulos = $ar_articulos;
	}
	
	/**
	 * Ejecuta la accion de confirmar los datos del pedido
	 */
	public function executeConfirmarPedido()
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

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos el id del pedido para confirmar y generar el albaran de entrada
		$this->id_pedido_temporal = $this->getRequestParameter('id_pedido_temporal');
		if(!isset($this->id_pedido_temporal))
		{
			$id_md5_pedido = $this->getRequestParameter('id_md5_pedido');	
			$this->id_pedido_temporal = $this->acc_pedidos->obtenerIdPedidoXIdMd5($id_md5_pedido);
		}
		
		// Obtenemos el objeto Pedido Temporal
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido_temporal);
								
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido_temporal);
		
		// Obtenemos el id del proveedor
		$id_proveedor = $this->obj_pedido->getIdProveedor();
		
		// Obtenemos el objeto proveedor
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedor($id_proveedor);
	}
	
	/**
	 * Ejecuta la accion de generar el Informe sobre los datos del pedido
	 */
	public function executeGenerarPedido()
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

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos el id del pedido para obtener los datos del pedido
		$id_md5_pedido = $this->getRequestParameter('id_md5_pedido');	
		$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($id_md5_pedido);
		
		// Generamos el informe de pedido
		$pedido_generado = $this->acc_pedidos->generarInformePedido($this->id_pedido);
		
		if ($pedido_generado)
		{
			// Pasamos el estado del pedido de Borrador a En proceso...
			$actualizar_estado = $this->acc_pedidos->actualizarEstadoPedido($this->id_pedido,2);
			
			if($actualizar_estado)
			{
				$this->msg = "El pedido se ha generado correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido cambiar el estado del pedido, consulte con el administrador.";
			}				
		}
		else
		{
			$this->msg = "No se ha podido generar el pedido.";
		}
	}
	
	/**
	 * Ejecuta la accion de Editar un Pedido
	 */
	public function executeEditarPedido()
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
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$id_md5_pedido = $this->getRequestParameter('id_md5_pedido');
		$this->id_pedido_temporal = $this->acc_pedidos->obtenerIdPedidoXIdMd5($id_md5_pedido);
		
		// Obtenemos el objeto Pedido
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido_temporal);
				
		// Obtenemos el id del proveedor
		$this->id_proveedor = $this->obj_pedido->getIdProveedor();
		
		$cantidad = $this->getRequestParameter('cantidad');
		
		if($this->id_articulo)
		{
			$id_linea_pedido = $this->acc_pedidos->guardarLineaPedido($this->id_pedido_temporal,$this->id_articulo,$cantidad);	
		}
		
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido_temporal);
	}
	
	/**
	 * Ejecuta la accion de Borrar un Pedido Temporal
	 */
	public function executeBorrarPedido()
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
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$id_md5_pedido = $this->getRequestParameter('id_md5_pedido');
		$this->id_pedido_temporal = $this->acc_pedidos->obtenerIdPedidoXIdMd5($id_md5_pedido);
		
		// Comprobamos si el pedido es temporal
		$usado = $this->acc_pedidos->comprobarPedido($this->id_pedido_temporal );
		
		// Si está usado
		if(!$usado)
		{
			$this->msg = "El pedido no es un borrador, no puede ser borrado.";
		}
		else
		{			
			// Borramos el Pedido que hemos escogido
			$this->acc_pedidos->borrarPedido($this->id_pedido_temporal);		
			
			// Comprobamos que lo hemos borrado	
			$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido_temporal);
			      	  	
			if ($this->obj_pedido)
			{
				$this->msg = "No se ha podido borrar el pedido.";		
			}
			else
			{
				$this->msg = "El pedido se ha borrado correctamente.";
			}
		}
	}
	
	/**
	* Ejecuta la acción de Autocompletar el nombre de los Articulos en la busqueda
	*/
	public function executeBuscarArticulo() 
	{	
		$this->nombre = $this->getRequestParameter('nombre'); 
		
		//Objeto para los articulos
		$articulos = new Criteria();
		$crit0 = $articulos->getNewCriterion(ArticulosPeer::STOCK_BAJO, 1);
		$crit1 = $articulos->getNewCriterion(ArticulosPeer::STOCK, 0);
		$crit0->addOr($crit1);
		$articulos->add($crit0);	
	  	
		$this->articulos = ArticulosPeer::doSelect($articulos);   
	}	
	
	/**
	 * Ejecuta la accion de mostrar todos los pedidos generados en la aplicación
	 */
	public function executeAdministrarPedidos()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Pedidos Pendientes
		$this->ar_estado_pedidos_pendientes = $this->acc_admin->obtenerSelectEstadoPedidos();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Pedidos Pendientes
		$pedidos = new Criteria();
		
		$id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
		$id_estado_pedido = $this->acc_url->parsearRecepcion($id_estado_pedido);
		$this->id_estado_pedido = $id_estado_pedido;
		if ($this->id_estado_pedido != 0)
		{
			$pedidos->add(PedidosPeer::ID_ESTADO_PEDIDO,$this->id_estado_pedido);
		}
		
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$pedidos->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
		}
					
		$num_pedido = $this->getRequestParameter('num_pedido');
		$num_pedido = $this->acc_url->parsearRecepcion($num_pedido);
		$this->num_pedido = $num_pedido;
		
		$fecha_pedido = $this->getRequestParameter('fecha_pedido');
		$fecha_pedido = $this->acc_url->parsearRecepcion($fecha_pedido);
		$this->fecha_pedido = $fecha_pedido;
		
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
			$crit0 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$pedidos->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$pedidos->add(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$pedidos->add(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$pedidos = $this->acc_utilidades->ordenarObjetoXColumna($pedidos,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$pedidos = $this->acc_utilidades->ordenarObjetoXColumna($pedidos,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Pedidos', 15);
		$pager->setCriteria($pedidos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de mostrar los pedidos pendientes
	 */
	public function executePedidosPendientes()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Pedidos Pendientes
		$pedidos_pendientes = new Criteria();
		$pedidos_pendientes->add(PedidosPeer::ID_ESTADO_PEDIDO,1);
				
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$pedidos_pendientes->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
		}
		
		$id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
		$id_estado_pedido = $this->acc_url->parsearRecepcion($id_estado_pedido);
		$this->id_estado_pedido = $id_estado_pedido;
			
		$num_pedido = $this->getRequestParameter('num_pedido');
		$num_pedido = $this->acc_url->parsearRecepcion($num_pedido);
		$this->num_pedido = $num_pedido;
		
		$fecha_pedido = $this->getRequestParameter('fecha_pedido');
		$fecha_pedido = $this->acc_url->parsearRecepcion($fecha_pedido);
		$this->fecha_pedido = $fecha_pedido;
		
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
			$crit0 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$pedidos_pendientes->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$pedidos_pendientes->add(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$pedidos_pendientes->add(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$pedidos_pendientes = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_pendientes,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$pedidos_pendientes = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_pendientes,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Pedidos', 15);
		$pager->setCriteria($pedidos_pendientes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de mostrar los pedidos en proceso
	 */
	public function executePedidosEnProceso()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Pedidos En Proceso
		$pedidos_en_proceso = new Criteria();
		$pedidos_en_proceso->add(PedidosPeer::ID_ESTADO_PEDIDO,2);
				
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$pedidos_en_proceso->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
		}
		
		$id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
		$id_estado_pedido = $this->acc_url->parsearRecepcion($id_estado_pedido);
		$this->id_estado_pedido = $id_estado_pedido;
			
		$num_pedido = $this->getRequestParameter('num_pedido');
		$num_pedido = $this->acc_url->parsearRecepcion($num_pedido);
		$this->num_pedido = $num_pedido;
		
		$fecha_pedido = $this->getRequestParameter('fecha_pedido');
		$fecha_pedido = $this->acc_url->parsearRecepcion($fecha_pedido);
		$this->fecha_pedido = $fecha_pedido;
		
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
			$crit0 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$pedidos_en_proceso->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$pedidos_en_proceso->add(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$pedidos_en_proceso->add(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$pedidos_en_proceso = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_en_proceso,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$pedidos_en_proceso = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_en_proceso,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Pedidos', 15);
		$pager->setCriteria($pedidos_en_proceso);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de listar los pedidos recibidos en el almacén
	 */
	public function executePedidosRecibidos()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Pedidos Recibidos
		$pedidos_recibidos = new Criteria();
		$pedidos_recibidos->add(PedidosPeer::ID_ESTADO_PEDIDO,3);
				
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$pedidos_recibidos->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
		}
		
		$id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
		$id_estado_pedido = $this->acc_url->parsearRecepcion($id_estado_pedido);
		$this->id_estado_pedido = $id_estado_pedido;
			
		$num_pedido = $this->getRequestParameter('num_pedido');
		$num_pedido = $this->acc_url->parsearRecepcion($num_pedido);
		$this->num_pedido = $num_pedido;
		
		$fecha_pedido = $this->getRequestParameter('fecha_pedido');
		$fecha_pedido = $this->acc_url->parsearRecepcion($fecha_pedido);
		$this->fecha_pedido = $fecha_pedido;
		
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
			$crit0 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$pedidos_recibidos->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$pedidos_recibidos->add(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$pedidos_recibidos->add(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$pedidos_recibidos = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_recibidos,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$pedidos_recibidos = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_recibidos,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Pedidos', 15);
		$pager->setCriteria($pedidos_recibidos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de listar los pedidos completos en el almacén
	 */
	public function executePedidosCompletos()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Pedidos Completos
		$pedidos_completos = new Criteria();
		$pedidos_completos->add(PedidosPeer::ID_ESTADO_PEDIDO,4);
				
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$pedidos_completos->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
		}
		
		$id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
		$id_estado_pedido = $this->acc_url->parsearRecepcion($id_estado_pedido);
		$this->id_estado_pedido = $id_estado_pedido;
			
		$num_pedido = $this->getRequestParameter('num_pedido');
		$num_pedido = $this->acc_url->parsearRecepcion($num_pedido);
		$this->num_pedido = $num_pedido;
		
		$fecha_pedido = $this->getRequestParameter('fecha_pedido');
		$fecha_pedido = $this->acc_url->parsearRecepcion($fecha_pedido);
		$this->fecha_pedido = $fecha_pedido;
		
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
			$crit0 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$pedidos_completos->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$pedidos_completos->add(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$pedidos_completos->add(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$pedidos_completos = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_completos,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$pedidos_completos = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_completos,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Pedidos', 15);
		$pager->setCriteria($pedidos_completos);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;	
	}
	
	/**
	 * Ejecuta la accion de listar los pedidos procesados en el almacén
	 */
	public function executePedidosProcesados()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Pedidos Pendientes
		$this->ar_estado_pedidos_pendientes = $this->acc_admin->obtenerSelectEstadoPedidosPendientes();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
		
		// Obtenemos un objeto de la clase Pedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Pedidos Procesados
		$pedidos_procesados = new Criteria();
		$pedidos_procesados->add(PedidosPeer::ID_ESTADO_PEDIDO,5);
				
		$id_proveedor = $this->getRequestParameter('id_proveedor');
		$id_proveedor = $this->acc_url->parsearRecepcion($id_proveedor);
		$this->id_proveedor = $id_proveedor;
		if ($this->id_proveedor != 0)
		{
			$pedidos_procesados->add(PedidosPeer::ID_PROVEEDOR,$this->id_proveedor);
		}
		
		$id_estado_pedido = $this->getRequestParameter('id_estado_pedido');
		$id_estado_pedido = $this->acc_url->parsearRecepcion($id_estado_pedido);
		$this->id_estado_pedido = $id_estado_pedido;
			
		$num_pedido = $this->getRequestParameter('num_pedido');
		$num_pedido = $this->acc_url->parsearRecepcion($num_pedido);
		$this->num_pedido = $num_pedido;
		
		$fecha_pedido = $this->getRequestParameter('fecha_pedido');
		$fecha_pedido = $this->acc_url->parsearRecepcion($fecha_pedido);
		$this->fecha_pedido = $fecha_pedido;
		
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
			$crit0 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$pedidos_procesados->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$pedidos_procesados->add(PedidosPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$pedidos_procesados->add(PedidosPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$pedidos_procesados = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_procesados,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$pedidos_procesados = $this->acc_utilidades->ordenarObjetoXColumna($pedidos_procesados,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Pedidos', 15);
		$pager->setCriteria($pedidos_procesados);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;	
	}
	
	/**
	 * Ejecuta la accion de ver la ficha con los datos del pedido
	 */
	public function executeVerPedido()
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

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();	
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
				
		// Obtenemos el id del pedido
		$id_md5_pedido = $this->getRequestParameter('id_md5_pedido');	
		$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($id_md5_pedido);
				
		// Obtenemos el objeto Pedido Temporal
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);
								
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido);
		
		// Obtenemos el id del proveedor
		$id_proveedor = $this->obj_pedido->getIdProveedor();
		
		// Obtenemos el objeto proveedor
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedor($id_proveedor);
		
		// Obtenemos el informe en pdf del pedido
		$obj_informe_pedido = $this->acc_informes->obtenerObjInformePedido($this->id_pedido);
		
		$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
				
		$ruta_informe_pedido = $ruta_mostrar_informe."/pedidos/".$obj_informe_pedido->getRutaAlbaran();
		
		$this->ruta_informe_pedido = $ruta_informe_pedido.".pdf";
	}
	
	/**
	 * Ejecuta la accion de descargar los informes de pedido
	 */
	public function executeDescargarInformePedido()
	{		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id del pedido
		$id_md5_pedido = $this->getRequestParameter('id_md5_pedido');	
		$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($id_md5_pedido);
				
		// Obtenemos el objeto Pedido
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);
		
		// Obtenemos el informe en pdf del pedido
		$obj_informe_pedido = $this->acc_informes->obtenerObjInformePedido($this->id_pedido);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_pedidos');
		
		$this->ruta_informe_pedido = $ruta_mostrar_informe.$obj_informe_pedido->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_pedido);   
		if (!$descargado)
		{
			if ($id_md5_pedido != '')
			{
				$this->redirect('/pedidos/verPedido?id_md5_pedido='.$id_md5_pedido);
			}
			else
			{
				$this->redirect('/pedidos/index');
			}
		}	
	}
	
	/**
	 * Ejecuta la accion de actualizar el estado del pedido
	 */
	public function executeConfirmarPedidoRecibido()
	{	
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
			
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un select con todas las Empresas de Transporte
		$this->ar_transporte_conductores = $this->acc_transporte->obtenerSelectTransporteConductores4();
		
   		// Obtenemos el id del pedido
		$this->id_md5_pedido = $this->getRequestParameter('id_md5_pedido');	
		$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($this->id_md5_pedido);
		
		// Obtenemos el objeto Pedido
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);	
			
		// Obtenemos el conductor
		$id_transporte_conductor = $this->getRequestParameter('id_transporte_conductor');	
				
		if($id_transporte_conductor != '')
		{
			// Actualizamos el estado del pedido(de en proceso a recibido)
			$estado_pedido_actualizado = $this->acc_pedidos->actualizarEstadoPedido($this->id_pedido, 3);	
							
			if($estado_pedido_actualizado)
			{							
				// Generamos la entrada
				$entrada_salvada = $this->acc_entradas->guardarEntrada($this->id_pedido,$id_transporte_conductor);
				
				if($entrada_salvada)
				{
					$this->msg = "El pedido ha sido recibido en el almacén.";	
				}				
			}
			else
			{
				$this->msg = "No se ha podido actualizar el estado del pedido a 'Recibido'.";
			}	
		}
	}
	
	/**
	 * Validacíon de confirmar Pedido Articulo
	 */
	public function handleErrorConfirmarPedidoRecibido()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
			
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un select con todas las Empresas de Transporte
		$this->ar_transporte_conductores = $this->acc_transporte->obtenerSelectTransporteConductores4();
		
   		// Obtenemos el id del pedido
		$this->id_md5_pedido = $this->getRequestParameter('id_md5_pedido');	
		$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($this->id_md5_pedido);
		
		// Obtenemos el objeto Pedido
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);	
			
		// Obtenemos el conductor
		$id_transporte_conductor = $this->getRequestParameter('id_transporte_conductor');
		
		return sfView::SUCCESS;		
	}
	
	
	/**
	 * Ejecuta la accion de comprobar el pedido completo¡
	 */
	public function executeComprobarPedidoCompleto()
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

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$this->id_md5_pedido = $this->getRequestParameter('id_md5_pedido');
		$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($this->id_md5_pedido);
		
		// Obtenemos el objeto Pedido
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);
				
		// Obtenemos el id del proveedor
		$this->id_proveedor = $this->obj_pedido->getIdProveedor();
				
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido);
		
		// Obtenemos el objeto Proveedor
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedor($this->id_proveedor); 
		
		$this->ar_lineas_pedido_completo = $this->getRequestParameter('id_linea_pedido');
		
		if($this->ar_lineas_pedido_completo)
		{
			// Contador de Lineas de Pedido
			$this->contador_lineas_pedido = count($this->ar_lineas_pedido);
			
			// Contador de lineas de Pedido Completas
			$this->contador_lineas_pedido_completas = count($this->ar_lineas_pedido_completo);
			
			if($this->contador_lineas_pedido == $this->contador_lineas_pedido_completas)
			{
				// Actualizamos el estado del pedido a completo
				$estado_pedido_actualizado = $this->acc_pedidos->actualizarEstadoPedido($this->id_pedido, 4);

				// Obtenemos el id de entrada a partir del id de pedido
				$id_entrada = $this->acc_entradas->obtenerIdEntradaXIdPedido($this->id_pedido);
				
				// Generamos las lineas de entradas según las lineas de pedido
				// 1 articulo -> 16 bultos => 16 lineas de entrada de ese artículos
				foreach($this->ar_lineas_pedido as $linea_pedido)
				{
					// Obtenemos la cantidad de articulos
					$cantidad_articulo = $linea_pedido->getCantidad();
					$i = 0;
					while ($i < $cantidad_articulo) 
					{
						// Guardamos las lineas de entrada
						$this->acc_entradas->guardarLineaEntrada($id_entrada, $linea_pedido->getIdArticulo());
						$i++;
					}
				}
								
				$this->msg = "El pedido está completo a la espera de procesarlo y colocar las mercancías.";
			}
			else
			{
				$this->msg = "El pedido está incompleto, se mantendrá en Pedidos Recibidos hasta recibir todas las mercancías.";
			}
		}
	}	

	/**
	 * Ejecuta la accion de ver la ficha completa con los datos del pedido, conductor y entrada
	 */
	public function executeVerPedidoCompleto()
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

		// Obtenemos el array de las provincias
		$this->ar_provincias = $this->acc_utilidades->obtenerSelectProvincias();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase AccionesPedidos
		$this->acc_pedidos = new AccionesPedidos();
		
		// Obtenemos un select con todos los Proveedores
		$this->ar_proveedores = $this->acc_proveedores->obtenerSelectProveedores();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();	
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();	
		
		// Obtenemos un objeto de la clase AccionesEntradas
		$this->acc_entradas = new AccionesEntradas();	
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();		
				
		// Obtenemos el id del pedido
		$id_md5_pedido = $this->getRequestParameter('id_md5_pedido');	
		$this->id_pedido = $this->acc_pedidos->obtenerIdPedidoXIdMd5($id_md5_pedido);
				
		// Obtenemos el objeto Pedido Temporal
		$this->obj_pedido = $this->acc_pedidos->obtenerObjPedido($this->id_pedido);
								
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$this->ar_lineas_pedido = $this->acc_pedidos->obtenerLineasPedidoXIdPedido($this->id_pedido);
		
		// Obtenemos el id del proveedor
		$id_proveedor = $this->obj_pedido->getIdProveedor();
		
		// Obtenemos el objeto proveedor
		$this->obj_proveedor = $this->acc_proveedores->obtenerObjProveedor($id_proveedor);
		
		// Obtenemos el informe en pdf del pedido
		$obj_informe_pedido = $this->acc_informes->obtenerObjInformePedido($this->id_pedido);
		
		if($obj_informe_pedido)
		{
			$this->mostrar_informe_pedido = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
					
			$ruta_informe_pedido = $ruta_mostrar_informe."/pedidos/".$obj_informe_pedido->getRutaAlbaran();
			
			$this->ruta_informe_pedido = $ruta_informe_pedido.".pdf";
		}
		else
		{
			$this->mostrar_informe_pedido = false;
		}
		
		// Obtenemos el objeto entrada
		$id_entrada = $this->acc_entradas->obtenerIdEntradaXIdPedido($this->id_pedido);
		$this->obj_entrada = $this->acc_entradas->obtenerObjEntrada($id_entrada);
								
		// Obtenemos el listado de las lineas de entrada según el id de entrada
		$this->ar_lineas_entrada = $this->acc_entradas->obtenerLineasEntradaXIdEntrada($id_entrada);
		
		// Obtenemos el objeto Conductor
		$id_transporte_conductor = $this->obj_entrada->getIdTransporteConductor();
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
		
		// Obtenemos la empresa de Transporte
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresa($this->obj_transporte_conductor->getIdTransporteEmpresa());
		
		// Obtenemos el informe en pdf de la entrada
		$obj_informe_entrada = $this->acc_informes->obtenerObjInformeEntrada($id_entrada);
		
		if($obj_informe_entrada)
		{
			$this->mostrar_informe_entrada = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
				
			$ruta_informe_entrada = $ruta_mostrar_informe."/entradas/".$obj_informe_entrada->getRutaAlbaran();
			
			$this->ruta_informe_entrada = $ruta_informe_entrada.".pdf";
		}	
		else
		{
			$this->mostrar_informe_entrada = false;
		}	
	}
	
}
