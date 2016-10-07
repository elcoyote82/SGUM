<?php


abstract class BaseEstadoVentas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_estado_venta;


	
	protected $estado_venta;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collVentass;

	
	protected $lastVentasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdEstadoVenta()
	{

		return $this->id_estado_venta;
	}

	
	public function getEstadoVenta()
	{

		return $this->estado_venta;
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

	
	public function setIdEstadoVenta($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_venta !== $v) {
			$this->id_estado_venta = $v;
			$this->modifiedColumns[] = EstadoVentasPeer::ID_ESTADO_VENTA;
		}

	} 
	
	public function setEstadoVenta($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->estado_venta !== $v) {
			$this->estado_venta = $v;
			$this->modifiedColumns[] = EstadoVentasPeer::ESTADO_VENTA;
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
			$this->modifiedColumns[] = EstadoVentasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = EstadoVentasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_estado_venta = $rs->getInt($startcol + 0);

			$this->estado_venta = $rs->getString($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EstadoVentas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoVentasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstadoVentasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EstadoVentasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EstadoVentasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoVentasPeer::DATABASE_NAME);
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
					$pk = EstadoVentasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdEstadoVenta($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadoVentasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collVentass !== null) {
				foreach($this->collVentass as $referrerFK) {
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


			if (($retval = EstadoVentasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collVentass !== null) {
					foreach($this->collVentass as $referrerFK) {
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
		$pos = EstadoVentasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdEstadoVenta();
				break;
			case 1:
				return $this->getEstadoVenta();
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
		$keys = EstadoVentasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdEstadoVenta(),
			$keys[1] => $this->getEstadoVenta(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadoVentasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdEstadoVenta($value);
				break;
			case 1:
				$this->setEstadoVenta($value);
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
		$keys = EstadoVentasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdEstadoVenta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEstadoVenta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadoVentasPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadoVentasPeer::ID_ESTADO_VENTA)) $criteria->add(EstadoVentasPeer::ID_ESTADO_VENTA, $this->id_estado_venta);
		if ($this->isColumnModified(EstadoVentasPeer::ESTADO_VENTA)) $criteria->add(EstadoVentasPeer::ESTADO_VENTA, $this->estado_venta);
		if ($this->isColumnModified(EstadoVentasPeer::CREATED_AT)) $criteria->add(EstadoVentasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EstadoVentasPeer::UPDATED_AT)) $criteria->add(EstadoVentasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadoVentasPeer::DATABASE_NAME);

		$criteria->add(EstadoVentasPeer::ID_ESTADO_VENTA, $this->id_estado_venta);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdEstadoVenta();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdEstadoVenta($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEstadoVenta($this->estado_venta);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getVentass() as $relObj) {
				$copyObj->addVentas($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdEstadoVenta(NULL); 
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
			self::$peer = new EstadoVentasPeer();
		}
		return self::$peer;
	}

	
	public function initVentass()
	{
		if ($this->collVentass === null) {
			$this->collVentass = array();
		}
	}

	
	public function getVentass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVentass === null) {
			if ($this->isNew()) {
			   $this->collVentass = array();
			} else {

				$criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->getIdEstadoVenta());

				VentasPeer::addSelectColumns($criteria);
				$this->collVentass = VentasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->getIdEstadoVenta());

				VentasPeer::addSelectColumns($criteria);
				if (!isset($this->lastVentasCriteria) || !$this->lastVentasCriteria->equals($criteria)) {
					$this->collVentass = VentasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastVentasCriteria = $criteria;
		return $this->collVentass;
	}

	
	public function countVentass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->getIdEstadoVenta());

		return VentasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addVentas(Ventas $l)
	{
		$this->collVentass[] = $l;
		$l->setEstadoVentas($this);
	}


	
	public function getVentassJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVentass === null) {
			if ($this->isNew()) {
				$this->collVentass = array();
			} else {

				$criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->getIdEstadoVenta());

				$this->collVentass = VentasPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->getIdEstadoVenta());

			if (!isset($this->lastVentasCriteria) || !$this->lastVentasCriteria->equals($criteria)) {
				$this->collVentass = VentasPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastVentasCriteria = $criteria;

		return $this->collVentass;
	}


	
	public function getVentassJoinClientes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVentass === null) {
			if ($this->isNew()) {
				$this->collVentass = array();
			} else {

				$criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->getIdEstadoVenta());

				$this->collVentass = VentasPeer::doSelectJoinClientes($criteria, $con);
			}
		} else {
									
			$criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->getIdEstadoVenta());

			if (!isset($this->lastVentasCriteria) || !$this->lastVentasCriteria->equals($criteria)) {
				$this->collVentass = VentasPeer::doSelectJoinClientes($criteria, $con);
			}
		}
		$this->lastVentasCriteria = $criteria;

		return $this->collVentass;
	}

} 