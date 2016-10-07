<?php


abstract class BaseArticulosXVentaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'articulos_x_venta';

	
	const CLASS_DEFAULT = 'lib.model.ArticulosXVenta';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ARTICULO_X_VENTA = 'articulos_x_venta.ID_ARTICULO_X_VENTA';

	
	const ID_ARTICULO = 'articulos_x_venta.ID_ARTICULO';

	
	const ID_VENTA = 'articulos_x_venta.ID_VENTA';

	
	const CANTIDAD = 'articulos_x_venta.CANTIDAD';

	
	const CREATED_AT = 'articulos_x_venta.CREATED_AT';

	
	const UPDATED_AT = 'articulos_x_venta.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXVenta', 'IdArticulo', 'IdVenta', 'Cantidad', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ArticulosXVentaPeer::ID_ARTICULO_X_VENTA, ArticulosXVentaPeer::ID_ARTICULO, ArticulosXVentaPeer::ID_VENTA, ArticulosXVentaPeer::CANTIDAD, ArticulosXVentaPeer::CREATED_AT, ArticulosXVentaPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_venta', 'id_articulo', 'id_venta', 'cantidad', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXVenta' => 0, 'IdArticulo' => 1, 'IdVenta' => 2, 'Cantidad' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, ),
		BasePeer::TYPE_COLNAME => array (ArticulosXVentaPeer::ID_ARTICULO_X_VENTA => 0, ArticulosXVentaPeer::ID_ARTICULO => 1, ArticulosXVentaPeer::ID_VENTA => 2, ArticulosXVentaPeer::CANTIDAD => 3, ArticulosXVentaPeer::CREATED_AT => 4, ArticulosXVentaPeer::UPDATED_AT => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_venta' => 0, 'id_articulo' => 1, 'id_venta' => 2, 'cantidad' => 3, 'created_at' => 4, 'updated_at' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticulosXVentaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticulosXVentaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticulosXVentaPeer::getTableMap();
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
		return str_replace(ArticulosXVentaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA);

		$criteria->addSelectColumn(ArticulosXVentaPeer::ID_ARTICULO);

		$criteria->addSelectColumn(ArticulosXVentaPeer::ID_VENTA);

		$criteria->addSelectColumn(ArticulosXVentaPeer::CANTIDAD);

		$criteria->addSelectColumn(ArticulosXVentaPeer::CREATED_AT);

		$criteria->addSelectColumn(ArticulosXVentaPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(articulos_x_venta.ID_ARTICULO_X_VENTA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT articulos_x_venta.ID_ARTICULO_X_VENTA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticulosXVentaPeer::doSelectRS($criteria, $con);
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
		$objects = ArticulosXVentaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticulosXVentaPeer::populateObjects(ArticulosXVentaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticulosXVentaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticulosXVentaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinArticulos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXVentaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXVentaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinVentas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = ArticulosXVentaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinArticulos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXVentaPeer::addSelectColumns($c);
		$startcol = (ArticulosXVentaPeer::NUM_COLUMNS - ArticulosXVentaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticulosPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXVentaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXVentaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ArticulosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getArticulos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticulosXVenta($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXVentas();
				$obj2->addArticulosXVenta($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinVentas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXVentaPeer::addSelectColumns($c);
		$startcol = (ArticulosXVentaPeer::NUM_COLUMNS - ArticulosXVentaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VentasPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXVentaPeer::getOMClass();

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
										$temp_obj2->addArticulosXVenta($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXVentas();
				$obj2->addArticulosXVenta($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXVentaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$criteria->addJoin(ArticulosXVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = ArticulosXVentaPeer::doSelectRS($criteria, $con);
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

		ArticulosXVentaPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXVentaPeer::NUM_COLUMNS - ArticulosXVentaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		VentasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VentasPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXVentaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$c->addJoin(ArticulosXVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXVentaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ArticulosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getArticulos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticulosXVenta($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXVentas();
				$obj2->addArticulosXVenta($obj1);
			}


					
			$omClass = VentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getVentas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticulosXVenta($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticulosXVentas();
				$obj3->addArticulosXVenta($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptArticulos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = ArticulosXVentaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptVentas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXVentaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXVentaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXVentaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptArticulos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXVentaPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXVentaPeer::NUM_COLUMNS - ArticulosXVentaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VentasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VentasPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXVentaPeer::ID_VENTA, VentasPeer::ID_VENTA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXVentaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VentasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getVentas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticulosXVenta($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXVentas();
				$obj2->addArticulosXVenta($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptVentas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXVentaPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXVentaPeer::NUM_COLUMNS - ArticulosXVentaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXVentaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXVentaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ArticulosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getArticulos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticulosXVenta($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXVentas();
				$obj2->addArticulosXVenta($obj1);
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
		return ArticulosXVentaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA); 

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
			$comparison = $criteria->getComparison(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA);
			$selectCriteria->add(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA, $criteria->remove(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ArticulosXVentaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticulosXVentaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticulosXVenta) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticulosXVenta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticulosXVentaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticulosXVentaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticulosXVentaPeer::DATABASE_NAME, ArticulosXVentaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticulosXVentaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticulosXVentaPeer::DATABASE_NAME);

		$criteria->add(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA, $pk);


		$v = ArticulosXVentaPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticulosXVentaPeer::ID_ARTICULO_X_VENTA, $pks, Criteria::IN);
			$objs = ArticulosXVentaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticulosXVentaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticulosXVentaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticulosXVentaMapBuilder');
}
