<?php


abstract class BaseArticulosXLote extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_articulo_x_lote;


	
	protected $id_articulo;


	
	protected $id_ubicacion;


	
	protected $lote;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aArticulos;

	
	protected $aUbicaciones;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdArticuloXLote()
	{

		return $this->id_articulo_x_lote;
	}

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
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

	
	public function setIdArticuloXLote($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo_x_lote !== $v) {
			$this->id_articulo_x_lote = $v;
			$this->modifiedColumns[] = ArticulosXLotePeer::ID_ARTICULO_X_LOTE;
		}

	} 
	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = ArticulosXLotePeer::ID_ARTICULO;
		}

		if ($this->aArticulos !== null && $this->aArticulos->getIdArticulo() !== $v) {
			$this->aArticulos = null;
		}

	} 
	
	public function setIdUbicacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_ubicacion !== $v) {
			$this->id_ubicacion = $v;
			$this->modifiedColumns[] = ArticulosXLotePeer::ID_UBICACION;
		}

		if ($this->aUbicaciones !== null && $this->aUbicaciones->getIdUbicacion() !== $v) {
			$this->aUbicaciones = null;
		}

	} 
	
	public function setLote($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->lote !== $v) {
			$this->lote = $v;
			$this->modifiedColumns[] = ArticulosXLotePeer::LOTE;
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
			$this->modifiedColumns[] = ArticulosXLotePeer::CREATED_AT;
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
			$this->modifiedColumns[] = ArticulosXLotePeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_articulo_x_lote = $rs->getInt($startcol + 0);

			$this->id_articulo = $rs->getInt($startcol + 1);

			$this->id_ubicacion = $rs->getInt($startcol + 2);

			$this->lote = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticulosXLote object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXLotePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticulosXLotePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ArticulosXLotePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticulosXLotePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXLotePeer::DATABASE_NAME);
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


												
			if ($this->aArticulos !== null) {
				if ($this->aArticulos->isModified()) {
					$affectedRows += $this->aArticulos->save($con);
				}
				$this->setArticulos($this->aArticulos);
			}

			if ($this->aUbicaciones !== null) {
				if ($this->aUbicaciones->isModified()) {
					$affectedRows += $this->aUbicaciones->save($con);
				}
				$this->setUbicaciones($this->aUbicaciones);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticulosXLotePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdArticuloXLote($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticulosXLotePeer::doUpdate($this, $con);
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


												
			if ($this->aArticulos !== null) {
				if (!$this->aArticulos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticulos->getValidationFailures());
				}
			}

			if ($this->aUbicaciones !== null) {
				if (!$this->aUbicaciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUbicaciones->getValidationFailures());
				}
			}


			if (($retval = ArticulosXLotePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXLotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdArticuloXLote();
				break;
			case 1:
				return $this->getIdArticulo();
				break;
			case 2:
				return $this->getIdUbicacion();
				break;
			case 3:
				return $this->getLote();
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
		$keys = ArticulosXLotePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdArticuloXLote(),
			$keys[1] => $this->getIdArticulo(),
			$keys[2] => $this->getIdUbicacion(),
			$keys[3] => $this->getLote(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXLotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdArticuloXLote($value);
				break;
			case 1:
				$this->setIdArticulo($value);
				break;
			case 2:
				$this->setIdUbicacion($value);
				break;
			case 3:
				$this->setLote($value);
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
		$keys = ArticulosXLotePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdArticuloXLote($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdArticulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdUbicacion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLote($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticulosXLotePeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticulosXLotePeer::ID_ARTICULO_X_LOTE)) $criteria->add(ArticulosXLotePeer::ID_ARTICULO_X_LOTE, $this->id_articulo_x_lote);
		if ($this->isColumnModified(ArticulosXLotePeer::ID_ARTICULO)) $criteria->add(ArticulosXLotePeer::ID_ARTICULO, $this->id_articulo);
		if ($this->isColumnModified(ArticulosXLotePeer::ID_UBICACION)) $criteria->add(ArticulosXLotePeer::ID_UBICACION, $this->id_ubicacion);
		if ($this->isColumnModified(ArticulosXLotePeer::LOTE)) $criteria->add(ArticulosXLotePeer::LOTE, $this->lote);
		if ($this->isColumnModified(ArticulosXLotePeer::CREATED_AT)) $criteria->add(ArticulosXLotePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticulosXLotePeer::UPDATED_AT)) $criteria->add(ArticulosXLotePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticulosXLotePeer::DATABASE_NAME);

		$criteria->add(ArticulosXLotePeer::ID_ARTICULO_X_LOTE, $this->id_articulo_x_lote);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdArticuloXLote();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdArticuloXLote($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdArticulo($this->id_articulo);

		$copyObj->setIdUbicacion($this->id_ubicacion);

		$copyObj->setLote($this->lote);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdArticuloXLote(NULL); 
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
			self::$peer = new ArticulosXLotePeer();
		}
		return self::$peer;
	}

	
	public function setArticulos($v)
	{


		if ($v === null) {
			$this->setIdArticulo(NULL);
		} else {
			$this->setIdArticulo($v->getIdArticulo());
		}


		$this->aArticulos = $v;
	}


	
	public function getArticulos($con = null)
	{
		if ($this->aArticulos === null && ($this->id_articulo !== null)) {
						include_once 'lib/model/om/BaseArticulosPeer.php';

			$this->aArticulos = ArticulosPeer::retrieveByPK($this->id_articulo, $con);

			
		}
		return $this->aArticulos;
	}

	
	public function setUbicaciones($v)
	{


		if ($v === null) {
			$this->setIdUbicacion(NULL);
		} else {
			$this->setIdUbicacion($v->getIdUbicacion());
		}


		$this->aUbicaciones = $v;
	}


	
	public function getUbicaciones($con = null)
	{
		if ($this->aUbicaciones === null && ($this->id_ubicacion !== null)) {
						include_once 'lib/model/om/BaseUbicacionesPeer.php';

			$this->aUbicaciones = UbicacionesPeer::retrieveByPK($this->id_ubicacion, $con);

			
		}
		return $this->aUbicaciones;
	}

} 