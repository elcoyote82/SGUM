<?php
/**
 * Clase para gestionar todo lo relacionado con las ventas
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesVentas.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesVentas
{
	/**
	 * Constructor de la clase AccionesVentas
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar una venta
	 * 
	 * @param integer $id_cliente    Id del cliente
	 * @param integer $id_articulo   Id del articulo (opcional)
	 */
	public function guardarVenta($id_cliente,$id_articulo)
	{		
		// Obtenemos el id del usuario
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Creamos un nuevo objeto Ventas
		$venta = new Ventas();
		$venta->setIdCliente($id_cliente);				
		$venta->setIdUsuario($id_usuario);
		$venta->setIdEstadoVenta(1);
		
		// Guardamos la venta en la BD
		$venta_salvado = $venta->save();
		
		// Obtenemos el id del ultimo venta insertado
		$id_venta_save = $venta->getIdVenta();
		
		if ($venta_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del cliente que acabamos de guardar
			$key_venta = sfConfig::get('app_private_key_ventas');
									
			// Creamos un nuevo objeto Venta
			$venta_act = new Ventas();
			$venta_act->setIdVenta($id_venta_save);
			
			// Generamos el id_md5 de la Venta
			$id_md5_venta = hash_hmac('md5',$id_venta_save,$key_venta);
			$venta_act->setIdMd5Venta($id_md5_venta);
			
			// Guardamos el número de venta
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(3);
			//$num__venta = "AAA".$id_venta_save;
			$num_venta = $valor_num_albaran.$id_venta_save;
			$venta_act->setNumVenta($num_venta);
			
			// Actualizamos el objeto Venta
			$cliente_update = VentasPeer::doUpdate($venta_act);
			
			if($cliente_update !== false)
			{
				return $id_venta_save;
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
	 * Actualizar el estado de la venta según el valor pasado como parámetro
	 * 
	 * @param integer $id_venta 			Id del Venta
	 * @param integer $id_estado_venta		Id del estado_venta 
	 * 										(1-Borrador,2-EnProceso,3-Completa,4-Procesada)
	 */
	public function actualizarEstadoVenta($id_venta,$id_estado_venta)
	{	
		// Creamos un nuevo objeto Venta
		$venta = new Ventas();
		$venta->setIdVenta($id_venta);
		$venta->setIdEstadoVenta($id_estado_venta);
				
	 	// Actualizamos el Venta en la BD
	 	$venta_update = VentasPeer::doUpdate($venta);
	 	
	 	if($venta_update !== false)
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}
	
	/**
	 * Guardar una linea de  venta
	 * 
	 * @param integer $id_venta      Id de la Venta
	 * @param integer $id_articulo   Id del articulo
	 */
	public function guardarLineaVenta($id_venta,$id_articulo,$cantidad)
	{			
		// Creamos un nuevo objeto Venta
		$linea_venta = new ArticulosXVenta();
		$linea_venta->setIdVenta($id_venta);				
		$linea_venta->setIdArticulo($id_articulo);
		$linea_venta->setCantidad(1);
				
		// Guardamos la linea de la venta en la BD
		$linea_venta_salvado = $linea_venta->save();
		
		// Obtenemos el id del ultimo cliente insertado
		$id_linea_venta_save = $linea_venta->getIdVenta();
		
		if ($id_linea_venta_save)
		{
			return $id_linea_venta_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizar un venta
	 * 
	 * @param integer $id_venta      Id de la Venta
	 * @param integer $id_articulo   Id del articulo
	 */
	public function actualizarLineaVenta($id_articulo_x_venta,$cantidad)
	{	
		// Creamos un nuevo objeto ArticulosXVenta
		$linea_venta = new ArticulosXVenta();
		$linea_venta->setIdArticuloXVenta($id_articulo_x_venta);
		$linea_venta->setCantidad($cantidad);
				
	 	// Actualizamos el ArticulosXVenta en la BD
	 	$linea_venta_update = ArticulosXVentaPeer::doUpdate($linea_venta);
	 	
	 	return $linea_venta_update;
	}
	
	/**
	 * Borrar una linea de venta
	 * 
	 * @param integer $id_linea_venta Id de la Linea de Venta
	 */
	public function borrarLineaVenta($id_linea_venta)
	{				
	 	// Borramos el articulo de la tabla ArticulosXVenta
	 	ArticulosXVentaPeer::doDelete($id_linea_venta);
		
	 	$obj_articulo_x_venta = ArticulosXVentaPeer::retrieveByPk($id_linea_venta);
		
		// Si está definido el objeto ArticulosXVenta
		if(isset($obj_articulo_x_venta))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/**
	 * Borrar una venta de la tabla Ventas
	 * 
	 * @param integer $id_venta Id de la venta a borrar
	 */
	 public function borrarVenta($id_venta)
	 {
	 	// Borramos la venta de la tabla Ventas
	 	VentasPeer::doDelete($id_venta);
	 }
	
	/**
	 * Obtener las lineas de una venta a través del Id de Venta
	 * 
	 * @param integer $id_venta Id de la Venta
	 * 
	 * @return array $ar_lineas_venta Array con todas las lineas de venta para ese id de venta
	 */
	public function obtenerLineasVentaXIdVenta($id_venta_temporal)
	{
		// Obtenemos las lineas según el id de venta
		$lineas_venta = new Criteria();
		$lineas_venta->add(ArticulosXVentaPeer::ID_VENTA,$id_venta_temporal);
		$ar_lineas_venta = ArticulosXVentaPeer::doSelect($lineas_venta);
		
		// Si no se encuentra ningún linea venta
		if(empty($ar_lineas_venta))
		{
			return false;
		}
		else
		{			
			return $ar_lineas_venta;			
		}
	}
	
	/**
	 * Obtener el objeto Venta a partir del id de venta
	 * 
	 * @param integer $id_venta Id de la venta
	 * 
	 * @return objeto | false $obj_venta    Objeto Venta buscado por el id de la venta, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjVenta($id_venta)
	{
		// Obtenemos el objeto venta de Ventas
		$obj_venta = VentasPeer::retrieveByPk($id_venta);
		
		// Si está definido el objeto Venta
		if(isset($obj_venta))
		{
			return $obj_venta;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id de la venta a partir del Id Md5
	 * 
	 * @param  string  $id_md5_venta   Id Md5 de la venta
	 * 
	 * @return integer $id_venta Id del cliente
	 */
	public function obtenerIdVentaXIdMd5($id_md5_venta)
	{
		// Obtenemos el objeto Ventas que tenga ese $id_md5
		$ventas = new Criteria();
		$ventas->add(VentasPeer::ID_MD5_VENTA,$id_md5_venta);
		$ventas1 = VentasPeer::doSelect($ventas);
		
		// Si no se encuentra ningún objeto Venta
		if(empty($ventas1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id de la venta a partir del objeto Venta
			$id_venta = $ventas1[0]->getIdVenta();
			
			return $id_venta;			
		}
	}
	
	/**
	 * Obtener el Objeto venta a partir del Id Md5 del Albaran
	 * 
	 * @param  string  $id_md5_albaran   Id Md5 del albaran
	 * 
	 * @return integer $obj_venta Objeto venta
	 */
	public function obtenerObjVentaXIdMd5Albaran($id_md5_albaran)
	{
		// Buscamos el objeto AlbaranesVenta que tenga ese $id_md5_albaran
		$albaran_venta = new Criteria();
		$albaran_venta->add(AlbaranesVentaPeer::ID_MD5_ALBARAN,$id_md5_albaran);
		$albaran_venta1 = AlbaranesVentaPeer::doSelect($albaran_venta);
		
		// Si no se encuentra ningún objeto AlbaranesVenta
		if(empty($albaran_venta1))
		{
			return false;
		}
		else
		{
			// Obtenemos el objeto venta
			$id_venta = $albaran_venta1[0]->getIdVenta();
			$obj_venta = $this->obtenerObjVenta($id_venta);
			
			return $obj_venta;			
		}
	}
	
	/**
	 * Obtener el objeto Articulo_X_Venta a partir del Id del Articulo_X_Venta
	 * 
	 * @param integer $id_articulo_x_venta Id del Articulo_X_Venta
	 * 
	 * @return objeto | false $obj_articulo_x_venta    Objeto Articulo_X_Venta buscado por el id del Articulo_X_Venta, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjArticulosXVenta($id_articulo_x_venta)
	{
		// Obtenemos el objeto Articulo_X_Venta a partir del Id del Articulo_X_Venta
		$obj_articulo_x_venta = ArticulosXVentaPeer::retrieveByPk($id_articulo_x_venta);
		
		// Si está definido el objeto Articulo_X_Venta
		if(isset($obj_articulo_x_venta))
		{
			return $obj_articulo_x_venta;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener las lineas de una venta a través del Id de Venta
	 * 
	 * @param integer $id_venta Id de la Venta
	 * * @param integer $id_articulo Id del Articulo
	 * 
	 * @return array $obj_linea_venta Objeto de esa linea de venta
	 */
	public function obtenerLineasVenta($id_venta,$id_articulo)
	{
		// Obtenemos las lineas según el id de venta
		$lineas_venta = new Criteria();
		$lineas_venta->add(ArticulosXVentaPeer::ID_VENTA,$id_venta);
		$lineas_venta->add(ArticulosXVentaPeer::ID_ARTICULO,$id_articulo);
		$lineas_venta = ArticulosXVentaPeer::doSelect($lineas_venta);
		
		// Si no se encuentra ningún linea venta
		if(empty($lineas_venta))
		{
			return false;
		}
		else
		{			
			$obj_linea_venta = $lineas_venta[0];
			return $obj_linea_venta;			
		}
	}
	
	/**
	 * Obtener las últimas 10 ventas del cliente para la ficha de Clientes
	 * 
	 * @param integer $id_cliente Id del Cliente
	 * 
	 * @return array $ar_ventas Array con las ventas del cliente
	 */
	public function obtenerVentasXIdCliente($id_cliente)
	{
		// Obtenemos las ventas según el id de cliente ordenados por ultima fecha de creacion y limitados 10
		$ventas = new Criteria();
		$ventas->add(VentasPeer::ID_CLIENTE,$id_cliente);
		$ventas->addDescendingOrderByColumn(VentasPeer::CREATED_AT);
		$ventas->setLimit(10);
		$ar_ventas = VentasPeer::doSelect($ventas);
		
		// Si no se encuentra ninguna venta
		if(empty($ar_ventas))
		{
			return false;
		}
		else
		{
			return $ar_ventas;			
		}
	}
	
	
	/**
	 * Comprobar si una venta es un borrador
	 * 
	 * @param integer $id_venta Id de la Venta
	 * 
	 * @return boolean TRUE si es un borrador, FALSE en caso contrario
	 */
	public function comprobarVenta($id_venta)
	{
		// Buscamos si la venta es borrador en la tabla Ventas
		$ventas = new Criteria();
		$ventas->add(VentasPeer::ID_VENTA,$id_venta);	
		$ventas->add(VentasPeer::ID_ESTADO_VENTA,1);		
		$ventas1 = VentasPeer::doSelect($ventas);
		
		// Si la venta está vacio
		if(!empty($ventas1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
  
 	/**
	 * Generamos el informe de la venta
	 * 
	 * @param integer $id_venta Id de la Venta
 	 */
	public function generarInformeVenta($id_venta)
	{								
		// Obtenemos el listado de las lineas de venta según el id de venta
		$ar_lineas_venta = $this->obtenerLineasVentaXIdVenta($id_venta);
			  	  	
	  	// Generamos el pdf
	  	$accion_informe = new AccionesInformes();
	  	
	  	// Guardamos los datos en la variable datos de la clase AccionesInformes
		$accion_informe->generarDatos($ar_lineas_venta);
		
		// Cabecera de la tabla del pdf		
		$header = array('Nombre','CIF/NIF', 'Dirección', 'Población', 'Provincia', 'CP','País', 'Teléfono', 'Móvil', 'Fax', 'Email');
		
		// Generamos el informe recogiendo los datos que hemos guardado antes
		$archivo_pdf = $accion_informe->generarInforme($accion_informe->datos(),$header,"informe_venta");
		 
		return $archivo_pdf;
	}
}
?>