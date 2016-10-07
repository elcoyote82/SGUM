<?php


abstract class BaseArticulosXSalida extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_articulo_x_salida;


	
	protected $id_articulo;


	
	protected $id_salida;


	
	protected $id_ubicacion;


	
	protected $lote;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aArticulos;

	
	protected $aSalidas;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdArticuloXSalida()
	{

		return $this->id_articulo_x_salida;
	}

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
	}

	
	public function getIdSalida()
	{

		return $this->id_salida;
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

	
	public function setIdArticuloXSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo_x_salida !== $v) {
			$this->id_articulo_x_salida = $v;
			$this->modifiedColumns[] = ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA;
		}

	} 
	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = ArticulosXSalidaPeer::ID_ARTICULO;
		}

		if ($this->aArticulos !== null && $this->aArticulos->getIdArticulo() !== $v) {
			$this->aArticulos = null;
		}

	} 
	
	public function setIdSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_salida !== $v) {
			$this->id_salida = $v;
			$this->modifiedColumns[] = ArticulosXSalidaPeer::ID_SALIDA;
		}

		if ($this->aSalidas !== null && $this->aSalidas->getIdSalida() !== $v) {
			$this->aSalidas = null;
		}

	} 
	
	public function setIdUbicacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_ubicacion !== $v) {
			$this->id_ubicacion = $v;
			$this->modifiedColumns[] = ArticulosXSalidaPeer::ID_UBICACION;
		}

	} 
	
	public function setLote($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->lote !== $v) {
			$this->lote = $v;
			$this->modifiedColumns[] = ArticulosXSalidaPeer::LOTE;
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
			$this->modifiedColumns[] = ArticulosXSalidaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ArticulosXSalidaPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_articulo_x_salida = $rs->getInt($startcol + 0);

			$this->id_articulo = $rs->getInt($startcol + 1);

			$this->id_salida = $rs->getInt($startcol + 2);

			$this->id_ubicacion = $rs->getInt($startcol + 3);

			$this->lote = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticulosXSalida object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXSalidaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticulosXSalidaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ArticulosXSalidaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticulosXSalidaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXSalidaPeer::DATABASE_NAME);
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

			if ($this->aSalidas !== null) {
				if ($this->aSalidas->isModified()) {
					$affectedRows += $this->aSalidas->save($con);
				}
				$this->setSalidas($this->aSalidas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticulosXSalidaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdArticuloXSalida($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticulosXSalidaPeer::doUpdate($this, $con);
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

			if ($this->aSalidas !== null) {
				if (!$this->aSalidas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSalidas->getValidationFailures());
				}
			}


			if (($retval = ArticulosXSalidaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXSalidaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdArticuloXSalida();
				break;
			case 1:
				return $this->getIdArticulo();
				break;
			case 2:
				return $this->getIdSalida();
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
		$keys = ArticulosXSalidaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdArticuloXSalida(),
			$keys[1] => $this->getIdArticulo(),
			$keys[2] => $this->getIdSalida(),
			$keys[3] => $this->getIdUbicacion(),
			$keys[4] => $this->getLote(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXSalidaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdArticuloXSalida($value);
				break;
			case 1:
				$this->setIdArticulo($value);
				break;
			case 2:
				$this->setIdSalida($value);
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
		$keys = ArticulosXSalidaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdArticuloXSalida($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdArticulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdSalida($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdUbicacion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLote($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticulosXSalidaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA)) $criteria->add(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA, $this->id_articulo_x_salida);
		if ($this->isColumnModified(ArticulosXSalidaPeer::ID_ARTICULO)) $criteria->add(ArticulosXSalidaPeer::ID_ARTICULO, $this->id_articulo);
		if ($this->isColumnModified(ArticulosXSalidaPeer::ID_SALIDA)) $criteria->add(ArticulosXSalidaPeer::ID_SALIDA, $this->id_salida);
		if ($this->isColumnModified(ArticulosXSalidaPeer::ID_UBICACION)) $criteria->add(ArticulosXSalidaPeer::ID_UBICACION, $this->id_ubicacion);
		if ($this->isColumnModified(ArticulosXSalidaPeer::LOTE)) $criteria->add(ArticulosXSalidaPeer::LOTE, $this->lote);
		if ($this->isColumnModified(ArticulosXSalidaPeer::CREATED_AT)) $criteria->add(ArticulosXSalidaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticulosXSalidaPeer::UPDATED_AT)) $criteria->add(ArticulosXSalidaPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticulosXSalidaPeer::DATABASE_NAME);

		$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA, $this->id_articulo_x_salida);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdArticuloXSalida();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdArticuloXSalida($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdArticulo($this->id_articulo);

		$copyObj->setIdSalida($this->id_salida);

		$copyObj->setIdUbicacion($this->id_ubicacion);

		$copyObj->setLote($this->lote);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdArticuloXSalida(NULL); 
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
			self::$peer = new ArticulosXSalidaPeer();
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

} 