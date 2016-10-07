<?php


abstract class BaseContactos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_contacto;


	
	protected $id_md5_contacto;


	
	protected $id_contactado;


	
	protected $id_jefe;


	
	protected $nombre;


	
	protected $apellidos;


	
	protected $puesto;


	
	protected $direccion;


	
	protected $cp;


	
	protected $localidad;


	
	protected $provincia;


	
	protected $pais;


	
	protected $telefono;


	
	protected $ext_telefono;


	
	protected $telefono_trabajo;


	
	protected $telefono_otro;


	
	protected $movil;


	
	protected $fax;


	
	protected $email;


	
	protected $email_dos;


	
	protected $email_tres;


	
	protected $observaciones;


	
	protected $opcion = '0';


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdContacto()
	{

		return $this->id_contacto;
	}

	
	public function getIdMd5Contacto()
	{

		return $this->id_md5_contacto;
	}

	
	public function getIdContactado()
	{

		return $this->id_contactado;
	}

	
	public function getIdJefe()
	{

		return $this->id_jefe;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getApellidos()
	{

		return $this->apellidos;
	}

	
	public function getPuesto()
	{

		return $this->puesto;
	}

	
	public function getDireccion()
	{

		return $this->direccion;
	}

	
	public function getCp()
	{

		return $this->cp;
	}

	
	public function getLocalidad()
	{

		return $this->localidad;
	}

	
	public function getProvincia()
	{

		return $this->provincia;
	}

	
	public function getPais()
	{

		return $this->pais;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getExtTelefono()
	{

		return $this->ext_telefono;
	}

	
	public function getTelefonoTrabajo()
	{

		return $this->telefono_trabajo;
	}

	
	public function getTelefonoOtro()
	{

		return $this->telefono_otro;
	}

	
	public function getMovil()
	{

		return $this->movil;
	}

	
	public function getFax()
	{

		return $this->fax;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getEmailDos()
	{

		return $this->email_dos;
	}

	
	public function getEmailTres()
	{

		return $this->email_tres;
	}

	
	public function getObservaciones()
	{

		return $this->observaciones;
	}

	
	public function getOpcion()
	{

		return $this->opcion;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setIdContacto($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_contacto !== $v) {
			$this->id_contacto = $v;
			$this->modifiedColumns[] = ContactosPeer::ID_CONTACTO;
		}

	} 
	
	public function setIdMd5Contacto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_contacto !== $v) {
			$this->id_md5_contacto = $v;
			$this->modifiedColumns[] = ContactosPeer::ID_MD5_CONTACTO;
		}

	} 
	
	public function setIdContactado($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_contactado !== $v) {
			$this->id_contactado = $v;
			$this->modifiedColumns[] = ContactosPeer::ID_CONTACTADO;
		}

	} 
	
	public function setIdJefe($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_jefe !== $v) {
			$this->id_jefe = $v;
			$this->modifiedColumns[] = ContactosPeer::ID_JEFE;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ContactosPeer::NOMBRE;
		}

	} 
	
	public function setApellidos($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->apellidos !== $v) {
			$this->apellidos = $v;
			$this->modifiedColumns[] = ContactosPeer::APELLIDOS;
		}

	} 
	
	public function setPuesto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->puesto !== $v) {
			$this->puesto = $v;
			$this->modifiedColumns[] = ContactosPeer::PUESTO;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = ContactosPeer::DIRECCION;
		}

	} 
	
	public function setCp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cp !== $v) {
			$this->cp = $v;
			$this->modifiedColumns[] = ContactosPeer::CP;
		}

	} 
	
	public function setLocalidad($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->localidad !== $v) {
			$this->localidad = $v;
			$this->modifiedColumns[] = ContactosPeer::LOCALIDAD;
		}

	} 
	
	public function setProvincia($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->provincia !== $v) {
			$this->provincia = $v;
			$this->modifiedColumns[] = ContactosPeer::PROVINCIA;
		}

	} 
	
	public function setPais($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pais !== $v) {
			$this->pais = $v;
			$this->modifiedColumns[] = ContactosPeer::PAIS;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = ContactosPeer::TELEFONO;
		}

	} 
	
	public function setExtTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ext_telefono !== $v) {
			$this->ext_telefono = $v;
			$this->modifiedColumns[] = ContactosPeer::EXT_TELEFONO;
		}

	} 
	
	public function setTelefonoTrabajo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono_trabajo !== $v) {
			$this->telefono_trabajo = $v;
			$this->modifiedColumns[] = ContactosPeer::TELEFONO_TRABAJO;
		}

	} 
	
	public function setTelefonoOtro($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono_otro !== $v) {
			$this->telefono_otro = $v;
			$this->modifiedColumns[] = ContactosPeer::TELEFONO_OTRO;
		}

	} 
	
	public function setMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->movil !== $v) {
			$this->movil = $v;
			$this->modifiedColumns[] = ContactosPeer::MOVIL;
		}

	} 
	
	public function setFax($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = ContactosPeer::FAX;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ContactosPeer::EMAIL;
		}

	} 
	
	public function setEmailDos($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email_dos !== $v) {
			$this->email_dos = $v;
			$this->modifiedColumns[] = ContactosPeer::EMAIL_DOS;
		}

	} 
	
	public function setEmailTres($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email_tres !== $v) {
			$this->email_tres = $v;
			$this->modifiedColumns[] = ContactosPeer::EMAIL_TRES;
		}

	} 
	
	public function setObservaciones($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->observaciones !== $v) {
			$this->observaciones = $v;
			$this->modifiedColumns[] = ContactosPeer::OBSERVACIONES;
		}

	} 
	
	public function setOpcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->opcion !== $v || $v === '0') {
			$this->opcion = $v;
			$this->modifiedColumns[] = ContactosPeer::OPCION;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = ContactosPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = ContactosPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_contacto = $rs->getInt($startcol + 0);

			$this->id_md5_contacto = $rs->getString($startcol + 1);

			$this->id_contactado = $rs->getInt($startcol + 2);

			$this->id_jefe = $rs->getInt($startcol + 3);

			$this->nombre = $rs->getString($startcol + 4);

			$this->apellidos = $rs->getString($startcol + 5);

			$this->puesto = $rs->getString($startcol + 6);

			$this->direccion = $rs->getString($startcol + 7);

			$this->cp = $rs->getString($startcol + 8);

			$this->localidad = $rs->getString($startcol + 9);

			$this->provincia = $rs->getString($startcol + 10);

			$this->pais = $rs->getString($startcol + 11);

			$this->telefono = $rs->getString($startcol + 12);

			$this->ext_telefono = $rs->getString($startcol + 13);

			$this->telefono_trabajo = $rs->getString($startcol + 14);

			$this->telefono_otro = $rs->getString($startcol + 15);

			$this->movil = $rs->getString($startcol + 16);

			$this->fax = $rs->getString($startcol + 17);

			$this->email = $rs->getString($startcol + 18);

			$this->email_dos = $rs->getString($startcol + 19);

			$this->email_tres = $rs->getString($startcol + 20);

			$this->observaciones = $rs->getString($startcol + 21);

			$this->opcion = $rs->getString($startcol + 22);

			$this->created_at = $rs->getTimestamp($startcol + 23, null);

			$this->updated_at = $rs->getTimestamp($startcol + 24, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 25; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Contactos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContactosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContactosPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ContactosPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ContactosPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContactosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContactosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdContacto($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContactosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = ContactosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContactosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdContacto();
				break;
			case 1:
				return $this->getIdMd5Contacto();
				break;
			case 2:
				return $this->getIdContactado();
				break;
			case 3:
				return $this->getIdJefe();
				break;
			case 4:
				return $this->getNombre();
				break;
			case 5:
				return $this->getApellidos();
				break;
			case 6:
				return $this->getPuesto();
				break;
			case 7:
				return $this->getDireccion();
				break;
			case 8:
				return $this->getCp();
				break;
			case 9:
				return $this->getLocalidad();
				break;
			case 10:
				return $this->getProvincia();
				break;
			case 11:
				return $this->getPais();
				break;
			case 12:
				return $this->getTelefono();
				break;
			case 13:
				return $this->getExtTelefono();
				break;
			case 14:
				return $this->getTelefonoTrabajo();
				break;
			case 15:
				return $this->getTelefonoOtro();
				break;
			case 16:
				return $this->getMovil();
				break;
			case 17:
				return $this->getFax();
				break;
			case 18:
				return $this->getEmail();
				break;
			case 19:
				return $this->getEmailDos();
				break;
			case 20:
				return $this->getEmailTres();
				break;
			case 21:
				return $this->getObservaciones();
				break;
			case 22:
				return $this->getOpcion();
				break;
			case 23:
				return $this->getCreatedAt();
				break;
			case 24:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContactosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdContacto(),
			$keys[1] => $this->getIdMd5Contacto(),
			$keys[2] => $this->getIdContactado(),
			$keys[3] => $this->getIdJefe(),
			$keys[4] => $this->getNombre(),
			$keys[5] => $this->getApellidos(),
			$keys[6] => $this->getPuesto(),
			$keys[7] => $this->getDireccion(),
			$keys[8] => $this->getCp(),
			$keys[9] => $this->getLocalidad(),
			$keys[10] => $this->getProvincia(),
			$keys[11] => $this->getPais(),
			$keys[12] => $this->getTelefono(),
			$keys[13] => $this->getExtTelefono(),
			$keys[14] => $this->getTelefonoTrabajo(),
			$keys[15] => $this->getTelefonoOtro(),
			$keys[16] => $this->getMovil(),
			$keys[17] => $this->getFax(),
			$keys[18] => $this->getEmail(),
			$keys[19] => $this->getEmailDos(),
			$keys[20] => $this->getEmailTres(),
			$keys[21] => $this->getObservaciones(),
			$keys[22] => $this->getOpcion(),
			$keys[23] => $this->getCreatedAt(),
			$keys[24] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContactosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdContacto($value);
				break;
			case 1:
				$this->setIdMd5Contacto($value);
				break;
			case 2:
				$this->setIdContactado($value);
				break;
			case 3:
				$this->setIdJefe($value);
				break;
			case 4:
				$this->setNombre($value);
				break;
			case 5:
				$this->setApellidos($value);
				break;
			case 6:
				$this->setPuesto($value);
				break;
			case 7:
				$this->setDireccion($value);
				break;
			case 8:
				$this->setCp($value);
				break;
			case 9:
				$this->setLocalidad($value);
				break;
			case 10:
				$this->setProvincia($value);
				break;
			case 11:
				$this->setPais($value);
				break;
			case 12:
				$this->setTelefono($value);
				break;
			case 13:
				$this->setExtTelefono($value);
				break;
			case 14:
				$this->setTelefonoTrabajo($value);
				break;
			case 15:
				$this->setTelefonoOtro($value);
				break;
			case 16:
				$this->setMovil($value);
				break;
			case 17:
				$this->setFax($value);
				break;
			case 18:
				$this->setEmail($value);
				break;
			case 19:
				$this->setEmailDos($value);
				break;
			case 20:
				$this->setEmailTres($value);
				break;
			case 21:
				$this->setObservaciones($value);
				break;
			case 22:
				$this->setOpcion($value);
				break;
			case 23:
				$this->setCreatedAt($value);
				break;
			case 24:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContactosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdContacto($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Contacto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdContactado($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdJefe($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNombre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setApellidos($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPuesto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDireccion($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLocalidad($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setProvincia($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPais($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelefono($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setExtTelefono($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTelefonoTrabajo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTelefonoOtro($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setMovil($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFax($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setEmail($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setEmailDos($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setEmailTres($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setObservaciones($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setOpcion($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCreatedAt($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setUpdatedAt($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContactosPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContactosPeer::ID_CONTACTO)) $criteria->add(ContactosPeer::ID_CONTACTO, $this->id_contacto);
		if ($this->isColumnModified(ContactosPeer::ID_MD5_CONTACTO)) $criteria->add(ContactosPeer::ID_MD5_CONTACTO, $this->id_md5_contacto);
		if ($this->isColumnModified(ContactosPeer::ID_CONTACTADO)) $criteria->add(ContactosPeer::ID_CONTACTADO, $this->id_contactado);
		if ($this->isColumnModified(ContactosPeer::ID_JEFE)) $criteria->add(ContactosPeer::ID_JEFE, $this->id_jefe);
		if ($this->isColumnModified(ContactosPeer::NOMBRE)) $criteria->add(ContactosPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ContactosPeer::APELLIDOS)) $criteria->add(ContactosPeer::APELLIDOS, $this->apellidos);
		if ($this->isColumnModified(ContactosPeer::PUESTO)) $criteria->add(ContactosPeer::PUESTO, $this->puesto);
		if ($this->isColumnModified(ContactosPeer::DIRECCION)) $criteria->add(ContactosPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(ContactosPeer::CP)) $criteria->add(ContactosPeer::CP, $this->cp);
		if ($this->isColumnModified(ContactosPeer::LOCALIDAD)) $criteria->add(ContactosPeer::LOCALIDAD, $this->localidad);
		if ($this->isColumnModified(ContactosPeer::PROVINCIA)) $criteria->add(ContactosPeer::PROVINCIA, $this->provincia);
		if ($this->isColumnModified(ContactosPeer::PAIS)) $criteria->add(ContactosPeer::PAIS, $this->pais);
		if ($this->isColumnModified(ContactosPeer::TELEFONO)) $criteria->add(ContactosPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(ContactosPeer::EXT_TELEFONO)) $criteria->add(ContactosPeer::EXT_TELEFONO, $this->ext_telefono);
		if ($this->isColumnModified(ContactosPeer::TELEFONO_TRABAJO)) $criteria->add(ContactosPeer::TELEFONO_TRABAJO, $this->telefono_trabajo);
		if ($this->isColumnModified(ContactosPeer::TELEFONO_OTRO)) $criteria->add(ContactosPeer::TELEFONO_OTRO, $this->telefono_otro);
		if ($this->isColumnModified(ContactosPeer::MOVIL)) $criteria->add(ContactosPeer::MOVIL, $this->movil);
		if ($this->isColumnModified(ContactosPeer::FAX)) $criteria->add(ContactosPeer::FAX, $this->fax);
		if ($this->isColumnModified(ContactosPeer::EMAIL)) $criteria->add(ContactosPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ContactosPeer::EMAIL_DOS)) $criteria->add(ContactosPeer::EMAIL_DOS, $this->email_dos);
		if ($this->isColumnModified(ContactosPeer::EMAIL_TRES)) $criteria->add(ContactosPeer::EMAIL_TRES, $this->email_tres);
		if ($this->isColumnModified(ContactosPeer::OBSERVACIONES)) $criteria->add(ContactosPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(ContactosPeer::OPCION)) $criteria->add(ContactosPeer::OPCION, $this->opcion);
		if ($this->isColumnModified(ContactosPeer::CREATED_AT)) $criteria->add(ContactosPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ContactosPeer::UPDATED_AT)) $criteria->add(ContactosPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContactosPeer::DATABASE_NAME);

		$criteria->add(ContactosPeer::ID_CONTACTO, $this->id_contacto);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdContacto();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdContacto($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Contacto($this->id_md5_contacto);

		$copyObj->setIdContactado($this->id_contactado);

		$copyObj->setIdJefe($this->id_jefe);

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellidos($this->apellidos);

		$copyObj->setPuesto($this->puesto);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCp($this->cp);

		$copyObj->setLocalidad($this->localidad);

		$copyObj->setProvincia($this->provincia);

		$copyObj->setPais($this->pais);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setExtTelefono($this->ext_telefono);

		$copyObj->setTelefonoTrabajo($this->telefono_trabajo);

		$copyObj->setTelefonoOtro($this->telefono_otro);

		$copyObj->setMovil($this->movil);

		$copyObj->setFax($this->fax);

		$copyObj->setEmail($this->email);

		$copyObj->setEmailDos($this->email_dos);

		$copyObj->setEmailTres($this->email_tres);

		$copyObj->setObservaciones($this->observaciones);

		$copyObj->setOpcion($this->opcion);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdContacto(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ContactosPeer();
		}
		return self::$peer;
	}

} 