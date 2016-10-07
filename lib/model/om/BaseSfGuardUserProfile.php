<?php


abstract class BaseSfGuardUserProfile extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_profile;


	
	protected $id_md5 = 'null';


	
	protected $user_id;


	
	protected $nombre = 'null';


	
	protected $apellidos = 'null';


	
	protected $telefono = 'null';


	
	protected $email = 'null';


	
	protected $imagen = 'null';


	
	protected $idioma = 'null';


	
	protected $updated_at;

	
	protected $asfGuardUser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdProfile()
	{

		return $this->id_profile;
	}

	
	public function getIdMd5()
	{

		return $this->id_md5;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getApellidos()
	{

		return $this->apellidos;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getImagen()
	{

		return $this->imagen;
	}

	
	public function getIdioma()
	{

		return $this->idioma;
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

	
	public function setIdProfile($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_profile !== $v) {
			$this->id_profile = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::ID_PROFILE;
		}

	} 
	
	public function setIdMd5($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5 !== $v || $v === 'null') {
			$this->id_md5 = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::ID_MD5;
		}

	} 
	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::USER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v || $v === 'null') {
			$this->nombre = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::NOMBRE;
		}

	} 
	
	public function setApellidos($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->apellidos !== $v || $v === 'null') {
			$this->apellidos = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::APELLIDOS;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v || $v === 'null') {
			$this->telefono = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::TELEFONO;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v || $v === 'null') {
			$this->email = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::EMAIL;
		}

	} 
	
	public function setImagen($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->imagen !== $v || $v === 'null') {
			$this->imagen = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::IMAGEN;
		}

	} 
	
	public function setIdioma($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->idioma !== $v || $v === 'null') {
			$this->idioma = $v;
			$this->modifiedColumns[] = SfGuardUserProfilePeer::IDIOMA;
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
			$this->modifiedColumns[] = SfGuardUserProfilePeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_profile = $rs->getInt($startcol + 0);

			$this->id_md5 = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->nombre = $rs->getString($startcol + 3);

			$this->apellidos = $rs->getString($startcol + 4);

			$this->telefono = $rs->getString($startcol + 5);

			$this->email = $rs->getString($startcol + 6);

			$this->imagen = $rs->getString($startcol + 7);

			$this->idioma = $rs->getString($startcol + 8);

			$this->updated_at = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SfGuardUserProfile object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardUserProfilePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SfGuardUserProfilePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(SfGuardUserProfilePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardUserProfilePeer::DATABASE_NAME);
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


												
			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SfGuardUserProfilePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdProfile($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SfGuardUserProfilePeer::doUpdate($this, $con);
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


												
			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = SfGuardUserProfilePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdProfile();
				break;
			case 1:
				return $this->getIdMd5();
				break;
			case 2:
				return $this->getUserId();
				break;
			case 3:
				return $this->getNombre();
				break;
			case 4:
				return $this->getApellidos();
				break;
			case 5:
				return $this->getTelefono();
				break;
			case 6:
				return $this->getEmail();
				break;
			case 7:
				return $this->getImagen();
				break;
			case 8:
				return $this->getIdioma();
				break;
			case 9:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardUserProfilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdProfile(),
			$keys[1] => $this->getIdMd5(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getApellidos(),
			$keys[5] => $this->getTelefono(),
			$keys[6] => $this->getEmail(),
			$keys[7] => $this->getImagen(),
			$keys[8] => $this->getIdioma(),
			$keys[9] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdProfile($value);
				break;
			case 1:
				$this->setIdMd5($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
			case 3:
				$this->setNombre($value);
				break;
			case 4:
				$this->setApellidos($value);
				break;
			case 5:
				$this->setTelefono($value);
				break;
			case 6:
				$this->setEmail($value);
				break;
			case 7:
				$this->setImagen($value);
				break;
			case 8:
				$this->setIdioma($value);
				break;
			case 9:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardUserProfilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdProfile($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setApellidos($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelefono($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmail($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setImagen($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIdioma($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SfGuardUserProfilePeer::DATABASE_NAME);

		if ($this->isColumnModified(SfGuardUserProfilePeer::ID_PROFILE)) $criteria->add(SfGuardUserProfilePeer::ID_PROFILE, $this->id_profile);
		if ($this->isColumnModified(SfGuardUserProfilePeer::ID_MD5)) $criteria->add(SfGuardUserProfilePeer::ID_MD5, $this->id_md5);
		if ($this->isColumnModified(SfGuardUserProfilePeer::USER_ID)) $criteria->add(SfGuardUserProfilePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(SfGuardUserProfilePeer::NOMBRE)) $criteria->add(SfGuardUserProfilePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(SfGuardUserProfilePeer::APELLIDOS)) $criteria->add(SfGuardUserProfilePeer::APELLIDOS, $this->apellidos);
		if ($this->isColumnModified(SfGuardUserProfilePeer::TELEFONO)) $criteria->add(SfGuardUserProfilePeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(SfGuardUserProfilePeer::EMAIL)) $criteria->add(SfGuardUserProfilePeer::EMAIL, $this->email);
		if ($this->isColumnModified(SfGuardUserProfilePeer::IMAGEN)) $criteria->add(SfGuardUserProfilePeer::IMAGEN, $this->imagen);
		if ($this->isColumnModified(SfGuardUserProfilePeer::IDIOMA)) $criteria->add(SfGuardUserProfilePeer::IDIOMA, $this->idioma);
		if ($this->isColumnModified(SfGuardUserProfilePeer::UPDATED_AT)) $criteria->add(SfGuardUserProfilePeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(SfGuardUserProfilePeer::ID_PROFILE, $this->id_profile);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdProfile();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdProfile($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5($this->id_md5);

		$copyObj->setUserId($this->user_id);

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellidos($this->apellidos);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setEmail($this->email);

		$copyObj->setImagen($this->imagen);

		$copyObj->setIdioma($this->idioma);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdProfile(NULL); 
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
			self::$peer = new SfGuardUserProfilePeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->asfGuardUser = $v;
	}


	
	public function getsfGuardUser($con = null)
	{
		if ($this->asfGuardUser === null && ($this->user_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUser = sfGuardUserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->asfGuardUser;
	}

} 