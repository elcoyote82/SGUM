<?php


abstract class BaseAlbaranesVentaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'albaranes_venta';

	
	const CLASS_DEFAULT = 'lib.model.AlbaranesVenta';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ALBARAN_VENTA = 'albaranes_venta.ID_ALBARAN_VENTA';

	
	const ID_MD5_ALBARAN = 'albaranes_venta.ID_MD5_ALBARAN';

	
	const ID_VENTA = 'albaranes_venta.ID_VENTA';

	
	const NUM_ALBARAN_VENTA = 'albaranes_venta.NUM_ALBARAN_VENTA';

	
	const RUTA_ALBARAN = 'albaranes_venta.RUTA_ALBARAN';

	
	const CREATED_AT = 'albaranes_venta.CREATED_AT';

	
	const UPDATED_AT = 'albaranes_venta.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranVenta', 'IdMd5Albaran', 'IdVenta', 'NumAlbaranVenta', 'RutaAlbaran', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (AlbaranesVentaPeer::ID_ALBARAN_VENTA, AlbaranesVentaPeer::ID_MD5_ALBARAN, AlbaranesVentaPeer::ID_VENTA, AlbaranesVentaPeer::NUM_ALBARAN_VENTA, AlbaranesVentaPeer::RUTA_ALBARAN, AlbaranesVentaPeer::CREATED_AT, AlbaranesVentaPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_venta', 'id_md5_albaran', 'id_venta', 'num_albaran_venta', 'ruta_albaran', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranVenta' => 0, 'IdMd5Albaran' => 1, 'IdVenta' => 2, 'NumAlbaranVenta' => 3, 'RutaAlbaran' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (AlbaranesVentaPeer::ID_ALBARAN_VENTA => 0, AlbaranesVentaPeer::ID_MD5_ALBARAN => 1, AlbaranesVentaPeer::ID_VENTA => 2, AlbaranesVentaPeer::NUM_ALBARAN_VENTA => 3, AlbaranesVentaPeer::RUTA_ALBARAN => 4, AlbaranesVentaPeer::CREATED_AT => 5, AlbaranesVentaPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_venta' => 0, 'id_md5_albaran' => 1, 'id_venta' => 2, 'num_albaran_venta' => 3, 'ruta_albaran' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AlbaranesVentaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AlbaranesVentaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AlbaranesVentaPeer::getTableMap();
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
		return str_replace(AlbaranesVentaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlbaranesVentaPeer::ID_ALBARAN_VENTA);

		$criteria->addSelectColumn(AlbaranesVentaPeer::ID_MD5_ALBARAN);

		$criteria->addSelectColumn(AlbaranesVentaPeer::ID_VENTA);

		$criteria->addSelectColumn(AlbaranesVentaPeer::NUM_ALBARAN_VENTA);

		$criteria->addSelectColumn(AlbaranesVentaPeer::RUTA_ALBARAN);

		$criteria->addSelectColumn(AlbaranesVentaPeer::CREATED_AT);

		$criteria->addSelectColumn(AlbaranesVentaPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(albaranes_venta.ID_ALBARAN_VENTA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT albaranes_venta.ID_ALBARAN_VENTA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AlbaranesVentaPeer::doSelectRS($criteria, $con);
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
		$objects = AlbaranesVentaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AlbaranesVentaPeer::populateObjects(AlbaranesVentaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AlbaranesVentaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AlbaranesVentaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinVentas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = AlbaranesVentaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinVentas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlbaranesVentaPeer::addSelectColumns($c);
		$startcol = (AlbaranesVentaPeer::NUM_COLUMNS - AlbaranesVentaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VentasPeer::addSelectColumns($c);

		$c->addJoin(AlbaranesVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesVentaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VentasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlbaranesVenta($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlbaranesVentas();
				$obj2->addAlbaranesVenta($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = AlbaranesVentaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlbaranesVentaPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesVentaPeer::NUM_COLUMNS - AlbaranesVentaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VentasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VentasPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesVentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = VentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlbaranesVenta($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesVentas();
				$obj2->addAlbaranesVenta($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return AlbaranesVentaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AlbaranesVentaPeer::ID_ALBARAN_VENTA); 

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
			$comparison = $criteria->getComparison(AlbaranesVentaPeer::ID_ALBARAN_VENTA);
			$selectCriteria->add(AlbaranesVentaPeer::ID_ALBARAN_VENTA, $criteria->remove(AlbaranesVentaPeer::ID_ALBARAN_VENTA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AlbaranesVentaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AlbaranesVentaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AlbaranesVenta) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlbaranesVentaPeer::ID_ALBARAN_VENTA, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(AlbaranesVenta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlbaranesVentaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlbaranesVentaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AlbaranesVentaPeer::DATABASE_NAME, AlbaranesVentaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlbaranesVentaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AlbaranesVentaPeer::DATABASE_NAME);

		$criteria->add(AlbaranesVentaPeer::ID_ALBARAN_VENTA, $pk);


		$v = AlbaranesVentaPeer::doSelect($criteria, $con);

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
			$criteria->add(AlbaranesVentaPeer::ID_ALBARAN_VENTA, $pks, Criteria::IN);
			$objs = AlbaranesVentaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAlbaranesVentaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AlbaranesVentaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AlbaranesVentaMapBuilder');
}
