<?php
/**
 * Clase para gestionar todo lo relacionado con los articulos
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesArticulos.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesArticulos
{
	/**
	 * Constructor de la clase AccionesArticulos
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un objeto Articulo
	 * 
	 * @param integer $id_familia     Id de la familia
	 * @param string  $nombre         Nombre del articulo
	 * @param string  $lote           Lote del articulo
	 * @param string  $datos_producto Datos del del articulo
	 * @param text    $descripcion    Descripcion del articulo
	 * 
	 * @return integer | boolean $id_articulo_save ID del articulo, o FALSE si hubo un fallo
	 */
	public function guardarArticulo($id_familia,$nombre,$datos_producto,$descripcion,$aviso_minimo,$stock_minimo)
	{
		// Creamos un nuevo objeto Articulo
		$articulo = new Articulos();
		$articulo->setIdFamilia($id_familia);
		$articulo->setNombre($nombre);
		$articulo->setDatosProducto($datos_producto);
		$articulo->setDescripcion($descripcion);
		$articulo->setStock(0);
		if($aviso_minimo)
		{
			$articulo->setAvisoMinimo($aviso_minimo);
			$articulo->setStockMinimo($stock_minimo);
		}
		else
		{
			$articulo->setAvisoMinimo(0);
			$articulo->setStockMinimo(0);	
		}
				
		// Guardamos el articulo en la BD
		$articulo_salvado = $articulo->save();
		
		// Obtenemos el id del ultimo articulo insertado
		$id_articulo_save = $articulo->getIdArticulo();
		
		if ($articulo_salvado)
		{			
			// Obtenemos la clave para generar el id_md5 del articulo que acabamos de guardar
			$key_articulo = sfConfig::get('app_private_key_articulos');
			
			// Creamos un nuevo objeto Articulo
			$articulo_act = new Articulos();
			$articulo_act->setIdArticulo($id_articulo_save);
			
			// Generamos el id_md5 del Articulo
			$id_md5_articulo = hash_hmac('md5',$id_articulo_save,$key_articulo);
			$articulo_act->setIdMd5Articulo($id_md5_articulo);
			
			// Actualizamos el objeto Articulo
			$articulo_update = ArticulosPeer::doUpdate($articulo_act);
			
			if($articulo_update !== false)
			{
				return $id_articulo_save;
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
	 * Guardamos los diferente Proveedores del Artículo
	 * 
	 * @param  integer $id_articulo     Id del articulo
	 * @param  integer $id_proveedor    Id del proveedor
	 * 
	 * @return TRUE si todo ha ido correcto FALSE en caso contrario
	 */
	public function guardarArticuloXProveedor($id_articulo,$id_proveedor)
	{
		// Creamos un nuevo objeto Articulo
		$articulo_x_proveedor = new ArticulosXProveedor();
		$articulo_x_proveedor->setIdArticulo($id_articulo);
		$articulo_x_proveedor->setIdProveedor($id_proveedor);
		
		// Guardamos el articulo en la BD
		$articulo_x_proveedor_salvado = $articulo_x_proveedor->save();
		
		if($articulo_x_proveedor_salvado)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
		
	/**
	 * Actualizamos un articulo de la tabla Articulos
	 * 
	 * @param integer $id_articulo     Id del articulo
	 * @param integer $id_familia     Id de la familia
	 * @param string  $nombre         Nombre del articulo
	 * @param string  $lote           Lote del articulo
	 * @param string  $datos_producto Datos del del articulo
	 * @param text    $descripcion    Descripcion del articulo
	 * @param string  $imagen         Imagen del articulo
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarArticulo($id_articulo,$id_familia,$nombre,$datos_producto,$descripcion,$aviso_minimo,$stock_minimo,$imagen)
	 {
	 	// Creamos un nuevo objeto Articulo
	 	$articulo = new Articulos();
	 	$articulo->setIdArticulo($id_articulo);
		$articulo->setIdFamilia($id_familia);
		$articulo->setNombre($nombre);
		$articulo->setDatosProducto($datos_producto);
		$articulo->setDescripcion($descripcion);
		$articulo->setImagen($imagen);	 	
		$articulo->setStock(0);
		if($aviso_minimo)
		{
			$articulo->setAvisoMinimo($aviso_minimo);
			$articulo->setStockMinimo($stock_minimo);
		}
		else
		{
			$articulo->setAvisoMinimo(0);
			$articulo->setStockMinimo(0);	
		}
	 	
	 	// Actualizamos el Articulo en la BD
	 	$articulo_update = ArticulosPeer::doUpdate($articulo);
	 	
	 	return $articulo_update;
	 }
	 
	/** 
	 * Actualizamos los diferente Proveedores del Artículo
	 * 
	 * @param  integer $id_articulo     Id del articulo
	 * @param  integer $id_proveedor    Id del proveedor
	 * 
	 * @return TRUE si todo ha ido correcto FALSE en caso contrario
	 */
	public function actualizarArticuloXProveedor($id_articulo,$id_proveedor)
	{
		// Creamos un nuevo objeto Articulo
		$articulo_x_proveedor = new ArticulosXProveedor();
		$articulo_x_proveedor->setIdArticulo($id_articulo);
		$articulo_x_proveedor->setIdProveedor($id_proveedor);
		
		// Guardamos el articulo en la BD
		$articulo_x_proveedor_salvado = $articulo_x_proveedor->save();
		
		if($articulo_x_proveedor_salvado)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	 
	/**
	 * Borrar un articulo de la tabla Articulo
	 * 
	 * @param integer $id_articulo Id del articulo a borrar
	 */
	 public function borrarArticulo($id_articulo)
	 {
	 	// Borramos el articulo de la tabla Articulo
	 	ArticulosPeer::doDelete($id_articulo);
	 }
	 
	/** 
	 * Borramos el ArticuloXProveedor
	 * 
	 * @param  integer $id_articulo     Id del articulo
	 * @param  integer $id_proveedor    Id del proveedor
	 * 
	 * @return TRUE si todo ha ido correcto FALSE en caso contrario
	 */
	public function borrarArticuloXProveedor($id_articulo,$id_proveedor)
	{
		// Creamos un nuevo objeto Articulo
		$articulo_x_proveedor = new Criteria();
		$articulo_x_proveedor->add(ArticulosXProveedorPeer::ID_ARTICULO, $id_articulo);
		$articulo_x_proveedor->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $id_proveedor);
		
		$ar_articulo_x_proveedor = ArticulosXProveedorPeer::doSelect($articulo_x_proveedor);
		
		if(!empty($ar_articulo_x_proveedor))
		{
			$obj_articulo_x_proveedor = $ar_articulo_x_proveedor[0];
			$id_articulo_x_proveedor = $obj_articulo_x_proveedor->getIdArticuloXProveedor();
			ArticulosXProveedorPeer::doDelete($id_articulo_x_proveedor);
		}
		
		$obj_articulo_x_proveedor = ArticulosXProveedorPeer::retrieveByPk($id_articulo_x_proveedor);
		
		// Si está definido el objeto Articulo
		if(isset($obj_articulo_x_proveedor))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	/**
	 * Obtener el objeto Articulo a partir del id de articulo
	 * 
	 * @param integer $id_articulo Id del articulo
	 * 
	 * @return objeto | false $obj_articulo    Objeto Articulo buscado por el id del articulo, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjArticulo($id_articulo)
	{
		// Obtenemos el objeto articulo de Articulo
		$obj_articulo = ArticulosPeer::retrieveByPk($id_articulo);
		
		// Si está definido el objeto Articulo
		if(isset($obj_articulo))
		{
			return $obj_articulo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del articulo a partir del Id Md5
	 * 
	 * @param  string  $id_md5_articulo   Id Md5 del articulo
	 * 
	 * @return integer $id_articulo Id del articulo
	 */
	public function obtenerIdArticuloXIdMd5($id_md5_articulo)
	{
		// Obtenemos el objeto Articulo que tenga ese $id_md5
		$articulo = new Criteria();
		$articulo->add(ArticulosPeer::ID_MD5_ARTICULO,$id_md5_articulo);
		$articulo1 = ArticulosPeer::doSelect($articulo);
		
		// Si no se encuentra ningún objeto Articulo
		if(empty($articulo1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del articulo a partir del objeto Articulo
			$id_articulo = $articulo1[0]->getIdArticulo();
			
			return $id_articulo;			
		}
	}
	
	/**
	 * Obtener todos los objetos Articulo
	 * 
	 * @return array $ar_articulos   Array de todos los objetos Articulo, FALSE en caso de que no haya
	 */
	public function obtenerTodosArticulos()
	{
		// Obtenemos todos los articulos de la tabla Articulo
		$articulos = new Criteria();
		$ar_articulos = ArticulosPeer::doSelect($articulos);
		
		// Si hay articulos
		if(!empty($ar_articulos))
		{
			return $ar_articulos;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Articulo a partir del id md5 del articulo
	 * 
	 * @param integer $id_md5_articulo Id Md5 del articulo
	 * 
	 * @return objeto $articulo  Objeto Articulo buscado por el id md5 del articulo
	 */
	public function obtenerObjArticuloXIdMd5($id_md5_articulo)
	{
		// Obtenemos el id del articulo a partir del id md5
		$id_articulo = $this->obtenerIdArticuloXIdMd5($id_md5_articulo);
		
		// Obtenemos el objeto Articulo
		$articulo = ArticulosPeer::retrieveByPk($id_articulo);
		
		// Si está definido el objeto Articulo
		if(isset($articulo))
		{
			return $articulo;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Articulo a partir del id del articulo
	 * 
	 * @param  integer $id_articulo Id del articulo
	 * 
	 * @return string  $id_md5_articulo   Id Md5 del articulo
	 */
	public function obtenerIdMd5Articulo($id_articulo)
	{
		// Obtenemos el objeto articulo de Articulo
		$articulo = ArticulosPeer::retrieveByPk($id_articulo);
		
		// Si está definido el objeto Articulo
		if(isset($articulo))
		{
			// Obtenemos el Id Md5 a partir del objeto Articulo
			$id_md5_articulo = $articulo->getIdMd5Articulo();
			
			return $id_md5_articulo;
		}
		else
		{
			return false;
		}
	}	
		
	/**
	 * Obtener un Select con todos los articulos de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_articulos  Array de articulos con llave el id del articulo y contenido el Nombre del articulo
	 */
	public function obtenerSelectArticulos()
	{
		// Obtenemos todos los articulos
		$articulos = $this->obtenerTodosArticulos();
		
		// Creamos un array con los articulos para el select del formulario
		$ar_articulos[0] = "";
		
		foreach($articulos as $articulo)
		{
			$articulo_nombre = $articulo->getNombre();
			$i = $articulo->getIdArticulo();
			$ar_articulos[$i] = $articulo_nombre;
		}
		
		// Array con el nombre de los articulos y llave el id
		return $ar_articulos;
	}
	
	/**
	 * Obtener un Select con todos los articulos de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_articulos  Array de articulos con llave el id del articulo y contenido el Nombre del articulo
	 */
	public function obtenerSelectArticulos2()
	{
		// Obtenemos todos los articulos
		$articulos = $this->obtenerTodosArticulos();
		
		// Creamos un array con los articulos para el select del formulario
		$ar_articulos[0] = "-------";
		
		foreach($articulos as $articulo)
		{
			$articulo_nombre = $articulo->getNombre();
			$i = $articulo->getIdArticulo();
			$ar_articulos[$i] = $articulo_nombre;
		}
		
		// Array con el nombre de los articulos y llave el id
		return $ar_articulos;
	}
	
	/**
	 * Obtener un Select con todos los articulos de la aplicacion
	 * ID = 0 -> "Seleccionar Articulo"
	 * 
	 * @return array $ar_articulos  Array de articulos con llave el id del articulo y contenido el Nombre del articulo
	 */
	public function obtenerSelectArticulos3()
	{
		// Obtenemos todos los articulos
		$articulos = $this->obtenerTodosArticulos();
		
		// Creamos un array con los articulos para el select del formulario
		$ar_articulos[0] = "Seleccionar Articulo";
		
		foreach($articulos as $articulo)
		{
			$articulo_nombre = $articulo->getNombre();
			$i = $articulo->getIdArticulo();
			$ar_articulos[$i] = $articulo_nombre;
		}
		
		// Array con el nombre de los articulos y llave el id
		return $ar_articulos;
	}
	

	/**
	 * Obtener un array con los proveedores que tienen el articulo
	 * 
	 * @param integer $id_articulo ID del Articulo
	 * 
	 * @return array  $ar_proveedores_articulo Proveedores del articulo
	 */
	public function obtenerArticulosXProveedor($id_articulo)
	{
		$articulos_x_proveedor = new Criteria();
		$articulos_x_proveedor->add(ArticulosXProveedorPeer::ID_ARTICULO,$id_articulo);
		
		$ar_articulos_x_proveedor = ArticulosXProveedorPeer::doSelect($articulos_x_proveedor);
		
		$ar_proveedores_articulo = array();
		if(!empty($ar_articulos_x_proveedor))
		{
			foreach ($ar_articulos_x_proveedor as $articulo_x_proveedor)
			{
				$id_proveedor = $articulo_x_proveedor->getIdProveedor();
				array_push($ar_proveedores_articulo,$id_proveedor);
			}
			
			return $ar_proveedores_articulo;
		}
		else
		{			
			return $ar_proveedores_articulo;
		}
	}
	
	/**
	 * Obtener array de UbicacionLote a partir del Id del Articulo
	 * 
	 * @param integer $id_articulo ID del Articulo
	 * 
	 * @return array  $ar_ubicaciones_x_articulo Ubicaciones y lotes del articulo
	 */
	public function obtenerUbicacionesXIdArticulo($id_articulo)
	{
		$ubicaciones_x_articulo = new Criteria();
		$ubicaciones_x_articulo->add(ArticulosXLotePeer::ID_ARTICULO,$id_articulo);
		$ubicaciones_x_articulo->addAscendingOrderByColumn(ArticulosXLotePeer::CREATED_AT);
		$ubicaciones_x_articulo->addGroupByColumn(ArticulosXLotePeer::ID_UBICACION);
		$ar_ubicaciones_x_articulo = ArticulosXLotePeer::doSelect($ubicaciones_x_articulo);
		
		if(isset($ar_ubicaciones_x_articulo))
		{
			return $ar_ubicaciones_x_articulo;
		}
		else
		{
			return false;
		}		
	}
	

	/**
	 * Obtener array de Proveedores a partir del Id del Articulo
	 * 
	 * @param integer $id_articulo ID del Articulo
	 * 
	 * @return array  $ar_proveedores_x_articulo Proveedores del articulo
	 */
	public function obtenerProveedoresXIdArticulo($id_articulo)
	{
		$proveedores_x_articulo = new Criteria();
		$proveedores_x_articulo->add(ArticulosXProveedorPeer::ID_ARTICULO,$id_articulo);
		
		$ar_proveedores_x_articulo = ArticulosXProveedorPeer::doSelect($proveedores_x_articulo);
		
		if(isset($ar_proveedores_x_articulo))
		{
			return $ar_proveedores_x_articulo;
		}
		else
		{
			return false;
		}		
	}
	
	/**
	 * Obtener array de Articulos a partir del Id del Proveedor
	 * 
	 * @param integer $id_proveedor ID del Proveedor
	 * 
	 * @return array  $ar_articulos_x_proveedor Articulos del proveedor
	 */
	public function obtenerArticulosXIdProveedor($id_proveedor)
	{
		$articulos_x_proveedor = new Criteria();
		$articulos_x_proveedor->add(ArticulosXProveedorPeer::ID_PROVEEDOR,$id_proveedor);
		
		$ar_articulos_x_proveedor = ArticulosXProveedorPeer::doSelect($articulos_x_proveedor);
		
		if(isset($ar_articulos_x_proveedor))
		{
			return $ar_articulos_x_proveedor;
		}
		else
		{
			return false;
		}		
	}
	
	/**
	 * Obtener un objeto Articulo_X_Proveedor a partir del Id del Proveedor y del Id del Articulo
	 * 
	 * @param integer $id_articulo  ID del Articulo
	 * @param integer $id_proveedor ID del Proveedor
	 * 
	 * @return array  $obj_articulo_x_proveedor Objeto Articulo_X_Proveedor
	 */
	public function obtenerObjArticuloXProveedor($id_articulo,$id_proveedor)
	{
		var_dump($id_articulo);
		var_dump($id_proveedor);
		$articulos_x_proveedor = new Criteria();
		$articulos_x_proveedor->add(ArticulosXProveedorPeer::ID_ARTICULO,$id_articulo);
		$articulos_x_proveedor->add(ArticulosXProveedorPeer::ID_PROVEEDOR,$id_proveedor);
		
		$ar_articulos_x_proveedor = ArticulosXProveedorPeer::doSelect($articulos_x_proveedor);
		var_dump($ar_articulos_x_proveedor);
		if(isset($ar_articulos_x_proveedor))
		{
			return $ar_articulos_x_proveedor[0];
		}
		else
		{
			return false;
		}		
	}
	
	
	/**
	 * Comprobar si un artículo está siendo usado
	 * 
	 * @param integer $id_articulo Id del articulo
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarArticulo($id_articulo)
	{
		// Buscamos si el articulo está siendo usado en la tabla ArticulosXLote
		$articulos = new Criteria();
		$articulos->add(ArticulosXLotePeer::ID_ARTICULO,$id_articulo);		
		$articulos1 = ArticulosXLotePeer::doSelect($articulos);
				
		// Buscamos si el articulo está siendo usado en la tabla ArticulosXPedido
		$articulos = new Criteria();
		$articulos->add(ArticulosXPedidoPeer::ID_ARTICULO,$id_articulo);		
		$articulos2 = ArticulosXPedidoPeer::doSelect($articulos);
				
		// Buscamos si el articulo está siendo usado en la tabla ArticulosXProveedor
		//$articulos = new Criteria();
		//$articulos->add(ArticulosXProveedorPeer::ID_ARTICULO,$id_articulo);		
		//$articulos3 = ArticulosXProveedorPeer::doSelect($articulos);
				
		// Buscamos si el articulo está siendo usado en la tabla ArticulosXVenta
		$articulos = new Criteria();
		$articulos->add(ArticulosXVentaPeer::ID_ARTICULO,$id_articulo);		
		$articulos4 = ArticulosXVentaPeer::doSelect($articulos);
				
		// Buscamos si el articulo está siendo usado en la tabla EntradasXArticulo
		$articulos = new Criteria();
		$articulos->add(EntradasXArticuloPeer::ID_ARTICULO,$id_articulo);		
		$articulos5 = EntradasXArticuloPeer::doSelect($articulos);
				
		// Buscamos si el articulo está siendo usado en la tabla SalidasXArticulo
		$articulos = new Criteria();
		$articulos->add(SalidasXArticuloPeer::ID_ARTICULO,$id_articulo);		
		$articulos6 = SalidasXArticuloPeer::doSelect($articulos);
		
		// Si el articulo no está vacio
		if(!empty($articulos1) || !empty($articulos2) || !empty($articulos4) || !empty($articulos5) || !empty($articulos6))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Comprobar si los articulos están bajo de existencias, en caso de estar bajo de existencias se pone stock_bajo a 1
	 * 
	 */
	public function comprobarStockArticulos()
	{
		// Buscamos todos los articulos
		$articulos = new Criteria();		
		$ar_articulos = ArticulosPeer::doSelect($articulos);
		
		// Para cada articulo comprobamos su stock
		foreach($ar_articulos as $articulo)
		{						
			$stock_minimo = $articulo->getStockMinimo();
			$stock = $articulo->getStock();
			
			if($stock_minimo)
			{
				if($stock_minimo > $stock)
				{		
					// Actualizamos stock_bajo a 1
					$this->actualizarStockBajo($articulo->getIdArticulo(),1);				
				}
				else
				{	
					// Actualizamos stock_bajo a 0
					$this->actualizarStockBajo($articulo->getIdArticulo(),0);					
				}
			}
			else
			{
				if($stock == 0)
				{
					// Actualizamos stock_bajo a 1
					$this->actualizarStockBajo($articulo->getIdArticulo(),1);
				}
				else
				{
					// Actualizamos stock_bajo a 0
					$this->actualizarStockBajo($articulo->getIdArticulo(),0);						
				}
			}
		}	
	}
	
	/**
	 * Actualizamos stock_bajo del articulo a 1 segun el id del articulo
	 * 
	 * @param integer $id_articulo Id del articulo a actualizar
	 */
	public function actualizarStockBajo($id_articulo,$valor)
	{
		// Creamos un nuevo objeto Articulo
	 	$articulo = new Articulos();
	 	$articulo->setIdArticulo($id_articulo);	 	
		$articulo->setStockBajo($valor);
	 	
	 	// Actualizamos el Articulo en la BD
	 	$articulo_update = ArticulosPeer::doUpdate($articulo);
	 	
	 	if($articulo_update !== false)
	 	{
	 		// Guardamos la fecha de la última actualizacion
	 		$acc_admin = new Administracion();
	 		$acc_admin->actualizarFechaTiempoUltimaActualizacion(date('Y-m-d H:i:s'));
	 		
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}
	
	/**
	 * Comprobamos la fecha de la ultima actualizacion del stock
	 * 
	 * @return TRUE si podemos actualizar ya que ya ha pasado el tiempo, FALSE en caso contrario
	 */
	public function comprobarUltimaActualizacionStock()
	{
		// Obtenemos un objeto de la clase Administracion
		$this->acc_admin = new Administracion();
		
		// Obtenemos un objeto de la clase AccionesFechas
		$this->acc_fechas = new AccionesFechas();

		// Obtenemos el objeto de la tarea programada
		$obj_tarea_programada = $this->acc_admin->obtenerObjConfTareaProgramada();
		
		// Obtenemos la fecha actual
		$fecha_actual = date('Y-m-d H:i:s');
		
		// Obtenemos el tiempo de repeticion en segundos
		$tiempo_repeticion = $obj_tarea_programada->getTiempoRepeticion();
		
		// Obtenemos la fecha de la última actualizacion
		$ultima_actualizacion = $obj_tarea_programada->getFechaUltimaActualizacion();
		
		// Agregamos a la fecha actual el tiempo de repeticion
		$fecha_limite = $this->acc_fechas->dateadd($ultima_actualizacion,$dd=0, $mm=0, $yy=0, $hh=0, $mn=0,$tiempo_repeticion);
				
		$actualizamos = $this->acc_fechas->obtenerFechaMayor($fecha_actual,$fecha_limite);
		
		// Comprobamos si la fecha limite es mayor que la fecha de la ultima actualizacion
		// Si es mayor, devolvemos TRUE y actualizamos el STOCK
		return $actualizamos;
	}
	
	/**
	 * Agregar stock del articulo segun el id del articulo
	 * 
	 * @param integer $id_articulo Id del articulo a actualizar
	 * @param integer $cantidad    Cantidad de articulos a sumar al stock
	 */
	public function agregarStock($id_articulo,$cantidad)
	{
		$obj_articulo = $this->obtenerObjArticulo($id_articulo);
		
		$cantidad_old = $obj_articulo->getStock();
		
		// Creamos un nuevo objeto Articulo
	 	$articulo = new Articulos();
	 	$articulo->setIdArticulo($id_articulo);	
	 	$valor = $cantidad_old + $cantidad; 	
		$articulo->setStock($valor);
	 	
	 	// Actualizamos el Articulo en la BD
	 	$articulo_update = ArticulosPeer::doUpdate($articulo);
	 	
	 	if($articulo_update !== false)
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}
	
	/**
	 * Quitar stock del articulo segun el id del articulo
	 * 
	 * @param integer $id_articulo Id del articulo a actualizar
	 * @param integer $cantidad    Cantidad de articulos a restar al stock
	 */
	public function quitarStock($id_articulo,$cantidad)
	{
		$obj_articulo = $this->obtenerObjArticulo($id_articulo);
		
		$cantidad_old = $obj_articulo->getStock();
		
		// Creamos un nuevo objeto Articulo
	 	$articulo = new Articulos();
	 	$articulo->setIdArticulo($id_articulo);	
	 	$valor = $cantidad_old - $cantidad; 	
		$articulo->setStock($valor);
		
	 	// Actualizamos el Articulo en la BD
	 	$articulo_update = ArticulosPeer::doUpdate($articulo);
	 	
	 	if($articulo_update !== false)
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	}
	
	/**
	 * Obtener el objeto ArticulosXLote ordenados por la fecha más antigua
	 * 
	 * @param integer $id_articulo Id del articulo
	 * @param integer $cantidad    Limite articulos a buscar
	 * 
	 * @return objeto | false $ar_articulos_x_lote    Array de ArticulosXLote 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjArticulosXLote($id_articulo,$cantidad)
	{
		// Obtenemos el objeto articulo de Articulo		
		$articulos_x_lote = new Criteria();
		$articulos_x_lote->add(ArticulosXLotePeer::ID_ARTICULO,$id_articulo);
		$articulos_x_lote->setLimit($cantidad);
		$ar_articulos_x_lote = ArticulosXLotePeer::doSelect($articulos_x_lote);
				
		// Si está definido el objeto Articulo
		if(!empty($ar_articulos_x_lote))
		{
			return $ar_articulos_x_lote;
		}
		else
		{
			return false;
		}
	}
}
?>