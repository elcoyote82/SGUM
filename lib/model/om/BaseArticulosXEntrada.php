<?php


abstract class BaseArticulosXEntrada extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_articulo_x_entrada;


	
	protected $id_articulo;


	
	protected $id_entrada;


	
	protected $id_ubicacion;


	
	protected $lote;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdArticuloXEntrada()
	{

		return $this->id_articulo_x_entrada;
	}

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
	}

	
	public function getIdEntrada()
	{

		return $this->id_entrada;
	}

	
	public function getIdUbicacion()
	{

		return $this->id_ubicacion;
	}

	
	public function getLote()
	{

		return $this->lote;
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

	
	public function setIdArticuloXEntrada($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo_x_entrada !== $v) {
			$this->id_articulo_x_entrada = $v;
			$this->modifiedColumns[] = ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA;
		}

	} 
	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = ArticulosXEntradaPeer::ID_ARTICULO;
		}

	} 
	
	public function setIdEntrada($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_entrada !== $v) {
			$this->id_entrada = $v;
			$this->modifiedColumns[] = ArticulosXEntradaPeer::ID_ENTRADA;
		}

	} 
	
	public function setIdUbicacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_ubicacion !== $v) {
			$this->id_ubicacion = $v;
			$this->modifiedColumns[] = ArticulosXEntradaPeer::ID_UBICACION;
		}

	} 
	
	public function setLote($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->lote !== $v) {
			$this->lote = $v;
			$this->modifiedColumns[] = ArticulosXEntradaPeer::LOTE;
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
			$this->modifiedColumns[] = ArticulosXEntradaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ArticulosXEntradaPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_articulo_x_entrada = $rs->getInt($startcol + 0);

			$this->id_articulo = $rs->getInt($startcol + 1);

			$this->id_entrada = $rs->getInt($startcol + 2);

			$this->id_ubicacion = $rs->getInt($startcol + 3);

			$this->lote = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticulosXEntrada object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXEntradaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticulosXEntradaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ArticulosXEntradaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticulosXEntradaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXEntradaPeer::DATABASE_NAME);
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
					$pk = ArticulosXEntradaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdArticuloXEntrada($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticulosXEntradaPeer::doUpdate($this, $con);
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


			if (($retval = ArticulosXEntradaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXEntradaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdArticuloXEntrada();
				break;
			case 1:
				return $this->getIdArticulo();
				break;
			case 2:
				return $this->getIdEntrada();
				break;
			case 3:
				return $this->getIdUbicacion();
				break;
			case 4:
				return $this->getLote();
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
		$keys = ArticulosXEntradaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdArticuloXEntrada(),
			$keys[1] => $this->getIdArticulo(),
			$keys[2] => $this->getIdEntrada(),
			$keys[3] => $this->getIdUbicacion(),
			$keys[4] => $this->getLote(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXEntradaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdArticuloXEntrada($value);
				break;
			case 1:
				$this->setIdArticulo($value);
				break;
			case 2:
				$this->setIdEntrada($value);
				break;
			case 3:
				$this->setIdUbicacion($value);
				break;
			case 4:
				$this->setLote($value);
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
		$keys = ArticulosXEntradaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdArticuloXEntrada($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdArticulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdEntrada($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdUbicacion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLote($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticulosXEntradaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA)) $criteria->add(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA, $this->id_articulo_x_entrada);
		if ($this->isColumnModified(ArticulosXEntradaPeer::ID_ARTICULO)) $criteria->add(ArticulosXEntradaPeer::ID_ARTICULO, $this->id_articulo);
		if ($this->isColumnModified(ArticulosXEntradaPeer::ID_ENTRADA)) $criteria->add(ArticulosXEntradaPeer::ID_ENTRADA, $this->id_entrada);
		if ($this->isColumnModified(ArticulosXEntradaPeer::ID_UBICACION)) $criteria->add(ArticulosXEntradaPeer::ID_UBICACION, $this->id_ubicacion);
		if ($this->isColumnModified(ArticulosXEntradaPeer::LOTE)) $criteria->add(ArticulosXEntradaPeer::LOTE, $this->lote);
		if ($this->isColumnModified(ArticulosXEntradaPeer::CREATED_AT)) $criteria->add(ArticulosXEntradaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticulosXEntradaPeer::UPDATED_AT)) $criteria->add(ArticulosXEntradaPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticulosXEntradaPeer::DATABASE_NAME);

		$criteria->add(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA, $this->id_articulo_x_entrada);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdArticuloXEntrada();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdArticuloXEntrada($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdArticulo($this->id_articulo);

		$copyObj->setIdEntrada($this->id_entrada);

		$copyObj->setIdUbicacion($this->id_ubicacion);

		$copyObj->setLote($this->lote);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdArticuloXEntrada(NULL); 
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
			self::$peer = new ArticulosXEntradaPeer();
		}
		return self::$peer;
	}

} 