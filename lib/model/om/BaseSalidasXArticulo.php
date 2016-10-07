<?php


abstract class BaseSalidasXArticulo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_salida_x_articulo;


	
	protected $id_salida;


	
	protected $id_articulo;


	
	protected $cantidad;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdSalidaXArticulo()
	{

		return $this->id_salida_x_articulo;
	}

	
	public function getIdSalida()
	{

		return $this->id_salida;
	}

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
	}

	
	public function getCantidad()
	{

		return $this->cantidad;
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

	
	public function setIdSalidaXArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_salida_x_articulo !== $v) {
			$this->id_salida_x_articulo = $v;
			$this->modifiedColumns[] = SalidasXArticuloPeer::ID_SALIDA_X_ARTICULO;
		}

	} 
	
	public function setIdSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_salida !== $v) {
			$this->id_salida = $v;
			$this->modifiedColumns[] = SalidasXArticuloPeer::ID_SALIDA;
		}

	} 
	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = SalidasXArticuloPeer::ID_ARTICULO;
		}

	} 
	
	public function setCantidad($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = SalidasXArticuloPeer::CANTIDAD;
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
			$this->modifiedColumns[] = SalidasXArticuloPeer::CREATED_AT;
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
			$this->modifiedColumns[] = SalidasXArticuloPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_salida_x_articulo = $rs->getInt($startcol + 0);

			$this->id_salida = $rs->getInt($startcol + 1);

			$this->id_articulo = $rs->getInt($startcol + 2);

			$this->cantidad = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SalidasXArticulo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SalidasXArticuloPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SalidasXArticuloPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(SalidasXArticuloPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(SalidasXArticuloPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SalidasXArticuloPeer::DATABASE_NAME);
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
					$pk = SalidasXArticuloPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdSalidaXArticulo($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SalidasXArticuloPeer::doUpdate($this, $con);
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


			if (($retval = SalidasXArticuloPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SalidasXArticuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdSalidaXArticulo();
				break;
			case 1:
				return $this->getIdSalida();
				break;
			case 2:
				return $this->getIdArticulo();
				break;
			case 3:
				return $this->getCantidad();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SalidasXArticuloPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdSalidaXArticulo(),
			$keys[1] => $this->getIdSalida(),
			$keys[2] => $this->getIdArticulo(),
			$keys[3] => $this->getCantidad(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SalidasXArticuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdSalidaXArticulo($value);
				break;
			case 1:
				$this->setIdSalida($value);
				break;
			case 2:
				$this->setIdArticulo($value);
				break;
			case 3:
				$this->setCantidad($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SalidasXArticuloPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdSalidaXArticulo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdSalida($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdArticulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SalidasXArticuloPeer::DATABASE_NAME);

		if ($this->isColumnModified(SalidasXArticuloPeer::ID_SALIDA_X_ARTICULO)) $criteria->add(SalidasXArticuloPeer::ID_SALIDA_X_ARTICULO, $this->id_salida_x_articulo);
		if ($this->isColumnModified(SalidasXArticuloPeer::ID_SALIDA)) $criteria->add(SalidasXArticuloPeer::ID_SALIDA, $this->id_salida);
		if ($this->isColumnModified(SalidasXArticuloPeer::ID_ARTICULO)) $criteria->add(SalidasXArticuloPeer::ID_ARTICULO, $this->id_articulo);
		if ($this->isColumnModified(SalidasXArticuloPeer::CANTIDAD)) $criteria->add(SalidasXArticuloPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(SalidasXArticuloPeer::CREATED_AT)) $criteria->add(SalidasXArticuloPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(SalidasXArticuloPeer::UPDATED_AT)) $criteria->add(SalidasXArticuloPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SalidasXArticuloPeer::DATABASE_NAME);

		$criteria->add(SalidasXArticuloPeer::ID_SALIDA_X_ARTICULO, $this->id_salida_x_articulo);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdSalidaXArticulo();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdSalidaXArticulo($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdSalida($this->id_salida);

		$copyObj->setIdArticulo($this->id_articulo);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdSalidaXArticulo(NULL); 
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
			self::$peer = new SalidasXArticuloPeer();
		}
		return self::$peer;
	}

} 