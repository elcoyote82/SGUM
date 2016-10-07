<?php

/**
 * Clase para gestionar todo lo relacionado con las salidas
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesSalidas.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesSalidas
{
	/**
	 * Constructor de la clase AccionesSalidas
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar una salida
	 * 
	 * @param integer $id_venta  				Id del venta
	 * @param integer $id_transporte_conductor	Id del conductor
	 * 
	 */
	public function guardarSalida($id_venta,$id_transporte_conductor)
	{		
		// Creamos un nuevo objeto Salidas
		$salida = new Salidas();
		$salida->setIdVenta($id_venta);				
		$salida->setIdTransporteConductor($id_transporte_conductor);
		$salida->setIdEstadoSalida(1);
		
		// Guardamos la salida en la BD
		$salida_salvada = $salida->save();
		
		// Obtenemos el id de la ultima salida insertada
		$id_salida_save = $salida->getIdSalida();
		
		if ($salida_salvada)
		{
			// Obtenemos la clave para generar el id_md5 de la salida que acabamos de guardar
			$key_salida = sfConfig::get('app_private_key_salidas');
									
			// Creamos un nuevo objeto Salida
			$salida_act = new Salidas();
			$salida_act->setIdSalida($id_salida_save);
			
			// Generamos el id_md5 de la Salida
			$id_md5_salida = hash_hmac('md5',$id_salida_save,$key_salida);
			$salida_act->setIdMd5Salida($id_md5_salida);
			
			// Guardamos el número de salida
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(4);
			//$num_salida = "AAA".$id_salida_save;
			$num_salida = $valor_num_albaran.$id_salida_save;
			$salida_act->setNumSalida($num_salida);
			
			// Actualizamos el objeto Proveedor
			$salida_update = SalidasPeer::doUpdate($salida_act);
			
			if($salida_update !== false)
			{
				return $id_salida_save;
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
	 * Guardar una linea de salida
	 * 
	 * @param integer $id_salida	Id de la salida
	 * @param integer $id_articulo	Id del articulo
	 */
	public function guardarLineaSalida($id_salida,$id_articulo)
	{		
		// Obtenemos el id del usuario
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Creamos un nuevo objeto SalidasXArticulo
		$linea_salida = new ArticulosXSalida();
		$linea_salida->setIdSalida($id_salida);				
		$linea_salida->setIdArticulo($id_articulo);
				
		// Guardamos la linea del venta en la BD
		$linea_salida_salvada = $linea_salida->save();
		
		// Obtenemos el id de la ultima linea insertada
		$id_linea_salida_save = $linea_salida->getIdArticuloXSalida();
		
		if ($id_linea_salida_save)
		{
			return $id_linea_salida_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Guardar una linea de salida
	 * 
	 * @param integer $id_salida	Id de la salida
	 * @param integer $id_articulo	Id del articulo
	 * @param integer $lote     	Lote del articulo
	 * @param integer $id_ubicacion	Id ubiaccion del articulo
	 */
	public function guardarLineaSalida2($id_salida,$id_articulo,$lote,$id_ubicacion)
	{		
		// Obtenemos el id del usuario
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
		
		// Creamos un nuevo objeto SalidasXArticulo
		$linea_salida = new ArticulosXSalida();
		$linea_salida->setIdSalida($id_salida);				
		$linea_salida->setIdArticulo($id_articulo);
		$linea_salida->setLote($lote);
		$linea_salida->setIdUbicacion($id_ubicacion);
				
		// Guardamos la linea del venta en la BD
		$linea_salida_salvada = $linea_salida->save();
		
		// Obtenemos el id de la ultima linea insertada
		$id_linea_salida_save = $linea_salida->getIdArticuloXSalida();
		
		if ($id_linea_salida_save)
		{
			return $id_linea_salida_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizar una linea de salida
	 * 
	 * @param integer $id_articulos_x_salida	Id de la linea de salida
	 * @param integer $id_ubicacion   			Id Ubicacion
	 * @param integer $lote   					Lote
	 */
	public function actualizarLineaSalida($id_articulos_x_salida,$id_ubicacion,$lote)
	{	
		// Creamos un nuevo objeto ArticulosXSalida
		$linea_salida = new ArticulosXSalida();
		$linea_salida->setIdArticuloXSalida($id_articulos_x_salida);
		$linea_salida->setIdUbicacion($id_ubicacion);
		$linea_salida->setLote($lote);
				
	 	// Actualizamos el ArticulosXSalida en la BD
	 	$linea_salida_update = ArticulosXSalidaPeer::doUpdate($linea_salida);
	 	
	 	return $linea_salida_update;
	}
	
	/**
	 * Guardar Articulos_X_Lote
	 * 
	 * @param integer $id_articulo		Id del articulo
	 * @param integer $id_ubicacion   	Id Ubicacion
	 * @param integer $lote   			Lote
	 */
	public function guardarArticulosXLote($id_articulo,$id_ubicacion,$lote)
	{	
		// Creamos un nuevo objeto ArticulosXLote
		$articulos_x_lote = new ArticulosXLote();
		$articulos_x_lote->setIdArticulo($id_articulo);
		$articulos_x_lote->setIdUbicacion($id_ubicacion);
		$articulos_x_lote->setLote($lote);
				
	 	// Actualizamos el ArticulosXLote en la BD
	 	$articulos_x_lote_update = $articulos_x_lote->save();
	 	
	 	return $articulos_x_lote_update;
	}
	
	/**
	 * Borrar Articulos_X_Lote
	 * 
	 * @param integer $id_articulo		Id del articulo
	 * @param integer $id_ubicacion   	Id Ubicacion
	 * @param integer $lote   			Lote
	 */
	public function borrarArticulosXLote($id_articulo,$id_ubicacion,$lote)
	{	
		// Buscamos el objeto ArticulosXLote
		$articulos_x_lote = new Criteria();
		$articulos_x_lote->add(ArticulosXLotePeer::ID_ARTICULO,$id_articulo);
		$articulos_x_lote->add(ArticulosXLotePeer::ID_UBICACION,$id_ubicacion);
		$articulos_x_lote->add(ArticulosXLotePeer::LOTE,$lote);
				
	 	// Actualizamos el ArticulosXLote en la BD
	 	$ar_articulos_x_lote = ArticulosXLotePeer::doSelect($articulos_x_lote);
	 	
		if(!empty($ar_articulos_x_lote))
		{
			$obj_articulos_x_lote = $ar_articulos_x_lote[0];
			$id_articulo_x_lote = $obj_articulos_x_lote->getIdArticuloXLote();
			ArticulosXLotePeer::doDelete($id_articulo_x_lote);
		}
		
		$obj_articulos_x_lote = ArticulosXLotePeer::retrieveByPk($id_articulo_x_lote);
		
		// Si está definido el objeto Articulo
		if(isset($obj_articulos_x_lote))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	

	/**
	 * Obtener el Id de la salida a partir del Id de venta
	 * 
	 * @param  string  $id_venta   Id del venta
	 * 
	 * @return integer $id_salida Id de la salida
	 */
	public function obtenerIdSalidaXIdVenta($id_venta)
	{
		// Obtenemos el objeto Salidas que tenga ese $id_venta
		$salidas = new Criteria();
		$salidas->add(SalidasPeer::ID_VENTA,$id_venta);
		$salidas1 = SalidasPeer::doSelect($salidas);
		
		// Si no se encuentra ningún objeto Salida
		if(empty($salidas1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del venta a partir del objeto Venta
			$id_salida = $salidas1[0]->getIdSalida();
			
			return $id_salida;			
		}
	}

	/**
	 * Obtener el Id del venta a partir del Id de salida
	 * 
	 * @param  string  $id_salida   Id de la salida
	 * 
	 * @return integer $id_venta Id del venta
	 */
	public function obtenerIdVentaXIdSalida($id_salida)
	{
		// Obtenemos el objeto Salidas que tenga ese id de salida		
		$obj_salida= SalidasPeer::retrieveByPk($id_salida);
				
		// Si no se encuentra ningún objeto Salida
		if(empty($obj_salida))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del venta a partir del objeto Venta
			$id_venta = $obj_salida->getIdVenta();
			
			return $id_venta;			
		}
	}
	
	/**
	 * Obtener el objeto Salida a partir del id de salida
	 * 
	 * @param integer $id_salida Id del salida
	 * 
	 * @return objeto | false $obj_salida    Objeto Salida buscado por el id de la salida, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjSalida($id_salida)
	{
		// Obtenemos el objeto salida
		$obj_salida = SalidasPeer::retrieveByPk($id_salida);
		
		// Si está definido el objeto salida
		if(isset($obj_salida))
		{
			return $obj_salida;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener las lineas de una salida a través del Id de Salida
	 * 
	 * @param integer $id_salida Id de Salida
	 * 
	 * @return array $ar_lineas_salida Array con todas las lineas de salida para ese id de salida
	 */
	public function obtenerLineasSalidaXIdSalida($id_salida)
	{
		// Obtenemos las lineas según el id de salida
		$lineas_salida = new Criteria();
		$lineas_salida->add(ArticulosXSalidaPeer::ID_SALIDA,$id_salida);
		$ar_lineas_salida = ArticulosXSalidaPeer::doSelect($lineas_salida);
		
		// Si no se encuentra ningún linea salida
		if(empty($ar_lineas_salida))
		{
			return false;
		}
		else
		{			
			return $ar_lineas_salida;			
		}
	}
	
	/**
	 * Obtener el Id de la salida a partir del Id Md5
	 * 
	 * @param  string  $id_md5_salida   Id Md5 de la salida
	 * 
	 * @return integer $id_salida Id de la salida
	 */
	public function obtenerIdSalidaXIdMd5($id_md5_salida)
	{
		// Obtenemos el objeto Salidas que tenga ese $id_md5
		$salidas = new Criteria();
		$salidas->add(SalidasPeer::ID_MD5_SALIDA,$id_md5_salida);
		$salidas1 = SalidasPeer::doSelect($salidas);
		
		// Si no se encuentra ningún objeto Venta
		if(empty($salidas1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id de la salida a partir del objeto Salida
			$id_salida = $salidas1[0]->getIdSalida();
			
			return $id_salida;			
		}
	}
	
	/**
	 * Obtener el Objeto salida a partir del Id Md5 del Albaran
	 * 
	 * @param  string  $id_md5_albaran   Id Md5 del albaran
	 * 
	 * @return integer $obj_salida Objeto salida
	 */
	public function obtenerObjSalidaXIdMd5Albaran($id_md5_albaran)
	{
		// Buscamos el objeto AlbaranesSalida que tenga ese $id_md5_albaran
		$albaran_salida = new Criteria();
		$albaran_salida->add(AlbaranesSalidaPeer::ID_MD5_ALBARAN,$id_md5_albaran);
		$albaran_salida1 = AlbaranesSalidaPeer::doSelect($albaran_salida);
		
		// Si no se encuentra ningún objeto AlbaranesSalida
		if(empty($albaran_salida1))
		{
			return false;
		}
		else
		{
			// Obtenemos el objeto salida
			$id_salida = $albaran_salida1[0]->getIdSalida();
			$obj_salida = $this->obtenerObjSalida($id_salida);
			
			return $obj_salida;			
		}
	}
	
	/**
	 * Actualizar el estado de la salida según el valor pasado como parámetro
	 * 
	 * @param integer $id_salida			Id de la Salida
	 * @param integer $id_estado_salida	Id del estado_salida
	 * 										(1-Pendiente,2-Procesada)
	 */
	public function actualizarEstadoSalida($id_salida,$id_estado_salida)
	{	
		// Creamos un nuevo objeto Salida
		$salida = new Salidas();
		$salida->setIdSalida($id_salida);
		$salida->setIdEstadoSalida($id_estado_salida);
				
	 	// Actualizamos el Salida en la BD
	 	$salida_update = SalidasPeer::doUpdate($salida);
	 	
	 	if($salida_update !== false)
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}
	
  
 	/**
	 * Generamos el informe de la salida
	 * 
	 * @param integer $id_salida Id de la salida
 	 */
	public function generarInformeSalida($id_salida)
	{								
		// Obtenemos el listado de las lineas de salida según el id de salida
		$ar_lineas_salida = $this->obtenerLineasSalidaXIdSalida($id_salida);
			  	  	
	  	// Generamos el pdf
	  	$accion_informe = new AccionesInformes();
	  	
	  	// Guardamos los datos en la variable datos de la clase AccionesInformes
		$accion_informe->generarDatos($ar_lineas_salida);
		
		// Cabecera de la tabla del pdf		
		$header = array('Nombre','CIF/NIF', 'Dirección', 'Población', 'Provincia', 'CP','País', 'Teléfono', 'Móvil', 'Fax', 'Email');
		
		// Generamos el informe recogiendo los datos que hemos guardado antes
		$archivo_pdf = $accion_informe->generarInforme($accion_informe->datos(),$header,"informe_salida");
		 
		return $archivo_pdf;
	}
}
?>