<?php


abstract class BaseConfiguracionTareaProgramada extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_configuracion;


	
	protected $tiempo_repeticion;


	
	protected $fecha_ultima_actualizacion;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdConfiguracion()
	{

		return $this->id_configuracion;
	}

	
	public function getTiempoRepeticion()
	{

		return $this->tiempo_repeticion;
	}

	
	public function getFechaUltimaActualizacion($format = 'Y-m-d H:i:s')
	{

		if ($this->fecha_ultima_actualizacion === null || $this->fecha_ultima_actualizacion === '') {
			return null;
		} elseif (!is_int($this->fecha_ultima_actualizacion)) {
						$ts = strtotime($this->fecha_ultima_actualizacion);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_ultima_actualizacion] as date/time value: " . var_export($this->fecha_ultima_actualizacion, true));
			}
		} else {
			$ts = $this->fecha_ultima_actualizacion;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setIdConfiguracion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_configuracion !== $v) {
			$this->id_configuracion = $v;
			$this->modifiedColumns[] = ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION;
		}

	} 
	
	public function setTiempoRepeticion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tiempo_repeticion !== $v) {
			$this->tiempo_repeticion = $v;
			$this->modifiedColumns[] = ConfiguracionTareaProgramadaPeer::TIEMPO_REPETICION;
		}

	} 
	
	public function setFechaUltimaActualizacion($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_ultima_actualizacion] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_ultima_actualizacion !== $ts) {
			$this->fecha_ultima_actualizacion = $ts;
			$this->modifiedColumns[] = ConfiguracionTareaProgramadaPeer::FECHA_ULTIMA_ACTUALIZACION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_configuracion = $rs->getInt($startcol + 0);

			$this->tiempo_repeticion = $rs->getInt($startcol + 1);

			$this->fecha_ultima_actualizacion = $rs->getTimestamp($startcol + 2, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ConfiguracionTareaProgramada object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ConfiguracionTareaProgramadaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ConfiguracionTareaProgramadaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ConfiguracionTareaProgramadaPeer::DATABASE_NAME);
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
					$pk = ConfiguracionTareaProgramadaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdConfiguracion($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ConfiguracionTareaProgramadaPeer::doUpdate($this, $con);
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


			if (($retval = ConfiguracionTareaProgramadaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConfiguracionTareaProgramadaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdConfiguracion();
				break;
			case 1:
				return $this->getTiempoRepeticion();
				break;
			case 2:
				return $this->getFechaUltimaActualizacion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConfiguracionTareaProgramadaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdConfiguracion(),
			$keys[1] => $this->getTiempoRepeticion(),
			$keys[2] => $this->getFechaUltimaActualizacion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConfiguracionTareaProgramadaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdConfiguracion($value);
				break;
			case 1:
				$this->setTiempoRepeticion($value);
				break;
			case 2:
				$this->setFechaUltimaActualizacion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConfiguracionTareaProgramadaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdConfiguracion($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTiempoRepeticion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaUltimaActualizacion($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ConfiguracionTareaProgramadaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION)) $criteria->add(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION, $this->id_configuracion);
		if ($this->isColumnModified(ConfiguracionTareaProgramadaPeer::TIEMPO_REPETICION)) $criteria->add(ConfiguracionTareaProgramadaPeer::TIEMPO_REPETICION, $this->tiempo_repeticion);
		if ($this->isColumnModified(ConfiguracionTareaProgramadaPeer::FECHA_ULTIMA_ACTUALIZACION)) $criteria->add(ConfiguracionTareaProgramadaPeer::FECHA_ULTIMA_ACTUALIZACION, $this->fecha_ultima_actualizacion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ConfiguracionTareaProgramadaPeer::DATABASE_NAME);

		$criteria->add(ConfiguracionTareaProgramadaPeer::ID_CONFIGURACION, $this->id_configuracion);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdConfiguracion();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdConfiguracion($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTiempoRepeticion($this->tiempo_repeticion);

		$copyObj->setFechaUltimaActualizacion($this->fecha_ultima_actualizacion);


		$copyObj->setNew(true);

		$copyObj->setIdConfiguracion(NULL); 
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
			self::$peer = new ConfiguracionTareaProgramadaPeer();
		}
		return self::$peer;
	}

} 