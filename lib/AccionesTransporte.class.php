<?php
/**
 * Clase para gestionar todo lo relacionado con las empresas de transporte y conductores
 *
 * @package    SGUM
 * @subpackage lib
 * @name       AccionesTransporte.class.php
 * @author     Adrián Corujo Carballedo
 * @version    1.0
 */
class AccionesTransporte 
{
	/**
	 * Constructor de la clase AccionesTransporte
	 */
	public function __construct()
	{
		
	}
	
	/**
	 * Guardar un objeto Transporte Conductor
	 * 
	 * @param integer $id_transporte_empresa	Id de la empresa a la que pertenece el conductor
	 * @param string  $nombre      				Nombre del conductor
	 * @param string  $apellidos   				Apellidos del conductor
	 * @param string  $telefono    				Teléfono del conductor
	 * @param string  $telefono_trabajo     	Teléfono Trabajo del conductor
	 * @param string  $telefono_otro     		Teléfono Otro del conductor
	 * @param string  $movil      				Móvil del conductor
	 * @param string  $observaciones			Observaciones del conductor
	 * 
	 * @return integer | boolean $id_transporte_conductor_save ID del transporte conductor, 
	 * 								o FALSE si hubo un fallo
	 */
	public function guardarTransporteConductor($id_transporte_empresa,$nombre,$apellidos,$telefono,
		$telefono_trabajo,$telefono_otro,$movil,$observaciones)
	{
		// Creamos un nuevo objeto TransporteConductores
		$transporte_conductor = new TransporteConductores();
		$transporte_conductor->setIdTransporteEmpresa($id_transporte_empresa);
		$transporte_conductor->setNombre($nombre);
		$transporte_conductor->setApellidos($apellidos);
		$transporte_conductor->setTelefono($telefono);
		$transporte_conductor->setTelefonoTrabajo($telefono_trabajo);
		$transporte_conductor->setTelefonoOtro($telefono_otro);
		$transporte_conductor->setMovil($movil);
		$transporte_conductor->setObservaciones($observaciones);
		
		// Guardamos el conductor en la BD
		$transporte_conductor_salvado = $transporte_conductor->save();
		
		// Obtenemos el id del ultimo conductor insertado
		$id_transporte_conductor_save = $transporte_conductor->getIdTransporteConductor();
		
		if ($id_transporte_conductor_save)
		{
			// Obtenemos la clave para generar el id_md5 del transporte conductor que acabamos de guardar
			$key_transporte_conductor = sfConfig::get('app_private_key_transporte_conductor');
			
			// Creamos un nuevo objeto TransporteConductores
			$transporte_conductor_act = new TransporteConductores();
			$transporte_conductor_act->setIdTransporteConductor($id_transporte_conductor_save);
			
			// Generamos el id_md5 del TransporteConductores
			$id_md5_transporte_conductor = hash_hmac('md5',$id_transporte_conductor_save,$key_transporte_conductor);
			$transporte_conductor_act->setIdMd5TransporteConductor($id_md5_transporte_conductor);
			
			// Actualizamos el objeto TransporteConductores
			$transporte_conductor_update = TransporteConductoresPeer::doUpdate($transporte_conductor_act);
			
			if($transporte_conductor_update !== false)
			{
				return $id_transporte_conductor_save;
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
	 * Actualizamos un conductor de la tabla TransporteConductores
	 * 
	 * @param integer $id_transporte_conductor	Id del Transporte Conductor
	 * @param integer $id_transporte_empresa	Id de la empresa a la que pertenece el conductor
	 * @param string  $nombre      				Nombre del conductor
	 * @param string  $apellidos   				Apellidos del conductor
	 * @param string  $telefono    				Teléfono del conductor
	 * @param string  $telefono_trabajo     	Teléfono Trabajo del conductor
	 * @param string  $telefono_otro     		Teléfono Otro del conductor
	 * @param string  $movil      				Móvil del conductor
	 * @param string  $observaciones			Observaciones del conductor
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarTransporteConductor($id_transporte_conductor,$id_transporte_empresa,$nombre,
	 	$apellidos,$telefono,$telefono_trabajo,$telefono_otro,$movil,$observaciones)
	 {
	 	// Creamos un nuevo objeto TransporteConductores
	 	$transporte_conductor = new TransporteConductores();
		$transporte_conductor->setIdTransporteConductor($id_transporte_conductor);	 	
		$transporte_conductor->setIdTransporteEmpresa($id_transporte_empresa);
		$transporte_conductor->setNombre($nombre);
		$transporte_conductor->setApellidos($apellidos);
		$transporte_conductor->setTelefono($telefono);
		$transporte_conductor->setTelefonoTrabajo($telefono_trabajo);
		$transporte_conductor->setTelefonoOtro($telefono_otro);
		$transporte_conductor->setMovil($movil);
		$transporte_conductor->setObservaciones($observaciones);
		
	 	// Actualizamos el TransporteConductores en la BD
	 	$transporte_conductor_update = TransporteConductoresPeer::doUpdate($transporte_conductor);
	 	
	 	if($transporte_conductor_update !== false)
		{
			return true;
		}
		else
		{
			return false;
		}
	 }
	 
	/**
	 * Borrar un conductor de la tabla TransporteConductores
	 * 
	 * @param integer $id_transporte_conductor Id del transporte conductor a borrar
	 */
	 public function borrarTransporteConductor($id_transporte_conductor)
	 {
	 	// Borramos el conductor de la tabla TransporteConductores
	 	TransporteConductoresPeer::doDelete($id_transporte_conductor);
	 }
	
	/**
	 * Obtener el objeto TransporteConductor a partir del id del conductor
	 * 
	 * @param integer $id_transporte_conductor 		Id del transporte conductor
	 * 
	 * @return objeto | false $obj_transporte_conductor		Objeto TransporteConductor buscado por el id 
	 * 														del transporte conductor, FALSE en caso de no existir
	 */
	public function obtenerObjTransporteConductor($id_transporte_conductor)
	{
		// Obtenemos el objeto Transporte Conductor
		$obj_transporte_conductor = TransporteConductoresPeer::retrieveByPk($id_transporte_conductor);
		
		// Si está definido el objeto Transporte Conductor
		if(isset($obj_transporte_conductor))
		{
			return $obj_transporte_conductor;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del transporte conductor a partir del Id Md5
	 * 
	 * @param  string  $id_md5_transporte_conductor		Id Md5 del transporte conductor
	 * 
	 * @return integer $id_transporte_conductor			Id del transporte conductor
	 */
	public function obtenerIdTransporteConductorXIdMd5($id_md5_transporte_conductor)
	{
		// Obtenemos el objeto Transporte Conductor que tenga ese id md5
		$transporte_conductor = new Criteria();
		$transporte_conductor->add(TransporteConductoresPeer::ID_MD5_TRANSPORTE_CONDUCTOR,$id_md5_transporte_conductor);
		$transporte_conductor1 = TransporteConductoresPeer::doSelect($transporte_conductor);
		
		// Si no se encuentra ningún objeto Transporte Conductor
		if(empty($transporte_conductor1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del transporte conductor a partir del objeto Transporte Conductor
			$id_transporte_conductor = $transporte_conductor1[0]->getIdTransporteConductor();
			
			return $id_transporte_conductor;			
		}
	}
	
	/**
	 * Obtener todos los objetos Transporte Conductor
	 * 
	 * @return array $ar_transporte_conductores   Array de todos los objetos TransporteConductores, 
	 * 												FALSE en caso de que no haya
	 */
	public function obtenerTodosTransporteConductores()
	{
		// Obtenemos todos los transporte conductores de la tabla TransporteConductores
		$transporte_conductores = new Criteria();
		$ar_transporte_conductores = TransporteConductoresPeer::doSelect($transporte_conductores);
		
		// Si hay transporte conductores
		if(!empty($ar_transporte_conductores))
		{
			return $ar_transporte_conductores;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Transporte Conductor a partir del id md5 del transporte conductor
	 * 
	 * @param integer $id_md5_transporte_conductor Id Md5 del transporte conductor
	 * 
	 * @return objeto $obj_transporte_conductor  Objeto Transporte Conductor buscado por el id md5 del transporte conductor
	 */
	public function obtenerObjTransporteConductorXIdMd5($id_md5_transporte_conductor)
	{
		// Obtenemos el id del transporte conductor a partir del id md5
		$id_transporte_conductor = $this->obtenerIdTransporteConductorXIdMd5($id_md5_transporte_conductor);
		
		// Obtenemos el objeto Transporte Conductor
		$obj_transporte_conductor = TransporteConductoresPeer::retrieveByPk($id_transporte_conductor);
		
		// Si está definido el objeto Transporte Conductor
		if(isset($obj_transporte_conductor))
		{
			return $obj_transporte_conductor;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Transporte Conductor a partir del id del transporte conductor
	 * 
	 * @param  integer $id_transporte_conductor Id del transporte conductor
	 * 
	 * @return string  $id_md5_transporte_conductor   Id Md5 del transporte conductor
	 */
	public function obtenerIdMd5TransporteConductor($id_md5_transporte_conductor)
	{
		// Obtenemos el objeto transporte empresa de Transporte Conductor
		$obj_transporte_conductor = TransporteConductoresPeer::retrieveByPk($id_md5_transporte_conductor);
		
		// Si está definido el objeto Transporte Conductor
		if(isset($obj_transporte_conductor))
		{
			// Obtenemos el Id Md5 a partir del objeto Transporte Conductor
			$id_md5_transporte_conductor = $obj_transporte_conductor->getIdMd5TransporteConductor();
			
			return $id_md5_transporte_conductor;
		}
		else
		{
			return false;
		}
	}	
		
	/**
	 * Obtener un Select con todos los transporte conductores de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_transporte_conductores  Array de transporte conductores con llave el id del conductor y contenido el Nombre del conductor
	 */
	public function obtenerSelectTransporteConductores()
	{
		// Obtenemos todos los transporte conductores
		$transporte_conductores = $this->obtenerTodosTransporteConductores();
		
		// Creamos un array con los transporte conductores para el select del formulario
		$ar_transporte_conductores[0] = "";
		
		foreach($transporte_conductores as $transporte_conductor)
		{
			$transporte_conductor_nombre = $transporte_conductor->getNombre();
			$i = $transporte_conductor->getIdTransporteConductor();
			$ar_transporte_conductores[$i] = $transporte_conductor_nombre;
		}
		
		// Array con el nombre de los transporte conductores y llave el id
		return $ar_transporte_conductores;
	}
	
	/**
	 * Obtener un Select con todos los transporte conductores de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_transporte_conductores  Array de transporte conductores con llave el id del conductor y contenido el Nombre del conductor
	 */
	public function obtenerSelectTransporteConductores2()
	{
		// Obtenemos todos los transporte conductores
		$transporte_conductores = $this->obtenerTodosTransporteConductores();
		
		// Creamos un array con los transporte conductores para el select del formulario
		$ar_transporte_conductores[0] = "------";
		
		foreach($transporte_conductores as $transporte_conductor)
		{
			$transporte_conductor_nombre = $transporte_conductor->getNombre();
			$i = $transporte_conductor->getIdTransporteConductor();
			$ar_transporte_conductores[$i] = $transporte_conductor_nombre;
		}
		
		// Array con el nombre de los transporte conductores y llave el id
		return $ar_transporte_conductores;
	}
	
	/**
	 * Obtener un Select con todos los transporte conductores de la aplicacion
	 * ID = 0 -> "Seleccionar Conductor"
	 * 
	 * @return array $ar_transporte_conductores  Array de transporte conductores con llave el id del conductor y contenido el Nombre del conductor
	 */
	public function obtenerSelectTransporteConductores3()
	{
		// Obtenemos todos los transporte conductores
		$transporte_conductores = $this->obtenerTodosTransporteConductores();
		
		// Creamos un array con los transporte conductores para el select del formulario
		$ar_transporte_conductores[0] = "Seleccionar Conductor";
		
		foreach($transporte_conductores as $transporte_conductor)
		{
			$transporte_conductor_nombre = $transporte_conductor->getNombre();
			$i = $transporte_conductor->getIdTransporteConductor();
			$ar_transporte_conductores[$i] = $transporte_conductor_nombre;
		}
		
		// Array con el nombre de los transporte conductores y llave el id
		return $ar_transporte_conductores;
	}	
		
	/**
	 * Obtener un Select con todos los transporte conductores de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_transporte_conductores  Array de transporte conductores con llave el id del conductor y contenido el Nombre del conductor
	 */
	public function obtenerSelectTransporteConductores4()
	{
		// Obtenemos todos los transporte conductores
		$transporte_conductores = $this->obtenerTodosTransporteConductores();
		
		// Creamos un array con los transporte conductores para el select del formulario
		$ar_transporte_conductores[0] = "";
		
		foreach($transporte_conductores as $transporte_conductor)
		{
			$transporte_conductor_nombre = $transporte_conductor->getNombre();
			$transporte_conductor_apellidos = $transporte_conductor->getApellidos();
			$i = $transporte_conductor->getIdTransporteConductor();
			$ar_transporte_conductores[$i] = $transporte_conductor_nombre." ".$transporte_conductor_apellidos;
		}
		
		// Array con el nombre de los transporte conductores y llave el id
		return $ar_transporte_conductores;
	}

	/**
	 * Guardar un objeto Transporte Empresa
	 * 
	 * @param string  $nombre      				Nombre de la empresa de transporte
	 * @param string  $cif_nif     				CIF/NIF de la empresa de transporte
	 * @param string  $direccion  				Dirección de la empresa de transporte
	 * @param string  $poblacion				Población de la empresa de transporte
	 * @param string  $provincia				Provincia de la empresa de transporte
	 * @param string  $cp						Código Postal de la empresa de transporte
	 * @param string  $pais						País de la empresa de transporte	 
	 * @param string  $telefono					Teléfono de la empresa de transporte
	 * @param string  $telefono2				Otro Teléfono de la empresa de transporte
	 * @param string  $movil					Móvil de la empresa de transporte
	 * @param string  $fax						Fax de la empresa de transporte
	 * @param string  $email					Email de la empresa de transporte
	 * @param string  $web						Web de la empresa de transporte
	 * 
	 * @return integer | boolean $id_transporte_empresa_save ID del transporte empresa, o FALSE si hubo un fallo
	 */
	public function guardarTransporteEmpresa($nombre,$cif_nif,$direccion,$poblacion,$provincia,$cp,
			$pais,$telefono,$telefono2,$movil,$fax,$email,$web)
	{
		// Creamos un nuevo objeto TransporteEmpresas
		$transporte_empresa = new TransporteEmpresas();
		$transporte_empresa->setNombre($nombre);
		$transporte_empresa->setCifNif($cif_nif);
		$transporte_empresa->setDireccion($direccion);
		$transporte_empresa->setPoblacion($poblacion);	
		if($provincia) $transporte_empresa->setProvincia($provincia);
		$transporte_empresa->setCp($cp);
		$transporte_empresa->setPais($pais);
		$transporte_empresa->setTelefono($telefono);
		$transporte_empresa->setTelefono2($telefono2);
		$transporte_empresa->setMovil($movil);
		$transporte_empresa->setFax($fax);
		$transporte_empresa->setEmail($email);
		$transporte_empresa->setWeb($web);
		
		// Guardamos el empresa en la BD
		$transporte_empresa_salvado = $transporte_empresa->save();
		
		// Obtenemos el id del ultimo empresa insertado
		$id_transporte_empresa_save = $transporte_empresa->getIdTransporteEmpresa();
		
		if ($id_transporte_empresa_save)
		{
			// Obtenemos la clave para generar el id_md5 del transporte empresa que acabamos de guardar
			$key_transporte_empresa = sfConfig::get('app_private_key_transporte_empresa');
			
			// Creamos un nuevo objeto TransporteEmpresas
			$transporte_empresa_act = new TransporteEmpresas();
			$transporte_empresa_act->setIdTransporteEmpresa($id_transporte_empresa_save);
			
			// Generamos el id_md5 del TransporteEmpresas
			$id_md5_transporte_empresa = hash_hmac('md5',$id_transporte_empresa_save,$key_transporte_empresa);
			$transporte_empresa_act->setIdMd5TransporteEmpresa($id_md5_transporte_empresa);
			
			// Actualizamos el objeto TransporteEmpresas
			$transporte_empresa_update = TransporteEmpresasPeer::doUpdate($transporte_empresa_act);
			
			if($transporte_empresa_update !== false)
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
	 * Guardar un objeto Transporte Empresa
	 * 
	 * @param string  $nombre      				Nombre de la empresa de transporte
	 * 
	 * @return integer | boolean $id_transporte_empresa_save ID del transporte empresa, o FALSE si hubo un fallo
	 */
	public function guardarTransporteEmpresaNueva($nombre)
	{
		// Creamos un nuevo objeto TransporteEmpresas
		$transporte_empresa = new TransporteEmpresas();
		$transporte_empresa->setNombre($nombre);
		
		// Guardamos el empresa en la BD
		$transporte_empresa_salvado = $transporte_empresa->save();
		
		// Obtenemos el id del ultimo empresa insertado
		$id_transporte_empresa_save = $transporte_empresa->getIdTransporteEmpresa();
		
		if ($id_transporte_empresa_save)
		{
			// Obtenemos la clave para generar el id_md5 del transporte empresa que acabamos de guardar
			$key_transporte_empresa = sfConfig::get('app_private_key_transporte_empresa');
			
			// Creamos un nuevo objeto TransporteEmpresas
			$transporte_empresa_act = new TransporteEmpresas();
			$transporte_empresa_act->setIdTransporteEmpresa($id_transporte_empresa_save);
			
			// Generamos el id_md5 del TransporteEmpresas
			$id_md5_transporte_empresa = hash_hmac('md5',$id_transporte_empresa_save,$key_transporte_empresa);
			$transporte_empresa_act->setIdMd5TransporteEmpresa($id_md5_transporte_empresa);
			
			// Actualizamos el objeto TransporteEmpresas
			$transporte_empresa_update = TransporteEmpresasPeer::doUpdate($transporte_empresa_act);
			
			if($transporte_empresa_update !== false)
			{
				return $id_transporte_empresa_save;
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
	 * Actualizamos un empresa de la tabla TransporteEmpresas
	 * 
	 * @param integer $id_transporte_empresa	Id del Transporte Empresa
	 * @param string  $nombre      				Nombre de la empresa de transporte
	 * @param string  $cif_nif     				CIF/NIF de la empresa de transporte
	 * @param string  $direccion  				Dirección de la empresa de transporte
	 * @param string  $poblacion				Población de la empresa de transporte
	 * @param string  $provincia				Provincia de la empresa de transporte
	 * @param string  $cp						Código Postal de la empresa de transporte
	 * @param string  $pais						País de la empresa de transporte	 
	 * @param string  $telefono					Teléfono de la empresa de transporte
	 * @param string  $telefono2				Otro Teléfono de la empresa de transporte
	 * @param string  $movil					Móvil de la empresa de transporte
	 * @param string  $fax						Fax de la empresa de transporte
	 * @param string  $email					Email de la empresa de transporte
	 * @param string  $web						Web de la empresa de transporte
	 * 
	 * @return boolean TRUE si todo ha ido correctamente, 0 en caso de haber cambios, FALSE en caso de error
	 */
	 public function actualizarTransporteEmpresa($id_transporte_empresa,$nombre,$cif_nif,$direccion,
	 		$poblacion,$provincia,$cp,$pais,$telefono,$telefono2,$movil,$fax,$email,$web)
	 {
	 	// Creamos un nuevo objeto TransporteEmpresas
	 	$transporte_empresa = new TransporteEmpresas();
		$transporte_empresa->setIdTransporteEmpresa($id_transporte_empresa);
		$transporte_empresa->setNombre($nombre);
		$transporte_empresa->setCifNif($cif_nif);
		$transporte_empresa->setDireccion($direccion);
		$transporte_empresa->setPoblacion($poblacion);
		if($provincia) $transporte_empresa->setProvincia($provincia);
		$transporte_empresa->setCp($cp);
		$transporte_empresa->setPais($pais);
		$transporte_empresa->setTelefono($telefono);
		$transporte_empresa->setTelefono2($telefono2);
		$transporte_empresa->setMovil($movil);
		$transporte_empresa->setFax($fax);
		$transporte_empresa->setEmail($email);
		$transporte_empresa->setWeb($web);
	 	
	 	// Actualizamos el TransporteEmpresas en la BD
	 	$transporte_empresa_update = TransporteEmpresasPeer::doUpdate($transporte_empresa);
	 	
	 	if($transporte_empresa_update !== false)
		{
			return true;
		}
		else
		{
			return false;
		}
	 }
	 
	/**
	 * Borrar un empresa de la tabla TransporteEmpresas
	 * 
	 * @param integer $id_transporte_empresa Id del transporte empresa a borrar
	 */
	 public function borrarTransporteEmpresa($id_transporte_empresa)
	 {
	 	// Borramos el empresa de la tabla TransporteEmpresas
	 	TransporteEmpresasPeer::doDelete($id_transporte_empresa);
	 }
	
	/**
	 * Obtener el objeto TransporteEmpresa a partir del id del empresa
	 * 
	 * @param integer $id_transporte_empresa 		Id del transporte empresa
	 * 
	 * @return objeto | false $obj_transporte_empresa		Objeto TransporteEmpresa buscado por el id 
	 * 														del transporte empresa, FALSE en caso de no existir
	 */
	public function obtenerObjTransporteEmpresa($id_transporte_empresa)
	{
		// Obtenemos el objeto Transporte Empresa
		$obj_transporte_empresa = TransporteEmpresasPeer::retrieveByPk($id_transporte_empresa);
		
		// Si está definido el objeto Transporte Empresa
		if(isset($obj_transporte_empresa))
		{
			return $obj_transporte_empresa;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id del transporte empresa a partir del Id Md5
	 * 
	 * @param  string  $id_md5_transporte_empresa		Id Md5 del transporte empresa
	 * 
	 * @return integer $id_transporte_empresa			Id del transporte empresa
	 */
	public function obtenerIdTransporteEmpresaXIdMd5($id_md5_transporte_empresa)
	{
		// Obtenemos el objeto Transporte Empresa que tenga ese id md5
		$transporte_empresa = new Criteria();
		$transporte_empresa->add(TransporteEmpresasPeer::ID_MD5_TRANSPORTE_EMPRESA,$id_md5_transporte_empresa);
		$transporte_empresa1 = TransporteEmpresasPeer::doSelect($transporte_empresa);
		
		// Si no se encuentra ningún objeto Transporte Empresa
		if(empty($transporte_empresa1))
		{
			return false;
		}
		else
		{
			// Obtenemos el Id del transporte empresa a partir del objeto Transporte Empresa
			$id_transporte_empresa = $transporte_empresa1[0]->getIdTransporteEmpresa();
			
			return $id_transporte_empresa;			
		}
	}
	
	/**
	 * Obtener todos los objetos Transporte Empresa
	 * 
	 * @return array $ar_transporte_empresas   Array de todos los objetos TransporteEmpresas, 
	 * 												FALSE en caso de que no haya
	 */
	public function obtenerTodosTransporteEmpresas()
	{
		// Obtenemos todos los transporte empresas de la tabla TransporteEmpresas
		$transporte_empresas = new Criteria();
		$ar_transporte_empresas = TransporteEmpresasPeer::doSelect($transporte_empresas);
		
		// Si hay transporte empresas
		if(!empty($ar_transporte_empresas))
		{
			return $ar_transporte_empresas;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener todos los Conductores a partir del id de transporte empresa
	 * 
	 * @param integer $id_transporte_empresa  Id del Transporte Empresa
	 * 
	 * @return array $ar_transporte_conductores  Array de todos los objetos TransporteCOnductores de una 
	 * 					determinada empresa, FALSE en caso de que no haya
	 */
	public function obtenerConductoresXEmpresa($id_transporte_empresa)
	{
		// Obtenemos todos los conductores de la empresa
		$transporte_conductores = new Criteria();
		$transporte_conductores->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA,$id_transporte_empresa);
		$ar_transporte_conductores = TransporteConductoresPeer::doSelect($transporte_conductores);
		
		// Si hay transporte conductores
		if(!empty($ar_transporte_conductores))
		{
			return $ar_transporte_conductores;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el objeto Transporte Empresa a partir del id md5 del transporte empresa
	 * 
	 * @param integer $id_md5_transporte_empresa Id Md5 del transporte empresa
	 * 
	 * @return objeto $obj_transporte_empresa  Objeto Transporte Empresa buscado por el id md5 del transporte empresa
	 */
	public function obtenerObjTransporteEmpresaXIdMd5($id_md5_transporte_empresa)
	{
		// Obtenemos el id del transporte empresa a partir del id md5
		$id_transporte_empresa = $this->obtenerIdTransporteEmpresaXIdMd5($id_md5_transporte_empresa);
		
		// Obtenemos el objeto Transporte Empresa
		$obj_transporte_empresa = TransporteEmpresasPeer::retrieveByPk($id_transporte_empresa);
		
		// Si está definido el objeto Transporte Empresa
		if(isset($obj_transporte_empresa))
		{
			return $obj_transporte_empresa;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Obtener el Id Md5 del Transporte Empresa a partir del id del transporte empresa
	 * 
	 * @param  integer $id_transporte_empresa Id del transporte empresa
	 * 
	 * @return string  $id_md5_transporte_empresa   Id Md5 del transporte empresa
	 */
	public function obtenerIdMd5TransporteEmpresa($id_md5_transporte_empresa)
	{
		// Obtenemos el objeto transporte empresa de Transporte Empresa
		$obj_transporte_empresa = TransporteEmpresasPeer::retrieveByPk($id_md5_transporte_empresa);
		
		// Si está definido el objeto Transporte Empresa
		if(isset($obj_transporte_empresa))
		{
			// Obtenemos el Id Md5 a partir del objeto Transporte Empresa
			$id_md5_transporte_empresa = $obj_transporte_empresa->getIdMd5TransporteEmpresa();
			
			return $id_md5_transporte_empresa;
		}
		else
		{
			return false;
		}
	}	
		
	/**
	 * Obtener un Select con todos los transporte empresas de la aplicacion
	 * ID = 0 -> ""
	 * 
	 * @return array $ar_transporte_empresas  Array de transporte empresas con llave el id del empresa y contenido el Nombre del empresa
	 */
	public function obtenerSelectTransporteEmpresas()
	{
		// Obtenemos todos los transporte empresas
		$transporte_empresas = $this->obtenerTodosTransporteEmpresas();
		
		// Creamos un array con los transporte empresas para el select del formulario
		$ar_transporte_empresas[0] = "";
		
		if($transporte_empresas)
		{
			foreach($transporte_empresas as $transporte_empresa)
			{
				$transporte_empresa_nombre = $transporte_empresa->getNombre();
				$i = $transporte_empresa->getIdTransporteEmpresa();
				$ar_transporte_empresas[$i] = $transporte_empresa_nombre;
			}
		}
		
		// Array con el nombre de los transporte empresas y llave el id
		return $ar_transporte_empresas;
	}
	
	/**
	 * Obtener un Select con todos los transporte empresas de la aplicacion
	 * ID = 0 -> "------"
	 * 
	 * @return array $ar_transporte_empresas  Array de transporte empresas con llave el id del empresa y contenido el Nombre del empresa
	 */
	public function obtenerSelectTransporteEmpresas2()
	{
		// Obtenemos todos los transporte empresas
		$transporte_empresas = $this->obtenerTodosTransporteEmpresas();
		
		// Creamos un array con los transporte empresas para el select del formulario
		$ar_transporte_empresas[0] = "------";
		
		if($transporte_empresas)
		{
			foreach($transporte_empresas as $transporte_empresa)
			{
				$transporte_empresa_nombre = $transporte_empresa->getNombre();
				$i = $transporte_empresa->getIdTransporteEmpresa();
				$ar_transporte_empresas[$i] = $transporte_empresa_nombre;
			}
		}		
		
		// Array con el nombre de los transporte empresas y llave el id
		return $ar_transporte_empresas;
	}
	
	/**
	 * Obtener un Select con todos los transporte empresas de la aplicacion
	 * ID = 0 -> "Seleccionar Empresa de Transporte"
	 * 
	 * @return array $ar_transporte_empresas  Array de transporte empresas con llave el id del empresa y contenido el Nombre del empresa
	 */
	public function obtenerSelectTransporteEmpresas3()
	{
		// Obtenemos todos los transporte empresas
		$transporte_empresas = $this->obtenerTodosTransporteEmpresas();
		
		// Creamos un array con los transporte empresas para el select del formulario
		$ar_transporte_empresas[0] = "Seleccionar Empresa de Transporte";
		
		if($transporte_empresas)
		{
			foreach($transporte_empresas as $transporte_empresa)
			{
				$transporte_empresa_nombre = $transporte_empresa->getNombre();
				$i = $transporte_empresa->getIdTransporteEmpresa();
				$ar_transporte_empresas[$i] = $transporte_empresa_nombre;
			}
		}
		
		// Array con el nombre de los transporte empresas y llave el id
		return $ar_transporte_empresas;
	}
	
	/**
	 * Comprobar si un conductor ha intervenido en una entrada o salida
	 * 
	 * @param integer $id_transporte_conductor Id del conductor
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarConductor($id_transporte_conductor)
	{
		// Buscamos si el conductor está siendo usado en la tabla Entradas
		$conductores = new Criteria();
		$conductores->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR,$id_transporte_conductor);		
		$conductores1 = EntradasPeer::doSelect($conductores);
		
		// Buscamos si el conductor está siendo usado en la tabla Salidas
		$conductores = new Criteria();
		$conductores->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR,$id_transporte_conductor);		
		$conductores2 = SalidasPeer::doSelect($conductores);
		
		// Si el conductor no está vacio
		if(!empty($conductores1) || !empty($conductores2))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/**
	 * Comprobar si una empresa de transporte tiene conductores asociados
	 * 
	 * @param integer $id_transporte_empresa Id de la empresa de transporte
	 * 
	 * @return boolean TRUE si está siendo usado, FALSE en caso contrario
	 */
	public function comprobarEmpresaTransporte($id_transporte_empresa)
	{
		// Buscamos si la empresa de transporte está siendo usado en la tabla TransporteConductores
		$transporte_empresa = new Criteria();
		$transporte_empresa->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA,$id_transporte_empresa);		
		$transporte_empresa1 = TransporteConductoresPeer::doSelect($transporte_empresa);
		
		// Si la empresa de transporte no está vacio
		if(!empty($transporte_empresa1))
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