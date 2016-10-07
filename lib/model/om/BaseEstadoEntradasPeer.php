<?php


abstract class BaseEstadoEntradasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'estado_entradas';

	
	const CLASS_DEFAULT = 'lib.model.EstadoEntradas';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ESTADO_ENTRADA = 'estado_entradas.ID_ESTADO_ENTRADA';

	
	const ESTADO_ENTRADA = 'estado_entradas.ESTADO_ENTRADA';

	
	const CREATED_AT = 'estado_entradas.CREATED_AT';

	
	const UPDATED_AT = 'estado_entradas.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoEntrada', 'EstadoEntrada', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (EstadoEntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ESTADO_ENTRADA, EstadoEntradasPeer::CREATED_AT, EstadoEntradasPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_entrada', 'estado_entrada', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdEstadoEntrada' => 0, 'EstadoEntrada' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, ),
		BasePeer::TYPE_COLNAME => array (EstadoEntradasPeer::ID_ESTADO_ENTRADA => 0, EstadoEntradasPeer::ESTADO_ENTRADA => 1, EstadoEntradasPeer::CREATED_AT => 2, EstadoEntradasPeer::UPDATED_AT => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('id_estado_entrada' => 0, 'estado_entrada' => 1, 'created_at' => 2, 'updated_at' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EstadoEntradasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EstadoEntradasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EstadoEntradasPeer::getTableMap();
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
		return str_replace(EstadoEntradasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EstadoEntradasPeer::ID_ESTADO_ENTRADA);

		$criteria->addSelectColumn(EstadoEntradasPeer::ESTADO_ENTRADA);

		$criteria->addSelectColumn(EstadoEntradasPeer::CREATED_AT);

		$criteria->addSelectColumn(EstadoEntradasPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(estado_entradas.ID_ESTADO_ENTRADA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT estado_entradas.ID_ESTADO_ENTRADA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EstadoEntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EstadoEntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EstadoEntradasPeer::doSelectRS($criteria, $con);
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
		$objects = EstadoEntradasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EstadoEntradasPeer::populateObjects(EstadoEntradasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EstadoEntradasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EstadoEntradasPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return EstadoEntradasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EstadoEntradasPeer::ID_ESTADO_ENTRADA); 

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
			$comparison = $criteria->getComparison(EstadoEntradasPeer::ID_ESTADO_ENTRADA);
			$selectCriteria->add(EstadoEntradasPeer::ID_ESTADO_ENTRADA, $criteria->remove(EstadoEntradasPeer::ID_ESTADO_ENTRADA), $comparison);

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
			$affectedRows += EstadoEntradasPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(EstadoEntradasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EstadoEntradasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EstadoEntradas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EstadoEntradasPeer::ID_ESTADO_ENTRADA, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += EstadoEntradasPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = EstadoEntradasPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Entradas.php';

						$c = new Criteria();
			
			$c->add(EntradasPeer::ID_ESTADO_ENTRADA, $obj->getIdEstadoEntrada());
			$affectedRows += EntradasPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(EstadoEntradas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EstadoEntradasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EstadoEntradasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EstadoEntradasPeer::DATABASE_NAME, EstadoEntradasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EstadoEntradasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EstadoEntradasPeer::DATABASE_NAME);

		$criteria->add(EstadoEntradasPeer::ID_ESTADO_ENTRADA, $pk);


		$v = EstadoEntradasPeer::doSelect($criteria, $con);

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
			$criteria->add(EstadoEntradasPeer::ID_ESTADO_ENTRADA, $pks, Criteria::IN);
			$objs = EstadoEntradasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEstadoEntradasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EstadoEntradasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EstadoEntradasMapBuilder');
}
