<?php
/**
 * Clase para gestionar todo lo relacionado con los contactos
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesContactos.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesContactos 
{
	/**
	 * Constructor de la clase AccionesContactos
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un objeto Contacto
	 *
	 * @param string $id_contactado		Id del proveedor o del cliente
	 * @param string $id_jefe			Id del jefe
	 * @param string $nombre			Nombre del contacto
	 * @param string $apellidos			Apellidos del contacto
	 * @param string $puesto			Puesto del contacto
	 * @param string $direccion			Dirección del contacto
	 * @param string $cp				Código Postal del contacto
	 * @param string $localidad			Localidad del contacto
	 * @param string $provincia			Provincia del contacto
	 * @param string $pais				País del contacto
	 * @param string $telefono			Teléfono del contacto
	 * @param string $ext_telefono		Extensión Teléfono del contacto
	 * @param string $telefono_otro		Teléfono Otro del contacto
	 * @param string $telefono_trabajo	Teléfono Trabajo del contacto
	 * @param string $movil				Móvil del contacto
	 * @param string $fax				Fax del contacto
	 * @param string $email				Email del contacto
	 * @param string $email2			Email2 del contacto
	 * @param string $email3			Email3 del contacto
	 * @param string $observaciones		Observaciones del contacto
	 * @param enum   $opcion			Opcion, 0 es Proveedor, 1 es Cliente
	 * 
	 * @return integer | boolean $id_contacto_save ID del contacto, o FALSE si hubo un fallo
	 */
	public function guardarContacto($id_contactado,$id_jefe,$nombre,$apellidos,$puesto,$direccion,$cp,$localidad,
					$provincia,$pais,$telefono,$ext_telefono,$telefono_otro,$telefono_trabajo,$movil,$fax,
					$email,$email2,$email3,$observaciones,$opcion_contacto)
	{
		// Creamos un nuevo objeto Contacto
		$contacto = new Contactos();
		$contacto->setIdContactado($id_contactado);
		$contacto->setIdJefe($id_jefe);
		$contacto->setNombre($nombre);
		$contacto->setApellidos($apellidos);
		$contacto->setPuesto($puesto);
		$contacto->setDireccion($direccion);
		$contacto->setCp($cp);
		$contacto->setLocalidad($localidad);
		if($provincia) $contacto->setProvincia($provincia);
		$contacto->setPais($pais);
		$contacto->setTelefono($telefono);
		$contacto->setExtTelefono($ext_telefono);
		$contacto->setTelefonoOtro($telefono_otro);		
		$contacto->setTelefonoTrabajo($telefono_trabajo);
		$contacto->setMovil($movil);
		$contacto->setFax($fax);
		$contacto->setEmail($email);
		$contacto->setEmailDos($email2);
		$contacto->setEmailTres($email3);
		$contacto->setObservaciones($observaciones);
		$contacto->setOpcion($opcion_contacto);
		
		// Guardamos el contacto en la BD
		$contacto_salvado = $contacto->save();
		
		// Obtenemos el id del ultimo contacto insertado
		$id_contacto_save = $contacto->getIdContacto();
		
		if ($contacto_salvado)
		{
			// Obtenemos la clave para generar el id_md5 del contacto que acabamos de guardar
			$key_contacto = sfConfig::get('app_private_key_contactos');
			
			// Creamos un nuevo objeto Contacto
			$contacto_act = new Contactos();
			$contacto_act->setIdContacto($id_contacto_save);
			
			// Generamos el id_md5 del Contacto
			$id_md5_contacto = hash_hmac('md5',$id_contacto_save,$key_contacto);
			$contacto_act->setIdMd5Contacto($id_md5_contacto);
			
			// Actualizamos el objeto Contacto
			$contacto_update = ContactosPeer::doUpdate($contacto_act);
			
			if($contacto_update !== false)
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
	 * Actualizamos un contacto de la tabla Contactos
	 * 
	 * @param integer $id_contacto		Id del Contacto
	 * @param string $id_contactado		Id del proveedor o del cliente
	 * @param string $id_jefe			Id del jefe
	 * @param string $nombre			Nombre del contacto
	 * @param string $apellidos			Apellidos del contacto
	 * @param string $puesto			Puesto del contacto
	 * @param string $direccion			Dirección del contacto
	 * @param string $cp				Código Postal del contacto
	 * @param string $localidad			Localidad del contacto
	 * @param string $provincia			Provincia del contacto
	 * @param string $pais				País del contacto
	 * @param string $telefono			Teléfono del contacto
	 * @param string $ext_telefono		Extensión Teléfono del contacto
	 * @param string $telefono_otro		Teléfono Otro del contacto
	 * @param string $telefono_trabajo	Teléfono Trabajo del contacto
	 * @param string $movil				Móvil del contacto
	 * @param string $fax				Fax del contacto
	 * @param string $email				Email del contacto
	 * @param string $email2			Email2 del contacto
	 * @param string $email3			Email3 del contacto
	 * @param string $observaciones		Observaciones del contacto
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarContacto($id_contacto,$id_contactado,$id_jefe,$nombre,$apellidos,$puesto,$direccion,$cp,$localidad,
					$provincia,$pais,$telefono,$ext_telefono,$telefono_otro,$telefono_trabajo,$movil,$fax,
					$email,$email2,$email3,$observaciones)
	 {
	 	// Creamos un nuevo objeto Contacto
	 	$contacto = new Contactos();
	 	$contacto->setIdContacto($id_contacto);
		$contacto->setIdContactado($id_contactado);
		$contacto->setIdJefe($id_jefe);
		$contacto->setNombre($nombre);
		$contacto->setApellidos($apellidos);
		$contacto->setPuesto($puesto);
		$contacto->setDireccion($direccion);
		$contacto->setCp($cp);
		$contacto->setLocalidad($localidad);
		if($provincia) $contacto->setProvincia($provincia);
		$contacto->setPais($pais);
		$contacto->setTelefono($telefono);
		$contacto->setExtTelefono($ext_telefono);
		$contacto->setTelefonoOtro($telefono_otro);		
		$contacto->setTelefonoTrabajo($telefono_trabajo);
		$contacto->setMovil($movil);
		$contacto->setFax($fax);
		$contacto->setEmail($email);
		$contacto->setEmailDos($email2);
		$contacto->setEmailTres($email3);
		$contacto->setObservaciones($observaciones);
	 	
	 	// Actualizamos el Contacto en la BD
	 	$contacto_update = ContactosPeer::doUpdate($contacto);
	 	
	 	return $contacto_update;
	 }
	 
	/**
	 * Borrar un contacto de la tabla Contacto
	 * 
	 * @param integer $id_contacto Id del contacto a borrar
	 */
	 public function borrarContacto($id_contacto)
	 {
	 	// Borramos el contacto de la tabla Contacto
	 	ContactosPeer::doDelete($id_contacto);
	 }
	
	/**
	 * Obtener el objeto Contacto a partir del id de contacto
	 * 
	 * @param integer $id_contacto Id del contacto
	 * 
	 * @return objeto | false $obj_contacto    Objeto Contacto buscado por el id del contacto, 
	 * 												FALSE en caso de no existir
	 */
	public function obtenerObjContacto($id_contacto)
	{
		// Obtenemos el objeto contacto de Contacto
		$obj_contacto = ContactosPeer::retrieveByPk($id_contacto);
		
		// Si está definido el objeto Contacto
		if(isset($obj_contacto))
		{
			return $obj_contacto;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del contacto a partir del Id Md5
	 * 
	 * @param  string  $id_md5_contacto   Id Md5 del contacto
	 * 
	 * @return integer $id_contacto Id del contacto
	 */
	public function obtenerIdContactoXIdMd5($id_md5_contacto)
	{
		// Obtenemos el objeto Contacto que tenga ese $id_md5
		$contacto = new Criteria();
		$contacto->add(ContactosPeer::ID_MD5_CONTACTO,$id_md5_contacto);
		$contacto1 = ContactosPeer::doSelect($contacto);
		
		// Si no se encuentra ningún objeto Contacto
		if(empty($contacto1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del contacto a partir del objeto Contacto
			$id_contacto = $contacto1[0]->getIdContacto();
			
			return $id_contacto;			
		}
	}
	
	/**
	 * Obtener todos los objetos Contacto
	 * 
	 * @return array $ar_contactos   Array de todos los objetos Contacto, FALSE en caso de que no haya
	 */
	public function obtenerTodosContactos()
	{
		// Obtenemos todos los contactos de la tabla Contacto
		$contactos = new Criteria();
		$ar_contactos = ContactosPeer::doSelect($contactos);
		
		// Si hay contactos
		if(!empty($ar_contactos))
		{
			return $ar_contactos;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos Contacto de los Proveedores
	 * 
	 * @return array $ar_contactos   Array de todos los objetos Contacto de los Proveedores, 
	 * 								 FALSE en caso de que no haya
	 */
	public function obtenerTodosContactosProveedores()
	{
		// Obtenemos todos los contactos de la tabla Contacto
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::OPCION,'0');
		$ar_contactos = ContactosPeer::doSelect($contactos);
		
		// Si hay contactos
		if(!empty($ar_contactos))
		{
			return $ar_contactos;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los objetos Contacto de los Clientes
	 * 
	 * @return array $ar_contactos   Array de todos los objetos Contacto de los Clientes, 
	 * 								 FALSE en caso de que no haya
	 */
	public function obtenerTodosContactosClientes()
	{
		// Obtenemos todos los contactos de la tabla Contacto
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::OPCION,'1');
		$ar_contactos = ContactosPeer::doSelect($contactos);
		
		// Si hay contactos
		if(!empty($ar_contactos))
		{
			return $ar_contactos;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Contacto a partir del id md5 del contacto
	 * 
	 * @param integer $id_md5_contacto Id Md5 del contacto
	 * 
	 * @return objeto $contacto  Objeto Contacto buscado por el id md5 del contacto
	 */
	public function obtenerObjContactoXIdMd5($id_md5_contacto)
	{
		// Obtenemos el id del contacto a partir del id md5
		$id_contacto = $this->obtenerIdContactoXIdMd5($id_md5_contacto);
		
		// Obtenemos el objeto Contacto
		$contacto = ContactosPeer::retrieveByPk($id_contacto);
		
		// Si está definido el objeto Contacto
		if(isset($contacto))
		{
			return $contacto;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Contacto a partir del id del contacto
	 * 
	 * @param  integer $id_contacto Id del contacto
	 * 
	 * @return string  $id_md5_contacto   Id Md5 del contacto
	 */
	public function obtenerIdMd5Contacto($id_contacto)
	{
		// Obtenemos el objeto contacto de Contacto
		$contacto = ContactosPeer::retrieveByPk($id_contacto);
		
		// Si está definido el objeto Contacto
		if(isset($contacto))
		{
			// Obtenemos el Id Md5 a partir del objeto Contacto
			$id_md5_contacto = $contacto->getIdMd5Contacto();
			
			return $id_md5_contacto;
		}
		else
		{
			return false;
		}
	}	
		
	/**
	 * Obtener un Select con todos los contactos de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_contactos  Array de contactos con llave el id del contacto y contenido el Nombre del contacto
	 */
	public function obtenerSelectContactos()
	{
		// Obtenemos todos los contactos
		$contactos = $this->obtenerTodosContactos();
		
		// Creamos un array con los contactos para el select del formulario
		$ar_contactos[0] = "";
		
		foreach($contactos as $contacto)
		{
			$contacto_nombre = $contacto->getNombre();
			$i = $contacto->getIdContacto();
			$ar_contactos[$i] = $contacto_nombre;
		}
		
		// Array con el nombre de los contactos y llave el id
		return $ar_contactos;
	}
	
	/**
	 * Obtener un Select con todos los contactos de la aplicacion
	 * ID = 0 -> "-------"
	 * 
	 * @return array $ar_contactos  Array de contactos con llave el id del contacto y contenido el Nombre del contacto
	 */
	public function obtenerSelectContactos2()
	{
		// Obtenemos todos los contactos
		$contactos = $this->obtenerTodosContactos();
		
		// Creamos un array con los contactos para el select del formulario
		$ar_contactos[0] = "-------";
		
		foreach($contactos as $contacto)
		{
			$contacto_nombre = $contacto->getNombre();
			$i = $contacto->getIdContacto();
			$ar_contactos[$i] = $contacto_nombre;
		}
		
		// Array con el nombre de los contactos y llave el id
		return $ar_contactos;
	}
	
	/**
	 * Obtener un Select con todos los contactos de la aplicacion
	 * ID = 0 -> "Seleccionar Contacto"
	 * 
	 * @return array $ar_contactos  Array de contactos con llave el id del contacto y contenido el Nombre del contacto
	 */
	public function obtenerSelectContactos3()
	{
		// Obtenemos todos los contactos
		$contactos = $this->obtenerTodosContactos();
		
		// Creamos un array con los contactos para el select del formulario
		$ar_contactos[0] = "Seleccionar Contacto";
		
		foreach($contactos as $contacto)
		{
			$contacto_nombre = $contacto->getNombre();
			$i = $contacto->getIdContacto();
			$ar_contactos[$i] = $contacto_nombre;
		}
		
		// Array con el nombre de los contactos y llave el id
		return $ar_contactos;
	}

	/**
	 * Obtener un array con todos los contactos segun el id de proveedor
	 * 
	 * @param integer $id_proveedor      Id del Proveedor
	 * 
	 * @return array $ar_contactos  Array de contactos del proveedor escogido
	 */
	public function obtenerContactosXIdProveedor($id_proveedor)
	{
		// Obtenemos todos los contactos de la tabla Contacto
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::ID_CONTACTADO,$id_proveedor);
		$contactos->add(ContactosPeer::OPCION,'0');
		$ar_contactos = ContactosPeer::doSelect($contactos);
		
		// Si hay contactos
		if(!empty($ar_contactos))
		{
			return $ar_contactos;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener un array con todos los contactos segun el id de cliente
	 * 
	 * @param integer $id_cliente      Id del Cliente
	 * 
	 * @return array $ar_contactos  Array de contactos del cliente escogido
	 */
	public function obtenerContactosXIdCliente($id_cliente)
	{
		// Obtenemos todos los contactos de la tabla Contacto
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::ID_CONTACTADO,$id_cliente);
		$contactos->add(ContactosPeer::OPCION,'1');
		$ar_contactos = ContactosPeer::doSelect($contactos);
		
		// Si hay contactos
		if(!empty($ar_contactos))
		{
			return $ar_contactos;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Obtener un Select con todos los contactos de los proveedores
	 * ID = 0 -> ""
	 * 
	 * @param integer $id_proveedor      Id del Proveedor
	 * 
	 * @return array $ar_jefes  Array de contactos con llave el id del contacto y 
	 * 							contenido el Nombre del contacto
	 */
	public function obtenerSelectContactosXIdProveedor($id_proveedor)
	{
		// Obtenemos todos los contactos
		$contactos = $this->obtenerContactosXIdProveedor($id_proveedor);
		
		if($contactos)
		{
			// Creamos un array con los contactos para el select del formulario
			$ar_contactos[0] = "";
			
			foreach($contactos as $contacto)
			{
				$contacto_nombre = $contacto->getNombre()." ".$contacto->getApellidos();
				$i = $contacto->getIdContacto();
				$ar_contactos[$i] = $contacto_nombre;
			}
		}
		else
		{
			$ar_contactos = false;
		}
		// Array con el nombre de los contactos y llave el id
		return $ar_contactos;
	}

	/**
	 * Obtener un Select con todos los contactos segun el id del cliente
	 * ID = 0 -> ""
	 * 
	 * @param integer $id_cliente      Id del Cliente
	 * 
	 * @return array $ar_jefes  Array de contactos con llave el id del contacto y 
	 * 							contenido el Nombre del contacto
	 */
	public function obtenerSelectContactosXIdCliente($id_cliente)
	{
		// Obtenemos todos los contactos
		$contactos = $this->obtenerContactosXIdCliente($id_cliente);
		
		if($contactos)
		{
			// Creamos un array con los contactos para el select del formulario
			$ar_contactos[0] = "";
			
			foreach($contactos as $contacto)
			{
				$contacto_nombre = $contacto->getNombre()." ".$contacto->getApellidos();
				$i = $contacto->getIdContacto();
				$ar_contactos[$i] = $contacto_nombre;
			}
		}
		else
		{
			$ar_contactos = false;
		}
		
		// Array con el nombre de los contactos y llave el id
		return $ar_contactos;
	}
	
	
	/**
	 * Obtenemos el nombe del Proveedor a través del id del contactado
	 * 
	 * @param integer $id_proveedor      Id del Proveedor
	 * 
	 * @return string $nombre_proveedor  Nombre del Proveedor
	 */
	public function obtenerNombreProveedorXIdContactado($id_proveedor)
	{
		// Obtenemos un objeto de la clase Proveedores
		$acc_proveedores = new AccionesProveedores();
		
		// Obtenemos el objeto Proveedor
		$obj_proveedor = $acc_proveedores->obtenerObjProveedor($id_proveedor);
		
		$nombre_proveedor = $obj_proveedor->getNombre();
		
		if($nombre_proveedor)
			return $nombre_proveedor;
		else
			return '';		
	}	
	
	/**
	 * Obtenemos el nombe del Cliente a través del id del contactado
	 * 
	 * @param integer $id_cliente     Id del Cliente
	 * 
	 * @return string $nombre_cliente  Nombre del Cliente
	 */
	public function obtenerNombreClienteXIdContactado($id_cliente)
	{
		// Obtenemos un objeto de la clase Clientes
		$acc_clientes = new AccionesClientes();
		
		// Obtenemos el objeto Proveedor
		$obj_cliente = $acc_clientes->obtenerObjCliente($id_cliente);
		
		$nombre_cliente = $obj_cliente->getNombre();
		
		if($nombre_cliente)
			return $nombre_cliente;
		else
			return '';		
	}
		
	/**
	 * Obtenemos el nombe del Jefe a través del id del contactado
	 * 
	 * @param integer $id_contacto     Id del Contacto
	 * 
	 * @return string $nombre_jefe  Nombre del Contacto
	 */
	public function obtenerNombreJefeXIdJefe($id_contacto)
	{	
		// Obtenemos todos los contactos de la tabla Contacto
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::ID_CONTACTO,$id_contacto);
		$ar_contactos = ContactosPeer::doSelect($contactos);
		
		if(!empty($ar_contactos))	
		{
			if($id_contacto == 0)
			{				
				return '';
			}
			else
			{
				// Obtenemos el objeto Contacto
				$obj_contacto = $ar_contactos[0];
						
				$nombre_jefe = $obj_contacto->getNombre()." ".$obj_contacto->getApellidos();
			
				return $nombre_jefe;				
			}
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
	public function comprobarContactosProveedor($id_proveedor)
	{
		// Buscamos si el proveedor está siendo usado en la tabla Contactos
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::ID_CONTACTADO,$id_proveedor);		
		$contactos1 = ContactosPeer::doSelect($contactos);
		
		// Si el contacto no está vacio
		if(!empty($contactos1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Comprobar si un cliente está siendo usado
	 * 
	 * @param integer $id_cliente Id del cliente
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarContactosCliente($id_cliente)
	{
		// Buscamos si el cliente está siendo usado en la tabla Contactos
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::ID_CONTACTADO,$id_cliente);		
		$contactos1 = ContactosPeer::doSelect($contactos);
		
		// Si el contacto no está vacio
		if(!empty($contactos1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Comprobar si un contacto es jefe de otro contacto
	 * 
	 * @param integer $id_jefe Id del contacto que es jefe
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarContacto($id_jefe)
	{
		// Buscamos si el cliente está siendo usado en la tabla Contactos
		$contactos = new Criteria();
		$contactos->add(ContactosPeer::ID_JEFE,$id_jefe);		
		$contactos1 = ContactosPeer::doSelect($contactos);
		
		// Si el contacto no está vacio
		if(!empty($contactos1))
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