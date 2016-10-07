<?php


abstract class BaseArticulosXProveedorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'articulos_x_proveedor';

	
	const CLASS_DEFAULT = 'lib.model.ArticulosXProveedor';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ARTICULO_X_PROVEEDOR = 'articulos_x_proveedor.ID_ARTICULO_X_PROVEEDOR';

	
	const ID_ARTICULO = 'articulos_x_proveedor.ID_ARTICULO';

	
	const ID_PROVEEDOR = 'articulos_x_proveedor.ID_PROVEEDOR';

	
	const CREATED_AT = 'articulos_x_proveedor.CREATED_AT';

	
	const UPDATED_AT = 'articulos_x_proveedor.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXProveedor', 'IdArticulo', 'IdProveedor', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR, ArticulosXProveedorPeer::ID_ARTICULO, ArticulosXProveedorPeer::ID_PROVEEDOR, ArticulosXProveedorPeer::CREATED_AT, ArticulosXProveedorPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_proveedor', 'id_articulo', 'id_proveedor', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXProveedor' => 0, 'IdArticulo' => 1, 'IdProveedor' => 2, 'CreatedAt' => 3, 'UpdatedAt' => 4, ),
		BasePeer::TYPE_COLNAME => array (ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR => 0, ArticulosXProveedorPeer::ID_ARTICULO => 1, ArticulosXProveedorPeer::ID_PROVEEDOR => 2, ArticulosXProveedorPeer::CREATED_AT => 3, ArticulosXProveedorPeer::UPDATED_AT => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_proveedor' => 0, 'id_articulo' => 1, 'id_proveedor' => 2, 'created_at' => 3, 'updated_at' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticulosXProveedorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticulosXProveedorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticulosXProveedorPeer::getTableMap();
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
		return str_replace(ArticulosXProveedorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR);

		$criteria->addSelectColumn(ArticulosXProveedorPeer::ID_ARTICULO);

		$criteria->addSelectColumn(ArticulosXProveedorPeer::ID_PROVEEDOR);

		$criteria->addSelectColumn(ArticulosXProveedorPeer::CREATED_AT);

		$criteria->addSelectColumn(ArticulosXProveedorPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(articulos_x_proveedor.ID_ARTICULO_X_PROVEEDOR)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT articulos_x_proveedor.ID_ARTICULO_X_PROVEEDOR)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticulosXProveedorPeer::doSelectRS($criteria, $con);
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
		$objects = ArticulosXProveedorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticulosXProveedorPeer::populateObjects(ArticulosXProveedorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticulosXProveedorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticulosXProveedorPeer::getOMClass();
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
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXProveedorPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXProveedorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProveedores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXProveedorPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$rs = ArticulosXProveedorPeer::doSelectRS($criteria, $con);
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

		ArticulosXProveedorPeer::addSelectColumns($c);
		$startcol = (ArticulosXProveedorPeer::NUM_COLUMNS - ArticulosXProveedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticulosPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXProveedorPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXProveedorPeer::getOMClass();

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
										$temp_obj2->addArticulosXProveedor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXProveedors();
				$obj2->addArticulosXProveedor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProveedores(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXProveedorPeer::addSelectColumns($c);
		$startcol = (ArticulosXProveedorPeer::NUM_COLUMNS - ArticulosXProveedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProveedoresPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXProveedorPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXProveedorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProveedoresPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProveedores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticulosXProveedor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXProveedors();
				$obj2->addArticulosXProveedor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXProveedorPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$criteria->addJoin(ArticulosXProveedorPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$rs = ArticulosXProveedorPeer::doSelectRS($criteria, $con);
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

		ArticulosXProveedorPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXProveedorPeer::NUM_COLUMNS - ArticulosXProveedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		ProveedoresPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProveedoresPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXProveedorPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$c->addJoin(ArticulosXProveedorPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXProveedorPeer::getOMClass();


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
					$temp_obj2->addArticulosXProveedor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXProveedors();
				$obj2->addArticulosXProveedor($obj1);
			}


					
			$omClass = ProveedoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProveedores(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticulosXProveedor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticulosXProveedors();
				$obj3->addArticulosXProveedor($obj1);
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
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXProveedorPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);

		$rs = ArticulosXProveedorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProveedores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXProveedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXProveedorPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXProveedorPeer::doSelectRS($criteria, $con);
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

		ArticulosXProveedorPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXProveedorPeer::NUM_COLUMNS - ArticulosXProveedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProveedoresPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProveedoresPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXProveedorPeer::ID_PROVEEDOR, ProveedoresPeer::ID_PROVEEDOR);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXProveedorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProveedoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProveedores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticulosXProveedor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXProveedors();
				$obj2->addArticulosXProveedor($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProveedores(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXProveedorPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXProveedorPeer::NUM_COLUMNS - ArticulosXProveedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXProveedorPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXProveedorPeer::getOMClass();

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
					$temp_obj2->addArticulosXProveedor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXProveedors();
				$obj2->addArticulosXProveedor($obj1);
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
		return ArticulosXProveedorPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR); 

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
			$comparison = $criteria->getComparison(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR);
			$selectCriteria->add(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR, $criteria->remove(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ArticulosXProveedorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticulosXProveedorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticulosXProveedor) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticulosXProveedor $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticulosXProveedorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticulosXProveedorPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticulosXProveedorPeer::DATABASE_NAME, ArticulosXProveedorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticulosXProveedorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticulosXProveedorPeer::DATABASE_NAME);

		$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR, $pk);


		$v = ArticulosXProveedorPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticulosXProveedorPeer::ID_ARTICULO_X_PROVEEDOR, $pks, Criteria::IN);
			$objs = ArticulosXProveedorPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticulosXProveedorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticulosXProveedorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticulosXProveedorMapBuilder');
}
