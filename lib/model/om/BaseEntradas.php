<?php


abstract class BaseEntradas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_entrada;


	
	protected $id_md5_entrada;


	
	protected $id_pedido;


	
	protected $id_transporte_conductor;


	
	protected $id_estado_entrada;


	
	protected $num_entrada;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aPedidos;

	
	protected $aTransporteConductores;

	
	protected $aEstadoEntradas;

	
	protected $collAlbaranesEntradas;

	
	protected $lastAlbaranesEntradaCriteria = null;

	
	protected $collEntradasXArticulos;

	
	protected $lastEntradasXArticuloCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdEntrada()
	{

		return $this->id_entrada;
	}

	
	public function getIdMd5Entrada()
	{

		return $this->id_md5_entrada;
	}

	
	public function getIdPedido()
	{

		return $this->id_pedido;
	}

	
	public function getIdTransporteConductor()
	{

		return $this->id_transporte_conductor;
	}

	
	public function getIdEstadoEntrada()
	{

		return $this->id_estado_entrada;
	}

	
	public function getNumEntrada()
	{

		return $this->num_entrada;
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

	
	public function setIdEntrada($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_entrada !== $v) {
			$this->id_entrada = $v;
			$this->modifiedColumns[] = EntradasPeer::ID_ENTRADA;
		}

	} 
	
	public function setIdMd5Entrada($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_entrada !== $v) {
			$this->id_md5_entrada = $v;
			$this->modifiedColumns[] = EntradasPeer::ID_MD5_ENTRADA;
		}

	} 
	
	public function setIdPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pedido !== $v) {
			$this->id_pedido = $v;
			$this->modifiedColumns[] = EntradasPeer::ID_PEDIDO;
		}

		if ($this->aPedidos !== null && $this->aPedidos->getIdPedido() !== $v) {
			$this->aPedidos = null;
		}

	} 
	
	public function setIdTransporteConductor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_transporte_conductor !== $v) {
			$this->id_transporte_conductor = $v;
			$this->modifiedColumns[] = EntradasPeer::ID_TRANSPORTE_CONDUCTOR;
		}

		if ($this->aTransporteConductores !== null && $this->aTransporteConductores->getIdTransporteConductor() !== $v) {
			$this->aTransporteConductores = null;
		}

	} 
	
	public function setIdEstadoEntrada($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_entrada !== $v) {
			$this->id_estado_entrada = $v;
			$this->modifiedColumns[] = EntradasPeer::ID_ESTADO_ENTRADA;
		}

		if ($this->aEstadoEntradas !== null && $this->aEstadoEntradas->getIdEstadoEntrada() !== $v) {
			$this->aEstadoEntradas = null;
		}

	} 
	
	public function setNumEntrada($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->num_entrada !== $v) {
			$this->num_entrada = $v;
			$this->modifiedColumns[] = EntradasPeer::NUM_ENTRADA;
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
			$this->modifiedColumns[] = EntradasPeer::CREATED_AT;
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
			$this->modifiedColumns[] = EntradasPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_entrada = $rs->getInt($startcol + 0);

			$this->id_md5_entrada = $rs->getString($startcol + 1);

			$this->id_pedido = $rs->getInt($startcol + 2);

			$this->id_transporte_conductor = $rs->getInt($startcol + 3);

			$this->id_estado_entrada = $rs->getInt($startcol + 4);

			$this->num_entrada = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Entradas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EntradasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EntradasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EntradasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EntradasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EntradasPeer::DATABASE_NAME);
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


												
			if ($this->aPedidos !== null) {
				if ($this->aPedidos->isModified()) {
					$affectedRows += $this->aPedidos->save($con);
				}
				$this->setPedidos($this->aPedidos);
			}

			if ($this->aTransporteConductores !== null) {
				if ($this->aTransporteConductores->isModified()) {
					$affectedRows += $this->aTransporteConductores->save($con);
				}
				$this->setTransporteConductores($this->aTransporteConductores);
			}

			if ($this->aEstadoEntradas !== null) {
				if ($this->aEstadoEntradas->isModified()) {
					$affectedRows += $this->aEstadoEntradas->save($con);
				}
				$this->setEstadoEntradas($this->aEstadoEntradas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EntradasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdEntrada($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EntradasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlbaranesEntradas !== null) {
				foreach($this->collAlbaranesEntradas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEntradasXArticulos !== null) {
				foreach($this->collEntradasXArticulos as $referrerFK) {
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


												
			if ($this->aPedidos !== null) {
				if (!$this->aPedidos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPedidos->getValidationFailures());
				}
			}

			if ($this->aTransporteConductores !== null) {
				if (!$this->aTransporteConductores->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTransporteConductores->getValidationFailures());
				}
			}

			if ($this->aEstadoEntradas !== null) {
				if (!$this->aEstadoEntradas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadoEntradas->getValidationFailures());
				}
			}


			if (($retval = EntradasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlbaranesEntradas !== null) {
					foreach($this->collAlbaranesEntradas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEntradasXArticulos !== null) {
					foreach($this->collEntradasXArticulos as $referrerFK) {
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
		$pos = EntradasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdEntrada();
				break;
			case 1:
				return $this->getIdMd5Entrada();
				break;
			case 2:
				return $this->getIdPedido();
				break;
			case 3:
				return $this->getIdTransporteConductor();
				break;
			case 4:
				return $this->getIdEstadoEntrada();
				break;
			case 5:
				return $this->getNumEntrada();
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
		$keys = EntradasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdEntrada(),
			$keys[1] => $this->getIdMd5Entrada(),
			$keys[2] => $this->getIdPedido(),
			$keys[3] => $this->getIdTransporteConductor(),
			$keys[4] => $this->getIdEstadoEntrada(),
			$keys[5] => $this->getNumEntrada(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EntradasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdEntrada($value);
				break;
			case 1:
				$this->setIdMd5Entrada($value);
				break;
			case 2:
				$this->setIdPedido($value);
				break;
			case 3:
				$this->setIdTransporteConductor($value);
				break;
			case 4:
				$this->setIdEstadoEntrada($value);
				break;
			case 5:
				$this->setNumEntrada($value);
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
		$keys = EntradasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdEntrada($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Entrada($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdPedido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdTransporteConductor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdEstadoEntrada($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumEntrada($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EntradasPeer::DATABASE_NAME);

		if ($this->isColumnModified(EntradasPeer::ID_ENTRADA)) $criteria->add(EntradasPeer::ID_ENTRADA, $this->id_entrada);
		if ($this->isColumnModified(EntradasPeer::ID_MD5_ENTRADA)) $criteria->add(EntradasPeer::ID_MD5_ENTRADA, $this->id_md5_entrada);
		if ($this->isColumnModified(EntradasPeer::ID_PEDIDO)) $criteria->add(EntradasPeer::ID_PEDIDO, $this->id_pedido);
		if ($this->isColumnModified(EntradasPeer::ID_TRANSPORTE_CONDUCTOR)) $criteria->add(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, $this->id_transporte_conductor);
		if ($this->isColumnModified(EntradasPeer::ID_ESTADO_ENTRADA)) $criteria->add(EntradasPeer::ID_ESTADO_ENTRADA, $this->id_estado_entrada);
		if ($this->isColumnModified(EntradasPeer::NUM_ENTRADA)) $criteria->add(EntradasPeer::NUM_ENTRADA, $this->num_entrada);
		if ($this->isColumnModified(EntradasPeer::CREATED_AT)) $criteria->add(EntradasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EntradasPeer::UPDATED_AT)) $criteria->add(EntradasPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EntradasPeer::DATABASE_NAME);

		$criteria->add(EntradasPeer::ID_ENTRADA, $this->id_entrada);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdEntrada();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdEntrada($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Entrada($this->id_md5_entrada);

		$copyObj->setIdPedido($this->id_pedido);

		$copyObj->setIdTransporteConductor($this->id_transporte_conductor);

		$copyObj->setIdEstadoEntrada($this->id_estado_entrada);

		$copyObj->setNumEntrada($this->num_entrada);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlbaranesEntradas() as $relObj) {
				$copyObj->addAlbaranesEntrada($relObj->copy($deepCopy));
			}

			foreach($this->getEntradasXArticulos() as $relObj) {
				$copyObj->addEntradasXArticulo($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdEntrada(NULL); 
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
			self::$peer = new EntradasPeer();
		}
		return self::$peer;
	}

	
	public function setPedidos($v)
	{


		if ($v === null) {
			$this->setIdPedido(NULL);
		} else {
			$this->setIdPedido($v->getIdPedido());
		}


		$this->aPedidos = $v;
	}


	
	public function getPedidos($con = null)
	{
		if ($this->aPedidos === null && ($this->id_pedido !== null)) {
						include_once 'lib/model/om/BasePedidosPeer.php';

			$this->aPedidos = PedidosPeer::retrieveByPK($this->id_pedido, $con);

			
		}
		return $this->aPedidos;
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

	
	public function setEstadoEntradas($v)
	{


		if ($v === null) {
			$this->setIdEstadoEntrada(NULL);
		} else {
			$this->setIdEstadoEntrada($v->getIdEstadoEntrada());
		}


		$this->aEstadoEntradas = $v;
	}


	
	public function getEstadoEntradas($con = null)
	{
		if ($this->aEstadoEntradas === null && ($this->id_estado_entrada !== null)) {
						include_once 'lib/model/om/BaseEstadoEntradasPeer.php';

			$this->aEstadoEntradas = EstadoEntradasPeer::retrieveByPK($this->id_estado_entrada, $con);

			
		}
		return $this->aEstadoEntradas;
	}

	
	public function initAlbaranesEntradas()
	{
		if ($this->collAlbaranesEntradas === null) {
			$this->collAlbaranesEntradas = array();
		}
	}

	
	public function getAlbaranesEntradas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesEntradaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlbaranesEntradas === null) {
			if ($this->isNew()) {
			   $this->collAlbaranesEntradas = array();
			} else {

				$criteria->add(AlbaranesEntradaPeer::ID_ENTRADA, $this->getIdEntrada());

				AlbaranesEntradaPeer::addSelectColumns($criteria);
				$this->collAlbaranesEntradas = AlbaranesEntradaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlbaranesEntradaPeer::ID_ENTRADA, $this->getIdEntrada());

				AlbaranesEntradaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlbaranesEntradaCriteria) || !$this->lastAlbaranesEntradaCriteria->equals($criteria)) {
					$this->collAlbaranesEntradas = AlbaranesEntradaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlbaranesEntradaCriteria = $criteria;
		return $this->collAlbaranesEntradas;
	}

	
	public function countAlbaranesEntradas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesEntradaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlbaranesEntradaPeer::ID_ENTRADA, $this->getIdEntrada());

		return AlbaranesEntradaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlbaranesEntrada(AlbaranesEntrada $l)
	{
		$this->collAlbaranesEntradas[] = $l;
		$l->setEntradas($this);
	}


	
	public function getAlbaranesEntradasJoinPedidos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesEntradaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlbaranesEntradas === null) {
			if ($this->isNew()) {
				$this->collAlbaranesEntradas = array();
			} else {

				$criteria->add(AlbaranesEntradaPeer::ID_ENTRADA, $this->getIdEntrada());

				$this->collAlbaranesEntradas = AlbaranesEntradaPeer::doSelectJoinPedidos($criteria, $con);
			}
		} else {
									
			$criteria->add(AlbaranesEntradaPeer::ID_ENTRADA, $this->getIdEntrada());

			if (!isset($this->lastAlbaranesEntradaCriteria) || !$this->lastAlbaranesEntradaCriteria->equals($criteria)) {
				$this->collAlbaranesEntradas = AlbaranesEntradaPeer::doSelectJoinPedidos($criteria, $con);
			}
		}
		$this->lastAlbaranesEntradaCriteria = $criteria;

		return $this->collAlbaranesEntradas;
	}

	
	public function initEntradasXArticulos()
	{
		if ($this->collEntradasXArticulos === null) {
			$this->collEntradasXArticulos = array();
		}
	}

	
	public function getEntradasXArticulos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasXArticuloPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradasXArticulos === null) {
			if ($this->isNew()) {
			   $this->collEntradasXArticulos = array();
			} else {

				$criteria->add(EntradasXArticuloPeer::ID_ENTRADA, $this->getIdEntrada());

				EntradasXArticuloPeer::addSelectColumns($criteria);
				$this->collEntradasXArticulos = EntradasXArticuloPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EntradasXArticuloPeer::ID_ENTRADA, $this->getIdEntrada());

				EntradasXArticuloPeer::addSelectColumns($criteria);
				if (!isset($this->lastEntradasXArticuloCriteria) || !$this->lastEntradasXArticuloCriteria->equals($criteria)) {
					$this->collEntradasXArticulos = EntradasXArticuloPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEntradasXArticuloCriteria = $criteria;
		return $this->collEntradasXArticulos;
	}

	
	public function countEntradasXArticulos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasXArticuloPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EntradasXArticuloPeer::ID_ENTRADA, $this->getIdEntrada());

		return EntradasXArticuloPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEntradasXArticulo(EntradasXArticulo $l)
	{
		$this->collEntradasXArticulos[] = $l;
		$l->setEntradas($this);
	}


	
	public function getEntradasXArticulosJoinArticulos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEntradasXArticuloPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEntradasXArticulos === null) {
			if ($this->isNew()) {
				$this->collEntradasXArticulos = array();
			} else {

				$criteria->add(EntradasXArticuloPeer::ID_ENTRADA, $this->getIdEntrada());

				$this->collEntradasXArticulos = EntradasXArticuloPeer::doSelectJoinArticulos($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasXArticuloPeer::ID_ENTRADA, $this->getIdEntrada());

			if (!isset($this->lastEntradasXArticuloCriteria) || !$this->lastEntradasXArticuloCriteria->equals($criteria)) {
				$this->collEntradasXArticulos = EntradasXArticuloPeer::doSelectJoinArticulos($criteria, $con);
			}
		}
		$this->lastEntradasXArticuloCriteria = $criteria;

		return $this->collEntradasXArticulos;
	}

} 