<?php


abstract class BaseTransporteConductores extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_transporte_conductor;


	
	protected $id_md5_transporte_conductor;


	
	protected $id_transporte_empresa;


	
	protected $nombre;


	
	protected $apellidos;


	
	protected $telefono;


	
	protected $telefono_trabajo;


	
	protected $telefono_otro;


	
	protected $movil;


	
	protected $observaciones;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aTransporteEmpresas;

	
	protected $collEntradass;

	
	protected $lastEntradasCriteria = null;

	
	protected $collSalidass;

	
	protected $lastSalidasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdTransporteConductor()
	{

		return $this->id_transporte_conductor;
	}

	
	public function getIdMd5TransporteConductor()
	{

		return $this->id_md5_transporte_conductor;
	}

	
	public function getIdTransporteEmpresa()
	{

		return $this->id_transporte_empresa;
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

	
	public function getTelefonoTrabajo()
	{

		return $this->telefono_trabajo;
	}

	
	public function getTelefonoOtro()
	{

		return $this->telefono_otro;
	}

	
	public function getMovil()
	{

		return $this->movil;
	}

	
	public function getObservaciones()
	{

		return $this->observaciones;
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

	
	public function setIdTransporteConductor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_transporte_conductor !== $v) {
			$this->id_transporte_conductor = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR;
		}

	} 
	
	public function setIdMd5TransporteConductor($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_transporte_conductor !== $v) {
			$this->id_md5_transporte_conductor = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::ID_MD5_TRANSPORTE_CONDUCTOR;
		}

	} 
	
	public function setIdTransporteEmpresa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_transporte_empresa !== $v) {
			$this->id_transporte_empresa = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA;
		}

		if ($this->aTransporteEmpresas !== null && $this->aTransporteEmpresas->getIdTransporteEmpresa() !== $v) {
			$this->aTransporteEmpresas = null;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::NOMBRE;
		}

	} 
	
	public function setApellidos($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->apellidos !== $v) {
			$this->apellidos = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::APELLIDOS;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::TELEFONO;
		}

	} 
	
	public function setTelefonoTrabajo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono_trabajo !== $v) {
			$this->telefono_trabajo = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::TELEFONO_TRABAJO;
		}

	} 
	
	public function setTelefonoOtro($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono_otro !== $v) {
			$this->telefono_otro = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::TELEFONO_OTRO;
		}

	} 
	
	public function setMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->movil !== $v) {
			$this->movil = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::MOVIL;
		}

	} 
	
	public function setObservaciones($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->observaciones !== $v) {
			$this->observaciones = $v;
			$this->modifiedColumns[] = TransporteConductoresPeer::OBSERVACIONES;
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
			$this->modifiedColumns[] = TransporteConductoresPeer::CREATED_AT;
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
			$this->modifiedColumns[] = TransporteConductoresPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_transporte_conductor = $rs->getInt($startcol + 0);

			$this->id_md5_transporte_conductor = $rs->getString($startcol + 1);

			$this->id_transporte_empresa = $rs->getInt($startcol + 2);

			$this->nombre = $rs->getString($startcol + 3);

			$this->apellidos = $rs->getString($startcol + 4);

			$this->telefono = $rs->getString($startcol + 5);

			$this->telefono_trabajo = $rs->getString($startcol + 6);

			$this->telefono_otro = $rs->getString($startcol + 7);

			$this->movil = $rs->getString($startcol + 8);

			$this->observaciones = $rs->getString($startcol + 9);

			$this->created_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_at = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TransporteConductores object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TransporteConductoresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TransporteConductoresPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(TransporteConductoresPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TransporteConductoresPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TransporteConductoresPeer::DATABASE_NAME);
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


												
			if ($this->aTransporteEmpresas !== null) {
				if ($this->aTransporteEmpresas->isModified()) {
					$affectedRows += $this->aTransporteEmpresas->save($con);
				}
				$this->setTransporteEmpresas($this->aTransporteEmpresas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TransporteConductoresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdTransporteConductor($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TransporteConductoresPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEntradass !== null) {
				foreach($this->collEntradass as $referrerFK) {
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


												
			if ($this->aTransporteEmpresas !== null) {
				if (!$this->aTransporteEmpresas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTransporteEmpresas->getValidationFailures());
				}
			}


			if (($retval = TransporteConductoresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEntradass !== null) {
					foreach($this->collEntradass as $referrerFK) {
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
		$pos = TransporteConductoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdTransporteConductor();
				break;
			case 1:
				return $this->getIdMd5TransporteConductor();
				break;
			case 2:
				return $this->getIdTransporteEmpresa();
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
				return $this->getTelefonoTrabajo();
				break;
			case 7:
				return $this->getTelefonoOtro();
				break;
			case 8:
				return $this->getMovil();
				break;
			case 9:
				return $this->getObservaciones();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TransporteConductoresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdTransporteConductor(),
			$keys[1] => $this->getIdMd5TransporteConductor(),
			$keys[2] => $this->getIdTransporteEmpresa(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getApellidos(),
			$keys[5] => $this->getTelefono(),
			$keys[6] => $this->getTelefonoTrabajo(),
			$keys[7] => $this->getTelefonoOtro(),
			$keys[8] => $this->getMovil(),
			$keys[9] => $this->getObservaciones(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TransporteConductoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdTransporteConductor($value);
				break;
			case 1:
				$this->setIdMd5TransporteConductor($value);
				break;
			case 2:
				$this->setIdTransporteEmpresa($value);
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
				$this->setTelefonoTrabajo($value);
				break;
			case 7:
				$this->setTelefonoOtro($value);
				break;
			case 8:
				$this->setMovil($value);
				break;
			case 9:
				$this->setObservaciones($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TransporteConductoresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdTransporteConductor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5TransporteConductor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdTransporteEmpresa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setApellidos($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelefono($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelefonoTrabajo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTelefonoOtro($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMovil($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObservaciones($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TransporteConductoresPeer::DATABASE_NAME);

		if ($this->isColumnModified(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR)) $criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR, $this->id_transporte_conductor);
		if ($this->isColumnModified(TransporteConductoresPeer::ID_MD5_TRANSPORTE_CONDUCTOR)) $criteria->add(TransporteConductoresPeer::ID_MD5_TRANSPORTE_CONDUCTOR, $this->id_md5_transporte_conductor);
		if ($this->isColumnModified(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA)) $criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, $this->id_transporte_empresa);
		if ($this->isColumnModified(TransporteConductoresPeer::NOMBRE)) $criteria->add(TransporteConductoresPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(TransporteConductoresPeer::APELLIDOS)) $criteria->add(TransporteConductoresPeer::APELLIDOS, $this->apellidos);
		if ($this->isColumnModified(TransporteConductoresPeer::TELEFONO)) $criteria->add(TransporteConductoresPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(TransporteConductoresPeer::TELEFONO_TRABAJO)) $criteria->add(TransporteConductoresPeer::TELEFONO_TRABAJO, $this->telefono_trabajo);
		if ($this->isColumnModified(TransporteConductoresPeer::TELEFONO_OTRO)) $criteria->add(TransporteConductoresPeer::TELEFONO_OTRO, $this->telefono_otro);
		if ($this->isColumnModified(TransporteConductoresPeer::MOVIL)) $criteria->add(TransporteConductoresPeer::MOVIL, $this->movil);
		if ($this->isColumnModified(TransporteConductoresPeer::OBSERVACIONES)) $criteria->add(TransporteConductoresPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(TransporteConductoresPeer::CREATED_AT)) $criteria->add(TransporteConductoresPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(TransporteConductoresPeer::UPDATED_AT)) $criteria->add(TransporteConductoresPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TransporteConductoresPeer::DATABASE_NAME);

		$criteria->add(TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR, $this->id_transporte_conductor);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdTransporteConductor();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdTransporteConductor($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5TransporteConductor($this->id_md5_transporte_conductor);

		$copyObj->setIdTransporteEmpresa($this->id_transporte_empresa);

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellidos($this->apellidos);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setTelefonoTrabajo($this->telefono_trabajo);

		$copyObj->setTelefonoOtro($this->telefono_otro);

		$copyObj->setMovil($this->movil);

		$copyObj->setObservaciones($this->observaciones);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEntradass() as $relObj) {
				$copyObj->addEntradas($relObj->copy($deepCopy));
			}

			foreach($this->getSalidass() as $relObj) {
				$copyObj->addSalidas($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdTransporteConductor(NULL); 
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
			self::$peer = new TransporteConductoresPeer();
		}
		return self::$peer;
	}

	
	public function setTransporteEmpresas($v)
	{


		if ($v === null) {
			$this->setIdTransporteEmpresa(NULL);
		} else {
			$this->setIdTransporteEmpresa($v->getIdTransporteEmpresa());
		}


		$this->aTransporteEmpresas = $v;
	}


	
	public function getTransporteEmpresas($con = null)
	{
		if ($this->aTransporteEmpresas === null && ($this->id_transporte_empresa !== null)) {
						include_once 'lib/model/om/BaseTransporteEmpresasPeer.php';

			$this->aTransporteEmpresas = TransporteEmpresasPeer::retrieveByPK($this->id_transporte_empresa, $con);

			
		}
		return $this->aTransporteEmpresas;
	}

	
	public function initEntradass()
	{
		if ($this->collEntradass === null) {
			$this->collEntradass = array();
		}
	}

	
	public function getEntradass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradass === null) {
			if ($this->isNew()) {
			   $this->collEntradass = array();
			} else {

				$criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

				EntradasPeer::addSelectColumns($criteria);
				$this->collEntradass = EntradasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

				EntradasPeer::addSelectColumns($criteria);
				if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
					$this->collEntradass = EntradasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEntradasCriteria = $criteria;
		return $this->collEntradass;
	}

	
	public function countEntradass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

		return EntradasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEntradas(Entradas $l)
	{
		$this->collEntradass[] = $l;
		$l->setTransporteConductores($this);
	}


	
	public function getEntradassJoinPedidos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradass === null) {
			if ($this->isNew()) {
				$this->collEntradass = array();
			} else {

				$criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

				$this->collEntradass = EntradasPeer::doSelectJoinPedidos($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

			if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
				$this->collEntradass = EntradasPeer::doSelectJoinPedidos($criteria, $con);
			}
		}
		$this->lastEntradasCriteria = $criteria;

		return $this->collEntradass;
	}


	
	public function getEntradassJoinEstadoEntradas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradass === null) {
			if ($this->isNew()) {
				$this->collEntradass = array();
			} else {

				$criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

				$this->collEntradass = EntradasPeer::doSelectJoinEstadoEntradas($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

			if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
				$this->collEntradass = EntradasPeer::doSelectJoinEstadoEntradas($criteria, $con);
			}
		}
		$this->lastEntradasCriteria = $criteria;

		return $this->collEntradass;
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

				$criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

				SalidasPeer::addSelectColumns($criteria);
				$this->collSalidass = SalidasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

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

		$criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

		return SalidasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSalidas(Salidas $l)
	{
		$this->collSalidass[] = $l;
		$l->setTransporteConductores($this);
	}


	
	public function getSalidassJoinVentas($criteria = null, $con = null)
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

				$criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

				$this->collSalidass = SalidasPeer::doSelectJoinVentas($criteria, $con);
			}
		} else {
									
			$criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

			if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
				$this->collSalidass = SalidasPeer::doSelectJoinVentas($criteria, $con);
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

				$criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

				$this->collSalidass = SalidasPeer::doSelectJoinEstadoSalidas($criteria, $con);
			}
		} else {
									
			$criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->getIdTransporteConductor());

			if (!isset($this->lastSalidasCriteria) || !$this->lastSalidasCriteria->equals($criteria)) {
				$this->collSalidass = SalidasPeer::doSelectJoinEstadoSalidas($criteria, $con);
			}
		}
		$this->lastSalidasCriteria = $criteria;

		return $this->collSalidass;
	}

} 