<?php
/**
 * Clase para gestionar todo lo relacionado con las familias de los articulos
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesFamilias.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesFamilias
{
	/**
	 * Constructor de la clase AccionesFamilias
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un objeto Familia
	 * 
	 * @param string $nombre      Nombre del familia
	 * 
	 * @return integer | boolean $id_familia_save ID del familia, o FALSE si hubo un fallo
	 */
	public function guardarFamilia($nombre)
	{
		// Creamos un nuevo objeto Familia
		$familia = new Familias();
		$familia->setNombre($nombre);
		
		// Guardamos el familia en la BD
		$familia_salvado = $familia->save();
		
		// Obtenemos el id del ultimo familia insertado
		$id_familia_save = $familia->getIdFamilia();
		
		if ($familia_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del familia que acabamos de guardar
			$key_familia = sfConfig::get('app_private_key_familias');
			
			// Creamos un nuevo objeto Familia
			$familia_act = new Familias();
			$familia_act->setIdFamilia($id_familia_save);
			
			// Generamos el id_md5 del Familia
			$id_md5_familia = hash_hmac('md5',$id_familia_save,$key_familia);
			$familia_act->setIdMd5Familia($id_md5_familia);
			
			// Actualizamos el objeto Familia
			$familia_update = FamiliasPeer::doUpdate($familia_act);
			
			if($familia_update !== false)
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
	 * Actualizamos una familia de la tabla Familias
	 * 
	 * @param integer $id_familia Id del Familia
	 * @param string  $nombre     Nombre de la familia
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarFamilia($id_familia,$nombre)
	 {
	 	// Creamos un nuevo objeto Familia
	 	$familia = new Familias();
	 	$familia->setIdFamilia($id_familia);
		$familia->setNombre($nombre);
	 	
	 	// Actualizamos el Familia en la BD
	 	$familia_update = FamiliasPeer::doUpdate($familia);
	 	
	 	return $familia_update;
	 }
	 
	/**
	 * Borrar una familia de la tabla Familia
	 * 
	 * @param integer $id_familia Id del familia a borrar
	 */
	 public function borrarFamilia($id_familia)
	 {
	 	// Borramos el familia de la tabla Familia
	 	FamiliasPeer::doDelete($id_familia);
	 }
	
	/**
	 * Obtener el objeto Familia a partir del id de familia
	 * 
	 * @param integer $id_familia Id del familia
	 * 
	 * @return objeto | false $obj_familia    Objeto Familia buscado por el id del familia, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjFamilia($id_familia)
	{
		// Obtenemos el objeto familia de Familia
		$obj_familia = FamiliasPeer::retrieveByPk($id_familia);
		
		// Si está definido el objeto Familia
		if(isset($obj_familia))
		{
			return $obj_familia;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del familia a partir del Id Md5
	 * 
	 * @param  string  $id_md5_familia   Id Md5 del familia
	 * 
	 * @return integer $id_familia Id del familia
	 */
	public function obtenerIdFamiliaXIdMd5($id_md5_familia)
	{
		// Obtenemos el objeto Familia que tenga ese $id_md5
		$familia = new Criteria();
		$familia->add(FamiliasPeer::ID_MD5_FAMILIA,$id_md5_familia);
		$familia1 = FamiliasPeer::doSelect($familia);
		
		// Si no se encuentra ningún objeto Familia
		if(empty($familia1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del familia a partir del objeto Familia
			$id_familia = $familia1[0]->getIdFamilia();
			
			return $id_familia;			
		}
	}
	
	/**
	 * Obtener todos los objetos Familia
	 * 
	 * @return array $ar_familias   Array de todos los objetos Familia, FALSE en caso de que no haya
	 */
	public function obtenerTodosFamilias()
	{
		// Obtenemos todos los familias de la tabla Familia
		$familias = new Criteria();
		$ar_familias = FamiliasPeer::doSelect($familias);
		
		// Si hay familias
		if(!empty($ar_familias))
		{
			return $ar_familias;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Familia a partir del id md5 del familia
	 * 
	 * @param integer $id_md5_familia Id Md5 del familia
	 * 
	 * @return objeto $familia  Objeto Familia buscado por el id md5 del familia
	 */
	public function obtenerObjFamiliaXIdMd5($id_md5_familia)
	{
		// Obtenemos el id del familia a partir del id md5
		$id_familia = $this->obtenerIdFamiliaXIdMd5($id_md5_familia);
		
		// Obtenemos el objeto Familia
		$familia = FamiliasPeer::retrieveByPk($id_familia);
		
		// Si está definido el objeto Familia
		if(isset($familia))
		{
			return $familia;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Familia a partir del id del familia
	 * 
	 * @param  integer $id_familia Id del familia
	 * 
	 * @return string  $id_md5_familia   Id Md5 del familia
	 */
	public function obtenerIdMd5Familia($id_familia)
	{
		// Obtenemos el objeto familia de Familia
		$familia = FamiliasPeer::retrieveByPk($id_familia);
		
		// Si está definido el objeto Familia
		if(isset($familia))
		{
			// Obtenemos el Id Md5 a partir del objeto Familia
			$id_md5_familia = $familia->getIdMd5Familia();
			
			return $id_md5_familia;
		}
		else
		{
			return false;
		}
	}	
	
	/**
	 * Obtener array de Articulos a partir del Id de la Familia
	 * 
	 * @param integer $id_familia ID de la familia
	 * 
	 * @return array  $ar_articulos_x_familia Array de articulos
	 */
	public function obtenerArticulosXIdFamilia($id_familia)
	{
		$articulos_x_familia = new Criteria();
		$articulos_x_familia->add(ArticulosPeer::ID_FAMILIA,$id_familia);
		$articulos_x_familia->addAscendingOrderByColumn(ArticulosPeer::NOMBRE);
		
		$ar_articulos_x_familia = ArticulosPeer::doSelect($articulos_x_familia);
		
		if(isset($ar_articulos_x_familia))
		{
			return $ar_articulos_x_familia;
		}
		else
		{
			return false;
		}		
	}	
		
	/**
	 * Obtener un Select con todos los familias de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_familias  Array de familias con llave el id del familia y contenido el Nombre del familia
	 */
	public function obtenerSelectFamilias()
	{
		// Obtenemos todos los familias
		$familias = $this->obtenerTodosFamilias();
		
		// Creamos un array con los familias para el select del formulario
		$ar_familias[0] = "";
		
		foreach($familias as $familia)
		{
			$familia_nombre = $familia->getNombre();
			$i = $familia->getIdFamilia();
			$ar_familias[$i] = $familia_nombre;
		}
		
		// Array con el nombre de los familias y llave el id
		return $ar_familias;
	}
	
	/**
	 * Obtener un Select con todos los familias de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_familias  Array de familias con llave el id del familia y contenido el Nombre del familia
	 */
	public function obtenerSelectFamilias2()
	{
		// Obtenemos todos los familias
		$familias = $this->obtenerTodosFamilias();
		
		// Creamos un array con los familias para el select del formulario
		$ar_familias[0] = "-------";
		
		foreach($familias as $familia)
		{
			$familia_nombre = $familia->getNombre();
			$i = $familia->getIdFamilia();
			$ar_familias[$i] = $familia_nombre;
		}
		
		// Array con el nombre de los familias y llave el id
		return $ar_familias;
	}
	
	/**
	 * Obtener un Select con todos los familias de la aplicacion
	 * ID = 0 -> "Seleccionar Familia"
	 * 
	 * @return array $ar_familias  Array de familias con llave el id del familia y contenido el Nombre del familia
	 */
	public function obtenerSelectFamilias3()
	{
		// Obtenemos todos los familias
		$familias = $this->obtenerTodosFamilias();
		
		// Creamos un array con los familias para el select del formulario
		$ar_familias[0] = "Seleccionar Familia";
		
		foreach($familias as $familia)
		{
			$familia_nombre = $familia->getNombre();
			$i = $familia->getIdFamilia();
			$ar_familias[$i] = $familia_nombre;
		}
		
		// Array con el nombre de los familias y llave el id
		return $ar_familias;
	}
	
	
	/**
	 * Comprobar si una familia está siendo usado
	 * 
	 * @param integer $id_familia Id de la familia
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarFamilia($id_familia)
	{
		// Buscamos si la familia está siendo usado en la tabla Articulos
		$familias = new Criteria();
		$familias->add(ArticulosPeer::ID_FAMILIA,$id_familia);		
		$familias1 = ArticulosPeer::doSelect($familias);
		
		// Si la familia no está vacio
		if(!empty($familias1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}		
}
?>