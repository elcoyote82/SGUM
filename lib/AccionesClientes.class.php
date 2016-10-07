<?php
/**
 * Clase para gestionar todo lo relacionado con los clientes
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesClientes.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesClientes 
{
	/**
	 * Constructor de la clase AccionesClientes
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un objeto Cliente
	 * 
	 * @param string $nombre      Nombre del cliente
	 * @param string $cif_nif     CIF/NIF del cliente
	 * @param string $direccion   Dirección del cliente
	 * @param string $poblacion   Población del cliente
	 * @param string $provincia   Provincia del cliente
	 * @param string $cp          Código Postal del cliente
	 * @param string $pais        País del cliente	 
	 * @param string $telefono    Teléfono del cliente
	 * @param string $telefono2    Otro Teléfono del cliente
	 * @param string $movil       Móvil del cliente
	 * @param string $fax         Fax del cliente
	 * @param string $email       Email del cliente
	 * @param string $web         Web del cliente
	 * 
	 * @return integer | boolean $id_cliente_save ID del cliente, o FALSE si hubo un fallo
	 */
	public function guardarCliente($nombre,$cif_nif,$direccion,$poblacion,$provincia,$cp,
			$pais,$telefono,$telefono2,$movil,$fax,$email,$web)
	{
		// Creamos un nuevo objeto Cliente
		$cliente = new Clientes();
		$cliente->setNombre($nombre);
		$cliente->setCifNif($cif_nif);
		$cliente->setDireccion($direccion);
		$cliente->setPoblacion($poblacion);
		if($provincia) $cliente->setProvincia($provincia);
		$cliente->setCp($cp);
		$cliente->setPais($pais);
		$cliente->setTelefono($telefono);
		$cliente->setTelefono2($telefono2);
		$cliente->setMovil($movil);
		$cliente->setFax($fax);
		$cliente->setEmail($email);
		$cliente->setWeb($web);
		
		// Guardamos el cliente en la BD
		$cliente_salvado = $cliente->save();
		
		// Obtenemos el id del ultimo cliente insertado
		$id_cliente_save = $cliente->getIdCliente();
		
		if ($cliente_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del cliente que acabamos de guardar
			$key_cliente = sfConfig::get('app_private_key_clientes');
			
			// Creamos un nuevo objeto Cliente
			$cliente_act = new Clientes();
			$cliente_act->setIdCliente($id_cliente_save);
			
			// Generamos el id_md5 del Cliente
			$id_md5_cliente = hash_hmac('md5',$id_cliente_save,$key_cliente);
			$cliente_act->setIdMd5Cliente($id_md5_cliente);
			
			// Actualizamos el objeto Cliente
			$cliente_update = ClientesPeer::doUpdate($cliente_act);
			
			if($cliente_update !== false)
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
	 * Actualizamos un cliente de la tabla Clientes
	 * 
	 * @param integer $id_cliente Id del Cliente
	 * @param string $cif_nif     CIF/NIF del cliente
	 * @param string $direccion   Dirección del cliente
	 * @param string $poblacion   Población del cliente
	 * @param string $provincia   Provincia del cliente
	 * @param string $cp          Código Postal del cliente
	 * @param string $pais        País del cliente	 
	 * @param string $telefono    Teléfono del cliente
	 * @param string $telefono2   Otro Teléfono del cliente
	 * @param string $movil       Móvil del cliente
	 * @param string $fax         Fax del cliente
	 * @param string $email       Email del cliente
	 * @param string $web         Web del cliente
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarCliente($id_cliente,$nombre,$cif_nif,$direccion,$poblacion,$provincia,$cp,
			$pais,$telefono,$telefono2,$movil,$fax,$email,$web)
	 {
	 	// Creamos un nuevo objeto Cliente
	 	$cliente = new Clientes();
	 	$cliente->setIdCliente($id_cliente);
		$cliente->setNombre($nombre);
		$cliente->setCifNif($cif_nif);
		$cliente->setDireccion($direccion);
		$cliente->setPoblacion($poblacion);
		if($provincia) $cliente->setProvincia($provincia);
		$cliente->setCp($cp);
		$cliente->setPais($pais);
		$cliente->setTelefono($telefono);
		$cliente->setTelefono2($telefono2);
		$cliente->setMovil($movil);
		$cliente->setFax($fax);
		$cliente->setEmail($email);
		$cliente->setWeb($web);
	 	
	 	// Actualizamos el Cliente en la BD
	 	$cliente_update = ClientesPeer::doUpdate($cliente);
	 	
	 	return $cliente_update;
	 }
	 
	/**
	 * Borrar un cliente de la tabla Cliente
	 * 
	 * @param integer $id_cliente Id del cliente a borrar
	 */
	 public function borrarCliente($id_cliente)
	 {
	 	// Borramos el cliente de la tabla Cliente
	 	ClientesPeer::doDelete($id_cliente);
	 }
	
	/**
	 * Obtener el objeto Cliente a partir del id de cliente
	 * 
	 * @param integer $id_cliente Id del cliente
	 * 
	 * @return objeto | false $obj_cliente    Objeto Cliente buscado por el id del cliente, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjCliente($id_cliente)
	{
		// Obtenemos el objeto cliente de Cliente
		$obj_cliente = ClientesPeer::retrieveByPk($id_cliente);
		
		// Si está definido el objeto Cliente
		if(isset($obj_cliente))
		{
			return $obj_cliente;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del cliente a partir del Id Md5
	 * 
	 * @param  string  $id_md5_cliente   Id Md5 del cliente
	 * 
	 * @return integer $id_cliente Id del cliente
	 */
	public function obtenerIdClienteXIdMd5($id_md5_cliente)
	{
		// Obtenemos el objeto Cliente que tenga ese $id_md5
		$cliente = new Criteria();
		$cliente->add(ClientesPeer::ID_MD5_CLIENTE,$id_md5_cliente);
		$cliente1 = ClientesPeer::doSelect($cliente);
		
		// Si no se encuentra ningún objeto Cliente
		if(empty($cliente1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del cliente a partir del objeto Cliente
			$id_cliente = $cliente1[0]->getIdCliente();
			
			return $id_cliente;			
		}
	}
	
	/**
	 * Obtener todos los objetos Cliente
	 * 
	 * @return array $ar_clientes   Array de todos los objetos Cliente, FALSE en caso de que no haya
	 */
	public function obtenerTodosClientes()
	{
		// Obtenemos todos los clientes de la tabla Cliente
		$clientes = new Criteria();
		$ar_clientes = ClientesPeer::doSelect($clientes);
		
		// Si hay clientes
		if(!empty($ar_clientes))
		{
			return $ar_clientes;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Cliente a partir del id md5 del cliente
	 * 
	 * @param integer $id_md5_cliente Id Md5 del cliente
	 * 
	 * @return objeto $cliente  Objeto Cliente buscado por el id md5 del cliente
	 */
	public function obtenerObjClienteXIdMd5($id_md5_cliente)
	{
		// Obtenemos el id del cliente a partir del id md5
		$id_cliente = $this->obtenerIdClienteXIdMd5($id_md5_cliente);
		
		// Obtenemos el objeto Cliente
		$cliente = ClientesPeer::retrieveByPk($id_cliente);
		
		// Si está definido el objeto Cliente
		if(isset($cliente))
		{
			return $cliente;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Cliente a partir del id del cliente
	 * 
	 * @param  integer $id_cliente Id del cliente
	 * 
	 * @return string  $id_md5_cliente   Id Md5 del cliente
	 */
	public function obtenerIdMd5Cliente($id_cliente)
	{
		// Obtenemos el objeto cliente de Cliente
		$cliente = ClientesPeer::retrieveByPk($id_cliente);
		
		// Si está definido el objeto Cliente
		if(isset($cliente))
		{
			// Obtenemos el Id Md5 a partir del objeto Cliente
			$id_md5_cliente = $cliente->getIdMd5Cliente();
			
			return $id_md5_cliente;
		}
		else
		{
			return false;
		}
	}	
		
	/**
	 * Obtener un Select con todos los clientes de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_clientes  Array de clientes con llave el id del cliente y contenido el Nombre del cliente
	 */
	public function obtenerSelectClientes()
	{
		// Obtenemos todos los clientes
		$clientes = $this->obtenerTodosClientes();
		
		// Creamos un array con los clientes para el select del formulario
		$ar_clientes[0] = "";
		
		foreach($clientes as $cliente)
		{
			$cliente_nombre = $cliente->getNombre();
			$i = $cliente->getIdCliente();
			$ar_clientes[$i] = $cliente_nombre;
		}
		
		// Array con el nombre de los clientes y llave el id
		return $ar_clientes;
	}
	
	/**
	 * Obtener un Select con todos los clientes de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_clientes  Array de clientes con llave el id del cliente y contenido el Nombre del cliente
	 */
	public function obtenerSelectClientes2()
	{
		// Obtenemos todos los clientes
		$clientes = $this->obtenerTodosClientes();
		
		// Creamos un array con los clientes para el select del formulario
		$ar_clientes[0] = "-------";
		
		foreach($clientes as $cliente)
		{
			$cliente_nombre = $cliente->getNombre();
			$i = $cliente->getIdCliente();
			$ar_clientes[$i] = $cliente_nombre;
		}
		
		// Array con el nombre de los clientes y llave el id
		return $ar_clientes;
	}
	
	/**
	 * Obtener un Select con todos los clientes de la aplicacion
	 * ID = 0 -> "Seleccionar Cliente"
	 * 
	 * @return array $ar_clientes  Array de clientes con llave el id del cliente y contenido el Nombre del cliente
	 */
	public function obtenerSelectClientes3()
	{
		// Obtenemos todos los clientes
		$clientes = $this->obtenerTodosClientes();
		
		// Creamos un array con los clientes para el select del formulario
		$ar_clientes[0] = "Seleccionar Cliente";
		
		foreach($clientes as $cliente)
		{
			$cliente_nombre = $cliente->getNombre();
			$i = $cliente->getIdCliente();
			$ar_clientes[$i] = $cliente_nombre;
		}
		
		// Array con el nombre de los clientes y llave el id
		return $ar_clientes;
	}	
	
	/**
	 * Obtener el nombre del Cliente a partir del id de cliente
	 * 
	 * @param integer $id_cliente Id del cliente
	 * 
	 * @return string $nombre_cliente Nombre del Cliente
	 */
	public function obtenerNombreClienteXIdCliente($id_cliente)
	{
		// Obtenemos el objeto cliente de Clientes
		$obj_cliente = ClientesPeer::retrieveByPk($id_cliente);
		
		// Si está definido el objeto Cliente
		if(isset($obj_cliente))
		{
			return $obj_cliente->getNombre();
		}
		else
		{
			return '';
		}
	}
	
	
	/**
	 * Comprobar si un cliente está siendo usado
	 * 
	 * @param integer $id_cliente Id del cliente
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarCliente($id_cliente)
	{				
		// Buscamos si el cliente está siendo usado en la tabla Ventas
		$clientes = new Criteria();
		$clientes->add(VentasPeer::ID_CLIENTE,$id_cliente);		
		$clientes1 = VentasPeer::doSelect($clientes);
		
		// Si el proveedor no está vacio
		if(!empty($clientes1))
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