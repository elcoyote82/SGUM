<?php


abstract class BaseEstadoSalidas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_estado_salida;


	
	protected $estado_salida;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collSalidass;

	
	protected $lastSalidasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdEstadoSalida()
	{

		return $this->id_estado_salida;
	}

	
	public function getEstadoSalida()
	{

		return $this->estado_salida;
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

	
	public function setIdEstadoSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_salida !== $v) {
			$this->id_estado_salida = $v;
			$this->modifiedColumns[] = EstadoSalidasPeer::ID_ESTADO_SALIDA;
		}

	} 
	
	public function setEstadoSalida($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->estado_salida !== $v) {
			$this->estado_salida = $v;
			$this->modifiedColumns[] = EstadoSalidasPeer::ESTADO_SALIDA;
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
			$this->modifiedColumns[] = EstadoSalidasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = EstadoSalidasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_estado_salida = $rs->getInt($startcol + 0);

			$this->estado_salida = $rs->getString($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EstadoSalidas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoSalidasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstadoSalidasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EstadoSalidasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EstadoSalidasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoSalidasPeer::DATABASE_NAME);
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
					$pk = EstadoSalidasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdEstadoSalida($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadoSalidasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collSalidass !== null) {
				foreach($this->collSalidass as $referrerFK) {
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


			if (($retval = EstadoSalidasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSalidass !== null) {
					foreach($this->collSalidass as $referrerFK) {
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
		$pos = EstadoSalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdEstadoSalida();
				break;
			case 1:
				return $this->getEstadoSalida();
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
		$keys = EstadoSalidasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdEstadoSalida(),
			$keys[1] => $this->getEstadoSalida(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadoSalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdEstadoSalida($value);
				break;
			case 1:
				$this->setEstadoSalida($value);
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
		$keys = EstadoSalidasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdEstadoSalida($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEstadoSalida($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadoSalidasPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadoSalidasPeer::ID_ESTADO_SALIDA)) $criteria->add(EstadoSalidasPeer::ID_ESTADO_SALIDA, $this->id_estado_salida);
		if ($this->isColumnModified(EstadoSalidasPeer::ESTADO_SALIDA)) $criteria->add(EstadoSalidasPeer::ESTADO_SALIDA, $this->estado_salida);
		if ($this->isColumnModified(EstadoSalidasPeer::CREATED_AT)) $criteria->add(EstadoSalidasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EstadoSalidasPeer::UPDATED_AT)) $criteria->add(EstadoSalidasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadoSalidasPeer::DATABASE_NAME);

		$criteria->add(EstadoSalidasPeer::ID_ESTADO_SALIDA, $this->id_estado_salida);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdEstadoSalida();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdEstadoSalida($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEstadoSalida($this->estado_salida);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getSalidass() as $relObj) {
				$copyObj->addSalidas($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdEstadoSalida(NULL); 
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
			self::$peer = new EstadoSalidasPeer();
		}
		return self::$peer;
	}

	
	public function initSalidass()
	{
		if ($this->collSalidass === null) {
			$this->collSalidass = array();
		}
	}

	
	public function getSalidass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSalidass === null) {
			if ($this->isNew()) {
			   $this->collSalidass = array();
			} else {

				$criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->getIdEstadoSalida());

				SalidasPeer::addSelectColumns($criteria);
				$this->collSalidass = SalidasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->getIdEstadoSalida());

				SalidasPeer::addSelectColumns($criteria);
				if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
					$this->collSalidass = SalidasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSalidasCriteria = $criteria;
		return $this->collSalidass;
	}

	
	public function countSalidass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->getIdEstadoSalida());

		return SalidasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSalidas(Salidas $l)
	{
		$this->collSalidass[] = $l;
		$l->setEstadoSalidas($this);
	}


	
	public function getSalidassJoinVentas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSalidass === null) {
			if ($this->isNew()) {
				$this->collSalidass = array();
			} else {

				$criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->getIdEstadoSalida());

				$this->collSalidass = SalidasPeer::doSelectJoinVentas($criteria, $con);
			}
		} else {
									
			$criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->getIdEstadoSalida());

			if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
				$this->collSalidass = SalidasPeer::doSelectJoinVentas($criteria, $con);
			}
		}
		$this->lastSalidasCriteria = $criteria;

		return $this->collSalidass;
	}


	
	public function getSalidassJoinTransporteConductores($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSalidass === null) {
			if ($this->isNew()) {
				$this->collSalidass = array();
			} else {

				$criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->getIdEstadoSalida());

				$this->collSalidass = SalidasPeer::doSelectJoinTransporteConductores($criteria, $con);
			}
		} else {
									
			$criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->getIdEstadoSalida());

			if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
				$this->collSalidass = SalidasPeer::doSelectJoinTransporteConductores($criteria, $con);
			}
		}
		$this->lastSalidasCriteria = $criteria;

		return $this->collSalidass;
	}

} 