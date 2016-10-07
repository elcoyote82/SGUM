<?php
/**
 * Clase para gestionar todo lo relacionado con las ubicaciones de los articulos
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesUbicaciones.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesUbicaciones
{
	/**
	 * Constructor de la clase AccionesUbicaciones
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un objeto Ubicacion
	 * 
	 * @param string $nombre      Nombre de la ubicacion
	 * 
	 * @return integer | boolean $id_ubicacion_save ID de la ubicacion, o FALSE si hubo un fallo
	 */
	public function guardarUbicacion($nombre)
	{
		// Creamos un nuevo objeto Ubicacion
		$ubicacion = new Ubicaciones();
		$ubicacion->setNombre($nombre);
		$ubicacion->setIdEstadoUbicacion(1);
		
		// Guardamos el ubicacion en la BD
		$ubicacion_salvado = $ubicacion->save();
		
		// Obtenemos el id de la ultima ubicacion insertado
		$id_ubicacion_save = $ubicacion->getIdUbicacion();
		
		if ($ubicacion_salvado)
		{
			// Obtenemos la clave para generar el id_md5 de la ubicacion que acabamos de guardar
			$key_ubicacion = sfConfig::get('app_private_key_ubicaciones');
			
			// Creamos un nuevo objeto Ubicacion
			$ubicacion_act = new Ubicaciones();
			$ubicacion_act->setIdUbicacion($id_ubicacion_save);
			
			// Generamos el id_md5 de la Ubicacion
			$id_md5_ubicacion = hash_hmac('md5',$id_ubicacion_save,$key_ubicacion);
			$ubicacion_act->setIdMd5Ubicacion($id_md5_ubicacion);
			
			// Actualizamos el objeto Ubicacion
			$ubicacion_update = UbicacionesPeer::doUpdate($ubicacion_act);
			
			if($ubicacion_update !== false)
			{
				return true;
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
	 * Actualizamos una ubicacion de la tabla Ubicaciones
	 * 
	 * @param integer $id_ubicacion Id de la Ubicacion
	 * @param string  $nombre     Nombre de la ubicacion
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarUbicacion($id_ubicacion,$nombre,$id_estado_ubicacion)
	 {
	 	// Creamos un nuevo objeto Ubicacion
	 	$ubicacion = new Ubicaciones();
	 	$ubicacion->setIdUbicacion($id_ubicacion);
		$ubicacion->setNombre($nombre);		
		$ubicacion->setIdEstadoUbicacion($id_estado_ubicacion);
	 	
	 	// Actualizamos el Ubicacion en la BD
	 	$ubicacion_update = UbicacionesPeer::doUpdate($ubicacion);
	 	
	 	return $ubicacion_update;
	 }
	 	 
	/**
	 * Borrar una ubicacion de la tabla Ubicacion
	 * 
	 * @param integer $id_ubicacion Id de la ubicacion a borrar
	 */
	 public function borrarUbicacion($id_ubicacion)
	 {
	 	// Borramos el ubicacion de la tabla Ubicacion
	 	UbicacionesPeer::doDelete($id_ubicacion);
	 }
	
	/**
	 * Obtener el objeto Ubicacion a partir del id de ubicacion
	 * 
	 * @param integer $id_ubicacion Id de la ubicacion
	 * 
	 * @return objeto | false $obj_ubicacion    Objeto Ubicacion buscado por el id de la ubicacion, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjUbicacion($id_ubicacion)
	{
		// Obtenemos el objeto ubicacion de Ubicacion
		$obj_ubicacion = UbicacionesPeer::retrieveByPk($id_ubicacion);
		
		// Si está definido el objeto Ubicacion
		if(isset($obj_ubicacion))
		{
			return $obj_ubicacion;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id de la ubicacion a partir del Id Md5
	 * 
	 * @param  string  $id_md5_ubicacion   Id Md5 de la ubicacion
	 * 
	 * @return integer $id_ubicacion Id de la ubicacion
	 */
	public function obtenerIdUbicacionXIdMd5($id_md5_ubicacion)
	{
		// Obtenemos el objeto Ubicacion que tenga ese $id_md5
		$ubicacion = new Criteria();
		$ubicacion->add(UbicacionesPeer::ID_MD5_UBICACION,$id_md5_ubicacion);
		$ubicacion1 = UbicacionesPeer::doSelect($ubicacion);
		
		// Si no se encuentra ningún objeto Ubicacion
		if(empty($ubicacion1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id de la ubicacion a partir del objeto Ubicacion
			$id_ubicacion = $ubicacion1[0]->getIdUbicacion();
			
			return $id_ubicacion;			
		}
	}
	
	/**
	 * Obtener todos los objetos Ubicacion
	 * 
	 * @return array $ar_ubicaciones   Array de todos los objetos Ubicacion, FALSE en caso de que no haya
	 */
	public function obtenerTodosUbicaciones()
	{
		// Obtenemos todos los ubicaciones de la tabla Ubicacion
		$ubicaciones = new Criteria();
		$ar_ubicaciones = UbicacionesPeer::doSelect($ubicaciones);
		
		// Si hay ubicaciones
		if(!empty($ar_ubicaciones))
		{
			return $ar_ubicaciones;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Ubicacion a partir del id md5 de la ubicacion
	 * 
	 * @param integer $id_md5_ubicacion Id Md5 de la ubicacion
	 * 
	 * @return objeto $ubicacion  Objeto Ubicacion buscado por el id md5 de la ubicacion
	 */
	public function obtenerObjUbicacionXIdMd5($id_md5_ubicacion)
	{
		// Obtenemos el id de la ubicacion a partir del id md5
		$id_ubicacion = $this->obtenerIdUbicacionXIdMd5($id_md5_ubicacion);
		
		// Obtenemos el objeto Ubicacion
		$ubicacion = UbicacionesPeer::retrieveByPk($id_ubicacion);
		
		// Si está definido el objeto Ubicacion
		if(isset($ubicacion))
		{
			return $ubicacion;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Ubicacion a partir del id de la ubicacion
	 * 
	 * @param  integer $id_ubicacion Id de la ubicacion
	 * 
	 * @return string  $id_md5_ubicacion   Id Md5 de la ubicacion
	 */
	public function obtenerIdMd5Ubicacion($id_ubicacion)
	{
		// Obtenemos el objeto ubicacion de Ubicacion
		$ubicacion = UbicacionesPeer::retrieveByPk($id_ubicacion);
		
		// Si está definido el objeto Ubicacion
		if(isset($ubicacion))
		{
			// Obtenemos el Id Md5 a partir del objeto Ubicacion
			$id_md5_ubicacion = $ubicacion->getIdMd5Ubicacion();
			
			return $id_md5_ubicacion;
		}
		else
		{
			return false;
		}
	}	
		
	/**
	 * Obtener un Select con todos los ubicaciones de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_ubicaciones  Array de ubicaciones con llave el id de la ubicacion y contenido el Nombre de la ubicacion
	 */
	public function obtenerSelectUbicaciones()
	{
		// Obtenemos todos los ubicaciones
		$ubicaciones = $this->obtenerTodosUbicaciones();
		
		// Creamos un array con los ubicaciones para el select del formulario
		$ar_ubicaciones[0] = "";
		
		foreach($ubicaciones as $ubicacion)
		{
			$ubicacion_nombre = $ubicacion->getNombre();
			$i = $ubicacion->getIdUbicacion();
			$ar_ubicaciones[$i] = $ubicacion_nombre;
		}
		
		// Array con el nombre de los ubicaciones y llave el id
		return $ar_ubicaciones;
	}
	
	/**
	 * Obtener un Select con todos los ubicaciones de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_ubicaciones  Array de ubicaciones con llave el id de la ubicacion y contenido el Nombre de la ubicacion
	 */
	public function obtenerSelectUbicaciones2()
	{
		// Obtenemos todos los ubicaciones
		$ubicaciones = $this->obtenerTodosUbicaciones();
		
		// Creamos un array con los ubicaciones para el select del formulario
		$ar_ubicaciones[0] = "-------";
		
		foreach($ubicaciones as $ubicacion)
		{
			$ubicacion_nombre = $ubicacion->getNombre();
			$i = $ubicacion->getIdUbicacion();
			$ar_ubicaciones[$i] = $ubicacion_nombre;
		}
		
		// Array con el nombre de los ubicaciones y llave el id
		return $ar_ubicaciones;
	}
	
	/**
	 * Obtener un Select con todos los ubicaciones de la aplicacion
	 * ID = 0 -> "Seleccionar Ubicacion"
	 * 
	 * @return array $ar_ubicaciones  Array de ubicaciones con llave el id de la ubicacion y contenido el Nombre de la ubicacion
	 */
	public function obtenerSelectUbicaciones3()
	{
		// Obtenemos todos los ubicaciones
		$ubicaciones = $this->obtenerTodosUbicaciones();
		
		// Creamos un array con los ubicaciones para el select del formulario
		$ar_ubicaciones[0] = "Seleccionar Ubicación";
		
		foreach($ubicaciones as $ubicacion)
		{
			$ubicacion_nombre = $ubicacion->getNombre();
			$i = $ubicacion->getIdUbicacion();
			$ar_ubicaciones[$i] = $ubicacion_nombre;
		}
		
		// Array con el nombre de los ubicaciones y llave el id
		return $ar_ubicaciones;
	}	

	/**
	 * Obtener el nombre de la Ubicacion a partir del id de ubicacion
	 * 
	 * @param integer $id_ubicacion Id de la ubicacion
	 * 
	 * @return string $nombre_ubicacion Nombre de la Ubicacion
	 */
	public function obtenerNombreUbicacionXIdUbicacion($id_ubicacion)
	{
		// Obtenemos el objeto ubicacion de Ubicacion
		$obj_ubicacion = UbicacionesPeer::retrieveByPk($id_ubicacion);
		
		// Si está definido el objeto Ubicacion
		if(isset($obj_ubicacion))
		{
			return $obj_ubicacion->getNombre();
		}
		else
		{
			return '';
		}
	}
	
	/**
	 * Obtener array de UbicacionLote a partir del Id de la Ubicacion
	 * 
	 * @param integer $id_ubicacion ID de la ubicacion
	 * 
	 * @return array  $ar_articulos_x_ubicacion Articulos y lotes del articulo
	 */
	public function obtenerArticulosXIdUbicacion($id_ubicacion)
	{
		$articulos_x_ubicacion = new Criteria();
		$articulos_x_ubicacion->add(ArticulosXLotePeer::ID_UBICACION,$id_ubicacion);
		$articulos_x_ubicacion->addAscendingOrderByColumn(ArticulosXLotePeer::CREATED_AT);
		
		$ar_articulos_x_ubicacion = ArticulosXLotePeer::doSelect($articulos_x_ubicacion);
		
		if(isset($ar_articulos_x_ubicacion))
		{
			return $ar_articulos_x_ubicacion;
		}
		else
		{
			return false;
		}		
	}	
	
	/**
	 * Comprobar si una ubicación está siendo usado
	 * 
	 * @param integer $id_ubicacion Id de la ubicacion
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarUbicacion($id_ubicacion)
	{
		// Buscamos si la ubicación está siendo usado en la tabla ArticulosXLote
		$ubicacion = new Criteria();
		$ubicacion->add(ArticulosXLotePeer::ID_UBICACION,$id_ubicacion);		
		$ubicacion1 = ArticulosXLotePeer::doSelect($ubicacion);
		
		// Si la ubicación no está vacia
		if(!empty($ubicacion1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Actualizamos el estado de ocupacion de una ubicacion de la tabla Ubicaciones
	 * 
	 * @param integer $id_ubicacion 		Id de la Ubicacion
	 * @param string  $id_estado_ubicacion  Id Estado de la Ubicacion
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarEstadoUbicacion($id_ubicacion,$id_estado_ubicacion)
	 {
	 	// Creamos un nuevo objeto Ubicacion
	 	$ubicacion = new Ubicaciones();
	 	$ubicacion->setIdUbicacion($id_ubicacion);
		$ubicacion->setIdEstadoUbicacion($id_estado_ubicacion);
	 	
	 	// Actualizamos el Ubicacion en la BD
	 	$ubicacion_update = UbicacionesPeer::doUpdate($ubicacion);
	 	
	 	return $ubicacion_update;
	 }
	 
	 /**
	 * Actualizamos el estado de ocupacion de las Ubicaciones
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarCapacidadUbicaciones()
	 {
	 	// Obtenemos todas las ubicaciones
	 	$ar_ubicaciones = $this->obtenerTodosUbicaciones();
	 	
	 	foreach($ar_ubicaciones as $ubicacion)
	 	{
	 		// Buscamos el total de articulos colocados en esa ubicacion
	 		$total_articulos_ubicacion = $this->obtenerTotalArticulosUbicacion($ubicacion->getIdUbicacion());
	 		
	 		$id_ubicacion = $ubicacion->getIdUbicacion();
		 	$ubicaciones = new Ubicaciones();
		 	$ubicaciones->setIdUbicacion($id_ubicacion);
		 	
		 	if($total_articulos_ubicacion <= 5)
		 	{
		 		$id_estado_ubicacion = 1;
		 	}
		 	elseif($total_articulos_ubicacion <= 10)
		 	{
		 		$id_estado_ubicacion = 2;
		 	}
		 	elseif($total_articulos_ubicacion <= 20)
		 	{
		 		$id_estado_ubicacion = 3;
		 	}
		 	elseif($total_articulos_ubicacion <= 30)
		 	{
		 		$id_estado_ubicacion = 4;
		 	}
		 	elseif($total_articulos_ubicacion <= 40)
		 	{
		 		$id_estado_ubicacion = 5;
		 	}
		 	elseif($total_articulos_ubicacion <= 50)
		 	{
		 		$id_estado_ubicacion = 6;
		 	}
		 	elseif($total_articulos_ubicacion <= 60)
		 	{
		 		$id_estado_ubicacion = 7;
		 	}
		 	elseif($total_articulos_ubicacion <= 70)
		 	{
		 		$id_estado_ubicacion = 8;
		 	}
		 	elseif($total_articulos_ubicacion <= 80)
		 	{
		 		$id_estado_ubicacion = 9;
		 	}
		 	elseif($total_articulos_ubicacion <= 90)
		 	{
		 		$id_estado_ubicacion = 10;
		 	}
		 	elseif($total_articulos_ubicacion < 100)
		 	{
		 		$id_estado_ubicacion = 11;
		 	}
		 	elseif($total_articulos_ubicacion >= 100)
		 	{
		 		$id_estado_ubicacion = 12;
		 	}
		 	else
		 	{
		 		$id_estado_ubicacion = 0;
		 	}
		 	
		 	
			$ubicaciones->setIdEstadoUbicacion($id_estado_ubicacion);
		 	
		 	// Actualizamos el Ubicacion en la BD
		 	$ubicacion_update = UbicacionesPeer::doUpdate($ubicaciones);
	 	}
	 	
	 	return $ubicacion_update;
	 }
	 
	/**
	 * Obtenemos el total de articulos ubicados en una ubicacion
	 * 
	 * @return integer Total de articulos ubicados
	 */
	 public function obtenerTotalArticulosUbicacion($id_ubicacion)
	 {
	 	$ubicaciones = new Criteria();
	 	$ubicaciones->add(ArticulosXLotePeer::ID_UBICACION,$id_ubicacion);
	 	
	 	// Obtenemos el total de articulos almacenados en esa ubicacion
	 	$total_articulos_ubicacion = count(ArticulosXLotePeer::doSelect($ubicaciones));
	 	
	 	return $total_articulos_ubicacion;
	 }
}
?>