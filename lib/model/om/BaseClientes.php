<?php


abstract class BaseClientes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_cliente;


	
	protected $id_md5_cliente;


	
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

	
	protected $collVentass;

	
	protected $lastVentasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdCliente()
	{

		return $this->id_cliente;
	}

	
	public function getIdMd5Cliente()
	{

		return $this->id_md5_cliente;
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

	
	public function setIdCliente($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_cliente !== $v) {
			$this->id_cliente = $v;
			$this->modifiedColumns[] = ClientesPeer::ID_CLIENTE;
		}

	} 
	
	public function setIdMd5Cliente($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_cliente !== $v) {
			$this->id_md5_cliente = $v;
			$this->modifiedColumns[] = ClientesPeer::ID_MD5_CLIENTE;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ClientesPeer::NOMBRE;
		}

	} 
	
	public function setCifNif($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cif_nif !== $v) {
			$this->cif_nif = $v;
			$this->modifiedColumns[] = ClientesPeer::CIF_NIF;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = ClientesPeer::DIRECCION;
		}

	} 
	
	public function setPoblacion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->poblacion !== $v) {
			$this->poblacion = $v;
			$this->modifiedColumns[] = ClientesPeer::POBLACION;
		}

	} 
	
	public function setProvincia($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->provincia !== $v) {
			$this->provincia = $v;
			$this->modifiedColumns[] = ClientesPeer::PROVINCIA;
		}

	} 
	
	public function setCp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cp !== $v) {
			$this->cp = $v;
			$this->modifiedColumns[] = ClientesPeer::CP;
		}

	} 
	
	public function setPais($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pais !== $v) {
			$this->pais = $v;
			$this->modifiedColumns[] = ClientesPeer::PAIS;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = ClientesPeer::TELEFONO;
		}

	} 
	
	public function setTelefono2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono2 !== $v) {
			$this->telefono2 = $v;
			$this->modifiedColumns[] = ClientesPeer::TELEFONO2;
		}

	} 
	
	public function setMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->movil !== $v) {
			$this->movil = $v;
			$this->modifiedColumns[] = ClientesPeer::MOVIL;
		}

	} 
	
	public function setFax($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = ClientesPeer::FAX;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ClientesPeer::EMAIL;
		}

	} 
	
	public function setWeb($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->web !== $v) {
			$this->web = $v;
			$this->modifiedColumns[] = ClientesPeer::WEB;
		}

	} 
	
	public function setBorrado($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->borrado !== $v || $v === '0') {
			$this->borrado = $v;
			$this->modifiedColumns[] = ClientesPeer::BORRADO;
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
			$this->modifiedColumns[] = ClientesPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ClientesPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_cliente = $rs->getInt($startcol + 0);

			$this->id_md5_cliente = $rs->getString($startcol + 1);

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
			throw new PropelException("Error populating Clientes object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ClientesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ClientesPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ClientesPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ClientesPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ClientesPeer::DATABASE_NAME);
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
					$pk = ClientesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdCliente($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ClientesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collVentass !== null) {
				foreach($this->collVentass as $referrerFK) {
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


			if (($retval = ClientesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collVentass !== null) {
					foreach($this->collVentass as $referrerFK) {
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
		$pos = ClientesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdCliente();
				break;
			case 1:
				return $this->getIdMd5Cliente();
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
		$keys = ClientesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdCliente(),
			$keys[1] => $this->getIdMd5Cliente(),
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
		$pos = ClientesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdCliente($value);
				break;
			case 1:
				$this->setIdMd5Cliente($value);
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
		$keys = ClientesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdCliente($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Cliente($arr[$keys[1]]);
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
		$criteria = new Criteria(ClientesPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientesPeer::ID_CLIENTE)) $criteria->add(ClientesPeer::ID_CLIENTE, $this->id_cliente);
		if ($this->isColumnModified(ClientesPeer::ID_MD5_CLIENTE)) $criteria->add(ClientesPeer::ID_MD5_CLIENTE, $this->id_md5_cliente);
		if ($this->isColumnModified(ClientesPeer::NOMBRE)) $criteria->add(ClientesPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ClientesPeer::CIF_NIF)) $criteria->add(ClientesPeer::CIF_NIF, $this->cif_nif);
		if ($this->isColumnModified(ClientesPeer::DIRECCION)) $criteria->add(ClientesPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(ClientesPeer::POBLACION)) $criteria->add(ClientesPeer::POBLACION, $this->poblacion);
		if ($this->isColumnModified(ClientesPeer::PROVINCIA)) $criteria->add(ClientesPeer::PROVINCIA, $this->provincia);
		if ($this->isColumnModified(ClientesPeer::CP)) $criteria->add(ClientesPeer::CP, $this->cp);
		if ($this->isColumnModified(ClientesPeer::PAIS)) $criteria->add(ClientesPeer::PAIS, $this->pais);
		if ($this->isColumnModified(ClientesPeer::TELEFONO)) $criteria->add(ClientesPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(ClientesPeer::TELEFONO2)) $criteria->add(ClientesPeer::TELEFONO2, $this->telefono2);
		if ($this->isColumnModified(ClientesPeer::MOVIL)) $criteria->add(ClientesPeer::MOVIL, $this->movil);
		if ($this->isColumnModified(ClientesPeer::FAX)) $criteria->add(ClientesPeer::FAX, $this->fax);
		if ($this->isColumnModified(ClientesPeer::EMAIL)) $criteria->add(ClientesPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ClientesPeer::WEB)) $criteria->add(ClientesPeer::WEB, $this->web);
		if ($this->isColumnModified(ClientesPeer::BORRADO)) $criteria->add(ClientesPeer::BORRADO, $this->borrado);
		if ($this->isColumnModified(ClientesPeer::CREATED_AT)) $criteria->add(ClientesPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ClientesPeer::UPDATED_AT)) $criteria->add(ClientesPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ClientesPeer::DATABASE_NAME);

		$criteria->add(ClientesPeer::ID_CLIENTE, $this->id_cliente);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdCliente();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdCliente($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Cliente($this->id_md5_cliente);

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

			foreach($this->getVentass() as $relObj) {
				$copyObj->addVentas($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdCliente(NULL); 
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
			self::$peer = new ClientesPeer();
		}
		return self::$peer;
	}

	
	public function initVentass()
	{
		if ($this->collVentass === null) {
			$this->collVentass = array();
		}
	}

	
	public function getVentass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVentass === null) {
			if ($this->isNew()) {
			   $this->collVentass = array();
			} else {

				$criteria->add(VentasPeer::ID_CLIENTE, $this->getIdCliente());

				VentasPeer::addSelectColumns($criteria);
				$this->collVentass = VentasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VentasPeer::ID_CLIENTE, $this->getIdCliente());

				VentasPeer::addSelectColumns($criteria);
				if (!isset($this->lastVentasCriteria) || !$this->lastVentasCriteria->equals($criteria)) {
					$this->collVentass = VentasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastVentasCriteria = $criteria;
		return $this->collVentass;
	}

	
	public function countVentass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(VentasPeer::ID_CLIENTE, $this->getIdCliente());

		return VentasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addVentas(Ventas $l)
	{
		$this->collVentass[] = $l;
		$l->setClientes($this);
	}


	
	public function getVentassJoinsfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVentass === null) {
			if ($this->isNew()) {
				$this->collVentass = array();
			} else {

				$criteria->add(VentasPeer::ID_CLIENTE, $this->getIdCliente());

				$this->collVentass = VentasPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(VentasPeer::ID_CLIENTE, $this->getIdCliente());

			if (!isset($this->lastVentasCriteria) || !$this->lastVentasCriteria->equals($criteria)) {
				$this->collVentass = VentasPeer::doSelectJoinsfGuardUser($criteria, $con);
			}
		}
		$this->lastVentasCriteria = $criteria;

		return $this->collVentass;
	}


	
	public function getVentassJoinEstadoVentas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseVentasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVentass === null) {
			if ($this->isNew()) {
				$this->collVentass = array();
			} else {

				$criteria->add(VentasPeer::ID_CLIENTE, $this->getIdCliente());

				$this->collVentass = VentasPeer::doSelectJoinEstadoVentas($criteria, $con);
			}
		} else {
									
			$criteria->add(VentasPeer::ID_CLIENTE, $this->getIdCliente());

			if (!isset($this->lastVentasCriteria) || !$this->lastVentasCriteria->equals($criteria)) {
				$this->collVentass = VentasPeer::doSelectJoinEstadoVentas($criteria, $con);
			}
		}
		$this->lastVentasCriteria = $criteria;

		return $this->collVentass;
	}

} 