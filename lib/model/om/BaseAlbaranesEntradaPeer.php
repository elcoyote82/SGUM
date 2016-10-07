<?php


abstract class BaseAlbaranesEntradaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'albaranes_entrada';

	
	const CLASS_DEFAULT = 'lib.model.AlbaranesEntrada';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ALBARAN_ENTRADA = 'albaranes_entrada.ID_ALBARAN_ENTRADA';

	
	const ID_MD5_ALBARAN = 'albaranes_entrada.ID_MD5_ALBARAN';

	
	const ID_ENTRADA = 'albaranes_entrada.ID_ENTRADA';

	
	const ID_PEDIDO = 'albaranes_entrada.ID_PEDIDO';

	
	const NUM_ALBARAN_ENTRADA = 'albaranes_entrada.NUM_ALBARAN_ENTRADA';

	
	const RUTA_ALBARAN = 'albaranes_entrada.RUTA_ALBARAN';

	
	const CREATED_AT = 'albaranes_entrada.CREATED_AT';

	
	const UPDATED_AT = 'albaranes_entrada.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranEntrada', 'IdMd5Albaran', 'IdEntrada', 'IdPedido', 'NumAlbaranEntrada', 'RutaAlbaran', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA, AlbaranesEntradaPeer::ID_MD5_ALBARAN, AlbaranesEntradaPeer::ID_ENTRADA, AlbaranesEntradaPeer::ID_PEDIDO, AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA, AlbaranesEntradaPeer::RUTA_ALBARAN, AlbaranesEntradaPeer::CREATED_AT, AlbaranesEntradaPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_entrada', 'id_md5_albaran', 'id_entrada', 'id_pedido', 'num_albaran_entrada', 'ruta_albaran', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranEntrada' => 0, 'IdMd5Albaran' => 1, 'IdEntrada' => 2, 'IdPedido' => 3, 'NumAlbaranEntrada' => 4, 'RutaAlbaran' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA => 0, AlbaranesEntradaPeer::ID_MD5_ALBARAN => 1, AlbaranesEntradaPeer::ID_ENTRADA => 2, AlbaranesEntradaPeer::ID_PEDIDO => 3, AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA => 4, AlbaranesEntradaPeer::RUTA_ALBARAN => 5, AlbaranesEntradaPeer::CREATED_AT => 6, AlbaranesEntradaPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_entrada' => 0, 'id_md5_albaran' => 1, 'id_entrada' => 2, 'id_pedido' => 3, 'num_albaran_entrada' => 4, 'ruta_albaran' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AlbaranesEntradaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AlbaranesEntradaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AlbaranesEntradaPeer::getTableMap();
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
		return str_replace(AlbaranesEntradaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA);

		$criteria->addSelectColumn(AlbaranesEntradaPeer::ID_MD5_ALBARAN);

		$criteria->addSelectColumn(AlbaranesEntradaPeer::ID_ENTRADA);

		$criteria->addSelectColumn(AlbaranesEntradaPeer::ID_PEDIDO);

		$criteria->addSelectColumn(AlbaranesEntradaPeer::NUM_ALBARAN_ENTRADA);

		$criteria->addSelectColumn(AlbaranesEntradaPeer::RUTA_ALBARAN);

		$criteria->addSelectColumn(AlbaranesEntradaPeer::CREATED_AT);

		$criteria->addSelectColumn(AlbaranesEntradaPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(albaranes_entrada.ID_ALBARAN_ENTRADA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT albaranes_entrada.ID_ALBARAN_ENTRADA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AlbaranesEntradaPeer::doSelectRS($criteria, $con);
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
		$objects = AlbaranesEntradaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AlbaranesEntradaPeer::populateObjects(AlbaranesEntradaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AlbaranesEntradaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AlbaranesEntradaPeer::getOMClass();
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
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesEntradaPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$rs = AlbaranesEntradaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesEntradaPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = AlbaranesEntradaPeer::doSelectRS($criteria, $con);
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

		AlbaranesEntradaPeer::addSelectColumns($c);
		$startcol = (AlbaranesEntradaPeer::NUM_COLUMNS - AlbaranesEntradaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EntradasPeer::addSelectColumns($c);

		$c->addJoin(AlbaranesEntradaPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesEntradaPeer::getOMClass();

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
										$temp_obj2->addAlbaranesEntrada($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlbaranesEntradas();
				$obj2->addAlbaranesEntrada($obj1); 			}
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

		AlbaranesEntradaPeer::addSelectColumns($c);
		$startcol = (AlbaranesEntradaPeer::NUM_COLUMNS - AlbaranesEntradaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PedidosPeer::addSelectColumns($c);

		$c->addJoin(AlbaranesEntradaPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesEntradaPeer::getOMClass();

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
										$temp_obj2->addAlbaranesEntrada($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlbaranesEntradas();
				$obj2->addAlbaranesEntrada($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesEntradaPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$criteria->addJoin(AlbaranesEntradaPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = AlbaranesEntradaPeer::doSelectRS($criteria, $con);
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

		AlbaranesEntradaPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesEntradaPeer::NUM_COLUMNS - AlbaranesEntradaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EntradasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EntradasPeer::NUM_COLUMNS;

		PedidosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PedidosPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesEntradaPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$c->addJoin(AlbaranesEntradaPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesEntradaPeer::getOMClass();


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
					$temp_obj2->addAlbaranesEntrada($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesEntradas();
				$obj2->addAlbaranesEntrada($obj1);
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
					$temp_obj3->addAlbaranesEntrada($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAlbaranesEntradas();
				$obj3->addAlbaranesEntrada($obj1);
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
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesEntradaPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = AlbaranesEntradaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesEntradaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesEntradaPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);

		$rs = AlbaranesEntradaPeer::doSelectRS($criteria, $con);
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

		AlbaranesEntradaPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesEntradaPeer::NUM_COLUMNS - AlbaranesEntradaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PedidosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PedidosPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesEntradaPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesEntradaPeer::getOMClass();

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
					$temp_obj2->addAlbaranesEntrada($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesEntradas();
				$obj2->addAlbaranesEntrada($obj1);
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

		AlbaranesEntradaPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesEntradaPeer::NUM_COLUMNS - AlbaranesEntradaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EntradasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EntradasPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesEntradaPeer::ID_ENTRADA, EntradasPeer::ID_ENTRADA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesEntradaPeer::getOMClass();

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
					$temp_obj2->addAlbaranesEntrada($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesEntradas();
				$obj2->addAlbaranesEntrada($obj1);
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
		return AlbaranesEntradaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA); 

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
			$comparison = $criteria->getComparison(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA);
			$selectCriteria->add(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA, $criteria->remove(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AlbaranesEntradaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AlbaranesEntradaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AlbaranesEntrada) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AlbaranesEntrada $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlbaranesEntradaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlbaranesEntradaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AlbaranesEntradaPeer::DATABASE_NAME, AlbaranesEntradaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlbaranesEntradaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AlbaranesEntradaPeer::DATABASE_NAME);

		$criteria->add(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA, $pk);


		$v = AlbaranesEntradaPeer::doSelect($criteria, $con);

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
			$criteria->add(AlbaranesEntradaPeer::ID_ALBARAN_ENTRADA, $pks, Criteria::IN);
			$objs = AlbaranesEntradaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAlbaranesEntradaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AlbaranesEntradaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AlbaranesEntradaMapBuilder');
}
