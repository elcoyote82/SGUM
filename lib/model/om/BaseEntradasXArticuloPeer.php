<?php


abstract class BaseEntradasXArticuloPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'entradas_x_articulo';

	
	const CLASS_DEFAULT = 'lib.model.EntradasXArticulo';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ENTRADA_X_ARTICULO = 'entradas_x_articulo.ID_ENTRADA_X_ARTICULO';

	
	const ID_ENTRADA = 'entradas_x_articulo.ID_ENTRADA';

	
	const ID_ARTICULO = 'entradas_x_articulo.ID_ARTICULO';

	
	const CANTIDAD = 'entradas_x_articulo.CANTIDAD';

	
	const CREATED_AT = 'entradas_x_articulo.CREATED_AT';

	
	const UPDATED_AT = 'entradas_x_articulo.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdEntradaXArticulo', 'IdEntrada', 'IdArticulo', 'Cantidad', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO, EntradasXArticuloPeer::ID_ENTRADA, EntradasXArticuloPeer::ID_ARTICULO, EntradasXArticuloPeer::CANTIDAD, EntradasXArticuloPeer::CREATED_AT, EntradasXArticuloPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_entrada_x_articulo', 'id_entrada', 'id_articulo', 'cantidad', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdEntradaXArticulo' => 0, 'IdEntrada' => 1, 'IdArticulo' => 2, 'Cantidad' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, ),
		BasePeer::TYPE_COLNAME => array (EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO => 0, EntradasXArticuloPeer::ID_ENTRADA => 1, EntradasXArticuloPeer::ID_ARTICULO => 2, EntradasXArticuloPeer::CANTIDAD => 3, EntradasXArticuloPeer::CREATED_AT => 4, EntradasXArticuloPeer::UPDATED_AT => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id_entrada_x_articulo' => 0, 'id_entrada' => 1, 'id_articulo' => 2, 'cantidad' => 3, 'created_at' => 4, 'updated_at' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EntradasXArticuloMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EntradasXArticuloMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EntradasXArticuloPeer::getTableMap();
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
		return str_replace(EntradasXArticuloPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO);

		$criteria->addSelectColumn(EntradasXArticuloPeer::ID_ENTRADA);

		$criteria->addSelectColumn(EntradasXArticuloPeer::ID_ARTICULO);

		$criteria->addSelectColumn(EntradasXArticuloPeer::CANTIDAD);

		$criteria->addSelectColumn(EntradasXArticuloPeer::CREATED_AT);

		$criteria->addSelectColumn(EntradasXArticuloPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(entradas_x_articulo.ID_ENTRADA_X_ARTICULO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT entradas_x_articulo.ID_ENTRADA_X_ARTICULO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EntradasXArticuloPeer::doSelectRS($criteria, $con);
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
		$objects = EntradasXArticuloPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EntradasXArticuloPeer::populateObjects(EntradasXArticuloPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EntradasXArticuloPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EntradasXArticuloPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEntradas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasXArticuloPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$rs = EntradasXArticuloPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinArticulos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasXArticuloPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = EntradasXArticuloPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEntradas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasXArticuloPeer::addSelectColumns($c);
		$startcol = (EntradasXArticuloPeer::NUM_COLUMNS - EntradasXArticuloPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EntradasPeer::addSelectColumns($c);

		$c->addJoin(EntradasXArticuloPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasXArticuloPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EntradasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEntradas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEntradasXArticulo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEntradasXArticulos();
				$obj2->addEntradasXArticulo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinArticulos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasXArticuloPeer::addSelectColumns($c);
		$startcol = (EntradasXArticuloPeer::NUM_COLUMNS - EntradasXArticuloPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticulosPeer::addSelectColumns($c);

		$c->addJoin(EntradasXArticuloPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasXArticuloPeer::getOMClass();

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
										$temp_obj2->addEntradasXArticulo($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEntradasXArticulos();
				$obj2->addEntradasXArticulo($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasXArticuloPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$criteria->addJoin(EntradasXArticuloPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = EntradasXArticuloPeer::doSelectRS($criteria, $con);
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

		EntradasXArticuloPeer::addSelectColumns($c);
		$startcol2 = (EntradasXArticuloPeer::NUM_COLUMNS - EntradasXArticuloPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EntradasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EntradasPeer::NUM_COLUMNS;

		ArticulosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticulosPeer::NUM_COLUMNS;

		$c->addJoin(EntradasXArticuloPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$c->addJoin(EntradasXArticuloPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasXArticuloPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = EntradasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEntradas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEntradasXArticulo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEntradasXArticulos();
				$obj2->addEntradasXArticulo($obj1);
			}


					
			$omClass = ArticulosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getArticulos(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEntradasXArticulo($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEntradasXArticulos();
				$obj3->addEntradasXArticulo($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptEntradas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasXArticuloPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = EntradasXArticuloPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptArticulos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasXArticuloPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasXArticuloPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$rs = EntradasXArticuloPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptEntradas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasXArticuloPeer::addSelectColumns($c);
		$startcol2 = (EntradasXArticuloPeer::NUM_COLUMNS - EntradasXArticuloPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		$c->addJoin(EntradasXArticuloPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasXArticuloPeer::getOMClass();

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
					$temp_obj2->addEntradasXArticulo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEntradasXArticulos();
				$obj2->addEntradasXArticulo($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptArticulos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasXArticuloPeer::addSelectColumns($c);
		$startcol2 = (EntradasXArticuloPeer::NUM_COLUMNS - EntradasXArticuloPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EntradasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EntradasPeer::NUM_COLUMNS;

		$c->addJoin(EntradasXArticuloPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasXArticuloPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EntradasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEntradas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEntradasXArticulo($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEntradasXArticulos();
				$obj2->addEntradasXArticulo($obj1);
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
		return EntradasXArticuloPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO); 

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
			$comparison = $criteria->getComparison(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO);
			$selectCriteria->add(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO, $criteria->remove(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EntradasXArticuloPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EntradasXArticuloPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EntradasXArticulo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO, (array) $values, Criteria::IN);
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

	
	public static function doValidate(EntradasXArticulo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EntradasXArticuloPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EntradasXArticuloPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EntradasXArticuloPeer::DATABASE_NAME, EntradasXArticuloPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EntradasXArticuloPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EntradasXArticuloPeer::DATABASE_NAME);

		$criteria->add(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO, $pk);


		$v = EntradasXArticuloPeer::doSelect($criteria, $con);

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
			$criteria->add(EntradasXArticuloPeer::ID_ENTRADA_X_ARTICULO, $pks, Criteria::IN);
			$objs = EntradasXArticuloPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEntradasXArticuloPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EntradasXArticuloMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EntradasXArticuloMapBuilder');
}
