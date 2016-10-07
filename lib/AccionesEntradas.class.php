<?php

/**
 * Clase para gestionar todo lo relacionado con las entradas
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesEntradas.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesEntradas
{
	/**
	 * Constructor de la clase AccionesEntradas
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar una entrada
	 * 
	 * @param integer $id_pedido  				Id del pedido
	 * @param integer $id_transporte_conductor	Id del conductor
	 * 
	 */
	public function guardarEntrada($id_pedido,$id_transporte_conductor)
	{		
		// Creamos un nuevo objeto Entradas
		$entrada = new Entradas();
		$entrada->setIdPedido($id_pedido);				
		$entrada->setIdTransporteConductor($id_transporte_conductor);
		$entrada->setIdEstadoEntrada(1);
		
		// Guardamos la entrada en la BD
		$entrada_salvada = $entrada->save();
		
		// Obtenemos el id de la ultima entrada insertada
		$id_entrada_save = $entrada->getIdEntrada();
		
		if ($entrada_salvada)
		{
			// Obtenemos la clave para generar el id_md5 de la entrada que acabamos de guardar
			$key_entrada = sfConfig::get('app_private_key_entradas');
									
			// Creamos un nuevo objeto Entrada
			$entrada_act = new Entradas();
			$entrada_act->setIdEntrada($id_entrada_save);
			
			// Generamos el id_md5 de la Entrada
			$id_md5_entrada = hash_hmac('md5',$id_entrada_save,$key_entrada);
			$entrada_act->setIdMd5Entrada($id_md5_entrada);
			
			// Guardamos el número de entrada
			$acc_admin = new Administracion();
			$valor_num_albaran = $acc_admin->obtenerValorNumeroAlbaran(2);
			//$num_entrada = "AAA".$id_entrada_save;
			$num_entrada = $valor_num_albaran.$id_entrada_save;
			$entrada_act->setNumEntrada($num_entrada);
			
			// Actualizamos el objeto Proveedor
			$entrada_update = EntradasPeer::doUpdate($entrada_act);
			
			if($entrada_update !== false)
			{
				return $id_entrada_save;
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
	 * Guardar una linea de entrada
	 * 
	 * @param integer $id_entrada	Id de la entrada
	 * @param integer $id_articulo	Id del articulo
	 */
	public function guardarLineaEntrada($id_entrada,$id_articulo)
	{		
		// Obtenemos el id del usuario
		$id_usuario = $_SESSION['symfony/user/sfUser/attributes']['sfGuardSecurityUser']['user_id'];
				
		// Creamos un nuevo objeto EntradasXArticulo
		$linea_entrada = new ArticulosXEntrada();
		$linea_entrada->setIdEntrada($id_entrada);				
		$linea_entrada->setIdArticulo($id_articulo);
				
		// Guardamos la linea del pedido en la BD
		$linea_entrada_salvada = $linea_entrada->save();
		
		// Obtenemos el id de la ultima linea insertada
		$id_linea_entrada_save = $linea_entrada->getIdArticuloXEntrada();
		
		if ($id_linea_entrada_save)
		{
			return $id_linea_entrada_save;
		}
		else
		{
			return false;	
		}
	}
	
	/**
	 * Actualizar una linea de entrada
	 * 
	 * @param integer $id_articulos_x_entrada	Id de la linea de entrada
	 * @param integer $id_ubicacion   			Id Ubicacion
	 * @param integer $lote   					Lote
	 */
	public function actualizarLineaEntrada($id_articulos_x_entrada,$id_ubicacion,$lote)
	{	
		// Creamos un nuevo objeto ArticulosXEntrada
		$linea_entrada = new ArticulosXEntrada();
		$linea_entrada->setIdArticuloXEntrada($id_articulos_x_entrada);
		$linea_entrada->setIdUbicacion($id_ubicacion);
		$linea_entrada->setLote($lote);
				
	 	// Actualizamos el ArticulosXEntrada en la BD
	 	$linea_entrada_update = ArticulosXEntradaPeer::doUpdate($linea_entrada);
	 	
	 	return $linea_entrada_update;
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
	 * Obtener el Id de la entrada a partir del Id de pedido
	 * 
	 * @param  string  $id_pedido   Id del pedido
	 * 
	 * @return integer $id_entrada Id de la entrada
	 */
	public function obtenerIdEntradaXIdPedido($id_pedido)
	{
		// Obtenemos el objeto Entradas que tenga ese $id_pedido
		$entradas = new Criteria();
		$entradas->add(EntradasPeer::ID_PEDIDO,$id_pedido);
		$entradas1 = EntradasPeer::doSelect($entradas);
		
		// Si no se encuentra ningún objeto Entrada
		if(empty($entradas1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del pedido a partir del objeto Pedido
			$id_entrada = $entradas1[0]->getIdEntrada();
			
			return $id_entrada;			
		}
	}

	/**
	 * Obtener el Id del pedido a partir del Id de entrada
	 * 
	 * @param  string  $id_entrada   Id de la entrada
	 * 
	 * @return integer $id_pedido Id del pedido
	 */
	public function obtenerIdPedidoXIdEntrada($id_entrada)
	{
		// Obtenemos el objeto Entradas que tenga ese id de entrada		
		$obj_entrada= EntradasPeer::retrieveByPk($id_entrada);
				
		// Si no se encuentra ningún objeto Entrada
		if(empty($obj_entrada))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del pedido a partir del objeto Pedido
			$id_pedido = $obj_entrada->getIdPedido();
			
			return $id_pedido;			
		}
	}
	
	/**
	 * Obtener el objeto Entrada a partir del id de entrada
	 * 
	 * @param integer $id_entrada Id del entrada
	 * 
	 * @return objeto | false $obj_entrada    Objeto Entrada buscado por el id de la entrada, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjEntrada($id_entrada)
	{
		// Obtenemos el objeto entrada
		$obj_entrada = EntradasPeer::retrieveByPk($id_entrada);
		
		// Si está definido el objeto entrada
		if(isset($obj_entrada))
		{
			return $obj_entrada;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener las lineas de una entrada a través del Id de Entrada
	 * 
	 * @param integer $id_entrada Id de Entrada
	 * 
	 * @return array $ar_lineas_entrada Array con todas las lineas de entrada para ese id de entrada
	 */
	public function obtenerLineasEntradaXIdEntrada($id_entrada)
	{
		// Obtenemos las lineas según el id de entrada
		$lineas_entrada = new Criteria();
		$lineas_entrada->add(ArticulosXEntradaPeer::ID_ENTRADA,$id_entrada);
		$ar_lineas_entrada = ArticulosXEntradaPeer::doSelect($lineas_entrada);
		
		// Si no se encuentra ningún linea entrada
		if(empty($ar_lineas_entrada))
		{
			return false;
		}
		else
		{			
			return $ar_lineas_entrada;			
		}
	}
	
	/**
	 * Obtener el Id de la entrada a partir del Id Md5
	 * 
	 * @param  string  $id_md5_entrada   Id Md5 de la entrada
	 * 
	 * @return integer $id_entrada Id de la entrada
	 */
	public function obtenerIdEntradaXIdMd5($id_md5_entrada)
	{
		// Obtenemos el objeto Entradas que tenga ese $id_md5
		$entradas = new Criteria();
		$entradas->add(EntradasPeer::ID_MD5_ENTRADA,$id_md5_entrada);
		$entradas1 = EntradasPeer::doSelect($entradas);
		
		// Si no se encuentra ningún objeto Pedido
		if(empty($entradas1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id de la entrada a partir del objeto Entrada
			$id_entrada = $entradas1[0]->getIdEntrada();
			
			return $id_entrada;			
		}
	}
	
	/**
	 * Obtener el Objeto entrada a partir del Id Md5 del Albaran
	 * 
	 * @param  string  $id_md5_albaran   Id Md5 del albaran
	 * 
	 * @return integer $obj_entrada Objeto entrada
	 */
	public function obtenerObjEntradaXIdMd5Albaran($id_md5_albaran)
	{
		// Buscamos el objeto AlbaranesEntrada que tenga ese $id_md5_albaran
		$albaran_entrada = new Criteria();
		$albaran_entrada->add(AlbaranesEntradaPeer::ID_MD5_ALBARAN,$id_md5_albaran);
		$albaran_entrada1 = AlbaranesEntradaPeer::doSelect($albaran_entrada);
		
		// Si no se encuentra ningún objeto AlbaranesEntrada
		if(empty($albaran_entrada1))
		{
			return false;
		}
		else
		{
			// Obtenemos el objeto entrada
			$id_entrada = $albaran_entrada1[0]->getIdEntrada();
			$obj_entrada = $this->obtenerObjEntrada($id_entrada);
			
			return $obj_entrada;			
		}
	}
	
	/**
	 * Actualizar el estado de la entrada según el valor pasado como parámetro
	 * 
	 * @param integer $id_entrada			Id de la Entrada
	 * @param integer $id_estado_entrada	Id del estado_entrada
	 * 										(1-Pendiente,2-Procesada)
	 */
	public function actualizarEstadoEntrada($id_entrada,$id_estado_entrada)
	{	
		// Creamos un nuevo objeto Entrada
		$entrada = new Entradas();
		$entrada->setIdEntrada($id_entrada);
		$entrada->setIdEstadoEntrada($id_estado_entrada);
				
	 	// Actualizamos el Entrada en la BD
	 	$entrada_update = EntradasPeer::doUpdate($entrada);
	 	
	 	if($entrada_update !== false)
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}
	
  
 	/**
	 * Generamos el informe de la entrada
	 * 
	 * @param integer $id_entrada Id de la entrada
 	 */
	public function generarInformeEntrada($id_entrada)
	{								
		// Obtenemos el listado de las lineas de entrada según el id de entrada
		$ar_lineas_entrada = $this->obtenerLineasEntradaXIdEntrada($id_entrada);
			  	  	
	  	// Generamos el pdf
	  	$accion_informe = new AccionesInformes();
	  	
	  	// Guardamos los datos en la variable datos de la clase AccionesInformes
		$accion_informe->generarDatos($ar_lineas_entrada);
		
		// Cabecera de la tabla del pdf		
		$header = array('Nombre','CIF/NIF', 'Dirección', 'Población', 'Provincia', 'CP','País', 'Teléfono', 'Móvil', 'Fax', 'Email');
		
		// Generamos el informe recogiendo los datos que hemos guardado antes
		$archivo_pdf = $accion_informe->generarInforme($accion_informe->datos(),$header,"informe_entrada");
		 
		return $archivo_pdf;
	}
}
?>