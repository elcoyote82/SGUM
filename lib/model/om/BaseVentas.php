<?php


abstract class BaseVentas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_venta;


	
	protected $id_md5_venta;


	
	protected $id_usuario;


	
	protected $id_cliente;


	
	protected $id_estado_venta;


	
	protected $num_venta;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $asfGuardUser;

	
	protected $aClientes;

	
	protected $aEstadoVentas;

	
	protected $collAlbaranesSalidas;

	
	protected $lastAlbaranesSalidaCriteria = null;

	
	protected $collAlbaranesVentas;

	
	protected $lastAlbaranesVentaCriteria = null;

	
	protected $collArticulosXVentas;

	
	protected $lastArticulosXVentaCriteria = null;

	
	protected $collSalidass;

	
	protected $lastSalidasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdVenta()
	{

		return $this->id_venta;
	}

	
	public function getIdMd5Venta()
	{

		return $this->id_md5_venta;
	}

	
	public function getIdUsuario()
	{

		return $this->id_usuario;
	}

	
	public function getIdCliente()
	{

		return $this->id_cliente;
	}

	
	public function getIdEstadoVenta()
	{

		return $this->id_estado_venta;
	}

	
	public function getNumVenta()
	{

		return $this->num_venta;
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

	
	public function setIdVenta($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_venta !== $v) {
			$this->id_venta = $v;
			$this->modifiedColumns[] = VentasPeer::ID_VENTA;
		}

	} 
	
	public function setIdMd5Venta($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_venta !== $v) {
			$this->id_md5_venta = $v;
			$this->modifiedColumns[] = VentasPeer::ID_MD5_VENTA;
		}

	} 
	
	public function setIdUsuario($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_usuario !== $v) {
			$this->id_usuario = $v;
			$this->modifiedColumns[] = VentasPeer::ID_USUARIO;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setIdCliente($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_cliente !== $v) {
			$this->id_cliente = $v;
			$this->modifiedColumns[] = VentasPeer::ID_CLIENTE;
		}

		if ($this->aClientes !== null && $this->aClientes->getIdCliente() !== $v) {
			$this->aClientes = null;
		}

	} 
	
	public function setIdEstadoVenta($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_venta !== $v) {
			$this->id_estado_venta = $v;
			$this->modifiedColumns[] = VentasPeer::ID_ESTADO_VENTA;
		}

		if ($this->aEstadoVentas !== null && $this->aEstadoVentas->getIdEstadoVenta() !== $v) {
			$this->aEstadoVentas = null;
		}

	} 
	
	public function setNumVenta($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->num_venta !== $v) {
			$this->num_venta = $v;
			$this->modifiedColumns[] = VentasPeer::NUM_VENTA;
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
			$this->modifiedColumns[] = VentasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = VentasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_venta = $rs->getInt($startcol + 0);

			$this->id_md5_venta = $rs->getString($startcol + 1);

			$this->id_usuario = $rs->getInt($startcol + 2);

			$this->id_cliente = $rs->getInt($startcol + 3);

			$this->id_estado_venta = $rs->getInt($startcol + 4);

			$this->num_venta = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ventas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(VentasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			VentasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(VentasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(VentasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(VentasPeer::DATABASE_NAME);
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

			if ($this->aClientes !== null) {
				if ($this->aClientes->isModified()) {
					$affectedRows += $this->aClientes->save($con);
				}
				$this->setClientes($this->aClientes);
			}

			if ($this->aEstadoVentas !== null) {
				if ($this->aEstadoVentas->isModified()) {
					$affectedRows += $this->aEstadoVentas->save($con);
				}
				$this->setEstadoVentas($this->aEstadoVentas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = VentasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdVenta($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += VentasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlbaranesSalidas !== null) {
				foreach($this->collAlbaranesSalidas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlbaranesVentas !== null) {
				foreach($this->collAlbaranesVentas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticulosXVentas !== null) {
				foreach($this->collArticulosXVentas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSalidass !== null) {
				foreach($this->collSalidass as $referrerFK) {
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


												
			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}

			if ($this->aClientes !== null) {
				if (!$this->aClientes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClientes->getValidationFailures());
				}
			}

			if ($this->aEstadoVentas !== null) {
				if (!$this->aEstadoVentas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadoVentas->getValidationFailures());
				}
			}


			if (($retval = VentasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlbaranesSalidas !== null) {
					foreach($this->collAlbaranesSalidas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlbaranesVentas !== null) {
					foreach($this->collAlbaranesVentas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticulosXVentas !== null) {
					foreach($this->collArticulosXVentas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSalidass !== null) {
					foreach($this->collSalidass as $referrerFK) {
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
		$pos = VentasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdVenta();
				break;
			case 1:
				return $this->getIdMd5Venta();
				break;
			case 2:
				return $this->getIdUsuario();
				break;
			case 3:
				return $this->getIdCliente();
				break;
			case 4:
				return $this->getIdEstadoVenta();
				break;
			case 5:
				return $this->getNumVenta();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VentasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdVenta(),
			$keys[1] => $this->getIdMd5Venta(),
			$keys[2] => $this->getIdUsuario(),
			$keys[3] => $this->getIdCliente(),
			$keys[4] => $this->getIdEstadoVenta(),
			$keys[5] => $this->getNumVenta(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VentasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdVenta($value);
				break;
			case 1:
				$this->setIdMd5Venta($value);
				break;
			case 2:
				$this->setIdUsuario($value);
				break;
			case 3:
				$this->setIdCliente($value);
				break;
			case 4:
				$this->setIdEstadoVenta($value);
				break;
			case 5:
				$this->setNumVenta($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VentasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdVenta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Venta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdUsuario($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdCliente($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdEstadoVenta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumVenta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(VentasPeer::DATABASE_NAME);

		if ($this->isColumnModified(VentasPeer::ID_VENTA)) $criteria->add(VentasPeer::ID_VENTA, $this->id_venta);
		if ($this->isColumnModified(VentasPeer::ID_MD5_VENTA)) $criteria->add(VentasPeer::ID_MD5_VENTA, $this->id_md5_venta);
		if ($this->isColumnModified(VentasPeer::ID_USUARIO)) $criteria->add(VentasPeer::ID_USUARIO, $this->id_usuario);
		if ($this->isColumnModified(VentasPeer::ID_CLIENTE)) $criteria->add(VentasPeer::ID_CLIENTE, $this->id_cliente);
		if ($this->isColumnModified(VentasPeer::ID_ESTADO_VENTA)) $criteria->add(VentasPeer::ID_ESTADO_VENTA, $this->id_estado_venta);
		if ($this->isColumnModified(VentasPeer::NUM_VENTA)) $criteria->add(VentasPeer::NUM_VENTA, $this->num_venta);
		if ($this->isColumnModified(VentasPeer::CREATED_AT)) $criteria->add(VentasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(VentasPeer::UPDATED_AT)) $criteria->add(VentasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(VentasPeer::DATABASE_NAME);

		$criteria->add(VentasPeer::ID_VENTA, $this->id_venta);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdVenta();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdVenta($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Venta($this->id_md5_venta);

		$copyObj->setIdUsuario($this->id_usuario);

		$copyObj->setIdCliente($this->id_cliente);

		$copyObj->setIdEstadoVenta($this->id_estado_venta);

		$copyObj->setNumVenta($this->num_venta);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlbaranesSalidas() as $relObj) {
				$copyObj->addAlbaranesSalida($relObj->copy($deepCopy));
			}

			foreach($this->getAlbaranesVentas() as $relObj) {
				$copyObj->addAlbaranesVenta($relObj->copy($deepCopy));
			}

			foreach($this->getArticulosXVentas() as $relObj) {
				$copyObj->addArticulosXVenta($relObj->copy($deepCopy));
			}

			foreach($this->getSalidass() as $relObj) {
				$copyObj->addSalidas($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdVenta(NULL); 
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
			self::$peer = new VentasPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUser($v)
	{


		if ($v === null) {
			$this->setIdUsuario(NULL);
		} else {
			$this->setIdUsuario($v->getId());
		}


		$this->asfGuardUser = $v;
	}


	
	public function getsfGuardUser($con = null)
	{
		if ($this->asfGuardUser === null && ($this->id_usuario !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUser = sfGuardUserPeer::retrieveByPK($this->id_usuario, $con);

			
		}
		return $this->asfGuardUser;
	}

	
	public function setClientes($v)
	{


		if ($v === null) {
			$this->setIdCliente(NULL);
		} else {
			$this->setIdCliente($v->getIdCliente());
		}


		$this->aClientes = $v;
	}


	
	public function getClientes($con = null)
	{
		if ($this->aClientes === null && ($this->id_cliente !== null)) {
						include_once 'lib/model/om/BaseClientesPeer.php';

			$this->aClientes = ClientesPeer::retrieveByPK($this->id_cliente, $con);

			
		}
		return $this->aClientes;
	}

	
	public function setEstadoVentas($v)
	{


		if ($v === null) {
			$this->setIdEstadoVenta(NULL);
		} else {
			$this->setIdEstadoVenta($v->getIdEstadoVenta());
		}


		$this->aEstadoVentas = $v;
	}


	
	public function getEstadoVentas($con = null)
	{
		if ($this->aEstadoVentas === null && ($this->id_estado_venta !== null)) {
						include_once 'lib/model/om/BaseEstadoVentasPeer.php';

			$this->aEstadoVentas = EstadoVentasPeer::retrieveByPK($this->id_estado_venta, $con);

			
		}
		return $this->aEstadoVentas;
	}

	
	public function initAlbaranesSalidas()
	{
		if ($this->collAlbaranesSalidas === null) {
			$this->collAlbaranesSalidas = array();
		}
	}

	
	public function getAlbaranesSalidas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesSalidaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlbaranesSalidas === null) {
			if ($this->isNew()) {
			   $this->collAlbaranesSalidas = array();
			} else {

				$criteria->add(AlbaranesSalidaPeer::ID_VENTA, $this->getIdVenta());

				AlbaranesSalidaPeer::addSelectColumns($criteria);
				$this->collAlbaranesSalidas = AlbaranesSalidaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlbaranesSalidaPeer::ID_VENTA, $this->getIdVenta());

				AlbaranesSalidaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlbaranesSalidaCriteria) || !$this->lastAlbaranesSalidaCriteria->equals($criteria)) {
					$this->collAlbaranesSalidas = AlbaranesSalidaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlbaranesSalidaCriteria = $criteria;
		return $this->collAlbaranesSalidas;
	}

	
	public function countAlbaranesSalidas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesSalidaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlbaranesSalidaPeer::ID_VENTA, $this->getIdVenta());

		return AlbaranesSalidaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlbaranesSalida(AlbaranesSalida $l)
	{
		$this->collAlbaranesSalidas[] = $l;
		$l->setVentas($this);
	}


	
	public function getAlbaranesSalidasJoinSalidas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesSalidaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlbaranesSalidas === null) {
			if ($this->isNew()) {
				$this->collAlbaranesSalidas = array();
			} else {

				$criteria->add(AlbaranesSalidaPeer::ID_VENTA, $this->getIdVenta());

				$this->collAlbaranesSalidas = AlbaranesSalidaPeer::doSelectJoinSalidas($criteria, $con);
			}
		} else {
									
			$criteria->add(AlbaranesSalidaPeer::ID_VENTA, $this->getIdVenta());

			if (!isset($this->lastAlbaranesSalidaCriteria) || !$this->lastAlbaranesSalidaCriteria->equals($criteria)) {
				$this->collAlbaranesSalidas = AlbaranesSalidaPeer::doSelectJoinSalidas($criteria, $con);
			}
		}
		$this->lastAlbaranesSalidaCriteria = $criteria;

		return $this->collAlbaranesSalidas;
	}

	
	public function initAlbaranesVentas()
	{
		if ($this->collAlbaranesVentas === null) {
			$this->collAlbaranesVentas = array();
		}
	}

	
	public function getAlbaranesVentas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesVentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlbaranesVentas === null) {
			if ($this->isNew()) {
			   $this->collAlbaranesVentas = array();
			} else {

				$criteria->add(AlbaranesVentaPeer::ID_VENTA, $this->getIdVenta());

				AlbaranesVentaPeer::addSelectColumns($criteria);
				$this->collAlbaranesVentas = AlbaranesVentaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlbaranesVentaPeer::ID_VENTA, $this->getIdVenta());

				AlbaranesVentaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlbaranesVentaCriteria) || !$this->lastAlbaranesVentaCriteria->equals($criteria)) {
					$this->collAlbaranesVentas = AlbaranesVentaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlbaranesVentaCriteria = $criteria;
		return $this->collAlbaranesVentas;
	}

	
	public function countAlbaranesVentas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesVentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlbaranesVentaPeer::ID_VENTA, $this->getIdVenta());

		return AlbaranesVentaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlbaranesVenta(AlbaranesVenta $l)
	{
		$this->collAlbaranesVentas[] = $l;
		$l->setVentas($this);
	}

	
	public function initArticulosXVentas()
	{
		if ($this->collArticulosXVentas === null) {
			$this->collArticulosXVentas = array();
		}
	}

	
	public function getArticulosXVentas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXVentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXVentas === null) {
			if ($this->isNew()) {
			   $this->collArticulosXVentas = array();
			} else {

				$criteria->add(ArticulosXVentaPeer::ID_VENTA, $this->getIdVenta());

				ArticulosXVentaPeer::addSelectColumns($criteria);
				$this->collArticulosXVentas = ArticulosXVentaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXVentaPeer::ID_VENTA, $this->getIdVenta());

				ArticulosXVentaPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticulosXVentaCriteria) || !$this->lastArticulosXVentaCriteria->equals($criteria)) {
					$this->collArticulosXVentas = ArticulosXVentaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticulosXVentaCriteria = $criteria;
		return $this->collArticulosXVentas;
	}

	
	public function countArticulosXVentas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXVentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticulosXVentaPeer::ID_VENTA, $this->getIdVenta());

		return ArticulosXVentaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXVenta(ArticulosXVenta $l)
	{
		$this->collArticulosXVentas[] = $l;
		$l->setVentas($this);
	}


	
	public function getArticulosXVentasJoinArticulos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXVentaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXVentas === null) {
			if ($this->isNew()) {
				$this->collArticulosXVentas = array();
			} else {

				$criteria->add(ArticulosXVentaPeer::ID_VENTA, $this->getIdVenta());

				$this->collArticulosXVentas = ArticulosXVentaPeer::doSelectJoinArticulos($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXVentaPeer::ID_VENTA, $this->getIdVenta());

			if (!isset($this->lastArticulosXVentaCriteria) || !$this->lastArticulosXVentaCriteria->equals($criteria)) {
				$this->collArticulosXVentas = ArticulosXVentaPeer::doSelectJoinArticulos($criteria, $con);
			}
		}
		$this->lastArticulosXVentaCriteria = $criteria;

		return $this->collArticulosXVentas;
	}

	
	public function initSalidass()
	{
		if ($this->collSalidass === null) {
			$this->collSalidass = array();
		}
	}

	
	public function getSalidass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSalidass === null) {
			if ($this->isNew()) {
			   $this->collSalidass = array();
			} else {

				$criteria->add(SalidasPeer::ID_VENTA, $this->getIdVenta());

				SalidasPeer::addSelectColumns($criteria);
				$this->collSalidass = SalidasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SalidasPeer::ID_VENTA, $this->getIdVenta());

				SalidasPeer::addSelectColumns($criteria);
				if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
					$this->collSalidass = SalidasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSalidasCriteria = $criteria;
		return $this->collSalidass;
	}

	
	public function countSalidass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SalidasPeer::ID_VENTA, $this->getIdVenta());

		return SalidasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSalidas(Salidas $l)
	{
		$this->collSalidass[] = $l;
		$l->setVentas($this);
	}


	
	public function getSalidassJoinTransporteConductores($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSalidass === null) {
			if ($this->isNew()) {
				$this->collSalidass = array();
			} else {

				$criteria->add(SalidasPeer::ID_VENTA, $this->getIdVenta());

				$this->collSalidass = SalidasPeer::doSelectJoinTransporteConductores($criteria, $con);
			}
		} else {
									
			$criteria->add(SalidasPeer::ID_VENTA, $this->getIdVenta());

			if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
				$this->collSalidass = SalidasPeer::doSelectJoinTransporteConductores($criteria, $con);
			}
		}
		$this->lastSalidasCriteria = $criteria;

		return $this->collSalidass;
	}


	
	public function getSalidassJoinEstadoSalidas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSalidasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSalidass === null) {
			if ($this->isNew()) {
				$this->collSalidass = array();
			} else {

				$criteria->add(SalidasPeer::ID_VENTA, $this->getIdVenta());

				$this->collSalidass = SalidasPeer::doSelectJoinEstadoSalidas($criteria, $con);
			}
		} else {
									
			$criteria->add(SalidasPeer::ID_VENTA, $this->getIdVenta());

			if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
				$this->collSalidass = SalidasPeer::doSelectJoinEstadoSalidas($criteria, $con);
			}
		}
		$this->lastSalidasCriteria = $criteria;

		return $this->collSalidass;
	}

} 