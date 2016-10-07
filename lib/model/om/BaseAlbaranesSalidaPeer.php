<?php


abstract class BaseAlbaranesSalidaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'albaranes_salida';

	
	const CLASS_DEFAULT = 'lib.model.AlbaranesSalida';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ALBARAN_SALIDA = 'albaranes_salida.ID_ALBARAN_SALIDA';

	
	const ID_MD5_ALBARAN = 'albaranes_salida.ID_MD5_ALBARAN';

	
	const ID_SALIDA = 'albaranes_salida.ID_SALIDA';

	
	const ID_VENTA = 'albaranes_salida.ID_VENTA';

	
	const NUM_ALBARAN_SALIDA = 'albaranes_salida.NUM_ALBARAN_SALIDA';

	
	const RUTA_ALBARAN = 'albaranes_salida.RUTA_ALBARAN';

	
	const CREATED_AT = 'albaranes_salida.CREATED_AT';

	
	const UPDATED_AT = 'albaranes_salida.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranSalida', 'IdMd5Albaran', 'IdSalida', 'IdVenta', 'NumAlbaranSalida', 'RutaAlbaran', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (AlbaranesSalidaPeer::ID_ALBARAN_SALIDA, AlbaranesSalidaPeer::ID_MD5_ALBARAN, AlbaranesSalidaPeer::ID_SALIDA, AlbaranesSalidaPeer::ID_VENTA, AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA, AlbaranesSalidaPeer::RUTA_ALBARAN, AlbaranesSalidaPeer::CREATED_AT, AlbaranesSalidaPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_salida', 'id_md5_albaran', 'id_salida', 'id_venta', 'num_albaran_salida', 'ruta_albaran', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranSalida' => 0, 'IdMd5Albaran' => 1, 'IdSalida' => 2, 'IdVenta' => 3, 'NumAlbaranSalida' => 4, 'RutaAlbaran' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (AlbaranesSalidaPeer::ID_ALBARAN_SALIDA => 0, AlbaranesSalidaPeer::ID_MD5_ALBARAN => 1, AlbaranesSalidaPeer::ID_SALIDA => 2, AlbaranesSalidaPeer::ID_VENTA => 3, AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA => 4, AlbaranesSalidaPeer::RUTA_ALBARAN => 5, AlbaranesSalidaPeer::CREATED_AT => 6, AlbaranesSalidaPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_salida' => 0, 'id_md5_albaran' => 1, 'id_salida' => 2, 'id_venta' => 3, 'num_albaran_salida' => 4, 'ruta_albaran' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AlbaranesSalidaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AlbaranesSalidaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AlbaranesSalidaPeer::getTableMap();
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
		return str_replace(AlbaranesSalidaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA);

		$criteria->addSelectColumn(AlbaranesSalidaPeer::ID_MD5_ALBARAN);

		$criteria->addSelectColumn(AlbaranesSalidaPeer::ID_SALIDA);

		$criteria->addSelectColumn(AlbaranesSalidaPeer::ID_VENTA);

		$criteria->addSelectColumn(AlbaranesSalidaPeer::NUM_ALBARAN_SALIDA);

		$criteria->addSelectColumn(AlbaranesSalidaPeer::RUTA_ALBARAN);

		$criteria->addSelectColumn(AlbaranesSalidaPeer::CREATED_AT);

		$criteria->addSelectColumn(AlbaranesSalidaPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(albaranes_salida.ID_ALBARAN_SALIDA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT albaranes_salida.ID_ALBARAN_SALIDA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AlbaranesSalidaPeer::doSelectRS($criteria, $con);
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
		$objects = AlbaranesSalidaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AlbaranesSalidaPeer::populateObjects(AlbaranesSalidaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AlbaranesSalidaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AlbaranesSalidaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinSalidas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$rs = AlbaranesSalidaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesSalidaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = AlbaranesSalidaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinSalidas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlbaranesSalidaPeer::addSelectColumns($c);
		$startcol = (AlbaranesSalidaPeer::NUM_COLUMNS - AlbaranesSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SalidasPeer::addSelectColumns($c);

		$c->addJoin(AlbaranesSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesSalidaPeer::getOMClass();

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
										$temp_obj2->addAlbaranesSalida($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlbaranesSalidas();
				$obj2->addAlbaranesSalida($obj1); 			}
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

		AlbaranesSalidaPeer::addSelectColumns($c);
		$startcol = (AlbaranesSalidaPeer::NUM_COLUMNS - AlbaranesSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VentasPeer::addSelectColumns($c);

		$c->addJoin(AlbaranesSalidaPeer::ID_VENTA, VentasPeer::ID_VENTA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesSalidaPeer::getOMClass();

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
										$temp_obj2->addAlbaranesSalida($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlbaranesSalidas();
				$obj2->addAlbaranesSalida($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$criteria->addJoin(AlbaranesSalidaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = AlbaranesSalidaPeer::doSelectRS($criteria, $con);
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

		AlbaranesSalidaPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesSalidaPeer::NUM_COLUMNS - AlbaranesSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SalidasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SalidasPeer::NUM_COLUMNS;

		VentasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VentasPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$c->addJoin(AlbaranesSalidaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesSalidaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = SalidasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSalidas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlbaranesSalida($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesSalidas();
				$obj2->addAlbaranesSalida($obj1);
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
					$temp_obj3->addAlbaranesSalida($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAlbaranesSalidas();
				$obj3->addAlbaranesSalida($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptSalidas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesSalidaPeer::ID_VENTA, VentasPeer::ID_VENTA);

		$rs = AlbaranesSalidaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesSalidaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);

		$rs = AlbaranesSalidaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptSalidas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlbaranesSalidaPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesSalidaPeer::NUM_COLUMNS - AlbaranesSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		VentasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + VentasPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesSalidaPeer::ID_VENTA, VentasPeer::ID_VENTA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesSalidaPeer::getOMClass();

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
					$temp_obj2->addAlbaranesSalida($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesSalidas();
				$obj2->addAlbaranesSalida($obj1);
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

		AlbaranesSalidaPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesSalidaPeer::NUM_COLUMNS - AlbaranesSalidaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SalidasPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SalidasPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesSalidaPeer::ID_SALIDA, SalidasPeer::ID_SALIDA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesSalidaPeer::getOMClass();

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
					$temp_obj2->addAlbaranesSalida($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesSalidas();
				$obj2->addAlbaranesSalida($obj1);
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
		return AlbaranesSalidaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA); 

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
			$comparison = $criteria->getComparison(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA);
			$selectCriteria->add(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA, $criteria->remove(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AlbaranesSalidaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AlbaranesSalidaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AlbaranesSalida) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AlbaranesSalida $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlbaranesSalidaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlbaranesSalidaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AlbaranesSalidaPeer::DATABASE_NAME, AlbaranesSalidaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlbaranesSalidaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AlbaranesSalidaPeer::DATABASE_NAME);

		$criteria->add(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA, $pk);


		$v = AlbaranesSalidaPeer::doSelect($criteria, $con);

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
			$criteria->add(AlbaranesSalidaPeer::ID_ALBARAN_SALIDA, $pks, Criteria::IN);
			$objs = AlbaranesSalidaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAlbaranesSalidaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AlbaranesSalidaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AlbaranesSalidaMapBuilder');
}
