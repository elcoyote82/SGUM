<?php


abstract class BaseProveedoresPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'proveedores';

	
	const CLASS_DEFAULT = 'lib.model.Proveedores';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_PROVEEDOR = 'proveedores.ID_PROVEEDOR';

	
	const ID_MD5_PROVEEDOR = 'proveedores.ID_MD5_PROVEEDOR';

	
	const NOMBRE = 'proveedores.NOMBRE';

	
	const CIF_NIF = 'proveedores.CIF_NIF';

	
	const DIRECCION = 'proveedores.DIRECCION';

	
	const POBLACION = 'proveedores.POBLACION';

	
	const PROVINCIA = 'proveedores.PROVINCIA';

	
	const CP = 'proveedores.CP';

	
	const PAIS = 'proveedores.PAIS';

	
	const TELEFONO = 'proveedores.TELEFONO';

	
	const TELEFONO2 = 'proveedores.TELEFONO2';

	
	const MOVIL = 'proveedores.MOVIL';

	
	const FAX = 'proveedores.FAX';

	
	const EMAIL = 'proveedores.EMAIL';

	
	const WEB = 'proveedores.WEB';

	
	const BORRADO = 'proveedores.BORRADO';

	
	const CREATED_AT = 'proveedores.CREATED_AT';

	
	const UPDATED_AT = 'proveedores.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdProveedor', 'IdMd5Proveedor', 'Nombre', 'CifNif', 'Direccion', 'Poblacion', 'Provincia', 'Cp', 'Pais', 'Telefono', 'Telefono2', 'Movil', 'Fax', 'Email', 'Web', 'Borrado', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ProveedoresPeer::ID_PROVEEDOR, ProveedoresPeer::ID_MD5_PROVEEDOR, ProveedoresPeer::NOMBRE, ProveedoresPeer::CIF_NIF, ProveedoresPeer::DIRECCION, ProveedoresPeer::POBLACION, ProveedoresPeer::PROVINCIA, ProveedoresPeer::CP, ProveedoresPeer::PAIS, ProveedoresPeer::TELEFONO, ProveedoresPeer::TELEFONO2, ProveedoresPeer::MOVIL, ProveedoresPeer::FAX, ProveedoresPeer::EMAIL, ProveedoresPeer::WEB, ProveedoresPeer::BORRADO, ProveedoresPeer::CREATED_AT, ProveedoresPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_proveedor', 'id_md5_proveedor', 'nombre', 'cif_nif', 'direccion', 'poblacion', 'provincia', 'cp', 'pais', 'telefono', 'telefono2', 'movil', 'fax', 'email', 'web', 'borrado', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdProveedor' => 0, 'IdMd5Proveedor' => 1, 'Nombre' => 2, 'CifNif' => 3, 'Direccion' => 4, 'Poblacion' => 5, 'Provincia' => 6, 'Cp' => 7, 'Pais' => 8, 'Telefono' => 9, 'Telefono2' => 10, 'Movil' => 11, 'Fax' => 12, 'Email' => 13, 'Web' => 14, 'Borrado' => 15, 'CreatedAt' => 16, 'UpdatedAt' => 17, ),
		BasePeer::TYPE_COLNAME => array (ProveedoresPeer::ID_PROVEEDOR => 0, ProveedoresPeer::ID_MD5_PROVEEDOR => 1, ProveedoresPeer::NOMBRE => 2, ProveedoresPeer::CIF_NIF => 3, ProveedoresPeer::DIRECCION => 4, ProveedoresPeer::POBLACION => 5, ProveedoresPeer::PROVINCIA => 6, ProveedoresPeer::CP => 7, ProveedoresPeer::PAIS => 8, ProveedoresPeer::TELEFONO => 9, ProveedoresPeer::TELEFONO2 => 10, ProveedoresPeer::MOVIL => 11, ProveedoresPeer::FAX => 12, ProveedoresPeer::EMAIL => 13, ProveedoresPeer::WEB => 14, ProveedoresPeer::BORRADO => 15, ProveedoresPeer::CREATED_AT => 16, ProveedoresPeer::UPDATED_AT => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id_proveedor' => 0, 'id_md5_proveedor' => 1, 'nombre' => 2, 'cif_nif' => 3, 'direccion' => 4, 'poblacion' => 5, 'provincia' => 6, 'cp' => 7, 'pais' => 8, 'telefono' => 9, 'telefono2' => 10, 'movil' => 11, 'fax' => 12, 'email' => 13, 'web' => 14, 'borrado' => 15, 'created_at' => 16, 'updated_at' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ProveedoresMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ProveedoresMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProveedoresPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ProveedoresPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProveedoresPeer::ID_PROVEEDOR);

		$criteria->addSelectColumn(ProveedoresPeer::ID_MD5_PROVEEDOR);

		$criteria->addSelectColumn(ProveedoresPeer::NOMBRE);

		$criteria->addSelectColumn(ProveedoresPeer::CIF_NIF);

		$criteria->addSelectColumn(ProveedoresPeer::DIRECCION);

		$criteria->addSelectColumn(ProveedoresPeer::POBLACION);

		$criteria->addSelectColumn(ProveedoresPeer::PROVINCIA);

		$criteria->addSelectColumn(ProveedoresPeer::CP);

		$criteria->addSelectColumn(ProveedoresPeer::PAIS);

		$criteria->addSelectColumn(ProveedoresPeer::TELEFONO);

		$criteria->addSelectColumn(ProveedoresPeer::TELEFONO2);

		$criteria->addSelectColumn(ProveedoresPeer::MOVIL);

		$criteria->addSelectColumn(ProveedoresPeer::FAX);

		$criteria->addSelectColumn(ProveedoresPeer::EMAIL);

		$criteria->addSelectColumn(ProveedoresPeer::WEB);

		$criteria->addSelectColumn(ProveedoresPeer::BORRADO);

		$criteria->addSelectColumn(ProveedoresPeer::CREATED_AT);

		$criteria->addSelectColumn(ProveedoresPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(proveedores.ID_PROVEEDOR)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT proveedores.ID_PROVEEDOR)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProveedoresPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProveedoresPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProveedoresPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ProveedoresPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProveedoresPeer::populateObjects(ProveedoresPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProveedoresPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProveedoresPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ProveedoresPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ProveedoresPeer::ID_PROVEEDOR); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ProveedoresPeer::ID_PROVEEDOR);
			$selectCriteria->add(ProveedoresPeer::ID_PROVEEDOR, $criteria->remove(ProveedoresPeer::ID_PROVEEDOR), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += ProveedoresPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(ProveedoresPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ProveedoresPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Proveedores) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProveedoresPeer::ID_PROVEEDOR, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += ProveedoresPeer::doOnDeleteCascade($criteria, $con);
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected static function doOnDeleteCascade(Criteria $criteria, Connection $con)
	{
				$affectedRows = 0;

				$objects = ProveedoresPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/ArticulosXProveedor.php';

						$c = new Criteria();
			
			$c->add(ArticulosXProveedorPeer::ID_PROVEEDOR, $obj->getIdProveedor());
			$affectedRows += ArticulosXProveedorPeer::doDelete($c, $con);

			include_once 'lib/model/Pedidos.php';

						$c = new Criteria();
			
			$c->add(PedidosPeer::ID_PROVEEDOR, $obj->getIdProveedor());
			$affectedRows += PedidosPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Proveedores $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProveedoresPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProveedoresPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ProveedoresPeer::DATABASE_NAME, ProveedoresPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProveedoresPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ProveedoresPeer::DATABASE_NAME);

		$criteria->add(ProveedoresPeer::ID_PROVEEDOR, $pk);


		$v = ProveedoresPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(ProveedoresPeer::ID_PROVEEDOR, $pks, Criteria::IN);
			$objs = ProveedoresPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseProveedoresPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ProveedoresMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ProveedoresMapBuilder');
}
