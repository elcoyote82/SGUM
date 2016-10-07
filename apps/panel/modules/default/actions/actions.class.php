<?php

/**
 * default actions.
 *
 * @package    SGUM
 * @subpackage default
 * @name       default.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class defaultActions extends sfActions
{
	/**
	 * Ejecuta la accion de mostrar el menu principal
	 */
	public function executeIndex()
	{
		// Obtenemos el menu segun sus permisos
		$menu = new GenerarMenus();		
		$this->menu_botones =$menu->generarMenuBotones();
		
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase Proveedores
		$this->acc_proveedores = new AccionesProveedores();
		
		// Obtenemos un objeto de la clase Clientes
		$this->acc_clientes = new AccionesClientes();
		
		// Obtenemos un objeto de la clase Articulos
		$this->acc_articulos = new AccionesArticulos();
		
		// Obtenemos un objeto de la clase Familias
		$this->acc_familias = new AccionesFamilias();
		
		// Obtenemos un objeto de la clase AccionesUbicaciones
		$this->acc_ubicaciones = new AccionesUbicaciones();
		
		// Creamos la busqueda de los Pedidos Pendientes
		$pedidos_pendientes = new Criteria();
		$pedidos_pendientes->add(PedidosPeer::ID_ESTADO_PEDIDO,5,Criteria::NOT_EQUAL);
		$pedidos_pendientes->addAscendingOrderByColumn(PedidosPeer::CREATED_AT);
		
		$pager_pedidos_pendientes = new sfPropelPager('Pedidos', 10);
		$pager_pedidos_pendientes->setCriteria($pedidos_pendientes);
		$pager_pedidos_pendientes->setPage($this->getRequestParameter('page_pedidos_pendientes', 1));
		$pager_pedidos_pendientes->init();
		
		$this->pager_pedidos_pendientes = $pager_pedidos_pendientes;
				
		// Creamos la busqueda de las Ventas Pendientes
		$ventas_pendientes = new Criteria();
		$ventas_pendientes->add(VentasPeer::ID_ESTADO_VENTA,5,Criteria::NOT_EQUAL);
		$ventas_pendientes->addAscendingOrderByColumn(VentasPeer::CREATED_AT);
		
		$pager_ventas_pendientes = new sfPropelPager('Ventas', 10);
		$pager_ventas_pendientes->setCriteria($ventas_pendientes);
		$pager_ventas_pendientes->setPage($this->getRequestParameter('page_ventas_pendientes', 1));
		$pager_ventas_pendientes->init();
		
		$this->pager_ventas_pendientes = $pager_ventas_pendientes;
		
		// Creamos la busqueda de los Articulos bajos en Stock
		$articulos_bajo_stock = new Criteria();
		$articulos_bajo_stock->add(ArticulosPeer::STOCK_BAJO,1);
		
		$pager_articulos_bajo_stock = new sfPropelPager('Articulos', 10);
		$pager_articulos_bajo_stock->setCriteria($articulos_bajo_stock);
		$pager_articulos_bajo_stock->setPage($this->getRequestParameter('page_articulos_bajo_stock', 1));
		$pager_articulos_bajo_stock->init();
		
		$this->pager_articulos_bajo_stock = $pager_articulos_bajo_stock;
	}
}