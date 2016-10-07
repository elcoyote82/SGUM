<?php


abstract class BaseAlbaranesPedidoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'albaranes_pedido';

	
	const CLASS_DEFAULT = 'lib.model.AlbaranesPedido';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ALBARAN_PEDIDO = 'albaranes_pedido.ID_ALBARAN_PEDIDO';

	
	const ID_MD5_ALBARAN = 'albaranes_pedido.ID_MD5_ALBARAN';

	
	const ID_PEDIDO = 'albaranes_pedido.ID_PEDIDO';

	
	const NUM_ALBARAN_PEDIDO = 'albaranes_pedido.NUM_ALBARAN_PEDIDO';

	
	const RUTA_ALBARAN = 'albaranes_pedido.RUTA_ALBARAN';

	
	const CREATED_AT = 'albaranes_pedido.CREATED_AT';

	
	const UPDATED_AT = 'albaranes_pedido.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranPedido', 'IdMd5Albaran', 'IdPedido', 'NumAlbaranPedido', 'RutaAlbaran', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO, AlbaranesPedidoPeer::ID_MD5_ALBARAN, AlbaranesPedidoPeer::ID_PEDIDO, AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO, AlbaranesPedidoPeer::RUTA_ALBARAN, AlbaranesPedidoPeer::CREATED_AT, AlbaranesPedidoPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_pedido', 'id_md5_albaran', 'id_pedido', 'num_albaran_pedido', 'ruta_albaran', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdAlbaranPedido' => 0, 'IdMd5Albaran' => 1, 'IdPedido' => 2, 'NumAlbaranPedido' => 3, 'RutaAlbaran' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO => 0, AlbaranesPedidoPeer::ID_MD5_ALBARAN => 1, AlbaranesPedidoPeer::ID_PEDIDO => 2, AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO => 3, AlbaranesPedidoPeer::RUTA_ALBARAN => 4, AlbaranesPedidoPeer::CREATED_AT => 5, AlbaranesPedidoPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id_albaran_pedido' => 0, 'id_md5_albaran' => 1, 'id_pedido' => 2, 'num_albaran_pedido' => 3, 'ruta_albaran' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AlbaranesPedidoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AlbaranesPedidoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AlbaranesPedidoPeer::getTableMap();
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
		return str_replace(AlbaranesPedidoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO);

		$criteria->addSelectColumn(AlbaranesPedidoPeer::ID_MD5_ALBARAN);

		$criteria->addSelectColumn(AlbaranesPedidoPeer::ID_PEDIDO);

		$criteria->addSelectColumn(AlbaranesPedidoPeer::NUM_ALBARAN_PEDIDO);

		$criteria->addSelectColumn(AlbaranesPedidoPeer::RUTA_ALBARAN);

		$criteria->addSelectColumn(AlbaranesPedidoPeer::CREATED_AT);

		$criteria->addSelectColumn(AlbaranesPedidoPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(albaranes_pedido.ID_ALBARAN_PEDIDO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT albaranes_pedido.ID_ALBARAN_PEDIDO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AlbaranesPedidoPeer::doSelectRS($criteria, $con);
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
		$objects = AlbaranesPedidoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AlbaranesPedidoPeer::populateObjects(AlbaranesPedidoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AlbaranesPedidoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AlbaranesPedidoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinPedidos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = AlbaranesPedidoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinPedidos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlbaranesPedidoPeer::addSelectColumns($c);
		$startcol = (AlbaranesPedidoPeer::NUM_COLUMNS - AlbaranesPedidoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PedidosPeer::addSelectColumns($c);

		$c->addJoin(AlbaranesPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesPedidoPeer::getOMClass();

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
										$temp_obj2->addAlbaranesPedido($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlbaranesPedidos();
				$obj2->addAlbaranesPedido($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlbaranesPedidoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlbaranesPedidoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlbaranesPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = AlbaranesPedidoPeer::doSelectRS($criteria, $con);
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

		AlbaranesPedidoPeer::addSelectColumns($c);
		$startcol2 = (AlbaranesPedidoPeer::NUM_COLUMNS - AlbaranesPedidoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PedidosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PedidosPeer::NUM_COLUMNS;

		$c->addJoin(AlbaranesPedidoPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlbaranesPedidoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = PedidosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPedidos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlbaranesPedido($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAlbaranesPedidos();
				$obj2->addAlbaranesPedido($obj1);
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
		return AlbaranesPedidoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO); 

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
			$comparison = $criteria->getComparison(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO);
			$selectCriteria->add(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO, $criteria->remove(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AlbaranesPedidoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AlbaranesPedidoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AlbaranesPedido) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AlbaranesPedido $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlbaranesPedidoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlbaranesPedidoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AlbaranesPedidoPeer::DATABASE_NAME, AlbaranesPedidoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlbaranesPedidoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AlbaranesPedidoPeer::DATABASE_NAME);

		$criteria->add(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO, $pk);


		$v = AlbaranesPedidoPeer::doSelect($criteria, $con);

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
			$criteria->add(AlbaranesPedidoPeer::ID_ALBARAN_PEDIDO, $pks, Criteria::IN);
			$objs = AlbaranesPedidoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAlbaranesPedidoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AlbaranesPedidoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AlbaranesPedidoMapBuilder');
}
