<?php


abstract class BaseUbicacionesXArticulo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_ubicaciones_x_articulo;


	
	protected $id_ubicacion;


	
	protected $id_articulo;

	
	protected $aUbicaciones;

	
	protected $aArticulos;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdUbicacionesXArticulo()
	{

		return $this->id_ubicaciones_x_articulo;
	}

	
	public function getIdUbicacion()
	{

		return $this->id_ubicacion;
	}

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
	}

	
	public function setIdUbicacionesXArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_ubicaciones_x_articulo !== $v) {
			$this->id_ubicaciones_x_articulo = $v;
			$this->modifiedColumns[] = UbicacionesXArticuloPeer::ID_UBICACIONES_X_ARTICULO;
		}

	} 
	
	public function setIdUbicacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_ubicacion !== $v) {
			$this->id_ubicacion = $v;
			$this->modifiedColumns[] = UbicacionesXArticuloPeer::ID_UBICACION;
		}

		if ($this->aUbicaciones !== null && $this->aUbicaciones->getIdUbicacion() !== $v) {
			$this->aUbicaciones = null;
		}

	} 
	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = UbicacionesXArticuloPeer::ID_ARTICULO;
		}

		if ($this->aArticulos !== null && $this->aArticulos->getIdArticulo() !== $v) {
			$this->aArticulos = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_ubicaciones_x_articulo = $rs->getInt($startcol + 0);

			$this->id_ubicacion = $rs->getInt($startcol + 1);

			$this->id_articulo = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating UbicacionesXArticulo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UbicacionesXArticuloPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UbicacionesXArticuloPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UbicacionesXArticuloPeer::DATABASE_NAME);
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


												
			if ($this->aUbicaciones !== null) {
				if ($this->aUbicaciones->isModified()) {
					$affectedRows += $this->aUbicaciones->save($con);
				}
				$this->setUbicaciones($this->aUbicaciones);
			}

			if ($this->aArticulos !== null) {
				if ($this->aArticulos->isModified()) {
					$affectedRows += $this->aArticulos->save($con);
				}
				$this->setArticulos($this->aArticulos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UbicacionesXArticuloPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdUbicacionesXArticulo($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UbicacionesXArticuloPeer::doUpdate($this, $con);
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


												
			if ($this->aUbicaciones !== null) {
				if (!$this->aUbicaciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUbicaciones->getValidationFailures());
				}
			}

			if ($this->aArticulos !== null) {
				if (!$this->aArticulos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticulos->getValidationFailures());
				}
			}


			if (($retval = UbicacionesXArticuloPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UbicacionesXArticuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdUbicacionesXArticulo();
				break;
			case 1:
				return $this->getIdUbicacion();
				break;
			case 2:
				return $this->getIdArticulo();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UbicacionesXArticuloPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdUbicacionesXArticulo(),
			$keys[1] => $this->getIdUbicacion(),
			$keys[2] => $this->getIdArticulo(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UbicacionesXArticuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdUbicacionesXArticulo($value);
				break;
			case 1:
				$this->setIdUbicacion($value);
				break;
			case 2:
				$this->setIdArticulo($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UbicacionesXArticuloPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdUbicacionesXArticulo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdUbicacion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdArticulo($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UbicacionesXArticuloPeer::DATABASE_NAME);

		if ($this->isColumnModified(UbicacionesXArticuloPeer::ID_UBICACIONES_X_ARTICULO)) $criteria->add(UbicacionesXArticuloPeer::ID_UBICACIONES_X_ARTICULO, $this->id_ubicaciones_x_articulo);
		if ($this->isColumnModified(UbicacionesXArticuloPeer::ID_UBICACION)) $criteria->add(UbicacionesXArticuloPeer::ID_UBICACION, $this->id_ubicacion);
		if ($this->isColumnModified(UbicacionesXArticuloPeer::ID_ARTICULO)) $criteria->add(UbicacionesXArticuloPeer::ID_ARTICULO, $this->id_articulo);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UbicacionesXArticuloPeer::DATABASE_NAME);

		$criteria->add(UbicacionesXArticuloPeer::ID_UBICACIONES_X_ARTICULO, $this->id_ubicaciones_x_articulo);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdUbicacionesXArticulo();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdUbicacionesXArticulo($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdUbicacion($this->id_ubicacion);

		$copyObj->setIdArticulo($this->id_articulo);


		$copyObj->setNew(true);

		$copyObj->setIdUbicacionesXArticulo(NULL); 
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
			self::$peer = new UbicacionesXArticuloPeer();
		}
		return self::$peer;
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

} 