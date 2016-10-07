<?php


abstract class BaseAlbaranesEntrada extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_albaran_entrada;


	
	protected $id_md5_albaran;


	
	protected $id_entrada;


	
	protected $id_pedido;


	
	protected $num_albaran_entrada;


	
	protected $ruta_albaran;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aEntradas;

	
	protected $aPedidos;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdAlbaranEntrada()
	{

		return $this->id_albaran_entrada;
	}

	
	public function getIdMd5Albaran()
	{

		return $this->id_md5_albaran;
	}

	
	public function getIdEntrada()
	{

		return $this->id_entrada;
	}

	
	public function getIdPedido()
	{

		return $this->id_pedido;
	}

	
	public function getNumAlbaranEntrada()
	{

		return $this->num_albaran_entrada;
	}

	
	public function getRutaAlbaran()
	{

		return $this->ruta_albaran;
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

	
	public function setIdAlbaranEntrada($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_albaran_entrada !== $v) {
			$this->id_albaran_entrada = $v;
			$this->modifiedColumns[] = AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA;
		}

	} 
	
	public function setIdMd5Albaran($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_albaran !== $v) {
			$this->id_md5_albaran = $v;
			$this->modifiedColumns[] = AlbaranesEntradaPeer::ID_MD5_ALBARAN;
		}

	} 
	
	public function setIdEntrada($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_entrada !== $v) {
			$this->id_entrada = $v;
			$this->modifiedColumns[] = AlbaranesEntradaPeer::ID_ENTRADA;
		}

		if ($this->aEntradas !== null && $this->aEntradas->getIdEntrada() !== $v) {
			$this->aEntradas = null;
		}

	} 
	
	public function setIdPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pedido !== $v) {
			$this->id_pedido = $v;
			$this->modifiedColumns[] = AlbaranesEntradaPeer::ID_PEDIDO;
		}

		if ($this->aPedidos !== null && $this->aPedidos->getIdPedido() !== $v) {
			$this->aPedidos = null;
		}

	} 
	
	public function setNumAlbaranEntrada($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->num_albaran_entrada !== $v) {
			$this->num_albaran_entrada = $v;
			$this->modifiedColumns[] = AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA;
		}

	} 
	
	public function setRutaAlbaran($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ruta_albaran !== $v) {
			$this->ruta_albaran = $v;
			$this->modifiedColumns[] = AlbaranesEntradaPeer::RUTA_ALBARAN;
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
			$this->modifiedColumns[] = AlbaranesEntradaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = AlbaranesEntradaPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_albaran_entrada = $rs->getInt($startcol + 0);

			$this->id_md5_albaran = $rs->getString($startcol + 1);

			$this->id_entrada = $rs->getInt($startcol + 2);

			$this->id_pedido = $rs->getInt($startcol + 3);

			$this->num_albaran_entrada = $rs->getString($startcol + 4);

			$this->ruta_albaran = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AlbaranesEntrada object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlbaranesEntradaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AlbaranesEntradaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AlbaranesEntradaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AlbaranesEntradaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlbaranesEntradaPeer::DATABASE_NAME);
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


												
			if ($this->aEntradas !== null) {
				if ($this->aEntradas->isModified()) {
					$affectedRows += $this->aEntradas->save($con);
				}
				$this->setEntradas($this->aEntradas);
			}

			if ($this->aPedidos !== null) {
				if ($this->aPedidos->isModified()) {
					$affectedRows += $this->aPedidos->save($con);
				}
				$this->setPedidos($this->aPedidos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlbaranesEntradaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdAlbaranEntrada($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AlbaranesEntradaPeer::doUpdate($this, $con);
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


												
			if ($this->aEntradas !== null) {
				if (!$this->aEntradas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEntradas->getValidationFailures());
				}
			}

			if ($this->aPedidos !== null) {
				if (!$this->aPedidos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPedidos->getValidationFailures());
				}
			}


			if (($retval = AlbaranesEntradaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlbaranesEntradaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdAlbaranEntrada();
				break;
			case 1:
				return $this->getIdMd5Albaran();
				break;
			case 2:
				return $this->getIdEntrada();
				break;
			case 3:
				return $this->getIdPedido();
				break;
			case 4:
				return $this->getNumAlbaranEntrada();
				break;
			case 5:
				return $this->getRutaAlbaran();
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
		$keys = AlbaranesEntradaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdAlbaranEntrada(),
			$keys[1] => $this->getIdMd5Albaran(),
			$keys[2] => $this->getIdEntrada(),
			$keys[3] => $this->getIdPedido(),
			$keys[4] => $this->getNumAlbaranEntrada(),
			$keys[5] => $this->getRutaAlbaran(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlbaranesEntradaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdAlbaranEntrada($value);
				break;
			case 1:
				$this->setIdMd5Albaran($value);
				break;
			case 2:
				$this->setIdEntrada($value);
				break;
			case 3:
				$this->setIdPedido($value);
				break;
			case 4:
				$this->setNumAlbaranEntrada($value);
				break;
			case 5:
				$this->setRutaAlbaran($value);
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
		$keys = AlbaranesEntradaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdAlbaranEntrada($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Albaran($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdEntrada($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdPedido($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumAlbaranEntrada($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRutaAlbaran($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlbaranesEntradaPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA)) $criteria->add(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA, $this->id_albaran_entrada);
		if ($this->isColumnModified(AlbaranesEntradaPeer::ID_MD5_ALBARAN)) $criteria->add(AlbaranesEntradaPeer::ID_MD5_ALBARAN, $this->id_md5_albaran);
		if ($this->isColumnModified(AlbaranesEntradaPeer::ID_ENTRADA)) $criteria->add(AlbaranesEntradaPeer::ID_ENTRADA, $this->id_entrada);
		if ($this->isColumnModified(AlbaranesEntradaPeer::ID_PEDIDO)) $criteria->add(AlbaranesEntradaPeer::ID_PEDIDO, $this->id_pedido);
		if ($this->isColumnModified(AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA)) $criteria->add(AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA, $this->num_albaran_entrada);
		if ($this->isColumnModified(AlbaranesEntradaPeer::RUTA_ALBARAN)) $criteria->add(AlbaranesEntradaPeer::RUTA_ALBARAN, $this->ruta_albaran);
		if ($this->isColumnModified(AlbaranesEntradaPeer::CREATED_AT)) $criteria->add(AlbaranesEntradaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AlbaranesEntradaPeer::UPDATED_AT)) $criteria->add(AlbaranesEntradaPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlbaranesEntradaPeer::DATABASE_NAME);

		$criteria->add(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA, $this->id_albaran_entrada);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdAlbaranEntrada();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdAlbaranEntrada($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Albaran($this->id_md5_albaran);

		$copyObj->setIdEntrada($this->id_entrada);

		$copyObj->setIdPedido($this->id_pedido);

		$copyObj->setNumAlbaranEntrada($this->num_albaran_entrada);

		$copyObj->setRutaAlbaran($this->ruta_albaran);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdAlbaranEntrada(NULL); 
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
			self::$peer = new AlbaranesEntradaPeer();
		}
		return self::$peer;
	}

	
	public function setEntradas($v)
	{


		if ($v === null) {
			$this->setIdEntrada(NULL);
		} else {
			$this->setIdEntrada($v->getIdEntrada());
		}


		$this->aEntradas = $v;
	}


	
	public function getEntradas($con = null)
	{
		if ($this->aEntradas === null && ($this->id_entrada !== null)) {
						include_once 'lib/model/om/BaseEntradasPeer.php';

			$this->aEntradas = EntradasPeer::retrieveByPK($this->id_entrada, $con);

			
		}
		return $this->aEntradas;
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

} 