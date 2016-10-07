<?php


abstract class BaseEstadoUbicaciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_estado_ubicacion;


	
	protected $estado_ubicacion;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collUbicacioness;

	
	protected $lastUbicacionesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdEstadoUbicacion()
	{

		return $this->id_estado_ubicacion;
	}

	
	public function getEstadoUbicacion()
	{

		return $this->estado_ubicacion;
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

	
	public function setIdEstadoUbicacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_ubicacion !== $v) {
			$this->id_estado_ubicacion = $v;
			$this->modifiedColumns[] = EstadoUbicacionesPeer::ID_ESTADO_UBICACION;
		}

	} 
	
	public function setEstadoUbicacion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->estado_ubicacion !== $v) {
			$this->estado_ubicacion = $v;
			$this->modifiedColumns[] = EstadoUbicacionesPeer::ESTADO_UBICACION;
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
			$this->modifiedColumns[] = EstadoUbicacionesPeer::CREATED_AT;
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
			$this->modifiedColumns[] = EstadoUbicacionesPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_estado_ubicacion = $rs->getInt($startcol + 0);

			$this->estado_ubicacion = $rs->getString($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EstadoUbicaciones object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoUbicacionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstadoUbicacionesPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EstadoUbicacionesPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EstadoUbicacionesPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoUbicacionesPeer::DATABASE_NAME);
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
					$pk = EstadoUbicacionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdEstadoUbicacion($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadoUbicacionesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collUbicacioness !== null) {
				foreach($this->collUbicacioness as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = EstadoUbicacionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUbicacioness !== null) {
					foreach($this->collUbicacioness as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadoUbicacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdEstadoUbicacion();
				break;
			case 1:
				return $this->getEstadoUbicacion();
				break;
			case 2:
				return $this->getCreatedAt();
				break;
			case 3:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EstadoUbicacionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdEstadoUbicacion(),
			$keys[1] => $this->getEstadoUbicacion(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadoUbicacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdEstadoUbicacion($value);
				break;
			case 1:
				$this->setEstadoUbicacion($value);
				break;
			case 2:
				$this->setCreatedAt($value);
				break;
			case 3:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EstadoUbicacionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdEstadoUbicacion($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEstadoUbicacion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadoUbicacionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadoUbicacionesPeer::ID_ESTADO_UBICACION)) $criteria->add(EstadoUbicacionesPeer::ID_ESTADO_UBICACION, $this->id_estado_ubicacion);
		if ($this->isColumnModified(EstadoUbicacionesPeer::ESTADO_UBICACION)) $criteria->add(EstadoUbicacionesPeer::ESTADO_UBICACION, $this->estado_ubicacion);
		if ($this->isColumnModified(EstadoUbicacionesPeer::CREATED_AT)) $criteria->add(EstadoUbicacionesPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EstadoUbicacionesPeer::UPDATED_AT)) $criteria->add(EstadoUbicacionesPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadoUbicacionesPeer::DATABASE_NAME);

		$criteria->add(EstadoUbicacionesPeer::ID_ESTADO_UBICACION, $this->id_estado_ubicacion);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdEstadoUbicacion();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdEstadoUbicacion($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEstadoUbicacion($this->estado_ubicacion);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getUbicacioness() as $relObj) {
				$copyObj->addUbicaciones($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdEstadoUbicacion(NULL); 
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
			self::$peer = new EstadoUbicacionesPeer();
		}
		return self::$peer;
	}

	
	public function initUbicacioness()
	{
		if ($this->collUbicacioness === null) {
			$this->collUbicacioness = array();
		}
	}

	
	public function getUbicacioness($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUbicacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUbicacioness === null) {
			if ($this->isNew()) {
			   $this->collUbicacioness = array();
			} else {

				$criteria->add(UbicacionesPeer::ID_ESTADO_UBICACION, $this->getIdEstadoUbicacion());

				UbicacionesPeer::addSelectColumns($criteria);
				$this->collUbicacioness = UbicacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UbicacionesPeer::ID_ESTADO_UBICACION, $this->getIdEstadoUbicacion());

				UbicacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastUbicacionesCriteria) || !$this->lastUbicacionesCriteria->equals($criteria)) {
					$this->collUbicacioness = UbicacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUbicacionesCriteria = $criteria;
		return $this->collUbicacioness;
	}

	
	public function countUbicacioness($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUbicacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UbicacionesPeer::ID_ESTADO_UBICACION, $this->getIdEstadoUbicacion());

		return UbicacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUbicaciones(Ubicaciones $l)
	{
		$this->collUbicacioness[] = $l;
		$l->setEstadoUbicaciones($this);
	}

} 