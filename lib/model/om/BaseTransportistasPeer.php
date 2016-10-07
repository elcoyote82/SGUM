<?php


abstract class BaseTransportistasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'transportistas';

	
	const CLASS_DEFAULT = 'lib.model.Transportistas';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_TRANSPORTISTA = 'transportistas.ID_TRANSPORTISTA';

	
	const NOMBRE = 'transportistas.NOMBRE';

	
	const APELLIDOS = 'transportistas.APELLIDOS';

	
	const TELEFONO = 'transportistas.TELEFONO';

	
	const EMPRESA = 'transportistas.EMPRESA';

	
	const CREATED_AT = 'transportistas.CREATED_AT';

	
	const UPDATED_AT = 'transportistas.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdTransportista', 'Nombre', 'Apellidos', 'Telefono', 'Empresa', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (TransportistasPeer::ID_TRANSPORTISTA, TransportistasPeer::NOMBRE, TransportistasPeer::APELLIDOS, TransportistasPeer::TELEFONO, TransportistasPeer::EMPRESA, TransportistasPeer::CREATED_AT, TransportistasPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_transportista', 'nombre', 'apellidos', 'telefono', 'empresa', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdTransportista' => 0, 'Nombre' => 1, 'Apellidos' => 2, 'Telefono' => 3, 'Empresa' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (TransportistasPeer::ID_TRANSPORTISTA => 0, TransportistasPeer::NOMBRE => 1, TransportistasPeer::APELLIDOS => 2, TransportistasPeer::TELEFONO => 3, TransportistasPeer::EMPRESA => 4, TransportistasPeer::CREATED_AT => 5, TransportistasPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id_transportista' => 0, 'nombre' => 1, 'apellidos' => 2, 'telefono' => 3, 'empresa' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TransportistasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TransportistasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TransportistasPeer::getTableMap();
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
		return str_replace(TransportistasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TransportistasPeer::ID_TRANSPORTISTA);

		$criteria->addSelectColumn(TransportistasPeer::NOMBRE);

		$criteria->addSelectColumn(TransportistasPeer::APELLIDOS);

		$criteria->addSelectColumn(TransportistasPeer::TELEFONO);

		$criteria->addSelectColumn(TransportistasPeer::EMPRESA);

		$criteria->addSelectColumn(TransportistasPeer::CREATED_AT);

		$criteria->addSelectColumn(TransportistasPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(transportistas.ID_TRANSPORTISTA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT transportistas.ID_TRANSPORTISTA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TransportistasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TransportistasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TransportistasPeer::doSelectRS($criteria, $con);
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
		$objects = TransportistasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TransportistasPeer::populateObjects(TransportistasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TransportistasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TransportistasPeer::getOMClass();
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
		return TransportistasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TransportistasPeer::ID_TRANSPORTISTA); 

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
			$comparison = $criteria->getComparison(TransportistasPeer::ID_TRANSPORTISTA);
			$selectCriteria->add(TransportistasPeer::ID_TRANSPORTISTA, $criteria->remove(TransportistasPeer::ID_TRANSPORTISTA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TransportistasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TransportistasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Transportistas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TransportistasPeer::ID_TRANSPORTISTA, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Transportistas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TransportistasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TransportistasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TransportistasPeer::DATABASE_NAME, TransportistasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TransportistasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TransportistasPeer::DATABASE_NAME);

		$criteria->add(TransportistasPeer::ID_TRANSPORTISTA, $pk);


		$v = TransportistasPeer::doSelect($criteria, $con);

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
			$criteria->add(TransportistasPeer::ID_TRANSPORTISTA, $pks, Criteria::IN);
			$objs = TransportistasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTransportistasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TransportistasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TransportistasMapBuilder');
}
