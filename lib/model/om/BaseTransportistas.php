<?php


abstract class BaseTransportistas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_transportista;


	
	protected $nombre;


	
	protected $apellidos;


	
	protected $telefono;


	
	protected $empresa;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdTransportista()
	{

		return $this->id_transportista;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getApellidos()
	{

		return $this->apellidos;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getEmpresa()
	{

		return $this->empresa;
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

	
	public function setIdTransportista($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_transportista !== $v) {
			$this->id_transportista = $v;
			$this->modifiedColumns[] = TransportistasPeer::ID_TRANSPORTISTA;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = TransportistasPeer::NOMBRE;
		}

	} 
	
	public function setApellidos($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->apellidos !== $v) {
			$this->apellidos = $v;
			$this->modifiedColumns[] = TransportistasPeer::APELLIDOS;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = TransportistasPeer::TELEFONO;
		}

	} 
	
	public function setEmpresa($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->empresa !== $v) {
			$this->empresa = $v;
			$this->modifiedColumns[] = TransportistasPeer::EMPRESA;
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
			$this->modifiedColumns[] = TransportistasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = TransportistasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_transportista = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->apellidos = $rs->getString($startcol + 2);

			$this->telefono = $rs->getString($startcol + 3);

			$this->empresa = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Transportistas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TransportistasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TransportistasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(TransportistasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TransportistasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TransportistasPeer::DATABASE_NAME);
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
					$pk = TransportistasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdTransportista($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TransportistasPeer::doUpdate($this, $con);
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


			if (($retval = TransportistasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TransportistasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdTransportista();
				break;
			case 1:
				return $this->getNombre();
				break;
			case 2:
				return $this->getApellidos();
				break;
			case 3:
				return $this->getTelefono();
				break;
			case 4:
				return $this->getEmpresa();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TransportistasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdTransportista(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getApellidos(),
			$keys[3] => $this->getTelefono(),
			$keys[4] => $this->getEmpresa(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TransportistasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdTransportista($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
			case 2:
				$this->setApellidos($value);
				break;
			case 3:
				$this->setTelefono($value);
				break;
			case 4:
				$this->setEmpresa($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TransportistasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdTransportista($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellidos($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelefono($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmpresa($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TransportistasPeer::DATABASE_NAME);

		if ($this->isColumnModified(TransportistasPeer::ID_TRANSPORTISTA)) $criteria->add(TransportistasPeer::ID_TRANSPORTISTA, $this->id_transportista);
		if ($this->isColumnModified(TransportistasPeer::NOMBRE)) $criteria->add(TransportistasPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(TransportistasPeer::APELLIDOS)) $criteria->add(TransportistasPeer::APELLIDOS, $this->apellidos);
		if ($this->isColumnModified(TransportistasPeer::TELEFONO)) $criteria->add(TransportistasPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(TransportistasPeer::EMPRESA)) $criteria->add(TransportistasPeer::EMPRESA, $this->empresa);
		if ($this->isColumnModified(TransportistasPeer::CREATED_AT)) $criteria->add(TransportistasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(TransportistasPeer::UPDATED_AT)) $criteria->add(TransportistasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TransportistasPeer::DATABASE_NAME);

		$criteria->add(TransportistasPeer::ID_TRANSPORTISTA, $this->id_transportista);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdTransportista();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdTransportista($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellidos($this->apellidos);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setEmpresa($this->empresa);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdTransportista(NULL); 
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
			self::$peer = new TransportistasPeer();
		}
		return self::$peer;
	}

} 