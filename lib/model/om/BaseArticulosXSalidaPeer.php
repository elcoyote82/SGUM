<?php


abstract class BaseArticulosXSalidaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'articulos_x_salida';

	
	const CLASS_DEFAULT = 'lib.model.ArticulosXSalida';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ARTICULO_X_SALIDA = 'articulos_x_salida.ID_ARTICULO_X_SALIDA';

	
	const ID_ARTICULO = 'articulos_x_salida.ID_ARTICULO';

	
	const ID_SALIDA = 'articulos_x_salida.ID_SALIDA';

	
	const ID_UBICACION = 'articulos_x_salida.ID_UBICACION';

	
	const LOTE = 'articulos_x_salida.LOTE';

	
	const CREATED_AT = 'articulos_x_salida.CREATED_AT';

	
	const UPDATED_AT = 'articulos_x_salida.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXSalida', 'IdArticulo', 'IdSalida', 'IdUbicacion', 'Lote', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA, ArticulosXSalidaPeer::ID_ARTICULO, ArticulosXSalidaPeer::ID_SALIDA, ArticulosXSalidaPeer::ID_UBICACION, ArticulosXSalidaPeer::LOTE, ArticulosXSalidaPeer::CREATED_AT, ArticulosXSalidaPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_salida', 'id_articulo', 'id_salida', 'id_ubicacion', 'lote', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXSalida' => 0, 'IdArticulo' => 1, 'IdSalida' => 2, 'IdUbicacion' => 3, 'Lote' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA => 0, ArticulosXSalidaPeer::ID_ARTICULO => 1, ArticulosXSalidaPeer::ID_SALIDA => 2, ArticulosXSalidaPeer::ID_UBICACION => 3, ArticulosXSalidaPeer::LOTE => 4, ArticulosXSalidaPeer::CREATED_AT => 5, ArticulosXSalidaPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_salida' => 0, 'id_articulo' => 1, 'id_salida' => 2, 'id_ubicacion' => 3, 'lote' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticulosXSalidaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticulosXSalidaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticulosXSalidaPeer::getTableMap();
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
		return str_replace(ArticulosXSalidaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA);

		$criteria->addSelectColumn(ArticulosXSalidaPeer::ID_ARTICULO);

		$criteria->addSelectColumn(ArticulosXSalidaPeer::ID_SALIDA);

		$criteria->addSelectColumn(ArticulosXSalidaPeer::ID_UBICACION);

		$criteria->addSelectColumn(ArticulosXSalidaPeer::LOTE);

		$criteria->addSelectColumn(ArticulosXSalidaPeer::CREATED_AT);

		$criteria->addSelectColumn(ArticulosXSalidaPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(articulos_x_salida.ID_ARTICULO_X_SALIDA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT articulos_x_salida.ID_ARTICULO_X_SALIDA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticulosXSalidaPeer::doSelectRS($criteria, $con);
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
		$objects = ArticulosXSalidaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticulosXSalidaPeer::populateObjects(ArticulosXSalidaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticulosXSalidaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticulosXSalidaPeer::getOMClass();
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
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXSalidaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXSalidaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinSalidas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$rs = ArticulosXSalidaPeer::doSelectRS($criteria, $con);
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

		ArticulosXSalidaPeer::addSelectColumns($c);
		$startcol = (ArticulosXSalidaPeer::NUM_COLUMNS - ArticulosXSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticulosPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXSalidaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXSalidaPeer::getOMClass();

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
										$temp_obj2->addArticulosXSalida($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXSalidas();
				$obj2->addArticulosXSalida($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinSalidas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXSalidaPeer::addSelectColumns($c);
		$startcol = (ArticulosXSalidaPeer::NUM_COLUMNS - ArticulosXSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SalidasPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXSalidaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SalidasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSalidas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticulosXSalida($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXSalidas();
				$obj2->addArticulosXSalida($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXSalidaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$criteria->addJoin(ArticulosXSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$rs = ArticulosXSalidaPeer::doSelectRS($criteria, $con);
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

		ArticulosXSalidaPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXSalidaPeer::NUM_COLUMNS - ArticulosXSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		SalidasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SalidasPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXSalidaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$c->addJoin(ArticulosXSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXSalidaPeer::getOMClass();


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
					$temp_obj2->addArticulosXSalida($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXSalidas();
				$obj2->addArticulosXSalida($obj1);
			}


					
			$omClass = SalidasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSalidas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticulosXSalida($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticulosXSalidas();
				$obj3->addArticulosXSalida($obj1);
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
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$rs = ArticulosXSalidaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSalidas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXSalidaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXSalidaPeer::doSelectRS($criteria, $con);
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

		ArticulosXSalidaPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXSalidaPeer::NUM_COLUMNS - ArticulosXSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SalidasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SalidasPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXSalidaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SalidasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSalidas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticulosXSalida($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXSalidas();
				$obj2->addArticulosXSalida($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSalidas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXSalidaPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXSalidaPeer::NUM_COLUMNS - ArticulosXSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXSalidaPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXSalidaPeer::getOMClass();

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
					$temp_obj2->addArticulosXSalida($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXSalidas();
				$obj2->addArticulosXSalida($obj1);
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
		return ArticulosXSalidaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA); 

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
			$comparison = $criteria->getComparison(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA);
			$selectCriteria->add(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA, $criteria->remove(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ArticulosXSalidaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticulosXSalidaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticulosXSalida) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticulosXSalida $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticulosXSalidaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticulosXSalidaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticulosXSalidaPeer::DATABASE_NAME, ArticulosXSalidaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticulosXSalidaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticulosXSalidaPeer::DATABASE_NAME);

		$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA, $pk);


		$v = ArticulosXSalidaPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticulosXSalidaPeer::ID_ARTICULO_X_SALIDA, $pks, Criteria::IN);
			$objs = ArticulosXSalidaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticulosXSalidaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticulosXSalidaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticulosXSalidaMapBuilder');
}
