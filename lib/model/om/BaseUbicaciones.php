<?php


abstract class BaseUbicaciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_ubicacion;


	
	protected $id_md5_ubicacion;


	
	protected $nombre;


	
	protected $id_estado_ubicacion;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aEstadoUbicaciones;

	
	protected $collArticulosXLotes;

	
	protected $lastArticulosXLoteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdUbicacion()
	{

		return $this->id_ubicacion;
	}

	
	public function getIdMd5Ubicacion()
	{

		return $this->id_md5_ubicacion;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getIdEstadoUbicacion()
	{

		return $this->id_estado_ubicacion;
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

	
	public function setIdUbicacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_ubicacion !== $v) {
			$this->id_ubicacion = $v;
			$this->modifiedColumns[] = UbicacionesPeer::ID_UBICACION;
		}

	} 
	
	public function setIdMd5Ubicacion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_ubicacion !== $v) {
			$this->id_md5_ubicacion = $v;
			$this->modifiedColumns[] = UbicacionesPeer::ID_MD5_UBICACION;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = UbicacionesPeer::NOMBRE;
		}

	} 
	
	public function setIdEstadoUbicacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_ubicacion !== $v) {
			$this->id_estado_ubicacion = $v;
			$this->modifiedColumns[] = UbicacionesPeer::ID_ESTADO_UBICACION;
		}

		if ($this->aEstadoUbicaciones !== null && $this->aEstadoUbicaciones->getIdEstadoUbicacion() !== $v) {
			$this->aEstadoUbicaciones = null;
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
			$this->modifiedColumns[] = UbicacionesPeer::CREATED_AT;
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
			$this->modifiedColumns[] = UbicacionesPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_ubicacion = $rs->getInt($startcol + 0);

			$this->id_md5_ubicacion = $rs->getString($startcol + 1);

			$this->nombre = $rs->getString($startcol + 2);

			$this->id_estado_ubicacion = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ubicaciones object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UbicacionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UbicacionesPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(UbicacionesPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(UbicacionesPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UbicacionesPeer::DATABASE_NAME);
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


												
			if ($this->aEstadoUbicaciones !== null) {
				if ($this->aEstadoUbicaciones->isModified()) {
					$affectedRows += $this->aEstadoUbicaciones->save($con);
				}
				$this->setEstadoUbicaciones($this->aEstadoUbicaciones);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UbicacionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdUbicacion($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UbicacionesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticulosXLotes !== null) {
				foreach($this->collArticulosXLotes as $referrerFK) {
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


												
			if ($this->aEstadoUbicaciones !== null) {
				if (!$this->aEstadoUbicaciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadoUbicaciones->getValidationFailures());
				}
			}


			if (($retval = UbicacionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticulosXLotes !== null) {
					foreach($this->collArticulosXLotes as $referrerFK) {
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
		$pos = UbicacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdUbicacion();
				break;
			case 1:
				return $this->getIdMd5Ubicacion();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getIdEstadoUbicacion();
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
		$keys = UbicacionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdUbicacion(),
			$keys[1] => $this->getIdMd5Ubicacion(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getIdEstadoUbicacion(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UbicacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdUbicacion($value);
				break;
			case 1:
				$this->setIdMd5Ubicacion($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setIdEstadoUbicacion($value);
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
		$keys = UbicacionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdUbicacion($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Ubicacion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdEstadoUbicacion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UbicacionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(UbicacionesPeer::ID_UBICACION)) $criteria->add(UbicacionesPeer::ID_UBICACION, $this->id_ubicacion);
		if ($this->isColumnModified(UbicacionesPeer::ID_MD5_UBICACION)) $criteria->add(UbicacionesPeer::ID_MD5_UBICACION, $this->id_md5_ubicacion);
		if ($this->isColumnModified(UbicacionesPeer::NOMBRE)) $criteria->add(UbicacionesPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(UbicacionesPeer::ID_ESTADO_UBICACION)) $criteria->add(UbicacionesPeer::ID_ESTADO_UBICACION, $this->id_estado_ubicacion);
		if ($this->isColumnModified(UbicacionesPeer::CREATED_AT)) $criteria->add(UbicacionesPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(UbicacionesPeer::UPDATED_AT)) $criteria->add(UbicacionesPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UbicacionesPeer::DATABASE_NAME);

		$criteria->add(UbicacionesPeer::ID_UBICACION, $this->id_ubicacion);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdUbicacion();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdUbicacion($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Ubicacion($this->id_md5_ubicacion);

		$copyObj->setNombre($this->nombre);

		$copyObj->setIdEstadoUbicacion($this->id_estado_ubicacion);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticulosXLotes() as $relObj) {
				$copyObj->addArticulosXLote($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdUbicacion(NULL); 
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
			self::$peer = new UbicacionesPeer();
		}
		return self::$peer;
	}

	
	public function setEstadoUbicaciones($v)
	{


		if ($v === null) {
			$this->setIdEstadoUbicacion(NULL);
		} else {
			$this->setIdEstadoUbicacion($v->getIdEstadoUbicacion());
		}


		$this->aEstadoUbicaciones = $v;
	}


	
	public function getEstadoUbicaciones($con = null)
	{
		if ($this->aEstadoUbicaciones === null && ($this->id_estado_ubicacion !== null)) {
						include_once 'lib/model/om/BaseEstadoUbicacionesPeer.php';

			$this->aEstadoUbicaciones = EstadoUbicacionesPeer::retrieveByPK($this->id_estado_ubicacion, $con);

			
		}
		return $this->aEstadoUbicaciones;
	}

	
	public function initArticulosXLotes()
	{
		if ($this->collArticulosXLotes === null) {
			$this->collArticulosXLotes = array();
		}
	}

	
	public function getArticulosXLotes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXLotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXLotes === null) {
			if ($this->isNew()) {
			   $this->collArticulosXLotes = array();
			} else {

				$criteria->add(ArticulosXLotePeer::ID_UBICACION, $this->getIdUbicacion());

				ArticulosXLotePeer::addSelectColumns($criteria);
				$this->collArticulosXLotes = ArticulosXLotePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXLotePeer::ID_UBICACION, $this->getIdUbicacion());

				ArticulosXLotePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticulosXLoteCriteria) || !$this->lastArticulosXLoteCriteria->equals($criteria)) {
					$this->collArticulosXLotes = ArticulosXLotePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticulosXLoteCriteria = $criteria;
		return $this->collArticulosXLotes;
	}

	
	public function countArticulosXLotes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXLotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticulosXLotePeer::ID_UBICACION, $this->getIdUbicacion());

		return ArticulosXLotePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXLote(ArticulosXLote $l)
	{
		$this->collArticulosXLotes[] = $l;
		$l->setUbicaciones($this);
	}


	
	public function getArticulosXLotesJoinArticulos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXLotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXLotes === null) {
			if ($this->isNew()) {
				$this->collArticulosXLotes = array();
			} else {

				$criteria->add(ArticulosXLotePeer::ID_UBICACION, $this->getIdUbicacion());

				$this->collArticulosXLotes = ArticulosXLotePeer::doSelectJoinArticulos($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXLotePeer::ID_UBICACION, $this->getIdUbicacion());

			if (!isset($this->lastArticulosXLoteCriteria) || !$this->lastArticulosXLoteCriteria->equals($criteria)) {
				$this->collArticulosXLotes = ArticulosXLotePeer::doSelectJoinArticulos($criteria, $con);
			}
		}
		$this->lastArticulosXLoteCriteria = $criteria;

		return $this->collArticulosXLotes;
	}

} 