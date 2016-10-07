<?php


abstract class BaseAlbaranesPedido extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_albaran_pedido;


	
	protected $id_md5_albaran;


	
	protected $id_pedido;


	
	protected $num_albaran_pedido;


	
	protected $ruta_albaran;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aPedidos;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdAlbaranPedido()
	{

		return $this->id_albaran_pedido;
	}

	
	public function getIdMd5Albaran()
	{

		return $this->id_md5_albaran;
	}

	
	public function getIdPedido()
	{

		return $this->id_pedido;
	}

	
	public function getNumAlbaranPedido()
	{

		return $this->num_albaran_pedido;
	}

	
	public function getRutaAlbaran()
	{

		return $this->ruta_albaran;
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

	
	public function setIdAlbaranPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_albaran_pedido !== $v) {
			$this->id_albaran_pedido = $v;
			$this->modifiedColumns[] = AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO;
		}

	} 
	
	public function setIdMd5Albaran($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_albaran !== $v) {
			$this->id_md5_albaran = $v;
			$this->modifiedColumns[] = AlbaranesPedidoPeer::ID_MD5_ALBARAN;
		}

	} 
	
	public function setIdPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pedido !== $v) {
			$this->id_pedido = $v;
			$this->modifiedColumns[] = AlbaranesPedidoPeer::ID_PEDIDO;
		}

		if ($this->aPedidos !== null && $this->aPedidos->getIdPedido() !== $v) {
			$this->aPedidos = null;
		}

	} 
	
	public function setNumAlbaranPedido($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->num_albaran_pedido !== $v) {
			$this->num_albaran_pedido = $v;
			$this->modifiedColumns[] = AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO;
		}

	} 
	
	public function setRutaAlbaran($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ruta_albaran !== $v) {
			$this->ruta_albaran = $v;
			$this->modifiedColumns[] = AlbaranesPedidoPeer::RUTA_ALBARAN;
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
			$this->modifiedColumns[] = AlbaranesPedidoPeer::CREATED_AT;
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
			$this->modifiedColumns[] = AlbaranesPedidoPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_albaran_pedido = $rs->getInt($startcol + 0);

			$this->id_md5_albaran = $rs->getString($startcol + 1);

			$this->id_pedido = $rs->getInt($startcol + 2);

			$this->num_albaran_pedido = $rs->getString($startcol + 3);

			$this->ruta_albaran = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AlbaranesPedido object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlbaranesPedidoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AlbaranesPedidoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AlbaranesPedidoPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AlbaranesPedidoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlbaranesPedidoPeer::DATABASE_NAME);
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


												
			if ($this->aPedidos !== null) {
				if ($this->aPedidos->isModified()) {
					$affectedRows += $this->aPedidos->save($con);
				}
				$this->setPedidos($this->aPedidos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlbaranesPedidoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdAlbaranPedido($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AlbaranesPedidoPeer::doUpdate($this, $con);
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


												
			if ($this->aPedidos !== null) {
				if (!$this->aPedidos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPedidos->getValidationFailures());
				}
			}


			if (($retval = AlbaranesPedidoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlbaranesPedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdAlbaranPedido();
				break;
			case 1:
				return $this->getIdMd5Albaran();
				break;
			case 2:
				return $this->getIdPedido();
				break;
			case 3:
				return $this->getNumAlbaranPedido();
				break;
			case 4:
				return $this->getRutaAlbaran();
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
		$keys = AlbaranesPedidoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdAlbaranPedido(),
			$keys[1] => $this->getIdMd5Albaran(),
			$keys[2] => $this->getIdPedido(),
			$keys[3] => $this->getNumAlbaranPedido(),
			$keys[4] => $this->getRutaAlbaran(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlbaranesPedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdAlbaranPedido($value);
				break;
			case 1:
				$this->setIdMd5Albaran($value);
				break;
			case 2:
				$this->setIdPedido($value);
				break;
			case 3:
				$this->setNumAlbaranPedido($value);
				break;
			case 4:
				$this->setRutaAlbaran($value);
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
		$keys = AlbaranesPedidoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdAlbaranPedido($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Albaran($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdPedido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumAlbaranPedido($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRutaAlbaran($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlbaranesPedidoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO)) $criteria->add(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO, $this->id_albaran_pedido);
		if ($this->isColumnModified(AlbaranesPedidoPeer::ID_MD5_ALBARAN)) $criteria->add(AlbaranesPedidoPeer::ID_MD5_ALBARAN, $this->id_md5_albaran);
		if ($this->isColumnModified(AlbaranesPedidoPeer::ID_PEDIDO)) $criteria->add(AlbaranesPedidoPeer::ID_PEDIDO, $this->id_pedido);
		if ($this->isColumnModified(AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO)) $criteria->add(AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO, $this->num_albaran_pedido);
		if ($this->isColumnModified(AlbaranesPedidoPeer::RUTA_ALBARAN)) $criteria->add(AlbaranesPedidoPeer::RUTA_ALBARAN, $this->ruta_albaran);
		if ($this->isColumnModified(AlbaranesPedidoPeer::CREATED_AT)) $criteria->add(AlbaranesPedidoPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AlbaranesPedidoPeer::UPDATED_AT)) $criteria->add(AlbaranesPedidoPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlbaranesPedidoPeer::DATABASE_NAME);

		$criteria->add(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO, $this->id_albaran_pedido);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdAlbaranPedido();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdAlbaranPedido($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Albaran($this->id_md5_albaran);

		$copyObj->setIdPedido($this->id_pedido);

		$copyObj->setNumAlbaranPedido($this->num_albaran_pedido);

		$copyObj->setRutaAlbaran($this->ruta_albaran);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdAlbaranPedido(NULL); 
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
			self::$peer = new AlbaranesPedidoPeer();
		}
		return self::$peer;
	}

	
	public function setPedidos($v)
	{


		if ($v === null) {
			$this->setIdPedido(NULL);
		} else {
			$this->setIdPedido($v->getIdPedido());
		}


		$this->aPedidos = $v;
	}


	
	public function getPedidos($con = null)
	{
		if ($this->aPedidos === null && ($this->id_pedido !== null)) {
						include_once 'lib/model/om/BasePedidosPeer.php';

			$this->aPedidos = PedidosPeer::retrieveByPK($this->id_pedido, $con);

			
		}
		return $this->aPedidos;
	}

} 