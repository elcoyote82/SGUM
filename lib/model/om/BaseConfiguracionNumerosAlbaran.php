<?php


abstract class BaseConfiguracionNumerosAlbaran extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_configuracion_num_albaran;


	
	protected $numero_albaran;


	
	protected $tipo_informe;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdConfiguracionNumAlbaran()
	{

		return $this->id_configuracion_num_albaran;
	}

	
	public function getNumeroAlbaran()
	{

		return $this->numero_albaran;
	}

	
	public function getTipoInforme()
	{

		return $this->tipo_informe;
	}

	
	public function setIdConfiguracionNumAlbaran($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_configuracion_num_albaran !== $v) {
			$this->id_configuracion_num_albaran = $v;
			$this->modifiedColumns[] = ConfiguracionNumerosAlbaranPeer::ID_CONFIGURACION_NUM_ALBARAN;
		}

	} 
	
	public function setNumeroAlbaran($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->numero_albaran !== $v) {
			$this->numero_albaran = $v;
			$this->modifiedColumns[] = ConfiguracionNumerosAlbaranPeer::NUMERO_ALBARAN;
		}

	} 
	
	public function setTipoInforme($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tipo_informe !== $v) {
			$this->tipo_informe = $v;
			$this->modifiedColumns[] = ConfiguracionNumerosAlbaranPeer::TIPO_INFORME;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_configuracion_num_albaran = $rs->getInt($startcol + 0);

			$this->numero_albaran = $rs->getString($startcol + 1);

			$this->tipo_informe = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ConfiguracionNumerosAlbaran object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ConfiguracionNumerosAlbaranPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ConfiguracionNumerosAlbaranPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ConfiguracionNumerosAlbaranPeer::DATABASE_NAME);
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
					$pk = ConfiguracionNumerosAlbaranPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdConfiguracionNumAlbaran($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ConfiguracionNumerosAlbaranPeer::doUpdate($this, $con);
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


			if (($retval = ConfiguracionNumerosAlbaranPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConfiguracionNumerosAlbaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdConfiguracionNumAlbaran();
				break;
			case 1:
				return $this->getNumeroAlbaran();
				break;
			case 2:
				return $this->getTipoInforme();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConfiguracionNumerosAlbaranPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdConfiguracionNumAlbaran(),
			$keys[1] => $this->getNumeroAlbaran(),
			$keys[2] => $this->getTipoInforme(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConfiguracionNumerosAlbaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdConfiguracionNumAlbaran($value);
				break;
			case 1:
				$this->setNumeroAlbaran($value);
				break;
			case 2:
				$this->setTipoInforme($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConfiguracionNumerosAlbaranPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdConfiguracionNumAlbaran($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumeroAlbaran($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipoInforme($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ConfiguracionNumerosAlbaranPeer::DATABASE_NAME);

		if ($this->isColumnModified(ConfiguracionNumerosAlbaranPeer::ID_CONFIGURACION_NUM_ALBARAN)) $criteria->add(ConfiguracionNumerosAlbaranPeer::ID_CONFIGURACION_NUM_ALBARAN, $this->id_configuracion_num_albaran);
		if ($this->isColumnModified(ConfiguracionNumerosAlbaranPeer::NUMERO_ALBARAN)) $criteria->add(ConfiguracionNumerosAlbaranPeer::NUMERO_ALBARAN, $this->numero_albaran);
		if ($this->isColumnModified(ConfiguracionNumerosAlbaranPeer::TIPO_INFORME)) $criteria->add(ConfiguracionNumerosAlbaranPeer::TIPO_INFORME, $this->tipo_informe);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ConfiguracionNumerosAlbaranPeer::DATABASE_NAME);

		$criteria->add(ConfiguracionNumerosAlbaranPeer::ID_CONFIGURACION_NUM_ALBARAN, $this->id_configuracion_num_albaran);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdConfiguracionNumAlbaran();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdConfiguracionNumAlbaran($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNumeroAlbaran($this->numero_albaran);

		$copyObj->setTipoInforme($this->tipo_informe);


		$copyObj->setNew(true);

		$copyObj->setIdConfiguracionNumAlbaran(NULL); 
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
			self::$peer = new ConfiguracionNumerosAlbaranPeer();
		}
		return self::$peer;
	}

} 