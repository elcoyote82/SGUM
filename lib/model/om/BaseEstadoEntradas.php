<?php


abstract class BaseEstadoEntradas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_estado_entrada;


	
	protected $estado_entrada;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collEntradass;

	
	protected $lastEntradasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdEstadoEntrada()
	{

		return $this->id_estado_entrada;
	}

	
	public function getEstadoEntrada()
	{

		return $this->estado_entrada;
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

	
	public function setIdEstadoEntrada($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_entrada !== $v) {
			$this->id_estado_entrada = $v;
			$this->modifiedColumns[] = EstadoEntradasPeer::ID_ESTADO_ENTRADA;
		}

	} 
	
	public function setEstadoEntrada($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->estado_entrada !== $v) {
			$this->estado_entrada = $v;
			$this->modifiedColumns[] = EstadoEntradasPeer::ESTADO_ENTRADA;
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
			$this->modifiedColumns[] = EstadoEntradasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = EstadoEntradasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_estado_entrada = $rs->getInt($startcol + 0);

			$this->estado_entrada = $rs->getString($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EstadoEntradas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoEntradasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstadoEntradasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EstadoEntradasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EstadoEntradasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoEntradasPeer::DATABASE_NAME);
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
					$pk = EstadoEntradasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdEstadoEntrada($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadoEntradasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEntradass !== null) {
				foreach($this->collEntradass as $referrerFK) {
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


			if (($retval = EstadoEntradasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEntradass !== null) {
					foreach($this->collEntradass as $referrerFK) {
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
		$pos = EstadoEntradasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdEstadoEntrada();
				break;
			case 1:
				return $this->getEstadoEntrada();
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
		$keys = EstadoEntradasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdEstadoEntrada(),
			$keys[1] => $this->getEstadoEntrada(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadoEntradasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdEstadoEntrada($value);
				break;
			case 1:
				$this->setEstadoEntrada($value);
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
		$keys = EstadoEntradasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdEstadoEntrada($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEstadoEntrada($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadoEntradasPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadoEntradasPeer::ID_ESTADO_ENTRADA)) $criteria->add(EstadoEntradasPeer::ID_ESTADO_ENTRADA, $this->id_estado_entrada);
		if ($this->isColumnModified(EstadoEntradasPeer::ESTADO_ENTRADA)) $criteria->add(EstadoEntradasPeer::ESTADO_ENTRADA, $this->estado_entrada);
		if ($this->isColumnModified(EstadoEntradasPeer::CREATED_AT)) $criteria->add(EstadoEntradasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EstadoEntradasPeer::UPDATED_AT)) $criteria->add(EstadoEntradasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadoEntradasPeer::DATABASE_NAME);

		$criteria->add(EstadoEntradasPeer::ID_ESTADO_ENTRADA, $this->id_estado_entrada);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdEstadoEntrada();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdEstadoEntrada($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEstadoEntrada($this->estado_entrada);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEntradass() as $relObj) {
				$copyObj->addEntradas($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdEstadoEntrada(NULL); 
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
			self::$peer = new EstadoEntradasPeer();
		}
		return self::$peer;
	}

	
	public function initEntradass()
	{
		if ($this->collEntradass === null) {
			$this->collEntradass = array();
		}
	}

	
	public function getEntradass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradass === null) {
			if ($this->isNew()) {
			   $this->collEntradass = array();
			} else {

				$criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->getIdEstadoEntrada());

				EntradasPeer::addSelectColumns($criteria);
				$this->collEntradass = EntradasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->getIdEstadoEntrada());

				EntradasPeer::addSelectColumns($criteria);
				if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
					$this->collEntradass = EntradasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEntradasCriteria = $criteria;
		return $this->collEntradass;
	}

	
	public function countEntradass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->getIdEstadoEntrada());

		return EntradasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEntradas(Entradas $l)
	{
		$this->collEntradass[] = $l;
		$l->setEstadoEntradas($this);
	}


	
	public function getEntradassJoinPedidos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradass === null) {
			if ($this->isNew()) {
				$this->collEntradass = array();
			} else {

				$criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->getIdEstadoEntrada());

				$this->collEntradass = EntradasPeer::doSelectJoinPedidos($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->getIdEstadoEntrada());

			if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
				$this->collEntradass = EntradasPeer::doSelectJoinPedidos($criteria, $con);
			}
		}
		$this->lastEntradasCriteria = $criteria;

		return $this->collEntradass;
	}


	
	public function getEntradassJoinTransporteConductores($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradass === null) {
			if ($this->isNew()) {
				$this->collEntradass = array();
			} else {

				$criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->getIdEstadoEntrada());

				$this->collEntradass = EntradasPeer::doSelectJoinTransporteConductores($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->getIdEstadoEntrada());

			if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
				$this->collEntradass = EntradasPeer::doSelectJoinTransporteConductores($criteria, $con);
			}
		}
		$this->lastEntradasCriteria = $criteria;

		return $this->collEntradass;
	}

} 