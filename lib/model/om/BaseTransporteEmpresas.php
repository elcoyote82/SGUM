<?php


abstract class BaseTransporteEmpresas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_transporte_empresa;


	
	protected $id_md5_transporte_empresa;


	
	protected $nombre;


	
	protected $cif_nif;


	
	protected $direccion;


	
	protected $poblacion;


	
	protected $provincia;


	
	protected $cp;


	
	protected $pais;


	
	protected $telefono;


	
	protected $telefono2;


	
	protected $movil;


	
	protected $fax;


	
	protected $email;


	
	protected $web;


	
	protected $borrado = '0';


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collTransporteConductoress;

	
	protected $lastTransporteConductoresCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdTransporteEmpresa()
	{

		return $this->id_transporte_empresa;
	}

	
	public function getIdMd5TransporteEmpresa()
	{

		return $this->id_md5_transporte_empresa;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getCifNif()
	{

		return $this->cif_nif;
	}

	
	public function getDireccion()
	{

		return $this->direccion;
	}

	
	public function getPoblacion()
	{

		return $this->poblacion;
	}

	
	public function getProvincia()
	{

		return $this->provincia;
	}

	
	public function getCp()
	{

		return $this->cp;
	}

	
	public function getPais()
	{

		return $this->pais;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getTelefono2()
	{

		return $this->telefono2;
	}

	
	public function getMovil()
	{

		return $this->movil;
	}

	
	public function getFax()
	{

		return $this->fax;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getWeb()
	{

		return $this->web;
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

	
	public function setIdTransporteEmpresa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_transporte_empresa !== $v) {
			$this->id_transporte_empresa = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA;
		}

	} 
	
	public function setIdMd5TransporteEmpresa($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_transporte_empresa !== $v) {
			$this->id_md5_transporte_empresa = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::ID_MD5_TRANSPORTE_EMPRESA;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::NOMBRE;
		}

	} 
	
	public function setCifNif($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cif_nif !== $v) {
			$this->cif_nif = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::CIF_NIF;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::DIRECCION;
		}

	} 
	
	public function setPoblacion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->poblacion !== $v) {
			$this->poblacion = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::POBLACION;
		}

	} 
	
	public function setProvincia($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->provincia !== $v) {
			$this->provincia = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::PROVINCIA;
		}

	} 
	
	public function setCp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cp !== $v) {
			$this->cp = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::CP;
		}

	} 
	
	public function setPais($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pais !== $v) {
			$this->pais = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::PAIS;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::TELEFONO;
		}

	} 
	
	public function setTelefono2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono2 !== $v) {
			$this->telefono2 = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::TELEFONO2;
		}

	} 
	
	public function setMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->movil !== $v) {
			$this->movil = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::MOVIL;
		}

	} 
	
	public function setFax($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::FAX;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::EMAIL;
		}

	} 
	
	public function setWeb($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->web !== $v) {
			$this->web = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::WEB;
		}

	} 
	
	public function setBorrado($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->borrado !== $v || $v === '0') {
			$this->borrado = $v;
			$this->modifiedColumns[] = TransporteEmpresasPeer::BORRADO;
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
			$this->modifiedColumns[] = TransporteEmpresasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = TransporteEmpresasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_transporte_empresa = $rs->getInt($startcol + 0);

			$this->id_md5_transporte_empresa = $rs->getString($startcol + 1);

			$this->nombre = $rs->getString($startcol + 2);

			$this->cif_nif = $rs->getString($startcol + 3);

			$this->direccion = $rs->getString($startcol + 4);

			$this->poblacion = $rs->getString($startcol + 5);

			$this->provincia = $rs->getString($startcol + 6);

			$this->cp = $rs->getString($startcol + 7);

			$this->pais = $rs->getString($startcol + 8);

			$this->telefono = $rs->getString($startcol + 9);

			$this->telefono2 = $rs->getString($startcol + 10);

			$this->movil = $rs->getString($startcol + 11);

			$this->fax = $rs->getString($startcol + 12);

			$this->email = $rs->getString($startcol + 13);

			$this->web = $rs->getString($startcol + 14);

			$this->borrado = $rs->getString($startcol + 15);

			$this->created_at = $rs->getTimestamp($startcol + 16, null);

			$this->updated_at = $rs->getTimestamp($startcol + 17, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TransporteEmpresas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TransporteEmpresasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TransporteEmpresasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(TransporteEmpresasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TransporteEmpresasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TransporteEmpresasPeer::DATABASE_NAME);
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
					$pk = TransporteEmpresasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdTransporteEmpresa($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TransporteEmpresasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTransporteConductoress !== null) {
				foreach($this->collTransporteConductoress as $referrerFK) {
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


			if (($retval = TransporteEmpresasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTransporteConductoress !== null) {
					foreach($this->collTransporteConductoress as $referrerFK) {
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
		$pos = TransporteEmpresasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdTransporteEmpresa();
				break;
			case 1:
				return $this->getIdMd5TransporteEmpresa();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getCifNif();
				break;
			case 4:
				return $this->getDireccion();
				break;
			case 5:
				return $this->getPoblacion();
				break;
			case 6:
				return $this->getProvincia();
				break;
			case 7:
				return $this->getCp();
				break;
			case 8:
				return $this->getPais();
				break;
			case 9:
				return $this->getTelefono();
				break;
			case 10:
				return $this->getTelefono2();
				break;
			case 11:
				return $this->getMovil();
				break;
			case 12:
				return $this->getFax();
				break;
			case 13:
				return $this->getEmail();
				break;
			case 14:
				return $this->getWeb();
				break;
			case 15:
				return $this->getBorrado();
				break;
			case 16:
				return $this->getCreatedAt();
				break;
			case 17:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TransporteEmpresasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdTransporteEmpresa(),
			$keys[1] => $this->getIdMd5TransporteEmpresa(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getCifNif(),
			$keys[4] => $this->getDireccion(),
			$keys[5] => $this->getPoblacion(),
			$keys[6] => $this->getProvincia(),
			$keys[7] => $this->getCp(),
			$keys[8] => $this->getPais(),
			$keys[9] => $this->getTelefono(),
			$keys[10] => $this->getTelefono2(),
			$keys[11] => $this->getMovil(),
			$keys[12] => $this->getFax(),
			$keys[13] => $this->getEmail(),
			$keys[14] => $this->getWeb(),
			$keys[15] => $this->getBorrado(),
			$keys[16] => $this->getCreatedAt(),
			$keys[17] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TransporteEmpresasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdTransporteEmpresa($value);
				break;
			case 1:
				$this->setIdMd5TransporteEmpresa($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setCifNif($value);
				break;
			case 4:
				$this->setDireccion($value);
				break;
			case 5:
				$this->setPoblacion($value);
				break;
			case 6:
				$this->setProvincia($value);
				break;
			case 7:
				$this->setCp($value);
				break;
			case 8:
				$this->setPais($value);
				break;
			case 9:
				$this->setTelefono($value);
				break;
			case 10:
				$this->setTelefono2($value);
				break;
			case 11:
				$this->setMovil($value);
				break;
			case 12:
				$this->setFax($value);
				break;
			case 13:
				$this->setEmail($value);
				break;
			case 14:
				$this->setWeb($value);
				break;
			case 15:
				$this->setBorrado($value);
				break;
			case 16:
				$this->setCreatedAt($value);
				break;
			case 17:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TransporteEmpresasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdTransporteEmpresa($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5TransporteEmpresa($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCifNif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDireccion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPoblacion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setProvincia($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPais($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTelefono($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTelefono2($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMovil($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFax($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEmail($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setWeb($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setBorrado($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedAt($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedAt($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TransporteEmpresasPeer::DATABASE_NAME);

		if ($this->isColumnModified(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA)) $criteria->add(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA, $this->id_transporte_empresa);
		if ($this->isColumnModified(TransporteEmpresasPeer::ID_MD5_TRANSPORTE_EMPRESA)) $criteria->add(TransporteEmpresasPeer::ID_MD5_TRANSPORTE_EMPRESA, $this->id_md5_transporte_empresa);
		if ($this->isColumnModified(TransporteEmpresasPeer::NOMBRE)) $criteria->add(TransporteEmpresasPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(TransporteEmpresasPeer::CIF_NIF)) $criteria->add(TransporteEmpresasPeer::CIF_NIF, $this->cif_nif);
		if ($this->isColumnModified(TransporteEmpresasPeer::DIRECCION)) $criteria->add(TransporteEmpresasPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(TransporteEmpresasPeer::POBLACION)) $criteria->add(TransporteEmpresasPeer::POBLACION, $this->poblacion);
		if ($this->isColumnModified(TransporteEmpresasPeer::PROVINCIA)) $criteria->add(TransporteEmpresasPeer::PROVINCIA, $this->provincia);
		if ($this->isColumnModified(TransporteEmpresasPeer::CP)) $criteria->add(TransporteEmpresasPeer::CP, $this->cp);
		if ($this->isColumnModified(TransporteEmpresasPeer::PAIS)) $criteria->add(TransporteEmpresasPeer::PAIS, $this->pais);
		if ($this->isColumnModified(TransporteEmpresasPeer::TELEFONO)) $criteria->add(TransporteEmpresasPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(TransporteEmpresasPeer::TELEFONO2)) $criteria->add(TransporteEmpresasPeer::TELEFONO2, $this->telefono2);
		if ($this->isColumnModified(TransporteEmpresasPeer::MOVIL)) $criteria->add(TransporteEmpresasPeer::MOVIL, $this->movil);
		if ($this->isColumnModified(TransporteEmpresasPeer::FAX)) $criteria->add(TransporteEmpresasPeer::FAX, $this->fax);
		if ($this->isColumnModified(TransporteEmpresasPeer::EMAIL)) $criteria->add(TransporteEmpresasPeer::EMAIL, $this->email);
		if ($this->isColumnModified(TransporteEmpresasPeer::WEB)) $criteria->add(TransporteEmpresasPeer::WEB, $this->web);
		if ($this->isColumnModified(TransporteEmpresasPeer::BORRADO)) $criteria->add(TransporteEmpresasPeer::BORRADO, $this->borrado);
		if ($this->isColumnModified(TransporteEmpresasPeer::CREATED_AT)) $criteria->add(TransporteEmpresasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(TransporteEmpresasPeer::UPDATED_AT)) $criteria->add(TransporteEmpresasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TransporteEmpresasPeer::DATABASE_NAME);

		$criteria->add(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA, $this->id_transporte_empresa);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdTransporteEmpresa();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdTransporteEmpresa($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5TransporteEmpresa($this->id_md5_transporte_empresa);

		$copyObj->setNombre($this->nombre);

		$copyObj->setCifNif($this->cif_nif);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setPoblacion($this->poblacion);

		$copyObj->setProvincia($this->provincia);

		$copyObj->setCp($this->cp);

		$copyObj->setPais($this->pais);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefono2($this->telefono2);

		$copyObj->setMovil($this->movil);

		$copyObj->setFax($this->fax);

		$copyObj->setEmail($this->email);

		$copyObj->setWeb($this->web);

		$copyObj->setBorrado($this->borrado);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTransporteConductoress() as $relObj) {
				$copyObj->addTransporteConductores($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdTransporteEmpresa(NULL); 
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
			self::$peer = new TransporteEmpresasPeer();
		}
		return self::$peer;
	}

	
	public function initTransporteConductoress()
	{
		if ($this->collTransporteConductoress === null) {
			$this->collTransporteConductoress = array();
		}
	}

	
	public function getTransporteConductoress($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTransporteConductoresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTransporteConductoress === null) {
			if ($this->isNew()) {
			   $this->collTransporteConductoress = array();
			} else {

				$criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, $this->getIdTransporteEmpresa());

				TransporteConductoresPeer::addSelectColumns($criteria);
				$this->collTransporteConductoress = TransporteConductoresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, $this->getIdTransporteEmpresa());

				TransporteConductoresPeer::addSelectColumns($criteria);
				if (!isset($this->lastTransporteConductoresCriteria) || !$this->lastTransporteConductoresCriteria->equals($criteria)) {
					$this->collTransporteConductoress = TransporteConductoresPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTransporteConductoresCriteria = $criteria;
		return $this->collTransporteConductoress;
	}

	
	public function countTransporteConductoress($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTransporteConductoresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, $this->getIdTransporteEmpresa());

		return TransporteConductoresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTransporteConductores(TransporteConductores $l)
	{
		$this->collTransporteConductoress[] = $l;
		$l->setTransporteEmpresas($this);
	}

} 