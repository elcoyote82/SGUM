<?php


abstract class BaseArticulos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_articulo;


	
	protected $id_md5_articulo;


	
	protected $id_familia;


	
	protected $nombre;


	
	protected $datos_producto;


	
	protected $descripcion;


	
	protected $stock;


	
	protected $stock_minimo;


	
	protected $aviso_minimo;


	
	protected $stock_bajo;


	
	protected $imagen;


	
	protected $borrado;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aFamilias;

	
	protected $collArticulosXLotes;

	
	protected $lastArticulosXLoteCriteria = null;

	
	protected $collArticulosXPedidos;

	
	protected $lastArticulosXPedidoCriteria = null;

	
	protected $collArticulosXProveedors;

	
	protected $lastArticulosXProveedorCriteria = null;

	
	protected $collArticulosXSalidas;

	
	protected $lastArticulosXSalidaCriteria = null;

	
	protected $collArticulosXVentas;

	
	protected $lastArticulosXVentaCriteria = null;

	
	protected $collEntradasXArticulos;

	
	protected $lastEntradasXArticuloCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
	}

	
	public function getIdMd5Articulo()
	{

		return $this->id_md5_articulo;
	}

	
	public function getIdFamilia()
	{

		return $this->id_familia;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getDatosProducto()
	{

		return $this->datos_producto;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
	}

	
	public function getStock()
	{

		return $this->stock;
	}

	
	public function getStockMinimo()
	{

		return $this->stock_minimo;
	}

	
	public function getAvisoMinimo()
	{

		return $this->aviso_minimo;
	}

	
	public function getStockBajo()
	{

		return $this->stock_bajo;
	}

	
	public function getImagen()
	{

		return $this->imagen;
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

	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = ArticulosPeer::ID_ARTICULO;
		}

	} 
	
	public function setIdMd5Articulo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_md5_articulo !== $v) {
			$this->id_md5_articulo = $v;
			$this->modifiedColumns[] = ArticulosPeer::ID_MD5_ARTICULO;
		}

	} 
	
	public function setIdFamilia($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_familia !== $v) {
			$this->id_familia = $v;
			$this->modifiedColumns[] = ArticulosPeer::ID_FAMILIA;
		}

		if ($this->aFamilias !== null && $this->aFamilias->getIdFamilia() !== $v) {
			$this->aFamilias = null;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ArticulosPeer::NOMBRE;
		}

	} 
	
	public function setDatosProducto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->datos_producto !== $v) {
			$this->datos_producto = $v;
			$this->modifiedColumns[] = ArticulosPeer::DATOS_PRODUCTO;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = ArticulosPeer::DESCRIPCION;
		}

	} 
	
	public function setStock($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->stock !== $v) {
			$this->stock = $v;
			$this->modifiedColumns[] = ArticulosPeer::STOCK;
		}

	} 
	
	public function setStockMinimo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->stock_minimo !== $v) {
			$this->stock_minimo = $v;
			$this->modifiedColumns[] = ArticulosPeer::STOCK_MINIMO;
		}

	} 
	
	public function setAvisoMinimo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->aviso_minimo !== $v) {
			$this->aviso_minimo = $v;
			$this->modifiedColumns[] = ArticulosPeer::AVISO_MINIMO;
		}

	} 
	
	public function setStockBajo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->stock_bajo !== $v) {
			$this->stock_bajo = $v;
			$this->modifiedColumns[] = ArticulosPeer::STOCK_BAJO;
		}

	} 
	
	public function setImagen($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->imagen !== $v) {
			$this->imagen = $v;
			$this->modifiedColumns[] = ArticulosPeer::IMAGEN;
		}

	} 
	
	public function setBorrado($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->borrado !== $v) {
			$this->borrado = $v;
			$this->modifiedColumns[] = ArticulosPeer::BORRADO;
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
			$this->modifiedColumns[] = ArticulosPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ArticulosPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_articulo = $rs->getInt($startcol + 0);

			$this->id_md5_articulo = $rs->getString($startcol + 1);

			$this->id_familia = $rs->getInt($startcol + 2);

			$this->nombre = $rs->getString($startcol + 3);

			$this->datos_producto = $rs->getString($startcol + 4);

			$this->descripcion = $rs->getString($startcol + 5);

			$this->stock = $rs->getInt($startcol + 6);

			$this->stock_minimo = $rs->getInt($startcol + 7);

			$this->aviso_minimo = $rs->getString($startcol + 8);

			$this->stock_bajo = $rs->getString($startcol + 9);

			$this->imagen = $rs->getString($startcol + 10);

			$this->borrado = $rs->getString($startcol + 11);

			$this->created_at = $rs->getTimestamp($startcol + 12, null);

			$this->updated_at = $rs->getTimestamp($startcol + 13, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Articulos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticulosPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ArticulosPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticulosPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosPeer::DATABASE_NAME);
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


												
			if ($this->aFamilias !== null) {
				if ($this->aFamilias->isModified()) {
					$affectedRows += $this->aFamilias->save($con);
				}
				$this->setFamilias($this->aFamilias);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticulosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdArticulo($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticulosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticulosXLotes !== null) {
				foreach($this->collArticulosXLotes as $referrerFK) {
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

			if ($this->collArticulosXProveedors !== null) {
				foreach($this->collArticulosXProveedors as $referrerFK) {
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

			if ($this->collArticulosXVentas !== null) {
				foreach($this->collArticulosXVentas as $referrerFK) {
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


												
			if ($this->aFamilias !== null) {
				if (!$this->aFamilias->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFamilias->getValidationFailures());
				}
			}


			if (($retval = ArticulosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticulosXLotes !== null) {
					foreach($this->collArticulosXLotes as $referrerFK) {
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

				if ($this->collArticulosXProveedors !== null) {
					foreach($this->collArticulosXProveedors as $referrerFK) {
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

				if ($this->collArticulosXVentas !== null) {
					foreach($this->collArticulosXVentas as $referrerFK) {
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
		$pos = ArticulosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdArticulo();
				break;
			case 1:
				return $this->getIdMd5Articulo();
				break;
			case 2:
				return $this->getIdFamilia();
				break;
			case 3:
				return $this->getNombre();
				break;
			case 4:
				return $this->getDatosProducto();
				break;
			case 5:
				return $this->getDescripcion();
				break;
			case 6:
				return $this->getStock();
				break;
			case 7:
				return $this->getStockMinimo();
				break;
			case 8:
				return $this->getAvisoMinimo();
				break;
			case 9:
				return $this->getStockBajo();
				break;
			case 10:
				return $this->getImagen();
				break;
			case 11:
				return $this->getBorrado();
				break;
			case 12:
				return $this->getCreatedAt();
				break;
			case 13:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticulosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdArticulo(),
			$keys[1] => $this->getIdMd5Articulo(),
			$keys[2] => $this->getIdFamilia(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getDatosProducto(),
			$keys[5] => $this->getDescripcion(),
			$keys[6] => $this->getStock(),
			$keys[7] => $this->getStockMinimo(),
			$keys[8] => $this->getAvisoMinimo(),
			$keys[9] => $this->getStockBajo(),
			$keys[10] => $this->getImagen(),
			$keys[11] => $this->getBorrado(),
			$keys[12] => $this->getCreatedAt(),
			$keys[13] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdArticulo($value);
				break;
			case 1:
				$this->setIdMd5Articulo($value);
				break;
			case 2:
				$this->setIdFamilia($value);
				break;
			case 3:
				$this->setNombre($value);
				break;
			case 4:
				$this->setDatosProducto($value);
				break;
			case 5:
				$this->setDescripcion($value);
				break;
			case 6:
				$this->setStock($value);
				break;
			case 7:
				$this->setStockMinimo($value);
				break;
			case 8:
				$this->setAvisoMinimo($value);
				break;
			case 9:
				$this->setStockBajo($value);
				break;
			case 10:
				$this->setImagen($value);
				break;
			case 11:
				$this->setBorrado($value);
				break;
			case 12:
				$this->setCreatedAt($value);
				break;
			case 13:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticulosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdArticulo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdMd5Articulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdFamilia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDatosProducto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescripcion($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStock($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStockMinimo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAvisoMinimo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStockBajo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setImagen($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBorrado($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedAt($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticulosPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticulosPeer::ID_ARTICULO)) $criteria->add(ArticulosPeer::ID_ARTICULO, $this->id_articulo);
		if ($this->isColumnModified(ArticulosPeer::ID_MD5_ARTICULO)) $criteria->add(ArticulosPeer::ID_MD5_ARTICULO, $this->id_md5_articulo);
		if ($this->isColumnModified(ArticulosPeer::ID_FAMILIA)) $criteria->add(ArticulosPeer::ID_FAMILIA, $this->id_familia);
		if ($this->isColumnModified(ArticulosPeer::NOMBRE)) $criteria->add(ArticulosPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ArticulosPeer::DATOS_PRODUCTO)) $criteria->add(ArticulosPeer::DATOS_PRODUCTO, $this->datos_producto);
		if ($this->isColumnModified(ArticulosPeer::DESCRIPCION)) $criteria->add(ArticulosPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(ArticulosPeer::STOCK)) $criteria->add(ArticulosPeer::STOCK, $this->stock);
		if ($this->isColumnModified(ArticulosPeer::STOCK_MINIMO)) $criteria->add(ArticulosPeer::STOCK_MINIMO, $this->stock_minimo);
		if ($this->isColumnModified(ArticulosPeer::AVISO_MINIMO)) $criteria->add(ArticulosPeer::AVISO_MINIMO, $this->aviso_minimo);
		if ($this->isColumnModified(ArticulosPeer::STOCK_BAJO)) $criteria->add(ArticulosPeer::STOCK_BAJO, $this->stock_bajo);
		if ($this->isColumnModified(ArticulosPeer::IMAGEN)) $criteria->add(ArticulosPeer::IMAGEN, $this->imagen);
		if ($this->isColumnModified(ArticulosPeer::BORRADO)) $criteria->add(ArticulosPeer::BORRADO, $this->borrado);
		if ($this->isColumnModified(ArticulosPeer::CREATED_AT)) $criteria->add(ArticulosPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticulosPeer::UPDATED_AT)) $criteria->add(ArticulosPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticulosPeer::DATABASE_NAME);

		$criteria->add(ArticulosPeer::ID_ARTICULO, $this->id_articulo);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdArticulo();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdArticulo($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdMd5Articulo($this->id_md5_articulo);

		$copyObj->setIdFamilia($this->id_familia);

		$copyObj->setNombre($this->nombre);

		$copyObj->setDatosProducto($this->datos_producto);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setStock($this->stock);

		$copyObj->setStockMinimo($this->stock_minimo);

		$copyObj->setAvisoMinimo($this->aviso_minimo);

		$copyObj->setStockBajo($this->stock_bajo);

		$copyObj->setImagen($this->imagen);

		$copyObj->setBorrado($this->borrado);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticulosXLotes() as $relObj) {
				$copyObj->addArticulosXLote($relObj->copy($deepCopy));
			}

			foreach($this->getArticulosXPedidos() as $relObj) {
				$copyObj->addArticulosXPedido($relObj->copy($deepCopy));
			}

			foreach($this->getArticulosXProveedors() as $relObj) {
				$copyObj->addArticulosXProveedor($relObj->copy($deepCopy));
			}

			foreach($this->getArticulosXSalidas() as $relObj) {
				$copyObj->addArticulosXSalida($relObj->copy($deepCopy));
			}

			foreach($this->getArticulosXVentas() as $relObj) {
				$copyObj->addArticulosXVenta($relObj->copy($deepCopy));
			}

			foreach($this->getEntradasXArticulos() as $relObj) {
				$copyObj->addEntradasXArticulo($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setIdArticulo(NULL); 
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
			self::$peer = new ArticulosPeer();
		}
		return self::$peer;
	}

	
	public function setFamilias($v)
	{


		if ($v === null) {
			$this->setIdFamilia(NULL);
		} else {
			$this->setIdFamilia($v->getIdFamilia());
		}


		$this->aFamilias = $v;
	}


	
	public function getFamilias($con = null)
	{
		if ($this->aFamilias === null && ($this->id_familia !== null)) {
						include_once 'lib/model/om/BaseFamiliasPeer.php';

			$this->aFamilias = FamiliasPeer::retrieveByPK($this->id_familia, $con);

			
		}
		return $this->aFamilias;
	}

	
	public function initArticulosXLotes()
	{
		if ($this->collArticulosXLotes === null) {
			$this->collArticulosXLotes = array();
		}
	}

	
	public function getArticulosXLotes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXLotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXLotes === null) {
			if ($this->isNew()) {
			   $this->collArticulosXLotes = array();
			} else {

				$criteria->add(ArticulosXLotePeer::ID_ARTICULO, $this->getIdArticulo());

				ArticulosXLotePeer::addSelectColumns($criteria);
				$this->collArticulosXLotes = ArticulosXLotePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXLotePeer::ID_ARTICULO, $this->getIdArticulo());

				ArticulosXLotePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticulosXLoteCriteria) || !$this->lastArticulosXLoteCriteria->equals($criteria)) {
					$this->collArticulosXLotes = ArticulosXLotePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticulosXLoteCriteria = $criteria;
		return $this->collArticulosXLotes;
	}

	
	public function countArticulosXLotes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXLotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticulosXLotePeer::ID_ARTICULO, $this->getIdArticulo());

		return ArticulosXLotePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXLote(ArticulosXLote $l)
	{
		$this->collArticulosXLotes[] = $l;
		$l->setArticulos($this);
	}


	
	public function getArticulosXLotesJoinUbicaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticulosXLotePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticulosXLotes === null) {
			if ($this->isNew()) {
				$this->collArticulosXLotes = array();
			} else {

				$criteria->add(ArticulosXLotePeer::ID_ARTICULO, $this->getIdArticulo());

				$this->collArticulosXLotes = ArticulosXLotePeer::doSelectJoinUbicaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXLotePeer::ID_ARTICULO, $this->getIdArticulo());

			if (!isset($this->lastArticulosXLoteCriteria) || !$this->lastArticulosXLoteCriteria->equals($criteria)) {
				$this->collArticulosXLotes = ArticulosXLotePeer::doSelectJoinUbicaciones($criteria, $con);
			}
		}
		$this->lastArticulosXLoteCriteria = $criteria;

		return $this->collArticulosXLotes;
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

				$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO, $this->getIdArticulo());

				ArticulosXPedidoPeer::addSelectColumns($criteria);
				$this->collArticulosXPedidos = ArticulosXPedidoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO, $this->getIdArticulo());

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

		$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO, $this->getIdArticulo());

		return ArticulosXPedidoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXPedido(ArticulosXPedido $l)
	{
		$this->collArticulosXPedidos[] = $l;
		$l->setArticulos($this);
	}


	
	public function getArticulosXPedidosJoinPedidos($criteria = null, $con = null)
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

				$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO, $this->getIdArticulo());

				$this->collArticulosXPedidos = ArticulosXPedidoPeer::doSelectJoinPedidos($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO, $this->getIdArticulo());

			if (!isset($this->lastArticulosXPedidoCriteria) || !$this->lastArticulosXPedidoCriteria->equals($criteria)) {
				$this->collArticulosXPedidos = ArticulosXPedidoPeer::doSelectJoinPedidos($criteria, $con);
			}
		}
		$this->lastArticulosXPedidoCriteria = $criteria;

		return $this->collArticulosXPedidos;
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

				$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO, $this->getIdArticulo());

				ArticulosXProveedorPeer::addSelectColumns($criteria);
				$this->collArticulosXProveedors = ArticulosXProveedorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO, $this->getIdArticulo());

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

		$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO, $this->getIdArticulo());

		return ArticulosXProveedorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXProveedor(ArticulosXProveedor $l)
	{
		$this->collArticulosXProveedors[] = $l;
		$l->setArticulos($this);
	}


	
	public function getArticulosXProveedorsJoinProveedores($criteria = null, $con = null)
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

				$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO, $this->getIdArticulo());

				$this->collArticulosXProveedors = ArticulosXProveedorPeer::doSelectJoinProveedores($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO, $this->getIdArticulo());

			if (!isset($this->lastArticulosXProveedorCriteria) || !$this->lastArticulosXProveedorCriteria->equals($criteria)) {
				$this->collArticulosXProveedors = ArticulosXProveedorPeer::doSelectJoinProveedores($criteria, $con);
			}
		}
		$this->lastArticulosXProveedorCriteria = $criteria;

		return $this->collArticulosXProveedors;
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

				$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO, $this->getIdArticulo());

				ArticulosXSalidaPeer::addSelectColumns($criteria);
				$this->collArticulosXSalidas = ArticulosXSalidaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO, $this->getIdArticulo());

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

		$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO, $this->getIdArticulo());

		return ArticulosXSalidaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXSalida(ArticulosXSalida $l)
	{
		$this->collArticulosXSalidas[] = $l;
		$l->setArticulos($this);
	}


	
	public function getArticulosXSalidasJoinSalidas($criteria = null, $con = null)
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

				$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO, $this->getIdArticulo());

				$this->collArticulosXSalidas = ArticulosXSalidaPeer::doSelectJoinSalidas($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO, $this->getIdArticulo());

			if (!isset($this->lastArticulosXSalidaCriteria) || !$this->lastArticulosXSalidaCriteria->equals($criteria)) {
				$this->collArticulosXSalidas = ArticulosXSalidaPeer::doSelectJoinSalidas($criteria, $con);
			}
		}
		$this->lastArticulosXSalidaCriteria = $criteria;

		return $this->collArticulosXSalidas;
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

				$criteria->add(ArticulosXVentaPeer::ID_ARTICULO, $this->getIdArticulo());

				ArticulosXVentaPeer::addSelectColumns($criteria);
				$this->collArticulosXVentas = ArticulosXVentaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticulosXVentaPeer::ID_ARTICULO, $this->getIdArticulo());

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

		$criteria->add(ArticulosXVentaPeer::ID_ARTICULO, $this->getIdArticulo());

		return ArticulosXVentaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticulosXVenta(ArticulosXVenta $l)
	{
		$this->collArticulosXVentas[] = $l;
		$l->setArticulos($this);
	}


	
	public function getArticulosXVentasJoinVentas($criteria = null, $con = null)
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

				$criteria->add(ArticulosXVentaPeer::ID_ARTICULO, $this->getIdArticulo());

				$this->collArticulosXVentas = ArticulosXVentaPeer::doSelectJoinVentas($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticulosXVentaPeer::ID_ARTICULO, $this->getIdArticulo());

			if (!isset($this->lastArticulosXVentaCriteria) || !$this->lastArticulosXVentaCriteria->equals($criteria)) {
				$this->collArticulosXVentas = ArticulosXVentaPeer::doSelectJoinVentas($criteria, $con);
			}
		}
		$this->lastArticulosXVentaCriteria = $criteria;

		return $this->collArticulosXVentas;
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

				$criteria->add(EntradasXArticuloPeer::ID_ARTICULO, $this->getIdArticulo());

				EntradasXArticuloPeer::addSelectColumns($criteria);
				$this->collEntradasXArticulos = EntradasXArticuloPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EntradasXArticuloPeer::ID_ARTICULO, $this->getIdArticulo());

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

		$criteria->add(EntradasXArticuloPeer::ID_ARTICULO, $this->getIdArticulo());

		return EntradasXArticuloPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEntradasXArticulo(EntradasXArticulo $l)
	{
		$this->collEntradasXArticulos[] = $l;
		$l->setArticulos($this);
	}


	
	public function getEntradasXArticulosJoinEntradas($criteria = null, $con = null)
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

				$criteria->add(EntradasXArticuloPeer::ID_ARTICULO, $this->getIdArticulo());

				$this->collEntradasXArticulos = EntradasXArticuloPeer::doSelectJoinEntradas($criteria, $con);
			}
		} else {
									
			$criteria->add(EntradasXArticuloPeer::ID_ARTICULO, $this->getIdArticulo());

			if (!isset($this->lastEntradasXArticuloCriteria) || !$this->lastEntradasXArticuloCriteria->equals($criteria)) {
				$this->collEntradasXArticulos = EntradasXArticuloPeer::doSelectJoinEntradas($criteria, $con);
			}
		}
		$this->lastEntradasXArticuloCriteria = $criteria;

		return $this->collEntradasXArticulos;
	}

} 