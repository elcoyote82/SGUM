<?php


abstract class BaseArticulosXProveedor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_articulo_x_proveedor;


	
	protected $id_articulo;


	
	protected $id_proveedor;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aArticulos;

	
	protected $aProveedores;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdArticuloXProveedor()
	{

		return $this->id_articulo_x_proveedor;
	}

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
	}

	
	public function getIdProveedor()
	{

		return $this->id_proveedor;
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

	
	public function setIdArticuloXProveedor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo_x_proveedor !== $v) {
			$this->id_articulo_x_proveedor = $v;
			$this->modifiedColumns[] = ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR;
		}

	} 
	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = ArticulosXProveedorPeer::ID_ARTICULO;
		}

		if ($this->aArticulos !== null && $this->aArticulos->getIdArticulo() !== $v) {
			$this->aArticulos = null;
		}

	} 
	
	public function setIdProveedor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_proveedor !== $v) {
			$this->id_proveedor = $v;
			$this->modifiedColumns[] = ArticulosXProveedorPeer::ID_PROVEEDOR;
		}

		if ($this->aProveedores !== null && $this->aProveedores->getIdProveedor() !== $v) {
			$this->aProveedores = null;
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
			$this->modifiedColumns[] = ArticulosXProveedorPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ArticulosXProveedorPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_articulo_x_proveedor = $rs->getInt($startcol + 0);

			$this->id_articulo = $rs->getInt($startcol + 1);

			$this->id_proveedor = $rs->getInt($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->updated_at = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticulosXProveedor object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXProveedorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticulosXProveedorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ArticulosXProveedorPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticulosXProveedorPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXProveedorPeer::DATABASE_NAME);
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

			if ($this->aProveedores !== null) {
				if ($this->aProveedores->isModified()) {
					$affectedRows += $this->aProveedores->save($con);
				}
				$this->setProveedores($this->aProveedores);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticulosXProveedorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdArticuloXProveedor($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticulosXProveedorPeer::doUpdate($this, $con);
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

			if ($this->aProveedores !== null) {
				if (!$this->aProveedores->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProveedores->getValidationFailures());
				}
			}


			if (($retval = ArticulosXProveedorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXProveedorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdArticuloXProveedor();
				break;
			case 1:
				return $this->getIdArticulo();
				break;
			case 2:
				return $this->getIdProveedor();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			case 4:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticulosXProveedorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdArticuloXProveedor(),
			$keys[1] => $this->getIdArticulo(),
			$keys[2] => $this->getIdProveedor(),
			$keys[3] => $this->getCreatedAt(),
			$keys[4] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXProveedorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdArticuloXProveedor($value);
				break;
			case 1:
				$this->setIdArticulo($value);
				break;
			case 2:
				$this->setIdProveedor($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
			case 4:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticulosXProveedorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdArticuloXProveedor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdArticulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdProveedor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticulosXProveedorPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR)) $criteria->add(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR, $this->id_articulo_x_proveedor);
		if ($this->isColumnModified(ArticulosXProveedorPeer::ID_ARTICULO)) $criteria->add(ArticulosXProveedorPeer::ID_ARTICULO, $this->id_articulo);
		if ($this->isColumnModified(ArticulosXProveedorPeer::ID_PROVEEDOR)) $criteria->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $this->id_proveedor);
		if ($this->isColumnModified(ArticulosXProveedorPeer::CREATED_AT)) $criteria->add(ArticulosXProveedorPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticulosXProveedorPeer::UPDATED_AT)) $criteria->add(ArticulosXProveedorPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticulosXProveedorPeer::DATABASE_NAME);

		$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR, $this->id_articulo_x_proveedor);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdArticuloXProveedor();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdArticuloXProveedor($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdArticulo($this->id_articulo);

		$copyObj->setIdProveedor($this->id_proveedor);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdArticuloXProveedor(NULL); 
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
			self::$peer = new ArticulosXProveedorPeer();
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

	
	public function setProveedores($v)
	{


		if ($v === null) {
			$this->setIdProveedor(NULL);
		} else {
			$this->setIdProveedor($v->getIdProveedor());
		}


		$this->aProveedores = $v;
	}


	
	public function getProveedores($con = null)
	{
		if ($this->aProveedores === null && ($this->id_proveedor !== null)) {
						include_once 'lib/model/om/BaseProveedoresPeer.php';

			$this->aProveedores = ProveedoresPeer::retrieveByPK($this->id_proveedor, $con);

			
		}
		return $this->aProveedores;
	}

} 