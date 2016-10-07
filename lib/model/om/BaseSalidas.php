<?php


abstract class BaseSalidas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_salida;


	
	protected $id_md5_salida;


	
	protected $id_venta;


	
	protected $id_transporte_conductor;


	
	protected $id_estado_salida;


	
	protected $num_salida;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aVentas;

	
	protected $aTransporteConductores;

	
	protected $aEstadoSalidas;

	
	protected $collAlbaranesSalidas;

	
	protected $lastAlbaranesSalidaCriteria = null;

	
	protected $collArticulosXSalidas;

	
	protected $lastArticulosXSalidaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdSalida()
	{

		return $this->id_salida;
	}

	
	public function getIdMd5Salida()
	{

		return $this->id_md5_salida;
	}

	
	public function getIdVenta()
	{

		return $this->id_venta;
	}

	
	public function getIdTransporteConductor()
	{

		return $this->id_transporte_conductor;
	}

	
	public function getIdEstadoSalida()
	{

		return $this->id_estado_salida;
	}

	
	public function getNumSalida()
	{

		return $this->num_salida;
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

	
	public function setIdSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_salida !== $v) {
			$this->id_salida = $v;
			$this->modifiedColumns[] = SalidasPeer::ID_SALIDA;
		}

	} 
	
	public function setIdMd5Salida($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_salida !== $v) {
			$this->id_md5_salida = $v;
			$this->modifiedColumns[] = SalidasPeer::ID_MD5_SALIDA;
		}

	} 
	
	public function setIdVenta($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_venta !== $v) {
			$this->id_venta = $v;
			$this->modifiedColumns[] = SalidasPeer::ID_VENTA;
		}

		if ($this->aVentas !== null && $this->aVentas->getIdVenta() !== $v) {
			$this->aVentas = null;
		}

	} 
	
	public function setIdTransporteConductor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_transporte_conductor !== $v) {
			$this->id_transporte_conductor = $v;
			$this->modifiedColumns[] = SalidasPeer::ID_TRANSPORTE_CONDUCTOR;
		}

		if ($this->aTransporteConductores !== null && $this->aTransporteConductores->getIdTransporteConductor() !== $v) {
			$this->aTransporteConductores = null;
		}

	} 
	
	public function setIdEstadoSalida($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_salida !== $v) {
			$this->id_estado_salida = $v;
			$this->modifiedColumns[] = SalidasPeer::ID_ESTADO_SALIDA;
		}

		if ($this->aEstadoSalidas !== null && $this->aEstadoSalidas->getIdEstadoSalida() !== $v) {
			$this->aEstadoSalidas = null;
		}

	} 
	
	public function setNumSalida($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->num_salida !== $v) {
			$this->num_salida = $v;
			$this->modifiedColumns[] = SalidasPeer::NUM_SALIDA;
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
			$this->modifiedColumns[] = SalidasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = SalidasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_salida = $rs->getInt($startcol + 0);

			$this->id_md5_salida = $rs->getString($startcol + 1);

			$this->id_venta = $rs->getInt($startcol + 2);

			$this->id_transporte_conductor = $rs->getInt($startcol + 3);

			$this->id_estado_salida = $rs->getInt($startcol + 4);

			$this->num_salida = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Salidas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SalidasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SalidasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(SalidasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(SalidasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SalidasPeer::DATABASE_NAME);
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


												
			if ($this->aVentas !== null) {
				if ($this->aVentas->isModified()) {
					$affectedRows += $this->aVentas->save($con);
				}
				$this->setVentas($this->aVentas);
			}

			if ($this->aTransporteConductores !== null) {
				if ($this->aTransporteConductores->isModified()) {
					$affectedRows += $this->aTransporteConductores->save($con);
				}
				$this->setTransporteConductores($this->aTransporteConductores);
			}

			if ($this->aEstadoSalidas !== null) {
				if ($this->aEstadoSalidas->isModified()) {
					$affectedRows += $this->aEstadoSalidas->save($con);
				}
				$this->setEstadoSalidas($this->aEstadoSalidas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SalidasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdSalida($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SalidasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlbaranesSalidas !== null) {
				foreach($this->collAlbaranesSalidas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticulosXSalidas !== null) {
				foreach($this->collArticulosXSalidas as $referrerFK) {
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


												
			if ($this->aVentas !== null) {
				if (!$this->aVentas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVentas->getValidationFailures());
				}
			}

			if ($this->aTransporteConductores !== null) {
				if (!$this->aTransporteConductores->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTransporteConductores->getValidationFailures());
				}
			}

			if ($this->aEstadoSalidas !== null) {
				if (!$this->aEstadoSalidas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadoSalidas->getValidationFailures());
				}
			}


			if (($retval = SalidasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlbaranesSalidas !== null) {
					foreach($this->collAlbaranesSalidas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticulosXSalidas !== null) {
					foreach($this->collArticulosXSalidas as $referrerFK) {
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
		$pos = SalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdSalida();
				break;
			case 1:
				return $this->getIdMd5Salida();
				break;
			case 2:
				return $this->getIdVenta();
				break;
			case 3:
				return $this->getIdTransporteConductor();
				break;
			case 4:
				return $this->getIdEstadoSalida();
				break;
			case 5:
				return $this->getNumSalida();
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
		$keys = SalidasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdSalida(),
			$keys[1] => $this->getIdMd5Salida(),
			$keys[2] => $this->getIdVenta(),
			$keys[3] => $this->getIdTransporteConductor(),
			$keys[4] => $this->getIdEstadoSalida(),
			$keys[5] => $this->getNumSalida(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SalidasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdSalida($value);
				break;
			case 1:
				$this->setIdMd5Salida($value);
				break;
			case 2:
				$this->setIdVenta($value);
				break;
			case 3:
				$this->setIdTransporteConductor($value);
				break;
			case 4:
				$this->setIdEstadoSalida($value);
				break;
			case 5:
				$this->setNumSalida($value);
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
		$keys = SalidasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdSalida($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Salida($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdVenta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdTransporteConductor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdEstadoSalida($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumSalida($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SalidasPeer::DATABASE_NAME);

		if ($this->isColumnModified(SalidasPeer::ID_SALIDA)) $criteria->add(SalidasPeer::ID_SALIDA, $this->id_salida);
		if ($this->isColumnModified(SalidasPeer::ID_MD5_SALIDA)) $criteria->add(SalidasPeer::ID_MD5_SALIDA, $this->id_md5_salida);
		if ($this->isColumnModified(SalidasPeer::ID_VENTA)) $criteria->add(SalidasPeer::ID_VENTA, $this->id_venta);
		if ($this->isColumnModified(SalidasPeer::ID_TRANSPORTE_CONDUCTOR)) $criteria->add(SalidasPeer::ID_TRANSPORTE_CONDUCTOR, $this->id_transporte_conductor);
		if ($this->isColumnModified(SalidasPeer::ID_ESTADO_SALIDA)) $criteria->add(SalidasPeer::ID_ESTADO_SALIDA, $this->id_estado_salida);
		if ($this->isColumnModified(SalidasPeer::NUM_SALIDA)) $criteria->add(SalidasPeer::NUM_SALIDA, $this->num_salida);
		if ($this->isColumnModified(SalidasPeer::CREATED_AT)) $criteria->add(SalidasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(SalidasPeer::UPDATED_AT)) $criteria->add(SalidasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SalidasPeer::DATABASE_NAME);

		$criteria->add(SalidasPeer::ID_SALIDA, $this->id_salida);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdSalida();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdSalida($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Salida($this->id_md5_salida);

		$copyObj->setIdVenta($this->id_venta);

		$copyObj->setIdTransporteConductor($this->id_transporte_conductor);

		$copyObj->setIdEstadoSalida($this->id_estado_salida);

		$copyObj->setNumSalida($this->num_salida);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlbaranesSalidas() as $relObj) {
				$copyObj->addAlbaranesSalida($relObj->copy($deepCopy));
			}

			foreach($this->getArticulosXSalidas() as $relObj) {
				$copyObj->addArticulosXSalida($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdSalida(NULL); 
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
			self::$peer = new SalidasPeer();
		}
		return self::$peer;
	}

	
	public function setVentas($v)
	{


		if ($v === null) {
			$this->setIdVenta(NULL);
		} else {
			$this->setIdVenta($v->getIdVenta());
		}


		$this->aVentas = $v;
	}


	
	public function getVentas($con = null)
	{
		if ($this->aVentas === null && ($this->id_venta !== null)) {
						include_once 'lib/model/om/BaseVentasPeer.php';

			$this->aVentas = VentasPeer::retrieveByPK($this->id_venta, $con);

			
		}
		return $this->aVentas;
	}

	
	public function setTransporteConductores($v)
	{


		if ($v === null) {
			$this->setIdTransporteConductor(NULL);
		} else {
			$this->setIdTransporteConductor($v->getIdTransporteConductor());
		}


		$this->aTransporteConductores = $v;
	}


	
	public function getTransporteConductores($con = null)
	{
		if ($this->aTransporteConductores === null && ($this->id_transporte_conductor !== null)) {
						include_once 'lib/model/om/BaseTransporteConductoresPeer.php';

			$this->aTransporteConductores = TransporteConductoresPeer::retrieveByPK($this->id_transporte_conductor, $con);

			
		}
		return $this->aTransporteConductores;
	}

	
	public function setEstadoSalidas($v)
	{


		if ($v === null) {
			$this->setIdEstadoSalida(NULL);
		} else {
			$this->setIdEstadoSalida($v->getIdEstadoSalida());
		}


		$this->aEstadoSalidas = $v;
	}


	
	public function getEstadoSalidas($con = null)
	{
		if ($this->aEstadoSalidas === null && ($this->id_estado_salida !== null)) {
						include_once 'lib/model/om/BaseEstadoSalidasPeer.php';

			$this->aEstadoSalidas = EstadoSalidasPeer::retrieveByPK($this->id_estado_salida, $con);

			
		}
		return $this->aEstadoSalidas;
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

				$criteria->add(AlbaranesSalidaPeer::ID_SALIDA, $this->getIdSalida());

				AlbaranesSalidaPeer::addSelectColumns($criteria);
				$this->collAlbaranesSalidas = AlbaranesSalidaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlbaranesSalidaPeer::ID_SALIDA, $this->getIdSalida());

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

		$criteria->add(AlbaranesSalidaPeer::ID_SALIDA, $this->getIdSalida());

		return AlbaranesSalidaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlbaranesSalida(AlbaranesSalida $l)
	{
		$this->collAlbaranesSalidas[] = $l;
		$l->setSalidas($this);
	}


	
	public function getAlbaranesSalidasJoinVentas($criteria = null, $con = null)
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

				$criteria->add(AlbaranesSalidaPeer::ID_SALIDA, $this->getIdSalida());

				$this->collAlbaranesSalidas = AlbaranesSalidaPeer::doSelectJoinVentas($criteria, $con);
			}
		} else {
									
			$criteria->add(AlbaranesSalidaPeer::ID_SALIDA, $this->getIdSalida());

			if (!isset($this->lastAlbaranesSalidaCriteria) || !$this->lastAlbaranesSalidaCriteria->equals($criteria)) {
				$this->collAlbaranesSalidas = AlbaranesSalidaPeer::doSelectJoinVentas($criteria, $con);
			}
		}
		$this->lastAlbaranesSalidaCriteria = $criteria;

		return $this->collAlbaranesSalidas;
	}

	
	public function initArticulosXSalidas()
	{
		if ($this->collArticulosXSalidas === null) {
			$this->collArticulosXSalidas = array();
		}
	}

	
	public function getArticulosXSalidas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXSalidaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXSalidas === null) {
			if ($this->isNew()) {
			   $this->collArticulosXSalidas = array();
			} else {

				$criteria->add(ArticulosXSalidaPeer::ID_SALIDA, $this->getIdSalida());

				ArticulosXSalidaPeer::addSelectColumns($criteria);
				$this->collArticulosXSalidas = ArticulosXSalidaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXSalidaPeer::ID_SALIDA, $this->getIdSalida());

				ArticulosXSalidaPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticulosXSalidaCriteria) || !$this->lastArticulosXSalidaCriteria->equals($criteria)) {
					$this->collArticulosXSalidas = ArticulosXSalidaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticulosXSalidaCriteria = $criteria;
		return $this->collArticulosXSalidas;
	}

	
	public function countArticulosXSalidas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXSalidaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticulosXSalidaPeer::ID_SALIDA, $this->getIdSalida());

		return ArticulosXSalidaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXSalida(ArticulosXSalida $l)
	{
		$this->collArticulosXSalidas[] = $l;
		$l->setSalidas($this);
	}


	
	public function getArticulosXSalidasJoinArticulos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXSalidaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXSalidas === null) {
			if ($this->isNew()) {
				$this->collArticulosXSalidas = array();
			} else {

				$criteria->add(ArticulosXSalidaPeer::ID_SALIDA, $this->getIdSalida());

				$this->collArticulosXSalidas = ArticulosXSalidaPeer::doSelectJoinArticulos($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXSalidaPeer::ID_SALIDA, $this->getIdSalida());

			if (!isset($this->lastArticulosXSalidaCriteria) || !$this->lastArticulosXSalidaCriteria->equals($criteria)) {
				$this->collArticulosXSalidas = ArticulosXSalidaPeer::doSelectJoinArticulos($criteria, $con);
			}
		}
		$this->lastArticulosXSalidaCriteria = $criteria;

		return $this->collArticulosXSalidas;
	}

} 