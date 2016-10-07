<?php


abstract class BaseEstadoPedidos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_estado_pedido;


	
	protected $estado_pedido;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collPedidoss;

	
	protected $lastPedidosCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdEstadoPedido()
	{

		return $this->id_estado_pedido;
	}

	
	public function getEstadoPedido()
	{

		return $this->estado_pedido;
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

	
	public function setIdEstadoPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_pedido !== $v) {
			$this->id_estado_pedido = $v;
			$this->modifiedColumns[] = EstadoPedidosPeer::ID_ESTADO_PEDIDO;
		}

	} 
	
	public function setEstadoPedido($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->estado_pedido !== $v) {
			$this->estado_pedido = $v;
			$this->modifiedColumns[] = EstadoPedidosPeer::ESTADO_PEDIDO;
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
			$this->modifiedColumns[] = EstadoPedidosPeer::CREATED_AT;
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
			$this->modifiedColumns[] = EstadoPedidosPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_estado_pedido = $rs->getInt($startcol + 0);

			$this->estado_pedido = $rs->getString($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EstadoPedidos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoPedidosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstadoPedidosPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EstadoPedidosPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EstadoPedidosPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoPedidosPeer::DATABASE_NAME);
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
					$pk = EstadoPedidosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdEstadoPedido($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadoPedidosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPedidoss !== null) {
				foreach($this->collPedidoss as $referrerFK) {
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


			if (($retval = EstadoPedidosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPedidoss !== null) {
					foreach($this->collPedidoss as $referrerFK) {
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
		$pos = EstadoPedidosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdEstadoPedido();
				break;
			case 1:
				return $this->getEstadoPedido();
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
		$keys = EstadoPedidosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdEstadoPedido(),
			$keys[1] => $this->getEstadoPedido(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadoPedidosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdEstadoPedido($value);
				break;
			case 1:
				$this->setEstadoPedido($value);
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
		$keys = EstadoPedidosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdEstadoPedido($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEstadoPedido($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadoPedidosPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadoPedidosPeer::ID_ESTADO_PEDIDO)) $criteria->add(EstadoPedidosPeer::ID_ESTADO_PEDIDO, $this->id_estado_pedido);
		if ($this->isColumnModified(EstadoPedidosPeer::ESTADO_PEDIDO)) $criteria->add(EstadoPedidosPeer::ESTADO_PEDIDO, $this->estado_pedido);
		if ($this->isColumnModified(EstadoPedidosPeer::CREATED_AT)) $criteria->add(EstadoPedidosPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EstadoPedidosPeer::UPDATED_AT)) $criteria->add(EstadoPedidosPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadoPedidosPeer::DATABASE_NAME);

		$criteria->add(EstadoPedidosPeer::ID_ESTADO_PEDIDO, $this->id_estado_pedido);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdEstadoPedido();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdEstadoPedido($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEstadoPedido($this->estado_pedido);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPedidoss() as $relObj) {
				$copyObj->addPedidos($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdEstadoPedido(NULL); 
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
			self::$peer = new EstadoPedidosPeer();
		}
		return self::$peer;
	}

	
	public function initPedidoss()
	{
		if ($this->collPedidoss === null) {
			$this->collPedidoss = array();
		}
	}

	
	public function getPedidoss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidoss === null) {
			if ($this->isNew()) {
			   $this->collPedidoss = array();
			} else {

				$criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->getIdEstadoPedido());

				PedidosPeer::addSelectColumns($criteria);
				$this->collPedidoss = PedidosPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->getIdEstadoPedido());

				PedidosPeer::addSelectColumns($criteria);
				if (!isset($this->lastPedidosCriteria) || !$this->lastPedidosCriteria->equals($criteria)) {
					$this->collPedidoss = PedidosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPedidosCriteria = $criteria;
		return $this->collPedidoss;
	}

	
	public function countPedidoss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->getIdEstadoPedido());

		return PedidosPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPedidos(Pedidos $l)
	{
		$this->collPedidoss[] = $l;
		$l->setEstadoPedidos($this);
	}


	
	public function getPedidossJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidoss === null) {
			if ($this->isNew()) {
				$this->collPedidoss = array();
			} else {

				$criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->getIdEstadoPedido());

				$this->collPedidoss = PedidosPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->getIdEstadoPedido());

			if (!isset($this->lastPedidosCriteria) || !$this->lastPedidosCriteria->equals($criteria)) {
				$this->collPedidoss = PedidosPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastPedidosCriteria = $criteria;

		return $this->collPedidoss;
	}


	
	public function getPedidossJoinProveedores($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidoss === null) {
			if ($this->isNew()) {
				$this->collPedidoss = array();
			} else {

				$criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->getIdEstadoPedido());

				$this->collPedidoss = PedidosPeer::doSelectJoinProveedores($criteria, $con);
			}
		} else {
									
			$criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->getIdEstadoPedido());

			if (!isset($this->lastPedidosCriteria) || !$this->lastPedidosCriteria->equals($criteria)) {
				$this->collPedidoss = PedidosPeer::doSelectJoinProveedores($criteria, $con);
			}
		}
		$this->lastPedidosCriteria = $criteria;

		return $this->collPedidoss;
	}

} 