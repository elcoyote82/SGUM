<?php


abstract class BaseProveedores extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_proveedor;


	
	protected $id_md5_proveedor;


	
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

	
	protected $collArticulosXProveedors;

	
	protected $lastArticulosXProveedorCriteria = null;

	
	protected $collPedidoss;

	
	protected $lastPedidosCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdProveedor()
	{

		return $this->id_proveedor;
	}

	
	public function getIdMd5Proveedor()
	{

		return $this->id_md5_proveedor;
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

	
	public function setIdProveedor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_proveedor !== $v) {
			$this->id_proveedor = $v;
			$this->modifiedColumns[] = ProveedoresPeer::ID_PROVEEDOR;
		}

	} 
	
	public function setIdMd5Proveedor($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_proveedor !== $v) {
			$this->id_md5_proveedor = $v;
			$this->modifiedColumns[] = ProveedoresPeer::ID_MD5_PROVEEDOR;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ProveedoresPeer::NOMBRE;
		}

	} 
	
	public function setCifNif($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cif_nif !== $v) {
			$this->cif_nif = $v;
			$this->modifiedColumns[] = ProveedoresPeer::CIF_NIF;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = ProveedoresPeer::DIRECCION;
		}

	} 
	
	public function setPoblacion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->poblacion !== $v) {
			$this->poblacion = $v;
			$this->modifiedColumns[] = ProveedoresPeer::POBLACION;
		}

	} 
	
	public function setProvincia($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->provincia !== $v) {
			$this->provincia = $v;
			$this->modifiedColumns[] = ProveedoresPeer::PROVINCIA;
		}

	} 
	
	public function setCp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cp !== $v) {
			$this->cp = $v;
			$this->modifiedColumns[] = ProveedoresPeer::CP;
		}

	} 
	
	public function setPais($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pais !== $v) {
			$this->pais = $v;
			$this->modifiedColumns[] = ProveedoresPeer::PAIS;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = ProveedoresPeer::TELEFONO;
		}

	} 
	
	public function setTelefono2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono2 !== $v) {
			$this->telefono2 = $v;
			$this->modifiedColumns[] = ProveedoresPeer::TELEFONO2;
		}

	} 
	
	public function setMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->movil !== $v) {
			$this->movil = $v;
			$this->modifiedColumns[] = ProveedoresPeer::MOVIL;
		}

	} 
	
	public function setFax($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = ProveedoresPeer::FAX;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ProveedoresPeer::EMAIL;
		}

	} 
	
	public function setWeb($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->web !== $v) {
			$this->web = $v;
			$this->modifiedColumns[] = ProveedoresPeer::WEB;
		}

	} 
	
	public function setBorrado($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->borrado !== $v || $v === '0') {
			$this->borrado = $v;
			$this->modifiedColumns[] = ProveedoresPeer::BORRADO;
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
			$this->modifiedColumns[] = ProveedoresPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ProveedoresPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_proveedor = $rs->getInt($startcol + 0);

			$this->id_md5_proveedor = $rs->getString($startcol + 1);

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
			throw new PropelException("Error populating Proveedores object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProveedoresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ProveedoresPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ProveedoresPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ProveedoresPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProveedoresPeer::DATABASE_NAME);
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
					$pk = ProveedoresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdProveedor($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ProveedoresPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticulosXProveedors !== null) {
				foreach($this->collArticulosXProveedors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPedidoss !== null) {
				foreach($this->collPedidoss as $referrerFK) {
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


			if (($retval = ProveedoresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticulosXProveedors !== null) {
					foreach($this->collArticulosXProveedors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPedidoss !== null) {
					foreach($this->collPedidoss as $referrerFK) {
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
		$pos = ProveedoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdProveedor();
				break;
			case 1:
				return $this->getIdMd5Proveedor();
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
		$keys = ProveedoresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdProveedor(),
			$keys[1] => $this->getIdMd5Proveedor(),
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
		$pos = ProveedoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdProveedor($value);
				break;
			case 1:
				$this->setIdMd5Proveedor($value);
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
		$keys = ProveedoresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdProveedor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Proveedor($arr[$keys[1]]);
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
		$criteria = new Criteria(ProveedoresPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProveedoresPeer::ID_PROVEEDOR)) $criteria->add(ProveedoresPeer::ID_PROVEEDOR, $this->id_proveedor);
		if ($this->isColumnModified(ProveedoresPeer::ID_MD5_PROVEEDOR)) $criteria->add(ProveedoresPeer::ID_MD5_PROVEEDOR, $this->id_md5_proveedor);
		if ($this->isColumnModified(ProveedoresPeer::NOMBRE)) $criteria->add(ProveedoresPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ProveedoresPeer::CIF_NIF)) $criteria->add(ProveedoresPeer::CIF_NIF, $this->cif_nif);
		if ($this->isColumnModified(ProveedoresPeer::DIRECCION)) $criteria->add(ProveedoresPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(ProveedoresPeer::POBLACION)) $criteria->add(ProveedoresPeer::POBLACION, $this->poblacion);
		if ($this->isColumnModified(ProveedoresPeer::PROVINCIA)) $criteria->add(ProveedoresPeer::PROVINCIA, $this->provincia);
		if ($this->isColumnModified(ProveedoresPeer::CP)) $criteria->add(ProveedoresPeer::CP, $this->cp);
		if ($this->isColumnModified(ProveedoresPeer::PAIS)) $criteria->add(ProveedoresPeer::PAIS, $this->pais);
		if ($this->isColumnModified(ProveedoresPeer::TELEFONO)) $criteria->add(ProveedoresPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(ProveedoresPeer::TELEFONO2)) $criteria->add(ProveedoresPeer::TELEFONO2, $this->telefono2);
		if ($this->isColumnModified(ProveedoresPeer::MOVIL)) $criteria->add(ProveedoresPeer::MOVIL, $this->movil);
		if ($this->isColumnModified(ProveedoresPeer::FAX)) $criteria->add(ProveedoresPeer::FAX, $this->fax);
		if ($this->isColumnModified(ProveedoresPeer::EMAIL)) $criteria->add(ProveedoresPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ProveedoresPeer::WEB)) $criteria->add(ProveedoresPeer::WEB, $this->web);
		if ($this->isColumnModified(ProveedoresPeer::BORRADO)) $criteria->add(ProveedoresPeer::BORRADO, $this->borrado);
		if ($this->isColumnModified(ProveedoresPeer::CREATED_AT)) $criteria->add(ProveedoresPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ProveedoresPeer::UPDATED_AT)) $criteria->add(ProveedoresPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProveedoresPeer::DATABASE_NAME);

		$criteria->add(ProveedoresPeer::ID_PROVEEDOR, $this->id_proveedor);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdProveedor();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdProveedor($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Proveedor($this->id_md5_proveedor);

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

			foreach($this->getArticulosXProveedors() as $relObj) {
				$copyObj->addArticulosXProveedor($relObj->copy($deepCopy));
			}

			foreach($this->getPedidoss() as $relObj) {
				$copyObj->addPedidos($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdProveedor(NULL); 
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
			self::$peer = new ProveedoresPeer();
		}
		return self::$peer;
	}

	
	public function initArticulosXProveedors()
	{
		if ($this->collArticulosXProveedors === null) {
			$this->collArticulosXProveedors = array();
		}
	}

	
	public function getArticulosXProveedors($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXProveedorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXProveedors === null) {
			if ($this->isNew()) {
			   $this->collArticulosXProveedors = array();
			} else {

				$criteria->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $this->getIdProveedor());

				ArticulosXProveedorPeer::addSelectColumns($criteria);
				$this->collArticulosXProveedors = ArticulosXProveedorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $this->getIdProveedor());

				ArticulosXProveedorPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticulosXProveedorCriteria) || !$this->lastArticulosXProveedorCriteria->equals($criteria)) {
					$this->collArticulosXProveedors = ArticulosXProveedorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticulosXProveedorCriteria = $criteria;
		return $this->collArticulosXProveedors;
	}

	
	public function countArticulosXProveedors($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXProveedorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $this->getIdProveedor());

		return ArticulosXProveedorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXProveedor(ArticulosXProveedor $l)
	{
		$this->collArticulosXProveedors[] = $l;
		$l->setProveedores($this);
	}


	
	public function getArticulosXProveedorsJoinArticulos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXProveedorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXProveedors === null) {
			if ($this->isNew()) {
				$this->collArticulosXProveedors = array();
			} else {

				$criteria->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $this->getIdProveedor());

				$this->collArticulosXProveedors = ArticulosXProveedorPeer::doSelectJoinArticulos($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $this->getIdProveedor());

			if (!isset($this->lastArticulosXProveedorCriteria) || !$this->lastArticulosXProveedorCriteria->equals($criteria)) {
				$this->collArticulosXProveedors = ArticulosXProveedorPeer::doSelectJoinArticulos($criteria, $con);
			}
		}
		$this->lastArticulosXProveedorCriteria = $criteria;

		return $this->collArticulosXProveedors;
	}

	
	public function initPedidoss()
	{
		if ($this->collPedidoss === null) {
			$this->collPedidoss = array();
		}
	}

	
	public function getPedidoss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidoss === null) {
			if ($this->isNew()) {
			   $this->collPedidoss = array();
			} else {

				$criteria->add(PedidosPeer::ID_PROVEEDOR, $this->getIdProveedor());

				PedidosPeer::addSelectColumns($criteria);
				$this->collPedidoss = PedidosPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PedidosPeer::ID_PROVEEDOR, $this->getIdProveedor());

				PedidosPeer::addSelectColumns($criteria);
				if (!isset($this->lastPedidosCriteria) || !$this->lastPedidosCriteria->equals($criteria)) {
					$this->collPedidoss = PedidosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPedidosCriteria = $criteria;
		return $this->collPedidoss;
	}

	
	public function countPedidoss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PedidosPeer::ID_PROVEEDOR, $this->getIdProveedor());

		return PedidosPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPedidos(Pedidos $l)
	{
		$this->collPedidoss[] = $l;
		$l->setProveedores($this);
	}


	
	public function getPedidossJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidoss === null) {
			if ($this->isNew()) {
				$this->collPedidoss = array();
			} else {

				$criteria->add(PedidosPeer::ID_PROVEEDOR, $this->getIdProveedor());

				$this->collPedidoss = PedidosPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(PedidosPeer::ID_PROVEEDOR, $this->getIdProveedor());

			if (!isset($this->lastPedidosCriteria) || !$this->lastPedidosCriteria->equals($criteria)) {
				$this->collPedidoss = PedidosPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastPedidosCriteria = $criteria;

		return $this->collPedidoss;
	}


	
	public function getPedidossJoinEstadoPedidos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePedidosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidoss === null) {
			if ($this->isNew()) {
				$this->collPedidoss = array();
			} else {

				$criteria->add(PedidosPeer::ID_PROVEEDOR, $this->getIdProveedor());

				$this->collPedidoss = PedidosPeer::doSelectJoinEstadoPedidos($criteria, $con);
			}
		} else {
									
			$criteria->add(PedidosPeer::ID_PROVEEDOR, $this->getIdProveedor());

			if (!isset($this->lastPedidosCriteria) || !$this->lastPedidosCriteria->equals($criteria)) {
				$this->collPedidoss = PedidosPeer::doSelectJoinEstadoPedidos($criteria, $con);
			}
		}
		$this->lastPedidosCriteria = $criteria;

		return $this->collPedidoss;
	}

} 