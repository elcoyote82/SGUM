<?php


abstract class BaseFamilias extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_familia;


	
	protected $id_md5_familia;


	
	protected $nombre;


	
	protected $borrado;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collArticuloss;

	
	protected $lastArticulosCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdFamilia()
	{

		return $this->id_familia;
	}

	
	public function getIdMd5Familia()
	{

		return $this->id_md5_familia;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getBorrado()
	{

		return $this->borrado;
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

	
	public function setIdFamilia($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_familia !== $v) {
			$this->id_familia = $v;
			$this->modifiedColumns[] = FamiliasPeer::ID_FAMILIA;
		}

	} 
	
	public function setIdMd5Familia($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_familia !== $v) {
			$this->id_md5_familia = $v;
			$this->modifiedColumns[] = FamiliasPeer::ID_MD5_FAMILIA;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = FamiliasPeer::NOMBRE;
		}

	} 
	
	public function setBorrado($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->borrado !== $v) {
			$this->borrado = $v;
			$this->modifiedColumns[] = FamiliasPeer::BORRADO;
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
			$this->modifiedColumns[] = FamiliasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = FamiliasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_familia = $rs->getInt($startcol + 0);

			$this->id_md5_familia = $rs->getString($startcol + 1);

			$this->nombre = $rs->getString($startcol + 2);

			$this->borrado = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Familias object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FamiliasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FamiliasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(FamiliasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(FamiliasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FamiliasPeer::DATABASE_NAME);
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
					$pk = FamiliasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdFamilia($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FamiliasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticuloss !== null) {
				foreach($this->collArticuloss as $referrerFK) {
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


			if (($retval = FamiliasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticuloss !== null) {
					foreach($this->collArticuloss as $referrerFK) {
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
		$pos = FamiliasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdFamilia();
				break;
			case 1:
				return $this->getIdMd5Familia();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getBorrado();
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
		$keys = FamiliasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdFamilia(),
			$keys[1] => $this->getIdMd5Familia(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getBorrado(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamiliasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdFamilia($value);
				break;
			case 1:
				$this->setIdMd5Familia($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setBorrado($value);
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
		$keys = FamiliasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdFamilia($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Familia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBorrado($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FamiliasPeer::DATABASE_NAME);

		if ($this->isColumnModified(FamiliasPeer::ID_FAMILIA)) $criteria->add(FamiliasPeer::ID_FAMILIA, $this->id_familia);
		if ($this->isColumnModified(FamiliasPeer::ID_MD5_FAMILIA)) $criteria->add(FamiliasPeer::ID_MD5_FAMILIA, $this->id_md5_familia);
		if ($this->isColumnModified(FamiliasPeer::NOMBRE)) $criteria->add(FamiliasPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(FamiliasPeer::BORRADO)) $criteria->add(FamiliasPeer::BORRADO, $this->borrado);
		if ($this->isColumnModified(FamiliasPeer::CREATED_AT)) $criteria->add(FamiliasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FamiliasPeer::UPDATED_AT)) $criteria->add(FamiliasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FamiliasPeer::DATABASE_NAME);

		$criteria->add(FamiliasPeer::ID_FAMILIA, $this->id_familia);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdFamilia();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdFamilia($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Familia($this->id_md5_familia);

		$copyObj->setNombre($this->nombre);

		$copyObj->setBorrado($this->borrado);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticuloss() as $relObj) {
				$copyObj->addArticulos($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdFamilia(NULL); 
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
			self::$peer = new FamiliasPeer();
		}
		return self::$peer;
	}

	
	public function initArticuloss()
	{
		if ($this->collArticuloss === null) {
			$this->collArticuloss = array();
		}
	}

	
	public function getArticuloss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticuloss === null) {
			if ($this->isNew()) {
			   $this->collArticuloss = array();
			} else {

				$criteria->add(ArticulosPeer::ID_FAMILIA, $this->getIdFamilia());

				ArticulosPeer::addSelectColumns($criteria);
				$this->collArticuloss = ArticulosPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosPeer::ID_FAMILIA, $this->getIdFamilia());

				ArticulosPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticulosCriteria) || !$this->lastArticulosCriteria->equals($criteria)) {
					$this->collArticuloss = ArticulosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticulosCriteria = $criteria;
		return $this->collArticuloss;
	}

	
	public function countArticuloss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticulosPeer::ID_FAMILIA, $this->getIdFamilia());

		return ArticulosPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulos(Articulos $l)
	{
		$this->collArticuloss[] = $l;
		$l->setFamilias($this);
	}

} 