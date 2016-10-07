<?php
/**
 * Clase para gestionar todo lo relacionado con los proveedores
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesProveedores.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesProveedores 
{
	/**
	 * Constructor de la clase AccionesProveedores
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un objeto Proveedor
	 * 
	 * @param string $nombre      Nombre del proveedor
	 * @param string $cif_nif     CIF/NIF del proveedor
	 * @param string $direccion   Dirección del proveedor
	 * @param string $poblacion   Población del proveedor
	 * @param string $provincia   Provincia del proveedor
	 * @param string $cp          Código Postal del proveedor
	 * @param string $pais        País del proveedor	 
	 * @param string $telefono    Teléfono del proveedor
	 * @param string $telefono2    Otro Teléfono del proveedor
	 * @param string $movil       Móvil del proveedor
	 * @param string $fax         Fax del proveedor
	 * @param string $email       Email del proveedor
	 * @param string $web         Web del proveedor
	 * 
	 * @return integer | boolean $id_proveedor_save ID del proveedor, o FALSE si hubo un fallo
	 */
	public function guardarProveedor($nombre,$cif_nif,$direccion,$poblacion,$provincia,$cp,
			$pais,$telefono,$telefono2,$movil,$fax,$email,$web)
	{
		// Creamos un nuevo objeto Proveedor
		$proveedor = new Proveedores();
		$proveedor->setNombre($nombre);
		$proveedor->setCifNif($cif_nif);
		$proveedor->setDireccion($direccion);
		$proveedor->setPoblacion($poblacion);
		if($provincia) $proveedor->setProvincia($provincia);
		$proveedor->setCp($cp);
		$proveedor->setPais($pais);
		$proveedor->setTelefono($telefono);
		$proveedor->setTelefono2($telefono2);
		$proveedor->setMovil($movil);
		$proveedor->setFax($fax);
		$proveedor->setEmail($email);
		$proveedor->setWeb($web);
		
		// Guardamos el proveedor en la BD
		$proveedor_salvado = $proveedor->save();
		
		// Obtenemos el id del ultimo proveedor insertado
		$id_proveedor_save = $proveedor->getIdProveedor();
		
		if ($proveedor_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del proveedor que acabamos de guardar
			$key_proveedor = sfConfig::get('app_private_key_proveedores');
			
			// Creamos un nuevo objeto Proveedor
			$proveedor_act = new Proveedores();
			$proveedor_act->setIdProveedor($id_proveedor_save);
			
			// Generamos el id_md5 del Proveedor
			$id_md5_proveedor = hash_hmac('md5',$id_proveedor_save,$key_proveedor);
			$proveedor_act->setIdMd5Proveedor($id_md5_proveedor);
			
			// Actualizamos el objeto Proveedor
			$proveedor_update = ProveedoresPeer::doUpdate($proveedor_act);
			
			if($proveedor_update !== false)
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
	 * Actualizamos un proveedor de la tabla Proveedores
	 * 
	 * @param integer $id_proveedor Id del Proveedor
	 * @param string $cif_nif     CIF/NIF del proveedor
	 * @param string $direccion   Dirección del proveedor
	 * @param string $poblacion   Población del proveedor
	 * @param string $provincia   Provincia del proveedor
	 * @param string $cp          Código Postal del proveedor
	 * @param string $pais        País del proveedor	 
	 * @param string $telefono    Teléfono del proveedor
	 * @param string $telefono2   Otro Teléfono del proveedor
	 * @param string $movil       Móvil del proveedor
	 * @param string $fax         Fax del proveedor
	 * @param string $email       Email del proveedor
	 * @param string $web         Web del proveedor
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarProveedor($id_proveedor,$nombre,$cif_nif,$direccion,$poblacion,$provincia,$cp,
			$pais,$telefono,$telefono2,$movil,$fax,$email,$web)
	 {
	 	// Creamos un nuevo objeto Proveedor
	 	$proveedor = new Proveedores();
	 	$proveedor->setIdProveedor($id_proveedor);
		$proveedor->setNombre($nombre);
		$proveedor->setCifNif($cif_nif);
		$proveedor->setDireccion($direccion);
		$proveedor->setPoblacion($poblacion);
		if($provincia) $proveedor->setProvincia($provincia);
		$proveedor->setCp($cp);
		$proveedor->setPais($pais);
		$proveedor->setTelefono($telefono);
		$proveedor->setTelefono2($telefono2);
		$proveedor->setMovil($movil);
		$proveedor->setFax($fax);
		$proveedor->setEmail($email);
		$proveedor->setWeb($web);
	 	
	 	// Actualizamos el Proveedor en la BD
	 	$proveedor_update = ProveedoresPeer::doUpdate($proveedor);
	 	
	 	return $proveedor_update;
	 }
	 
	/**
	 * Borrar un proveedor de la tabla Proveedor
	 * 
	 * @param integer $id_proveedor Id del proveedor a borrar
	 */
	 public function borrarProveedor($id_proveedor)
	 {
	 	// Borramos el proveedor de la tabla Proveedor
	 	ProveedoresPeer::doDelete($id_proveedor);
	 }
	
	/**
	 * Obtener el objeto Proveedor a partir del id de proveedor
	 * 
	 * @param integer $id_proveedor Id del proveedor
	 * 
	 * @return objeto | false $obj_proveedor    Objeto Proveedor buscado por el id del proveedor, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjProveedor($id_proveedor)
	{
		// Obtenemos el objeto proveedor de Proveedor
		$obj_proveedor = ProveedoresPeer::retrieveByPk($id_proveedor);
		
		// Si está definido el objeto Proveedor
		if(isset($obj_proveedor))
		{
			return $obj_proveedor;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del proveedor a partir del Id Md5
	 * 
	 * @param  string  $id_md5_proveedor   Id Md5 del proveedor
	 * 
	 * @return integer $id_proveedor Id del proveedor
	 */
	public function obtenerIdProveedorXIdMd5($id_md5_proveedor)
	{
		// Obtenemos el objeto Proveedor que tenga ese $id_md5
		$proveedor = new Criteria();
		$proveedor->add(ProveedoresPeer::ID_MD5_PROVEEDOR,$id_md5_proveedor);
		$proveedor1 = ProveedoresPeer::doSelect($proveedor);
		
		// Si no se encuentra ningún objeto Proveedor
		if(empty($proveedor1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del proveedor a partir del objeto Proveedor
			$id_proveedor = $proveedor1[0]->getIdProveedor();
			
			return $id_proveedor;			
		}
	}
	
	/**
	 * Obtener todos los objetos Proveedor
	 * 
	 * @return array $ar_proveedores   Array de todos los objetos Proveedor, FALSE en caso de que no haya
	 */
	public function obtenerTodosProveedores()
	{
		// Obtenemos todos los proveedores de la tabla Proveedor
		$proveedores = new Criteria();
		$ar_proveedores = ProveedoresPeer::doSelect($proveedores);
		
		// Si hay proveedores
		if(!empty($ar_proveedores))
		{
			return $ar_proveedores;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Proveedor a partir del id md5 del proveedor
	 * 
	 * @param integer $id_md5_proveedor Id Md5 del proveedor
	 * 
	 * @return objeto $proveedor  Objeto Proveedor buscado por el id md5 del proveedor
	 */
	public function obtenerObjProveedorXIdMd5($id_md5_proveedor)
	{
		// Obtenemos el id del proveedor a partir del id md5
		$id_proveedor = $this->obtenerIdProveedorXIdMd5($id_md5_proveedor);
		
		// Obtenemos el objeto Proveedor
		$proveedor = ProveedoresPeer::retrieveByPk($id_proveedor);
		
		// Si está definido el objeto Proveedor
		if(isset($proveedor))
		{
			return $proveedor;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Proveedor a partir del id del proveedor
	 * 
	 * @param  integer $id_proveedor Id del proveedor
	 * 
	 * @return string  $id_md5_proveedor   Id Md5 del proveedor
	 */
	public function obtenerIdMd5Proveedor($id_proveedor)
	{
		// Obtenemos el objeto proveedor de Proveedor
		$proveedor = ProveedoresPeer::retrieveByPk($id_proveedor);
		
		// Si está definido el objeto Proveedor
		if(isset($proveedor))
		{
			// Obtenemos el Id Md5 a partir del objeto Proveedor
			$id_md5_proveedor = $proveedor->getIdMd5Proveedor();
			
			return $id_md5_proveedor;
		}
		else
		{
			return false;
		}
	}	
		
	/**
	 * Obtener un Select con todos los proveedores de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_proveedores  Array de proveedores con llave el id del proveedor y contenido el Nombre del proveedor
	 */
	public function obtenerSelectProveedores()
	{
		// Obtenemos todos los proveedores
		$proveedores = $this->obtenerTodosProveedores();
		
		// Creamos un array con los proveedores para el select del formulario
		$ar_proveedores[0] = "";
		
		foreach($proveedores as $proveedor)
		{
			$proveedor_nombre = $proveedor->getNombre();
			$i = $proveedor->getIdProveedor();
			$ar_proveedores[$i] = $proveedor_nombre;
		}
		
		// Array con el nombre de los proveedores y llave el id
		return $ar_proveedores;
	}
	
	/**
	 * Obtener un Select con todos los proveedores de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_proveedores  Array de proveedores con llave el id del proveedor y contenido el Nombre del proveedor
	 */
	public function obtenerSelectProveedores2()
	{
		// Obtenemos todos los proveedores
		$proveedores = $this->obtenerTodosProveedores();
		
		// Creamos un array con los proveedores para el select del formulario
		$ar_proveedores[0] = "-------";
		
		foreach($proveedores as $proveedor)
		{
			$proveedor_nombre = $proveedor->getNombre();
			$i = $proveedor->getIdProveedor();
			$ar_proveedores[$i] = $proveedor_nombre;
		}
		
		// Array con el nombre de los proveedores y llave el id
		return $ar_proveedores;
	}
	
	/**
	 * Obtener un Select con todos los proveedores de la aplicacion
	 * ID = 0 -> "Seleccionar Proveedor"
	 * 
	 * @return array $ar_proveedores  Array de proveedores con llave el id del proveedor y contenido el Nombre del proveedor
	 */
	public function obtenerSelectProveedores3()
	{
		// Obtenemos todos los proveedores
		$proveedores = $this->obtenerTodosProveedores();
		
		// Creamos un array con los proveedores para el select del formulario
		$ar_proveedores[0] = "Seleccionar Proveedor";
		
		foreach($proveedores as $proveedor)
		{
			$proveedor_nombre = $proveedor->getNombre();
			$i = $proveedor->getIdProveedor();
			$ar_proveedores[$i] = $proveedor_nombre;
		}
		
		// Array con el nombre de los proveedores y llave el id
		return $ar_proveedores;
	}	
	
	/**
	 * Obtener el nombre del Proveedor a partir del id de proveedor
	 * 
	 * @param integer $id_proveedor Id del proveedor
	 * 
	 * @return string $nombre_proveedor Nombre del Proveedor
	 */
	public function obtenerNombreProveedorXIdProveedor($id_proveedor)
	{
		// Obtenemos el objeto proveedor de Proveedores
		$obj_proveedor = ProveedoresPeer::retrieveByPk($id_proveedor);
		
		// Si está definido el objeto Proveedor
		if(isset($obj_proveedor))
		{
			return $obj_proveedor->getNombre();
		}
		else
		{
			return '';
		}
	}
	
	
	/**
	 * Comprobar si un proveedor está siendo usado
	 * 
	 * @param integer $id_proveedor Id del proveedor
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarProveedor($id_proveedor)
	{
		// Buscamos si el proveedor está siendo usado en la tabla ArticulosXProveedor
		$proveedores = new Criteria();
		$proveedores->add(ArticulosXProveedorPeer::ID_PROVEEDOR,$id_proveedor);		
		$proveedores1 = ArticulosXProveedorPeer::doSelect($proveedores);
				
		// Buscamos si el proveedor está siendo usado en la tabla Pedidos
		$proveedores = new Criteria();
		$proveedores->add(PedidosPeer::ID_PROVEEDOR,$id_proveedor);		
		$proveedores2 = PedidosPeer::doSelect($proveedores);
		
		// Si el proveedor no está vacio
		if(!empty($proveedores1) || !empty($proveedores2))
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