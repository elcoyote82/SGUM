<?php

/**
 * ventas actions.
 *
 * @package    SGUM
 * @subpackage ventas
 * @name       ventasActions.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class ventasActions extends sfActions
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();			
		
		// Obtenemos un select con todas las Familias
		$this->ar_familias = $this->acc_familias->obtenerSelectFamilias();
		
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase Ubicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Creamos la busqueda a BD
		$clientes = new Criteria();
				
		//Recogemos las palabras a buscar si existen		
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$clientes->add(ClientesPeer::ID_CLIENTE,$this->id_cliente);
		}

		// Llamamos al paginador		
		$pager = new sfPropelPager('Clientes', 30);
		$pager->setCriteria($clientes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de Agregar una Venta
	 */
	public function executeAgregarVenta()
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
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Cliente
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$id_md5_cliente = $this->getRequestParameter('id_md5_cliente');
		$id_md5_cliente = $this->acc_url->parsearRecepcion($id_md5_cliente);
		$this->id_cliente = $this->acc_clientes->obtenerIdClienteXIdMd5($id_md5_cliente);
		
		$id_md5_articulo = $this->getRequestParameter('id_md5_articulo');
		$id_md5_articulo = $this->acc_url->parsearRecepcion($id_md5_articulo);
		$this->id_articulo = $this->acc_articulos->obtenerIdArticuloXIdMd5($id_md5_articulo);
		
		$this->id_venta_temporal = $this->acc_ventas->guardarVenta($this->id_cliente,$this->id_articulo);
		
		// Obtenemos el objeto Venta
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta_temporal);
				
		// Obtenemos el objeto Cliente
		$this->obj_cliente = $this->acc_clientes->obtenerObjCliente($this->id_cliente);
		
		$cantidad = $this->getRequestParameter('cantidad');
		
		if($this->id_articulo)
		{
			$id_linea_venta = $this->acc_ventas->guardarLineaVenta($this->id_venta_temporal,$this->id_articulo,$cantidad);	
		}
		
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta_temporal);
	}
	
	/**
	 * Ejecuta la accion de Agregar un Articulo a un Venta
	 */
	public function executeAgregarArticuloVenta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();

		// Obtenemos el id de la venta para mantener la trazabilidad		
		$this->id_venta_temporal = $this->getRequestParameter('id_venta_temporal');
		
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');	
		
		// Agregamos el articulo a las lineas de venta
		if($this->id_articulo)
		{
			// Preguntamos si el articulo ya esta guardado para ese venta
			$obj_linea_venta = $this->acc_ventas->obtenerLineasVenta($this->id_venta_temporal,$this->id_articulo);

			if(!$obj_linea_venta)
			{
				$id_linea_venta = $this->acc_ventas->guardarLineaVenta($this->id_venta_temporal,$this->id_articulo,$cantidad);	
			}
			else 
			{
				$id_linea_venta = $obj_linea_venta->getIdArticuloXVenta();
				
				$cantidad_old = $obj_linea_venta->getCantidad();
				
				// Obtenemos el objeto Articulo
				$obj_articulo = $this->acc_articulos->obtenerObjArticulo($obj_linea_venta->getIdArticulo());
							
				$cantidad_stock = $obj_articulo->getStock();
				if($cantidad_old < $cantidad_stock)
				{
					$cantidad = $cantidad_old  + 1;	
				}
				else
				{
					$cantidad = $cantidad_old;
				}
				$linea_venta_update = $this->acc_ventas->actualizarLineaVenta($id_linea_venta,$cantidad);
			}				
		}
		
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta_temporal);
	}
		
	/**
	 * Ejecuta la accion de Subir la cantidad de un articulo en una venta
	 */
	public function executeSubirCantidadArticuloVenta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	

		// Obtenemos el id de la venta para mantener la trazabilidad		
		$this->id_venta_temporal = $this->getRequestParameter('id_venta_temporal');
			
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');
					
		// Obtenemos el id de la linea de venta a actualizar		
		$this->id_linea_venta = $this->getRequestParameter('id_linea_venta');	
		
		$obj_articulo_x_venta = $this->acc_ventas->obtenerObjArticulosXVenta($this->id_linea_venta);
		
		$id_venta = $obj_articulo_x_venta->getIdVenta();
		
		if($this->id_linea_venta)
		{
			$cantidad_old = $obj_articulo_x_venta->getCantidad();
			
			// Obtenemos el objeto Articulo
			$obj_articulo = $this->acc_articulos->obtenerObjArticulo($obj_articulo_x_venta->getIdArticulo());
						
			$cantidad_stock = $obj_articulo->getStock();
			if($cantidad_old < $cantidad_stock)
			{
				$cantidad = $cantidad_old  + 1;	
			}
			else
			{
				$cantidad = $cantidad_old;
			}			
			$linea_venta_update = $this->acc_ventas->actualizarLineaVenta($this->id_linea_venta,$cantidad);
		}
		
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($id_venta);		
	}
	
	/**
	 * Ejecuta la accion de bajar la cantidad de un articulo en una veta
	 */
	public function executeBajarCantidadArticuloVenta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	

		// Obtenemos el id de la venta para mantener la trazabilidad		
		$this->id_venta_temporal = $this->getRequestParameter('id_venta_temporal');
			
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');
					
		// Obtenemos el id de la linea de venta a actualizar		
		$this->id_linea_venta = $this->getRequestParameter('id_linea_venta');	
		
		$obj_articulo_x_venta = $this->acc_ventas->obtenerObjArticulosXVenta($this->id_linea_venta);
		
		$id_venta = $obj_articulo_x_venta->getIdVenta();
		
		if($this->id_linea_venta)
		{
			$cantidad_old = $obj_articulo_x_venta->getCantidad();
			if($cantidad_old == 1)
			{
				$cantidad = $cantidad_old;
			}
			else
			{
				$cantidad = $cantidad_old  - 1;
			}
			$linea_venta_update = $this->acc_ventas->actualizarLineaVenta($this->id_linea_venta,$cantidad);
		}
		
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($id_venta);		
	}
	
	/**
	 * Ejecuta la accion de Borrar un Articulo de una Venta
	 */
	public function executeBorrarArticuloVenta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	

		// Obtenemos el id de la venta para mantener la trazabilidad		
		$this->id_venta_temporal = $this->getRequestParameter('id_venta_temporal');
			
		// Obtenemos el id del articulo que vamos a a agregar
		$this->id_articulo = $this->getRequestParameter('id_articulo');
		
		// La cantidad esta vacia
		$cantidad = $this->getRequestParameter('cantidad');
					
		// Obtenemos el id de la linea de venta a actualizar		
		$this->id_linea_venta = $this->getRequestParameter('id_linea_venta');	
		
		$obj_articulo_x_venta = $this->acc_ventas->obtenerObjArticulosXVenta($this->id_linea_venta);
		
		$id_venta = $obj_articulo_x_venta->getIdVenta();
		
		if($this->id_linea_venta)
		{
			$linea_venta_delete = $this->acc_ventas->borrarLineaVenta($this->id_linea_venta);	
		}
		
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($id_venta);		
	}
		
	/**
	* Ejecuta la acción de Autocompletar el nombre de los Articulos en la busqueda de una venta
	*/
	public function executeBuscarArticuloVenta() 
	{			
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$this->nombre_articulo = $this->getRequestParameter('nombre_articulo');
		$this->cliente = $this->getRequestParameter('id_cliente');
		
		// Objeto para los articulos
		$articulos = new Criteria();
		//$articulos->add(ArticulosPeer::STOCK_BAJO,0);
		$articulos->addAscendingOrderByColumn(ArticulosXLotePeer::CREATED_AT);	
		$articulos->addGroupByColumn(ArticulosXLotePeer::ID_ARTICULO);		
		$this->ar_articulos = ArticulosXLotePeer::doSelect($articulos);
	}
	
	/**
	 * Ejecuta la accion de confirmar los datos de la venta
	 */
	public function executeConfirmarVenta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos el id de la venta para confirmar y generar el albaran de salida
		$this->id_venta_temporal = $this->getRequestParameter('id_venta_temporal');
		if(!isset($this->id_venta_temporal))
		{
			$id_md5_venta = $this->getRequestParameter('id_md5_venta');	
			$this->id_venta_temporal = $this->acc_ventas->obtenerIdVentaXIdMd5($id_md5_venta);
		}
		
		// Obtenemos el objeto Venta Temporal
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta_temporal);
								
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta_temporal);
		
		// Obtenemos el id del cliente
		$id_cliente = $this->obj_venta->getIdCliente();
		
		// Obtenemos el objeto cliente
		$this->obj_cliente = $this->acc_clientes->obtenerObjCliente($id_cliente);
	}
	
	/**
	 * Ejecuta la accion de generar el Informe sobre los datos de la venta
	 */
	public function executeGenerarVenta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos el id de la venta para obtener los datos de la venta
		$id_md5_venta = $this->getRequestParameter('id_md5_venta');	
		$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($id_md5_venta);
		
		// Generamos el informe de venta
		$venta_generado = $this->acc_ventas->generarInformeVenta($this->id_venta);
		
		if ($venta_generado)
		{
			// Pasamos el estado de la venta de Borrador a En proceso...
			$actualizar_estado = $this->acc_ventas->actualizarEstadoVenta($this->id_venta,2);
			
			if($actualizar_estado)
			{
				$this->msg = "La venta se ha generado correctamente.";	
			}
			else
			{
				$this->msg = "No se ha podido cambiar el estado de la venta, consulte con el administrador.";
			}				
		}
		else
		{
			$this->msg = "No se ha podido generar la venta.";
		}
	}
	
	/**
	 * Ejecuta la accion de Editar una Venta
	 */
	public function executeEditarVenta()
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
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$id_md5_venta = $this->getRequestParameter('id_md5_venta');
		$this->id_venta_temporal = $this->acc_ventas->obtenerIdVentaXIdMd5($id_md5_venta);
		
		// Obtenemos el objeto Venta
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta_temporal);
				
		// Obtenemos el id del cliente
		$this->id_cliente = $this->obj_venta->getIdCliente();
		
		$cantidad = $this->getRequestParameter('cantidad');
		
		if($this->id_articulo)
		{
			$id_linea_venta = $this->acc_ventas->guardarLineaVenta($this->id_venta_temporal,$this->id_articulo,$cantidad);	
		}
		
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta_temporal);
	}
	
	/**
	 * Ejecuta la accion de Borrar una Venta Temporal
	 */
	public function executeBorrarVenta()
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
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$id_md5_venta = $this->getRequestParameter('id_md5_venta');
		$this->id_venta_temporal = $this->acc_ventas->obtenerIdVentaXIdMd5($id_md5_venta);
		
		// Comprobamos si la venta es temporal
		$usado = $this->acc_ventas->comprobarVenta($this->id_venta_temporal );
		
		// Si está usado
		if(!$usado)
		{
			$this->msg = "La venta no es un borrador, no puede ser borrada.";
		}
		else
		{			
			// Borramos la Venta que hemos escogido
			$this->acc_ventas->borrarVenta($this->id_venta_temporal);		
			
			// Comprobamos que lo hemos borrado	
			$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta_temporal);
			      	  	
			if ($this->obj_venta)
			{
				$this->msg = "No se ha podido borrar la venta.";		
			}
			else
			{
				$this->msg = "La venta se ha borrado correctamente.";
			}
		}
	}	
	
	/**
	 * Ejecuta la accion de mostrar todos las ventas generadas en la aplicación
	 */
	public function executeAdministrarVentas()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un select con todos los Estados de los Ventas Pendientes
		$this->ar_estado_ventas_pendientes = $this->acc_admin->obtenerSelectEstadoVentas();	
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Ventas Pendientes
		$ventas = new Criteria();
		
		$id_estado_venta = $this->getRequestParameter('id_estado_venta');
		$id_estado_venta = $this->acc_url->parsearRecepcion($id_estado_venta);
		$this->id_estado_venta = $id_estado_venta;
		if ($this->id_estado_venta != 0)
		{
			$ventas->add(VentasPeer::ID_ESTADO_VENTA,$this->id_estado_venta);
		}
		
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$ventas->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
		}	
		
		$num_venta = $this->getRequestParameter('num_venta');
		$num_venta = $this->acc_url->parsearRecepcion($num_venta);
		$this->num_venta = $num_venta;
		
		$fecha_venta = $this->getRequestParameter('fecha_venta');
		$fecha_venta = $this->acc_url->parsearRecepcion($fecha_venta);
		$this->fecha_venta = $fecha_venta;
		
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
			$crit0 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$ventas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$ventas->add(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$ventas->add(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$ventas = $this->acc_utilidades->ordenarObjetoXColumna($ventas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$ventas = $this->acc_utilidades->ordenarObjetoXColumna($ventas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Ventas', 15);
		$pager->setCriteria($ventas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de mostrar los ventas pendientes
	 */
	public function executeVentasPendientes()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Ventas Pendientes
		$ventas_pendientes = new Criteria();
		$ventas_pendientes->add(VentasPeer::ID_ESTADO_VENTA,1);
				
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$ventas_pendientes->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
		}
		
		$id_estado_venta = $this->getRequestParameter('id_estado_venta');
		$id_estado_venta = $this->acc_url->parsearRecepcion($id_estado_venta);
		$this->id_estado_venta = $id_estado_venta;		
		
		$num_venta = $this->getRequestParameter('num_venta');
		$num_venta = $this->acc_url->parsearRecepcion($num_venta);
		$this->num_venta = $num_venta;
		
		$fecha_venta = $this->getRequestParameter('fecha_venta');
		$fecha_venta = $this->acc_url->parsearRecepcion($fecha_venta);
		$this->fecha_venta = $fecha_venta;
		
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
			$crit0 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$ventas_pendientes->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$ventas_pendientes->add(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$ventas_pendientes->add(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$ventas_pendientes = $this->acc_utilidades->ordenarObjetoXColumna($ventas_pendientes,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$ventas_pendientes = $this->acc_utilidades->ordenarObjetoXColumna($ventas_pendientes,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Ventas', 15);
		$pager->setCriteria($ventas_pendientes);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de mostrar los ventas en proceso
	 */
	public function executeVentasEnProceso()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Ventas En Proceso
		$ventas_en_proceso = new Criteria();
		$ventas_en_proceso->add(VentasPeer::ID_ESTADO_VENTA,2);
				
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$ventas_en_proceso->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
		}
		
		$id_estado_venta = $this->getRequestParameter('id_estado_venta');
		$id_estado_venta = $this->acc_url->parsearRecepcion($id_estado_venta);
		$this->id_estado_venta = $id_estado_venta;		
		
		$num_venta = $this->getRequestParameter('num_venta');
		$num_venta = $this->acc_url->parsearRecepcion($num_venta);
		$this->num_venta = $num_venta;
		
		$fecha_venta = $this->getRequestParameter('fecha_venta');
		$fecha_venta = $this->acc_url->parsearRecepcion($fecha_venta);
		$this->fecha_venta = $fecha_venta;
		
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
			$crit0 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$ventas_en_proceso->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$ventas_en_proceso->add(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$ventas_en_proceso->add(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$ventas_en_proceso = $this->acc_utilidades->ordenarObjetoXColumna($ventas_en_proceso,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$ventas_en_proceso = $this->acc_utilidades->ordenarObjetoXColumna($ventas_en_proceso,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Ventas', 15);
		$pager->setCriteria($ventas_en_proceso);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de mostrar los ventas enviadas
	 */
	public function executeVentasEnviadas()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Ventas Pendientes
		$ventas_enviadas = new Criteria();
		$ventas_enviadas->add(VentasPeer::ID_ESTADO_VENTA,3);
				
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$ventas_enviadas->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
		}
		
		$id_estado_venta = $this->getRequestParameter('id_estado_venta');
		$id_estado_venta = $this->acc_url->parsearRecepcion($id_estado_venta);
		$this->id_estado_venta = $id_estado_venta;		
		
		$num_venta = $this->getRequestParameter('num_venta');
		$num_venta = $this->acc_url->parsearRecepcion($num_venta);
		$this->num_venta = $num_venta;
		
		$fecha_venta = $this->getRequestParameter('fecha_venta');
		$fecha_venta = $this->acc_url->parsearRecepcion($fecha_venta);
		$this->fecha_venta = $fecha_venta;
		
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
			$crit0 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$ventas_enviadas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$ventas_enviadas->add(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$ventas_enviadas->add(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$ventas_enviadas = $this->acc_utilidades->ordenarObjetoXColumna($ventas_enviadas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$ventas_enviadas = $this->acc_utilidades->ordenarObjetoXColumna($ventas_enviadas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Ventas', 15);
		$pager->setCriteria($ventas_enviadas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de listar las ventas procesadas en el almacén
	 */
	public function executeVentasProcesadas()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Ventas Procesadas
		$ventas_procesadas = new Criteria();
		$ventas_procesadas->add(VentasPeer::ID_ESTADO_VENTA,5);
				
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$ventas_procesadas->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
		}
		
		$id_estado_venta = $this->getRequestParameter('id_estado_venta');
		$id_estado_venta = $this->acc_url->parsearRecepcion($id_estado_venta);
		$this->id_estado_venta = $id_estado_venta;		
		
		$num_venta = $this->getRequestParameter('num_venta');
		$num_venta = $this->acc_url->parsearRecepcion($num_venta);
		$this->num_venta = $num_venta;
		
		$fecha_venta = $this->getRequestParameter('fecha_venta');
		$fecha_venta = $this->acc_url->parsearRecepcion($fecha_venta);
		$this->fecha_venta = $fecha_venta;
		
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
			$crit0 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$ventas_procesadas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$ventas_procesadas->add(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$ventas_procesadas->add(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$ventas_procesadas = $this->acc_utilidades->ordenarObjetoXColumna($ventas_procesadas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$ventas_procesadas = $this->acc_utilidades->ordenarObjetoXColumna($ventas_procesadas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Ventas', 15);
		$pager->setCriteria($ventas_procesadas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;		
	}
	
	/**
	 * Ejecuta la accion de listar los ventas completas y entregadas al cliente
	 */
	public function executeVentasCompletas()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
		
		// Obtenemos un objeto de la clase Ventas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase Utilidades
		$this->acc_utilidades = new Utilidades();
		
		// Creamos la busqueda de los Ventas Completos
		$ventas_completas = new Criteria();
		$ventas_completas->add(VentasPeer::ID_ESTADO_VENTA,4);
				
		$id_cliente = $this->getRequestParameter('id_cliente');
		$id_cliente = $this->acc_url->parsearRecepcion($id_cliente);
		$this->id_cliente = $id_cliente;
		if ($this->id_cliente != 0)
		{
			$ventas_completas->add(VentasPeer::ID_CLIENTE,$this->id_cliente);
		}
		
		$id_estado_venta = $this->getRequestParameter('id_estado_venta');
		$id_estado_venta = $this->acc_url->parsearRecepcion($id_estado_venta);
		$this->id_estado_venta = $id_estado_venta;		
		
		$num_venta = $this->getRequestParameter('num_venta');
		$num_venta = $this->acc_url->parsearRecepcion($num_venta);
		$this->num_venta = $num_venta;
		
		$fecha_venta = $this->getRequestParameter('fecha_venta');
		$fecha_venta = $this->acc_url->parsearRecepcion($fecha_venta);
		$this->fecha_venta = $fecha_venta;
		
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
			$crit0 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
			$crit1 = $c->getNewCriterion(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
			$crit0->addAnd($crit1);
			$ventas_completas->add($crit0);
		}
		else
		{
			if ($this->desde != '')
		{
			$ventas_completas->add(VentasPeer::CREATED_AT,$this->fecha_ini_inv,Criteria::GREATER_EQUAL);
		}
		if ($this->hasta != '')
			{
				$ventas_completas->add(VentasPeer::CREATED_AT,$this->fecha_fin_inv,Criteria::LESS_EQUAL);
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
				$ventas_completas = $this->acc_utilidades->ordenarObjetoXColumna($ventas_completas,$this->sort."_".$this->type);
			break;
			
			case 'desc':
				$ventas_completas = $this->acc_utilidades->ordenarObjetoXColumna($ventas_completas,$this->sort."_".$this->type);
			break;
			
			default:
			break;
		}	
		
		// Llamamos al paginador		
		$pager = new sfPropelPager('Ventas', 15);
		$pager->setCriteria($ventas_completas);			
		$pager->setPage($this->getRequestParameter('page', 1));
		$pager->init();
		$this->pager = $pager;	
	}
	
	/**
	 * Ejecuta la accion de ver la ficha con los datos de la venta
	 */
	public function executeVerVenta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();	
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
				
		// Obtenemos el id de la venta
		$id_md5_venta = $this->getRequestParameter('id_md5_venta');	
		$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($id_md5_venta);
				
		// Obtenemos el objeto Venta Temporal
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);
								
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta);
		
		// Obtenemos el id del cliente
		$id_cliente = $this->obj_venta->getIdCliente();
		
		// Obtenemos el objeto cliente
		$this->obj_cliente = $this->acc_clientes->obtenerObjCliente($id_cliente);
		
		// Obtenemos el informe en pdf de la venta
		$obj_informe_venta = $this->acc_informes->obtenerObjInformeVenta($this->id_venta);
		
		$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
				
		$ruta_informe_venta = $ruta_mostrar_informe."/ventas/".$obj_informe_venta->getRutaAlbaran();
		
		$this->ruta_informe_venta = $ruta_informe_venta.".pdf";
	}
	
	/**
	 * Ejecuta la accion de descargar los informes de venta
	 */
	public function executeDescargarInformeVenta()
	{		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
   		// Obtenemos el id de la venta
		$id_md5_venta = $this->getRequestParameter('id_md5_venta');	
		$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($id_md5_venta);
				
		// Obtenemos el objeto Venta
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);
		
		// Obtenemos el informe en pdf de la venta
		$obj_informe_venta = $this->acc_informes->obtenerObjInformeVenta($this->id_venta);
		
		$ruta_mostrar_informe = sfConfig::get('app_informes_ventas');
		
		$this->ruta_informe_venta = $ruta_mostrar_informe.$obj_informe_venta->getRutaAlbaran().".pdf";		
		
		$acc_descarga = new AccionesDescarga();
		
		// Descargamos el Archivo		
		$descargado = $acc_descarga->descargarArchivoServidor($this->ruta_informe_venta);   
		if (!$descargado)
		{
			if ($id_md5_venta != '')
			{
				$this->redirect('/ventas/verVenta?id_md5_venta='.$id_md5_venta);
			}
			else
			{
				$this->redirect('/ventas/index');
			}
		}	
   }
	
	/**
	 * Ejecuta la accion de actualizar el estado de la venta
	 */
	public function executeConfirmarVentaEnviada()
	{	
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
			
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un select con todas las Empresas de Transporte
		$this->ar_transporte_conductores = $this->acc_transporte->obtenerSelectTransporteConductores4();
		
   		// Obtenemos el id de la venta
		$this->id_md5_venta = $this->getRequestParameter('id_md5_venta');	
		$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($this->id_md5_venta);
		
		// Obtenemos el objeto Venta
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);	
			
		// Obtenemos el conductor
		$id_transporte_conductor = $this->getRequestParameter('id_transporte_conductor');	
				
		if($id_transporte_conductor != '')
		{
			// Actualizamos el estado de la venta(de en proceso a enviada)
			$estado_venta_actualizado = $this->acc_ventas->actualizarEstadoVenta($this->id_venta, 3);	
							
			if($estado_venta_actualizado)
			{							
				// Generamos la salida
				$salida_salvada = $this->acc_salidas->guardarSalida($this->id_venta,$id_transporte_conductor);
				
				if($salida_salvada)
				{
					$this->msg = "La venta ha sido enviada al almacén.";	
				}				
			}
			else
			{
				$this->msg = "No se ha podido actualizar el estado de la venta a 'Enviada'.";
			}	
		}
	}
	
	/**
	 * Validacíon de confirmar Venta Articulo
	 */
	public function handleErrorConfirmarVentaEnviada()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase AccionesUrl
		$this->acc_url = new AccionesUrl();
			
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();
		
		// Obtenemos un objeto de la clase Transporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un select con todas las Empresas de Transporte
		$this->ar_transporte_conductores = $this->acc_transporte->obtenerSelectTransporteConductores4();
		
   		// Obtenemos el id de la venta
		$this->id_md5_venta = $this->getRequestParameter('id_md5_venta');	
		$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($this->id_md5_venta);
		
		// Obtenemos el objeto Venta
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);	
			
		// Obtenemos el conductor
		$id_transporte_conductor = $this->getRequestParameter('id_transporte_conductor');
		
		return sfView::SUCCESS;		
	}
	
	
	/**
	 * Ejecuta la accion de comprobar la venta completo
	 */
	public function executeComprobarVentaCompleta()
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
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un objeto de la clase AccionesArticulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		$this->id_md5_venta = $this->getRequestParameter('id_md5_venta');
		$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($this->id_md5_venta);
		
		// Obtenemos el objeto Venta
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);
				
		// Obtenemos el id del cliente
		$this->id_cliente = $this->obj_venta->getIdCliente();
				
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta);
		
		// Obtenemos el objeto Cliente
		$this->obj_cliente = $this->acc_clientes->obtenerObjCliente($this->id_cliente); 
		
		$this->ar_lineas_venta_completo = $this->getRequestParameter('id_linea_venta');
		
		if($this->ar_lineas_venta_completo)
		{
			// Contador de Lineas de Venta
			$this->contador_lineas_venta = count($this->ar_lineas_venta);
			
			// Contador de lineas de Venta Completas
			$this->contador_lineas_venta_completas = count($this->ar_lineas_venta_completo);
			
			if($this->contador_lineas_venta == $this->contador_lineas_venta_completas)
			{
				// Actualizamos el estado de la venta a completo
				$estado_venta_actualizado = $this->acc_ventas->actualizarEstadoVenta($this->id_venta, 4);

				// Obtenemos el id de salida a partir del id de venta
				$id_salida = $this->acc_salidas->obtenerIdSalidaXIdVenta($this->id_venta);
				
				// Generamos las lineas de salidas según las lineas de venta
				// 1 articulo -> 16 bultos => 16 lineas de salida de ese artículos
				foreach($this->ar_lineas_venta as $linea_venta)
				{
					// Obtenemos la cantidad de articulos
					$cantidad_articulo = $linea_venta->getCantidad();
					$id_articulo = $linea_venta->getIdArticulo();
					
					// Buscamos según el id del articulo, un número de objetos ArticulosXLote, determinado 
					// por la cantidad vendidad
					$ar_articulos_x_lote = $this->acc_articulos->obtenerObjArticulosXLote($id_articulo, $cantidad_articulo);
					
					foreach($ar_articulos_x_lote as $articulo_lote)
					{
						$lote = $articulo_lote->getLote();
						$ubicacion = $articulo_lote->getIdUbicacion();
						$this->acc_salidas->guardarLineaSalida2($id_salida, $id_articulo, $lote, $ubicacion);
					}
					/*
					$i = 0;
					while ($i < $cantidad_articulo) 
					{
						// Guardamos las lineas de salida
						$this->acc_salidas->guardarLineaSalida($id_salida, $id_articulo);
						$i++;
					}*/
				}			
				$this->msg = "La venta está completa a la espera de procesarlo y quitar las mercancías.";
			}
			else
			{
				$this->msg = "La venta está incompleta, se mantendrá en Ventas Enviadas hasta recibir todas las mercancías.";
			}
		}
	}	

	/**
	 * Ejecuta la accion de ver la ficha completa con los datos de la venta, conductor y salida
	 */
	public function executeVerVentaCompleta()
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
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase AccionesVentas
		$this->acc_ventas = new AccionesVentas();
		
		// Obtenemos un select con todos los Clientes
		$this->ar_clientes = $this->acc_clientes->obtenerSelectClientes();	
				
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();	
		
		// Obtenemos un objeto de la clase AccionesFamilias
		$this->acc_familias = new AccionesFamilias();	
		
		// Obtenemos un objeto de la clase AccionesInformes
		$this->acc_informes = new AccionesInformes();	
		
		// Obtenemos un objeto de la clase AccionesSalidas
		$this->acc_salidas = new AccionesSalidas();	
		
		// Obtenemos un objeto de la clase AccionesTransporte
		$this->acc_transporte = new AccionesTransporte();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();		
				
		// Obtenemos el id de la venta
		$id_md5_venta = $this->getRequestParameter('id_md5_venta');	
		$this->id_venta = $this->acc_ventas->obtenerIdVentaXIdMd5($id_md5_venta);
				
		// Obtenemos el objeto Venta Temporal
		$this->obj_venta = $this->acc_ventas->obtenerObjVenta($this->id_venta);
								
		// Obtenemos el listado de las lineas de venta según el id de venta
		$this->ar_lineas_venta = $this->acc_ventas->obtenerLineasVentaXIdVenta($this->id_venta);
		
		// Obtenemos el id del cliente
		$id_cliente = $this->obj_venta->getIdCliente();
		
		// Obtenemos el objeto cliente
		$this->obj_cliente = $this->acc_clientes->obtenerObjCliente($id_cliente);
		
		// Obtenemos el informe en pdf de la venta
		$obj_informe_venta = $this->acc_informes->obtenerObjInformeVenta($this->id_venta);
		
		if($obj_informe_venta)
		{
			$this->mostrar_informe_venta = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
					
			$ruta_informe_venta = $ruta_mostrar_informe."/ventas/".$obj_informe_venta->getRutaAlbaran();
			
			$this->ruta_informe_venta = $ruta_informe_venta.".pdf";
		}
		else
		{
			$this->mostrar_informe_venta = false;
		}
		
		// Obtenemos el objeto salida
		$id_salida = $this->acc_salidas->obtenerIdSalidaXIdVenta($this->id_venta);
		$this->obj_salida = $this->acc_salidas->obtenerObjSalida($id_salida);
								
		// Obtenemos el listado de las lineas de salida según el id de salida
		$this->ar_lineas_salida = $this->acc_salidas->obtenerLineasSalidaXIdSalida($id_salida);
		
		// Obtenemos el objeto Conductor
		$id_transporte_conductor = $this->obj_salida->getIdTransporteConductor();
		$this->obj_transporte_conductor = $this->acc_transporte->obtenerObjTransporteConductor($id_transporte_conductor);
		
		// Obtenemos la empresa de Transporte
		$this->obj_transporte_empresa = $this->acc_transporte->obtenerObjTransporteEmpresa($this->obj_transporte_conductor->getIdTransporteEmpresa());
		
		// Obtenemos el informe en pdf de la salida
		$obj_informe_salida = $this->acc_informes->obtenerObjInformeSalida($id_salida);
		
		if($obj_informe_salida)
		{
			$this->mostrar_informe_salida = true;
			
			$ruta_mostrar_informe = sfConfig::get('app_ruta_mostrar_informe');
				
			$ruta_informe_salida = $ruta_mostrar_informe."/salidas/".$obj_informe_salida->getRutaAlbaran();
			
			$this->ruta_informe_salida = $ruta_informe_salida.".pdf";
		}	
		else
		{
			$this->mostrar_informe_salida = false;
		}	
	}
}
