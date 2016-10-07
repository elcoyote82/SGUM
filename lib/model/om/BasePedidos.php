<?php


abstract class BasePedidos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_pedido;


	
	protected $id_md5_pedido;


	
	protected $id_usuario;


	
	protected $id_proveedor;


	
	protected $id_estado_pedido;


	
	protected $num_pedido;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $asfGuardUser;

	
	protected $aProveedores;

	
	protected $aEstadoPedidos;

	
	protected $collAlbaranesEntradas;

	
	protected $lastAlbaranesEntradaCriteria = null;

	
	protected $collAlbaranesPedidos;

	
	protected $lastAlbaranesPedidoCriteria = null;

	
	protected $collArticulosXPedidos;

	
	protected $lastArticulosXPedidoCriteria = null;

	
	protected $collEntradass;

	
	protected $lastEntradasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdPedido()
	{

		return $this->id_pedido;
	}

	
	public function getIdMd5Pedido()
	{

		return $this->id_md5_pedido;
	}

	
	public function getIdUsuario()
	{

		return $this->id_usuario;
	}

	
	public function getIdProveedor()
	{

		return $this->id_proveedor;
	}

	
	public function getIdEstadoPedido()
	{

		return $this->id_estado_pedido;
	}

	
	public function getNumPedido()
	{

		return $this->num_pedido;
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

	
	public function setIdPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pedido !== $v) {
			$this->id_pedido = $v;
			$this->modifiedColumns[] = PedidosPeer::ID_PEDIDO;
		}

	} 
	
	public function setIdMd5Pedido($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_pedido !== $v) {
			$this->id_md5_pedido = $v;
			$this->modifiedColumns[] = PedidosPeer::ID_MD5_PEDIDO;
		}

	} 
	
	public function setIdUsuario($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_usuario !== $v) {
			$this->id_usuario = $v;
			$this->modifiedColumns[] = PedidosPeer::ID_USUARIO;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setIdProveedor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_proveedor !== $v) {
			$this->id_proveedor = $v;
			$this->modifiedColumns[] = PedidosPeer::ID_PROVEEDOR;
		}

		if ($this->aProveedores !== null && $this->aProveedores->getIdProveedor() !== $v) {
			$this->aProveedores = null;
		}

	} 
	
	public function setIdEstadoPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado_pedido !== $v) {
			$this->id_estado_pedido = $v;
			$this->modifiedColumns[] = PedidosPeer::ID_ESTADO_PEDIDO;
		}

		if ($this->aEstadoPedidos !== null && $this->aEstadoPedidos->getIdEstadoPedido() !== $v) {
			$this->aEstadoPedidos = null;
		}

	} 
	
	public function setNumPedido($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->num_pedido !== $v) {
			$this->num_pedido = $v;
			$this->modifiedColumns[] = PedidosPeer::NUM_PEDIDO;
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
			$this->modifiedColumns[] = PedidosPeer::CREATED_AT;
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
			$this->modifiedColumns[] = PedidosPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_pedido = $rs->getInt($startcol + 0);

			$this->id_md5_pedido = $rs->getString($startcol + 1);

			$this->id_usuario = $rs->getInt($startcol + 2);

			$this->id_proveedor = $rs->getInt($startcol + 3);

			$this->id_estado_pedido = $rs->getInt($startcol + 4);

			$this->num_pedido = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Pedidos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PedidosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PedidosPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PedidosPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PedidosPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PedidosPeer::DATABASE_NAME);
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

			if ($this->aProveedores !== null) {
				if ($this->aProveedores->isModified()) {
					$affectedRows += $this->aProveedores->save($con);
				}
				$this->setProveedores($this->aProveedores);
			}

			if ($this->aEstadoPedidos !== null) {
				if ($this->aEstadoPedidos->isModified()) {
					$affectedRows += $this->aEstadoPedidos->save($con);
				}
				$this->setEstadoPedidos($this->aEstadoPedidos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PedidosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdPedido($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PedidosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlbaranesEntradas !== null) {
				foreach($this->collAlbaranesEntradas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlbaranesPedidos !== null) {
				foreach($this->collAlbaranesPedidos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticulosXPedidos !== null) {
				foreach($this->collArticulosXPedidos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEntradass !== null) {
				foreach($this->collEntradass as $referrerFK) {
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

			if ($this->aProveedores !== null) {
				if (!$this->aProveedores->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProveedores->getValidationFailures());
				}
			}

			if ($this->aEstadoPedidos !== null) {
				if (!$this->aEstadoPedidos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadoPedidos->getValidationFailures());
				}
			}


			if (($retval = PedidosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlbaranesEntradas !== null) {
					foreach($this->collAlbaranesEntradas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlbaranesPedidos !== null) {
					foreach($this->collAlbaranesPedidos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticulosXPedidos !== null) {
					foreach($this->collArticulosXPedidos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEntradass !== null) {
					foreach($this->collEntradass as $referrerFK) {
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
		$pos = PedidosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdPedido();
				break;
			case 1:
				return $this->getIdMd5Pedido();
				break;
			case 2:
				return $this->getIdUsuario();
				break;
			case 3:
				return $this->getIdProveedor();
				break;
			case 4:
				return $this->getIdEstadoPedido();
				break;
			case 5:
				return $this->getNumPedido();
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
		$keys = PedidosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdPedido(),
			$keys[1] => $this->getIdMd5Pedido(),
			$keys[2] => $this->getIdUsuario(),
			$keys[3] => $this->getIdProveedor(),
			$keys[4] => $this->getIdEstadoPedido(),
			$keys[5] => $this->getNumPedido(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PedidosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdPedido($value);
				break;
			case 1:
				$this->setIdMd5Pedido($value);
				break;
			case 2:
				$this->setIdUsuario($value);
				break;
			case 3:
				$this->setIdProveedor($value);
				break;
			case 4:
				$this->setIdEstadoPedido($value);
				break;
			case 5:
				$this->setNumPedido($value);
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
		$keys = PedidosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdPedido($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Pedido($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdUsuario($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdProveedor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdEstadoPedido($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumPedido($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PedidosPeer::DATABASE_NAME);

		if ($this->isColumnModified(PedidosPeer::ID_PEDIDO)) $criteria->add(PedidosPeer::ID_PEDIDO, $this->id_pedido);
		if ($this->isColumnModified(PedidosPeer::ID_MD5_PEDIDO)) $criteria->add(PedidosPeer::ID_MD5_PEDIDO, $this->id_md5_pedido);
		if ($this->isColumnModified(PedidosPeer::ID_USUARIO)) $criteria->add(PedidosPeer::ID_USUARIO, $this->id_usuario);
		if ($this->isColumnModified(PedidosPeer::ID_PROVEEDOR)) $criteria->add(PedidosPeer::ID_PROVEEDOR, $this->id_proveedor);
		if ($this->isColumnModified(PedidosPeer::ID_ESTADO_PEDIDO)) $criteria->add(PedidosPeer::ID_ESTADO_PEDIDO, $this->id_estado_pedido);
		if ($this->isColumnModified(PedidosPeer::NUM_PEDIDO)) $criteria->add(PedidosPeer::NUM_PEDIDO, $this->num_pedido);
		if ($this->isColumnModified(PedidosPeer::CREATED_AT)) $criteria->add(PedidosPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PedidosPeer::UPDATED_AT)) $criteria->add(PedidosPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PedidosPeer::DATABASE_NAME);

		$criteria->add(PedidosPeer::ID_PEDIDO, $this->id_pedido);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdPedido();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdPedido($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Pedido($this->id_md5_pedido);

		$copyObj->setIdUsuario($this->id_usuario);

		$copyObj->setIdProveedor($this->id_proveedor);

		$copyObj->setIdEstadoPedido($this->id_estado_pedido);

		$copyObj->setNumPedido($this->num_pedido);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlbaranesEntradas() as $relObj) {
				$copyObj->addAlbaranesEntrada($relObj->copy($deepCopy));
			}

			foreach($this->getAlbaranesPedidos() as $relObj) {
				$copyObj->addAlbaranesPedido($relObj->copy($deepCopy));
			}

			foreach($this->getArticulosXPedidos() as $relObj) {
				$copyObj->addArticulosXPedido($relObj->copy($deepCopy));
			}

			foreach($this->getEntradass() as $relObj) {
				$copyObj->addEntradas($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdPedido(NULL); 
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
			self::$peer = new PedidosPeer();
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

	
	public function setProveedores($v)
	{


		if ($v === null) {
			$this->setIdProveedor(NULL);
		} else {
			$this->setIdProveedor($v->getIdProveedor());
		}


		$this->aProveedores = $v;
	}


	
	public function getProveedores($con = null)
	{
		if ($this->aProveedores === null && ($this->id_proveedor !== null)) {
						include_once 'lib/model/om/BaseProveedoresPeer.php';

			$this->aProveedores = ProveedoresPeer::retrieveByPK($this->id_proveedor, $con);

			
		}
		return $this->aProveedores;
	}

	
	public function setEstadoPedidos($v)
	{


		if ($v === null) {
			$this->setIdEstadoPedido(NULL);
		} else {
			$this->setIdEstadoPedido($v->getIdEstadoPedido());
		}


		$this->aEstadoPedidos = $v;
	}


	
	public function getEstadoPedidos($con = null)
	{
		if ($this->aEstadoPedidos === null && ($this->id_estado_pedido !== null)) {
						include_once 'lib/model/om/BaseEstadoPedidosPeer.php';

			$this->aEstadoPedidos = EstadoPedidosPeer::retrieveByPK($this->id_estado_pedido, $con);

			
		}
		return $this->aEstadoPedidos;
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

				$criteria->add(AlbaranesEntradaPeer::ID_PEDIDO, $this->getIdPedido());

				AlbaranesEntradaPeer::addSelectColumns($criteria);
				$this->collAlbaranesEntradas = AlbaranesEntradaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlbaranesEntradaPeer::ID_PEDIDO, $this->getIdPedido());

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

		$criteria->add(AlbaranesEntradaPeer::ID_PEDIDO, $this->getIdPedido());

		return AlbaranesEntradaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlbaranesEntrada(AlbaranesEntrada $l)
	{
		$this->collAlbaranesEntradas[] = $l;
		$l->setPedidos($this);
	}


	
	public function getAlbaranesEntradasJoinEntradas($criteria = null, $con = null)
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

				$criteria->add(AlbaranesEntradaPeer::ID_PEDIDO, $this->getIdPedido());

				$this->collAlbaranesEntradas = AlbaranesEntradaPeer::doSelectJoinEntradas($criteria, $con);
			}
		} else {
									
			$criteria->add(AlbaranesEntradaPeer::ID_PEDIDO, $this->getIdPedido());

			if (!isset($this->lastAlbaranesEntradaCriteria) || !$this->lastAlbaranesEntradaCriteria->equals($criteria)) {
				$this->collAlbaranesEntradas = AlbaranesEntradaPeer::doSelectJoinEntradas($criteria, $con);
			}
		}
		$this->lastAlbaranesEntradaCriteria = $criteria;

		return $this->collAlbaranesEntradas;
	}

	
	public function initAlbaranesPedidos()
	{
		if ($this->collAlbaranesPedidos === null) {
			$this->collAlbaranesPedidos = array();
		}
	}

	
	public function getAlbaranesPedidos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesPedidoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlbaranesPedidos === null) {
			if ($this->isNew()) {
			   $this->collAlbaranesPedidos = array();
			} else {

				$criteria->add(AlbaranesPedidoPeer::ID_PEDIDO, $this->getIdPedido());

				AlbaranesPedidoPeer::addSelectColumns($criteria);
				$this->collAlbaranesPedidos = AlbaranesPedidoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlbaranesPedidoPeer::ID_PEDIDO, $this->getIdPedido());

				AlbaranesPedidoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlbaranesPedidoCriteria) || !$this->lastAlbaranesPedidoCriteria->equals($criteria)) {
					$this->collAlbaranesPedidos = AlbaranesPedidoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlbaranesPedidoCriteria = $criteria;
		return $this->collAlbaranesPedidos;
	}

	
	public function countAlbaranesPedidos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAlbaranesPedidoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlbaranesPedidoPeer::ID_PEDIDO, $this->getIdPedido());

		return AlbaranesPedidoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlbaranesPedido(AlbaranesPedido $l)
	{
		$this->collAlbaranesPedidos[] = $l;
		$l->setPedidos($this);
	}

	
	public function initArticulosXPedidos()
	{
		if ($this->collArticulosXPedidos === null) {
			$this->collArticulosXPedidos = array();
		}
	}

	
	public function getArticulosXPedidos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXPedidoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXPedidos === null) {
			if ($this->isNew()) {
			   $this->collArticulosXPedidos = array();
			} else {

				$criteria->add(ArticulosXPedidoPeer::ID_PEDIDO, $this->getIdPedido());

				ArticulosXPedidoPeer::addSelectColumns($criteria);
				$this->collArticulosXPedidos = ArticulosXPedidoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXPedidoPeer::ID_PEDIDO, $this->getIdPedido());

				ArticulosXPedidoPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticulosXPedidoCriteria) || !$this->lastArticulosXPedidoCriteria->equals($criteria)) {
					$this->collArticulosXPedidos = ArticulosXPedidoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticulosXPedidoCriteria = $criteria;
		return $this->collArticulosXPedidos;
	}

	
	public function countArticulosXPedidos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXPedidoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticulosXPedidoPeer::ID_PEDIDO, $this->getIdPedido());

		return ArticulosXPedidoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXPedido(ArticulosXPedido $l)
	{
		$this->collArticulosXPedidos[] = $l;
		$l->setPedidos($this);
	}


	
	public function getArticulosXPedidosJoinArticulos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXPedidoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXPedidos === null) {
			if ($this->isNew()) {
				$this->collArticulosXPedidos = array();
			} else {

				$criteria->add(ArticulosXPedidoPeer::ID_PEDIDO, $this->getIdPedido());

				$this->collArticulosXPedidos = ArticulosXPedidoPeer::doSelectJoinArticulos($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXPedidoPeer::ID_PEDIDO, $this->getIdPedido());

			if (!isset($this->lastArticulosXPedidoCriteria) || !$this->lastArticulosXPedidoCriteria->equals($criteria)) {
				$this->collArticulosXPedidos = ArticulosXPedidoPeer::doSelectJoinArticulos($criteria, $con);
			}
		}
		$this->lastArticulosXPedidoCriteria = $criteria;

		return $this->collArticulosXPedidos;
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

				$criteria->add(EntradasPeer::ID_PEDIDO, $this->getIdPedido());

				EntradasPeer::addSelectColumns($criteria);
				$this->collEntradass = EntradasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EntradasPeer::ID_PEDIDO, $this->getIdPedido());

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

		$criteria->add(EntradasPeer::ID_PEDIDO, $this->getIdPedido());

		return EntradasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEntradas(Entradas $l)
	{
		$this->collEntradass[] = $l;
		$l->setPedidos($this);
	}


	
	public function getEntradassJoinTransporteConductores($criteria = null, $con = null)
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

				$criteria->add(EntradasPeer::ID_PEDIDO, $this->getIdPedido());

				$this->collEntradass = EntradasPeer::doSelectJoinTransporteConductores($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasPeer::ID_PEDIDO, $this->getIdPedido());

			if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
				$this->collEntradass = EntradasPeer::doSelectJoinTransporteConductores($criteria, $con);
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

				$criteria->add(EntradasPeer::ID_PEDIDO, $this->getIdPedido());

				$this->collEntradass = EntradasPeer::doSelectJoinEstadoEntradas($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasPeer::ID_PEDIDO, $this->getIdPedido());

			if (!isset($this->lastEntradasCriteria) || !$this->lastEntradasCriteria->equals($criteria)) {
				$this->collEntradass = EntradasPeer::doSelectJoinEstadoEntradas($criteria, $con);
			}
		}
		$this->lastEntradasCriteria = $criteria;

		return $this->collEntradass;
	}

} 