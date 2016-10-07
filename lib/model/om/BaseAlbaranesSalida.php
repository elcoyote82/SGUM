<?php


abstract class BaseAlbaranesSalida extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_albaran_salida;


	
	protected $id_md5_albaran;


	
	protected $id_salida;


	
	protected $id_venta;


	
	protected $num_albaran_salida;


	
	protected $ruta_albaran;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aSalidas;

	
	protected $aVentas;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdAlbaranSalida()
	{

		return $this->id_albaran_salida;
	}

	
	public function getIdMd5Albaran()
	{

		return $this->id_md5_albaran;
	}

	
	public function getIdSalida()
	{

		return $this->id_salida;
	}

	
	public function getIdVenta()
	{

		return $this->id_venta;
	}

	
	public function getNumAlbaranSalida()
	{

		return $this->num_albaran_salida;
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

	
	public function setIdAlbaranSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_albaran_salida !== $v) {
			$this->id_albaran_salida = $v;
			$this->modifiedColumns[] = AlbaranesSalidaPeer::ID_ALBARAN_SALIDA;
		}

	} 
	
	public function setIdMd5Albaran($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_albaran !== $v) {
			$this->id_md5_albaran = $v;
			$this->modifiedColumns[] = AlbaranesSalidaPeer::ID_MD5_ALBARAN;
		}

	} 
	
	public function setIdSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_salida !== $v) {
			$this->id_salida = $v;
			$this->modifiedColumns[] = AlbaranesSalidaPeer::ID_SALIDA;
		}

		if ($this->aSalidas !== null && $this->aSalidas->getIdSalida() !== $v) {
			$this->aSalidas = null;
		}

	} 
	
	public function setIdVenta($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_venta !== $v) {
			$this->id_venta = $v;
			$this->modifiedColumns[] = AlbaranesSalidaPeer::ID_VENTA;
		}

		if ($this->aVentas !== null && $this->aVentas->getIdVenta() !== $v) {
			$this->aVentas = null;
		}

	} 
	
	public function setNumAlbaranSalida($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->num_albaran_salida !== $v) {
			$this->num_albaran_salida = $v;
			$this->modifiedColumns[] = AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA;
		}

	} 
	
	public function setRutaAlbaran($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ruta_albaran !== $v) {
			$this->ruta_albaran = $v;
			$this->modifiedColumns[] = AlbaranesSalidaPeer::RUTA_ALBARAN;
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
			$this->modifiedColumns[] = AlbaranesSalidaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = AlbaranesSalidaPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_albaran_salida = $rs->getInt($startcol + 0);

			$this->id_md5_albaran = $rs->getString($startcol + 1);

			$this->id_salida = $rs->getInt($startcol + 2);

			$this->id_venta = $rs->getInt($startcol + 3);

			$this->num_albaran_salida = $rs->getString($startcol + 4);

			$this->ruta_albaran = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AlbaranesSalida object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlbaranesSalidaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AlbaranesSalidaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AlbaranesSalidaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AlbaranesSalidaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlbaranesSalidaPeer::DATABASE_NAME);
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


												
			if ($this->aSalidas !== null) {
				if ($this->aSalidas->isModified()) {
					$affectedRows += $this->aSalidas->save($con);
				}
				$this->setSalidas($this->aSalidas);
			}

			if ($this->aVentas !== null) {
				if ($this->aVentas->isModified()) {
					$affectedRows += $this->aVentas->save($con);
				}
				$this->setVentas($this->aVentas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlbaranesSalidaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdAlbaranSalida($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AlbaranesSalidaPeer::doUpdate($this, $con);
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


												
			if ($this->aSalidas !== null) {
				if (!$this->aSalidas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSalidas->getValidationFailures());
				}
			}

			if ($this->aVentas !== null) {
				if (!$this->aVentas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVentas->getValidationFailures());
				}
			}


			if (($retval = AlbaranesSalidaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlbaranesSalidaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdAlbaranSalida();
				break;
			case 1:
				return $this->getIdMd5Albaran();
				break;
			case 2:
				return $this->getIdSalida();
				break;
			case 3:
				return $this->getIdVenta();
				break;
			case 4:
				return $this->getNumAlbaranSalida();
				break;
			case 5:
				return $this->getRutaAlbaran();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlbaranesSalidaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdAlbaranSalida(),
			$keys[1] => $this->getIdMd5Albaran(),
			$keys[2] => $this->getIdSalida(),
			$keys[3] => $this->getIdVenta(),
			$keys[4] => $this->getNumAlbaranSalida(),
			$keys[5] => $this->getRutaAlbaran(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlbaranesSalidaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdAlbaranSalida($value);
				break;
			case 1:
				$this->setIdMd5Albaran($value);
				break;
			case 2:
				$this->setIdSalida($value);
				break;
			case 3:
				$this->setIdVenta($value);
				break;
			case 4:
				$this->setNumAlbaranSalida($value);
				break;
			case 5:
				$this->setRutaAlbaran($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlbaranesSalidaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdAlbaranSalida($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Albaran($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdSalida($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdVenta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumAlbaranSalida($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRutaAlbaran($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlbaranesSalidaPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA)) $criteria->add(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA, $this->id_albaran_salida);
		if ($this->isColumnModified(AlbaranesSalidaPeer::ID_MD5_ALBARAN)) $criteria->add(AlbaranesSalidaPeer::ID_MD5_ALBARAN, $this->id_md5_albaran);
		if ($this->isColumnModified(AlbaranesSalidaPeer::ID_SALIDA)) $criteria->add(AlbaranesSalidaPeer::ID_SALIDA, $this->id_salida);
		if ($this->isColumnModified(AlbaranesSalidaPeer::ID_VENTA)) $criteria->add(AlbaranesSalidaPeer::ID_VENTA, $this->id_venta);
		if ($this->isColumnModified(AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA)) $criteria->add(AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA, $this->num_albaran_salida);
		if ($this->isColumnModified(AlbaranesSalidaPeer::RUTA_ALBARAN)) $criteria->add(AlbaranesSalidaPeer::RUTA_ALBARAN, $this->ruta_albaran);
		if ($this->isColumnModified(AlbaranesSalidaPeer::CREATED_AT)) $criteria->add(AlbaranesSalidaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AlbaranesSalidaPeer::UPDATED_AT)) $criteria->add(AlbaranesSalidaPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlbaranesSalidaPeer::DATABASE_NAME);

		$criteria->add(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA, $this->id_albaran_salida);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdAlbaranSalida();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdAlbaranSalida($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Albaran($this->id_md5_albaran);

		$copyObj->setIdSalida($this->id_salida);

		$copyObj->setIdVenta($this->id_venta);

		$copyObj->setNumAlbaranSalida($this->num_albaran_salida);

		$copyObj->setRutaAlbaran($this->ruta_albaran);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdAlbaranSalida(NULL); 
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
			self::$peer = new AlbaranesSalidaPeer();
		}
		return self::$peer;
	}

	
	public function setSalidas($v)
	{


		if ($v === null) {
			$this->setIdSalida(NULL);
		} else {
			$this->setIdSalida($v->getIdSalida());
		}


		$this->aSalidas = $v;
	}


	
	public function getSalidas($con = null)
	{
		if ($this->aSalidas === null && ($this->id_salida !== null)) {
						include_once 'lib/model/om/BaseSalidasPeer.php';

			$this->aSalidas = SalidasPeer::retrieveByPK($this->id_salida, $con);

			
		}
		return $this->aSalidas;
	}

	
	public function setVentas($v)
	{


		if ($v === null) {
			$this->setIdVenta(NULL);
		} else {
			$this->setIdVenta($v->getIdVenta());
		}


		$this->aVentas = $v;
	}


	
	public function getVentas($con = null)
	{
		if ($this->aVentas === null && ($this->id_venta !== null)) {
						include_once 'lib/model/om/BaseVentasPeer.php';

			$this->aVentas = VentasPeer::retrieveByPK($this->id_venta, $con);

			
		}
		return $this->aVentas;
	}

} 