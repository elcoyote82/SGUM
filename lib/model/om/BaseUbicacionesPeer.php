<?php


abstract class BaseUbicacionesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ubicaciones';

	
	const CLASS_DEFAULT = 'lib.model.Ubicaciones';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_UBICACION = 'ubicaciones.ID_UBICACION';

	
	const ID_MD5_UBICACION = 'ubicaciones.ID_MD5_UBICACION';

	
	const NOMBRE = 'ubicaciones.NOMBRE';

	
	const ID_ESTADO_UBICACION = 'ubicaciones.ID_ESTADO_UBICACION';

	
	const CREATED_AT = 'ubicaciones.CREATED_AT';

	
	const UPDATED_AT = 'ubicaciones.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdUbicacion', 'IdMd5Ubicacion', 'Nombre', 'IdEstadoUbicacion', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (UbicacionesPeer::ID_UBICACION, UbicacionesPeer::ID_MD5_UBICACION, UbicacionesPeer::NOMBRE, UbicacionesPeer::ID_ESTADO_UBICACION, UbicacionesPeer::CREATED_AT, UbicacionesPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_ubicacion', 'id_md5_ubicacion', 'nombre', 'id_estado_ubicacion', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdUbicacion' => 0, 'IdMd5Ubicacion' => 1, 'Nombre' => 2, 'IdEstadoUbicacion' => 3, 'CreatedAt' => 4, 'UpdatedAt' => 5, ),
		BasePeer::TYPE_COLNAME => array (UbicacionesPeer::ID_UBICACION => 0, UbicacionesPeer::ID_MD5_UBICACION => 1, UbicacionesPeer::NOMBRE => 2, UbicacionesPeer::ID_ESTADO_UBICACION => 3, UbicacionesPeer::CREATED_AT => 4, UbicacionesPeer::UPDATED_AT => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id_ubicacion' => 0, 'id_md5_ubicacion' => 1, 'nombre' => 2, 'id_estado_ubicacion' => 3, 'created_at' => 4, 'updated_at' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/UbicacionesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.UbicacionesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = UbicacionesPeer::getTableMap();
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
		return str_replace(UbicacionesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(UbicacionesPeer::ID_UBICACION);

		$criteria->addSelectColumn(UbicacionesPeer::ID_MD5_UBICACION);

		$criteria->addSelectColumn(UbicacionesPeer::NOMBRE);

		$criteria->addSelectColumn(UbicacionesPeer::ID_ESTADO_UBICACION);

		$criteria->addSelectColumn(UbicacionesPeer::CREATED_AT);

		$criteria->addSelectColumn(UbicacionesPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(ubicaciones.ID_UBICACION)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ubicaciones.ID_UBICACION)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UbicacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UbicacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = UbicacionesPeer::doSelectRS($criteria, $con);
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
		$objects = UbicacionesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return UbicacionesPeer::populateObjects(UbicacionesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			UbicacionesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = UbicacionesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEstadoUbicaciones(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UbicacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UbicacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(UbicacionesPeer::ID_ESTADO_UBICACION, EstadoUbicacionesPeer::ID_ESTADO_UBICACION);

		$rs = UbicacionesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEstadoUbicaciones(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UbicacionesPeer::addSelectColumns($c);
		$startcol = (UbicacionesPeer::NUM_COLUMNS - UbicacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstadoUbicacionesPeer::addSelectColumns($c);

		$c->addJoin(UbicacionesPeer::ID_ESTADO_UBICACION, EstadoUbicacionesPeer::ID_ESTADO_UBICACION);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = UbicacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EstadoUbicacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEstadoUbicaciones(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addUbicaciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initUbicacioness();
				$obj2->addUbicaciones($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UbicacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UbicacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(UbicacionesPeer::ID_ESTADO_UBICACION, EstadoUbicacionesPeer::ID_ESTADO_UBICACION);

		$rs = UbicacionesPeer::doSelectRS($criteria, $con);
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

		UbicacionesPeer::addSelectColumns($c);
		$startcol2 = (UbicacionesPeer::NUM_COLUMNS - UbicacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EstadoUbicacionesPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EstadoUbicacionesPeer::NUM_COLUMNS;

		$c->addJoin(UbicacionesPeer::ID_ESTADO_UBICACION, EstadoUbicacionesPeer::ID_ESTADO_UBICACION);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = UbicacionesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = EstadoUbicacionesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEstadoUbicaciones(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addUbicaciones($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initUbicacioness();
				$obj2->addUbicaciones($obj1);
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
		return UbicacionesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(UbicacionesPeer::ID_UBICACION); 

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
			$comparison = $criteria->getComparison(UbicacionesPeer::ID_UBICACION);
			$selectCriteria->add(UbicacionesPeer::ID_UBICACION, $criteria->remove(UbicacionesPeer::ID_UBICACION), $comparison);

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
			$affectedRows += UbicacionesPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(UbicacionesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(UbicacionesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ubicaciones) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UbicacionesPeer::ID_UBICACION, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += UbicacionesPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = UbicacionesPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/ArticulosXLote.php';

						$c = new Criteria();
			
			$c->add(ArticulosXLotePeer::ID_UBICACION, $obj->getIdUbicacion());
			$affectedRows += ArticulosXLotePeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Ubicaciones $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UbicacionesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UbicacionesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(UbicacionesPeer::DATABASE_NAME, UbicacionesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = UbicacionesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(UbicacionesPeer::DATABASE_NAME);

		$criteria->add(UbicacionesPeer::ID_UBICACION, $pk);


		$v = UbicacionesPeer::doSelect($criteria, $con);

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
			$criteria->add(UbicacionesPeer::ID_UBICACION, $pks, Criteria::IN);
			$objs = UbicacionesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseUbicacionesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/UbicacionesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.UbicacionesMapBuilder');
}
