<?php


abstract class BaseArticulosXPedidoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'articulos_x_pedido';

	
	const CLASS_DEFAULT = 'lib.model.ArticulosXPedido';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ARTICULO_X_PEDIDO = 'articulos_x_pedido.ID_ARTICULO_X_PEDIDO';

	
	const ID_ARTICULO = 'articulos_x_pedido.ID_ARTICULO';

	
	const ID_PEDIDO = 'articulos_x_pedido.ID_PEDIDO';

	
	const CANTIDAD = 'articulos_x_pedido.CANTIDAD';

	
	const CREATED_AT = 'articulos_x_pedido.CREATED_AT';

	
	const UPDATED_AT = 'articulos_x_pedido.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXPedido', 'IdArticulo', 'IdPedido', 'Cantidad', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO, ArticulosXPedidoPeer::ID_ARTICULO, ArticulosXPedidoPeer::ID_PEDIDO, ArticulosXPedidoPeer::CANTIDAD, ArticulosXPedidoPeer::CREATED_AT, ArticulosXPedidoPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_pedido', 'id_articulo', 'id_pedido', 'cantidad', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXPedido' => 0, 'IdArticulo' => 1, 'IdPedido' => 2, 'Cantidad' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, ),
		BasePeer::TYPE_COLNAME => array (ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO => 0, ArticulosXPedidoPeer::ID_ARTICULO => 1, ArticulosXPedidoPeer::ID_PEDIDO => 2, ArticulosXPedidoPeer::CANTIDAD => 3, ArticulosXPedidoPeer::CREATED_AT => 4, ArticulosXPedidoPeer::UPDATED_AT => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_pedido' => 0, 'id_articulo' => 1, 'id_pedido' => 2, 'cantidad' => 3, 'created_at' => 4, 'updated_at' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticulosXPedidoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticulosXPedidoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticulosXPedidoPeer::getTableMap();
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
		return str_replace(ArticulosXPedidoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO);

		$criteria->addSelectColumn(ArticulosXPedidoPeer::ID_ARTICULO);

		$criteria->addSelectColumn(ArticulosXPedidoPeer::ID_PEDIDO);

		$criteria->addSelectColumn(ArticulosXPedidoPeer::CANTIDAD);

		$criteria->addSelectColumn(ArticulosXPedidoPeer::CREATED_AT);

		$criteria->addSelectColumn(ArticulosXPedidoPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(articulos_x_pedido.ID_ARTICULO_X_PEDIDO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT articulos_x_pedido.ID_ARTICULO_X_PEDIDO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticulosXPedidoPeer::doSelectRS($criteria, $con);
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
		$objects = ArticulosXPedidoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticulosXPedidoPeer::populateObjects(ArticulosXPedidoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticulosXPedidoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticulosXPedidoPeer::getOMClass();
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
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXPedidoPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXPedidoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPedidos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = ArticulosXPedidoPeer::doSelectRS($criteria, $con);
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

		ArticulosXPedidoPeer::addSelectColumns($c);
		$startcol = (ArticulosXPedidoPeer::NUM_COLUMNS - ArticulosXPedidoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticulosPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXPedidoPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXPedidoPeer::getOMClass();

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
										$temp_obj2->addArticulosXPedido($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXPedidos();
				$obj2->addArticulosXPedido($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPedidos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXPedidoPeer::addSelectColumns($c);
		$startcol = (ArticulosXPedidoPeer::NUM_COLUMNS - ArticulosXPedidoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PedidosPeer::addSelectColumns($c);

		$c->addJoin(ArticulosXPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXPedidoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PedidosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPedidos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticulosXPedido($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticulosXPedidos();
				$obj2->addArticulosXPedido($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXPedidoPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$criteria->addJoin(ArticulosXPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = ArticulosXPedidoPeer::doSelectRS($criteria, $con);
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

		ArticulosXPedidoPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXPedidoPeer::NUM_COLUMNS - ArticulosXPedidoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		PedidosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PedidosPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXPedidoPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$c->addJoin(ArticulosXPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXPedidoPeer::getOMClass();


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
					$temp_obj2->addArticulosXPedido($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXPedidos();
				$obj2->addArticulosXPedido($obj1);
			}


					
			$omClass = PedidosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPedidos(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticulosXPedido($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticulosXPedidos();
				$obj3->addArticulosXPedido($obj1);
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
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = ArticulosXPedidoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPedidos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticulosXPedidoPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);

		$rs = ArticulosXPedidoPeer::doSelectRS($criteria, $con);
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

		ArticulosXPedidoPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXPedidoPeer::NUM_COLUMNS - ArticulosXPedidoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PedidosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PedidosPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXPedidoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PedidosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPedidos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticulosXPedido($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXPedidos();
				$obj2->addArticulosXPedido($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPedidos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticulosXPedidoPeer::addSelectColumns($c);
		$startcol2 = (ArticulosXPedidoPeer::NUM_COLUMNS - ArticulosXPedidoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticulosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticulosPeer::NUM_COLUMNS;

		$c->addJoin(ArticulosXPedidoPeer::ID_ARTICULO, ArticulosPeer::ID_ARTICULO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticulosXPedidoPeer::getOMClass();

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
					$temp_obj2->addArticulosXPedido($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticulosXPedidos();
				$obj2->addArticulosXPedido($obj1);
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
		return ArticulosXPedidoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO); 

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
			$comparison = $criteria->getComparison(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO);
			$selectCriteria->add(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO, $criteria->remove(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ArticulosXPedidoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticulosXPedidoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticulosXPedido) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticulosXPedido $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticulosXPedidoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticulosXPedidoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticulosXPedidoPeer::DATABASE_NAME, ArticulosXPedidoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticulosXPedidoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticulosXPedidoPeer::DATABASE_NAME);

		$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO, $pk);


		$v = ArticulosXPedidoPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO, $pks, Criteria::IN);
			$objs = ArticulosXPedidoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticulosXPedidoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticulosXPedidoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticulosXPedidoMapBuilder');
}
