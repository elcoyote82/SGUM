<?php

/**
 * Clase para gestionar todo lo relacionado con los pedidos
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesPedidos.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesPedidos
{
	/**
	 * Constructor de la clase AccionesPedidos
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un pedido
	 * 
	 * @param integer $id_proveedor  Id del proveedor
	 * @param integer $id_articulo   Id del articulo (opcional)
	 */
	public function guardarPedido($id_proveedor,$id_articulo)
	{		
		// Obtenemos el id del usuario
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Creamos un nuevo objeto Pedido
		$pedido = new Pedidos();
		$pedido->setIdProveedor($id_proveedor);				
		$pedido->setIdUsuario($id_usuario);
		$pedido->setIdEstadoPedido(1);
		
		// Guardamos el pedido en la BD
		$pedido_salvado = $pedido->save();
		
		// Obtenemos el id del ultimo pedido insertado
		$id_pedido_save = $pedido->getIdPedido();
		
		if ($pedido_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del proveedor que acabamos de guardar
			$key_pedido = sfConfig::get('app_private_key_pedidos');
									
			// Creamos un nuevo objeto Pedido
			$pedido_act = new Pedidos();
			$pedido_act->setIdPedido($id_pedido_save);
			
			// Generamos el id_md5 del Proveedor
			$id_md5_pedido = hash_hmac('md5',$id_pedido_save,$key_pedido);
			$pedido_act->setIdMd5Pedido($id_md5_pedido);
			
			// Guardamos el número de pedido
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(1);
			//$num__pedido = "AAA".$id_pedido_save;
			$num_pedido = $valor_num_albaran.$id_pedido_save;
			$pedido_act->setNumPedido($num_pedido);
			
			// Actualizamos el objeto Proveedor
			$proveedor_update = PedidosPeer::doUpdate($pedido_act);
			
			if($proveedor_update !== false)
			{
				return $id_pedido_save;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizar el estado del pedido según el valor pasado como parámetro
	 * 
	 * @param integer $id_pedido 			Id del Pedido
	 * @param integer $id_estado_pedido		Id del estado_pedido 
	 * 										(1-Borrador,2-EnProceso,3-Recibido,4-Completo,5-Procesado)
	 */
	public function actualizarEstadoPedido($id_pedido,$id_estado_pedido)
	{	
		// Creamos un nuevo objeto Pedido
		$pedido = new Pedidos();
		$pedido->setIdPedido($id_pedido);
		$pedido->setIdEstadoPedido($id_estado_pedido);
				
	 	// Actualizamos el Pedido en la BD
	 	$pedido_update = PedidosPeer::doUpdate($pedido);
	 	
	 	if($pedido_update !== false)
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}
	
	/**
	 * Guardar una linea de  pedido
	 * 
	 * @param integer $id_pedido Id del Pedido
	 * @param integer $id_articulo   Id del articulo
	 */
	public function guardarLineaPedido($id_pedido,$id_articulo,$cantidad)
	{		
		// Obtenemos el id del usuario
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Obtenemos el objeto articulo
		$acc_articulos = new AccionesArticulos();
		$obj_articulo = $acc_articulos->obtenerObjArticulo($id_articulo);
		$stock_minimo = $obj_articulo->getStockMinimo();
		if($stock_minimo)
		{
			$cantidad = $stock_minimo;
		}
		else
		{
			$cantidad = 1;
		}		
		
		// Creamos un nuevo objeto Pedido
		$linea_pedido = new ArticulosXPedido();
		$linea_pedido->setIdPedido($id_pedido);				
		$linea_pedido->setIdArticulo($id_articulo);
		$linea_pedido->setCantidad($cantidad);
				
		// Guardamos la linea del pedido en la BD
		$linea_pedido_salvado = $linea_pedido->save();
		
		// Obtenemos el id del ultimo proveedor insertado
		$id_linea_pedido_save = $linea_pedido->getIdPedido();
		
		if ($id_linea_pedido_save)
		{
			return $id_linea_pedido_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizar un pedido
	 * 
	 * @param integer $id_pedido Id del Pedido
	 * @param integer $id_articulo   Id del articulo
	 */
	public function actualizarLineaPedido($id_articulo_x_pedido,$cantidad)
	{	
		// Creamos un nuevo objeto Pedido
		$linea_pedido = new ArticulosXPedido();
		$linea_pedido->setIdArticuloXPedido($id_articulo_x_pedido);
		$linea_pedido->setCantidad($cantidad);
				
	 	// Actualizamos el Articulo en la BD
	 	$linea_pedido_update = ArticulosXPedidoPeer::doUpdate($linea_pedido);
	 	
	 	return $linea_pedido_update;
	}
	
	/**
	 * Borrar una linea de pedido
	 * 
	 * @param integer $id_linea_pedido Id de la Linea de Pedido
	 */
	public function borrarLineaPedido($id_linea_pedido)
	{				
	 	// Borramos el articulo de la tabla Articulo
	 	ArticulosXPedidoPeer::doDelete($id_linea_pedido);
		
	 	$obj_articulo_x_pedido = ArticulosXPedidoPeer::retrieveByPk($id_linea_pedido);
		
		// Si está definido el objeto Articulo
		if(isset($obj_articulo_x_pedido))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/**
	 * Borrar un pedido de la tabla Pedidos
	 * 
	 * @param integer $id_pedido Id del pedido a borrar
	 */
	 public function borrarPedido($id_pedido)
	 {
	 	// Borramos el pedido de la tabla Pedidos
	 	PedidosPeer::doDelete($id_pedido);
	 }
	
	/**
	 * Obtener las lineas de un pedido a través del Id de Pedido
	 * 
	 * @param integer $id_pedido Id del Pedido
	 * 
	 * @return array $ar_lineas_pedido Array con todas las lineas de pedido para ese id de pedido
	 */
	public function obtenerLineasPedidoXIdPedido($id_pedido_temporal)
	{
		// Obtenemos las lineas según el id de pedido
		$lineas_pedido = new Criteria();
		$lineas_pedido->add(ArticulosXPedidoPeer::ID_PEDIDO,$id_pedido_temporal);
		$ar_lineas_pedido = ArticulosXPedidoPeer::doSelect($lineas_pedido);
		
		// Si no se encuentra ningún linea pedido
		if(empty($ar_lineas_pedido))
		{
			return false;
		}
		else
		{			
			return $ar_lineas_pedido;			
		}
	}
	
	/**
	 * Obtener el objeto Pedido a partir del id de pedido
	 * 
	 * @param integer $id_pedido Id del pedido
	 * 
	 * @return objeto | false $obj_pedido    Objeto Pedido buscado por el id del pedido, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjPedido($id_pedido)
	{
		// Obtenemos el objeto pedido de Pedido
		$obj_pedido = PedidosPeer::retrieveByPk($id_pedido);
		
		// Si está definido el objeto Pedido
		if(isset($obj_pedido))
		{
			return $obj_pedido;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del pedido a partir del Id Md5
	 * 
	 * @param  string  $id_md5_pedido   Id Md5 del pedido
	 * 
	 * @return integer $id_pedido Id del proveedor
	 */
	public function obtenerIdPedidoXIdMd5($id_md5_pedido)
	{
		// Obtenemos el objeto Pedidos que tenga ese $id_md5
		$pedidos = new Criteria();
		$pedidos->add(PedidosPeer::ID_MD5_PEDIDO,$id_md5_pedido);
		$pedidos1 = PedidosPeer::doSelect($pedidos);
		
		// Si no se encuentra ningún objeto Pedido
		if(empty($pedidos1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del pedido a partir del objeto Pedido
			$id_pedido = $pedidos1[0]->getIdPedido();
			
			return $id_pedido;			
		}
	}
	
	/**
	 * Obtener el Objeto pedido a partir del Id Md5 del Albaran
	 * 
	 * @param  string  $id_md5_albaran   Id Md5 del albaran
	 * 
	 * @return integer $obj_pedido Objeto pedido
	 */
	public function obtenerObjPedidoXIdMd5Albaran($id_md5_albaran)
	{
		// Buscamos el objeto AlbaranesPedido que tenga ese $id_md5_albaran
		$albaran_pedido = new Criteria();
		$albaran_pedido->add(AlbaranesPedidoPeer::ID_MD5_ALBARAN,$id_md5_albaran);
		$albaran_pedido1 = AlbaranesPedidoPeer::doSelect($albaran_pedido);
		
		// Si no se encuentra ningún objeto AlbaranesPedido
		if(empty($albaran_pedido1))
		{
			return false;
		}
		else
		{
			// Obtenemos el objeto pedido
			$id_pedido = $albaran_pedido1[0]->getIdPedido();
			$obj_pedido = $this->obtenerObjPedido($id_pedido);
			
			return $obj_pedido;			
		}
	}
	
	/**
	 * Obtener el objeto Articulo_X_Pedido a partir del Id del Articulo_X_Pedido
	 * 
	 * @param integer $id_articulo_x_pedido Id del Articulo_X_Pedido
	 * 
	 * @return objeto | false $obj_articulo_x_pedido    Objeto Articulo_X_Pedido buscado por el id del Articulo_X_Pedido, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjArticulosXPedido($id_articulo_x_pedido)
	{
		// Obtenemos el objeto Articulo_X_Pedido a partir del Id del Articulo_X_Pedido
		$obj_articulo_x_pedido = ArticulosXPedidoPeer::retrieveByPk($id_articulo_x_pedido);
		
		// Si está definido el objeto Articulo_X_Pedido
		if(isset($obj_articulo_x_pedido))
		{
			return $obj_articulo_x_pedido;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener las lineas de un pedido a través del Id de Pedido
	 * 
	 * @param integer $id_pedido Id del Pedido
	 * * @param integer $id_articulo Id del Articulo
	 * 
	 * @return array $obj_linea_pedido Objeto de esa linea de pedido
	 */
	public function obtenerLineasPedido($id_pedido,$id_articulo)
	{
		// Obtenemos las lineas según el id de pedido
		$lineas_pedido = new Criteria();
		$lineas_pedido->add(ArticulosXPedidoPeer::ID_PEDIDO,$id_pedido);
		$lineas_pedido->add(ArticulosXPedidoPeer::ID_ARTICULO,$id_articulo);
		$lineas_pedido = ArticulosXPedidoPeer::doSelect($lineas_pedido);
		
		// Si no se encuentra ningún linea pedido
		if(empty($lineas_pedido))
		{
			return false;
		}
		else
		{			
			$obj_linea_pedido = $lineas_pedido[0];
			return $obj_linea_pedido;			
		}
	}
	
	/**
	 * Obtener los últimos 10 pedidos del proveedor para la ficha de Proveedores
	 * 
	 * @param integer $id_proveedor Id del Proveedor
	 * 
	 * @return array ar_pedidos Array con los pedidos del proveedor
	 */
	public function obtenerPedidosXIdProveedor($id_proveedor)
	{
		// Obtenemos los pedidos según el id de proveedor ordenados por ultima fecha de creacion y limitados 10
		$pedidos = new Criteria();
		$pedidos->add(PedidosPeer::ID_PROVEEDOR,$id_proveedor);
		$pedidos->addDescendingOrderByColumn(PedidosPeer::CREATED_AT);
		$pedidos->setLimit(10);
		$ar_pedidos = PedidosPeer::doSelect($pedidos);
		
		// Si no se encuentra ningún pedido
		if(empty($ar_pedidos))
		{
			return false;
		}
		else
		{
			return $ar_pedidos;			
		}
	}
	
	
	/**
	 * Comprobar si un pedido es un borrador
	 * 
	 * @param integer $id_pedido Id del Pedido
	 * 
	 * @return boolean TRUE si es un borrador, FALSE en caso contrario
	 */
	public function comprobarPedido($id_pedido)
	{
		// Buscamos si el pedido es borrador en la tabla Pedidos
		$pedidos = new Criteria();
		$pedidos->add(PedidosPeer::ID_PEDIDO,$id_pedido);	
		$pedidos->add(PedidosPeer::ID_ESTADO_PEDIDO,1);		
		$pedidos1 = PedidosPeer::doSelect($pedidos);
		
		// Si el pedido está vacio
		if(!empty($pedidos1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
  
 	/**
	 * Generamos el informe del pedido
	 * 
	 * @param integer $id_pedido Id del pedido
 	 */
	public function generarInformePedido($id_pedido)
	{								
		// Obtenemos el listado de las lineas de pedido según el id de pedido
		$ar_lineas_pedido = $this->obtenerLineasPedidoXIdPedido($id_pedido);
			  	  	
	  	// Generamos el pdf
	  	$accion_informe = new AccionesInformes();
	  	
	  	// Guardamos los datos en la variable datos de la clase AccionesInformes
		$accion_informe->generarDatos($ar_lineas_pedido);
		
		// Cabecera de la tabla del pdf		
		$header = array('Nombre','CIF/NIF', 'Dirección', 'Población', 'Provincia', 'CP','País', 'Teléfono', 'Móvil', 'Fax', 'Email');
		
		// Generamos el informe recogiendo los datos que hemos guardado antes
		$archivo_pdf = $accion_informe->generarInforme($accion_informe->datos(),$header,"informe_pedido");
		 
		return $archivo_pdf;
	}
}
?>