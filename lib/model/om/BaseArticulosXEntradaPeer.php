<?php


abstract class BaseArticulosXEntradaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'articulos_x_entrada';

	
	const CLASS_DEFAULT = 'lib.model.ArticulosXEntrada';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ARTICULO_X_ENTRADA = 'articulos_x_entrada.ID_ARTICULO_X_ENTRADA';

	
	const ID_ARTICULO = 'articulos_x_entrada.ID_ARTICULO';

	
	const ID_ENTRADA = 'articulos_x_entrada.ID_ENTRADA';

	
	const ID_UBICACION = 'articulos_x_entrada.ID_UBICACION';

	
	const LOTE = 'articulos_x_entrada.LOTE';

	
	const CREATED_AT = 'articulos_x_entrada.CREATED_AT';

	
	const UPDATED_AT = 'articulos_x_entrada.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXEntrada', 'IdArticulo', 'IdEntrada', 'IdUbicacion', 'Lote', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA, ArticulosXEntradaPeer::ID_ARTICULO, ArticulosXEntradaPeer::ID_ENTRADA, ArticulosXEntradaPeer::ID_UBICACION, ArticulosXEntradaPeer::LOTE, ArticulosXEntradaPeer::CREATED_AT, ArticulosXEntradaPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_entrada', 'id_articulo', 'id_entrada', 'id_ubicacion', 'lote', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdArticuloXEntrada' => 0, 'IdArticulo' => 1, 'IdEntrada' => 2, 'IdUbicacion' => 3, 'Lote' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA => 0, ArticulosXEntradaPeer::ID_ARTICULO => 1, ArticulosXEntradaPeer::ID_ENTRADA => 2, ArticulosXEntradaPeer::ID_UBICACION => 3, ArticulosXEntradaPeer::LOTE => 4, ArticulosXEntradaPeer::CREATED_AT => 5, ArticulosXEntradaPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id_articulo_x_entrada' => 0, 'id_articulo' => 1, 'id_entrada' => 2, 'id_ubicacion' => 3, 'lote' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticulosXEntradaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticulosXEntradaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticulosXEntradaPeer::getTableMap();
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
		return str_replace(ArticulosXEntradaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA);

		$criteria->addSelectColumn(ArticulosXEntradaPeer::ID_ARTICULO);

		$criteria->addSelectColumn(ArticulosXEntradaPeer::ID_ENTRADA);

		$criteria->addSelectColumn(ArticulosXEntradaPeer::ID_UBICACION);

		$criteria->addSelectColumn(ArticulosXEntradaPeer::LOTE);

		$criteria->addSelectColumn(ArticulosXEntradaPeer::CREATED_AT);

		$criteria->addSelectColumn(ArticulosXEntradaPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(articulos_x_entrada.ID_ARTICULO_X_ENTRADA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT articulos_x_entrada.ID_ARTICULO_X_ENTRADA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticulosXEntradaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticulosXEntradaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticulosXEntradaPeer::doSelectRS($criteria, $con);
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
		$objects = ArticulosXEntradaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticulosXEntradaPeer::populateObjects(ArticulosXEntradaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticulosXEntradaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticulosXEntradaPeer::getOMClass();
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
		return ArticulosXEntradaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA); 

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
			$comparison = $criteria->getComparison(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA);
			$selectCriteria->add(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA, $criteria->remove(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ArticulosXEntradaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticulosXEntradaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticulosXEntrada) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticulosXEntrada $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticulosXEntradaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticulosXEntradaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticulosXEntradaPeer::DATABASE_NAME, ArticulosXEntradaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticulosXEntradaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticulosXEntradaPeer::DATABASE_NAME);

		$criteria->add(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA, $pk);


		$v = ArticulosXEntradaPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticulosXEntradaPeer::ID_ARTICULO_X_ENTRADA, $pks, Criteria::IN);
			$objs = ArticulosXEntradaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticulosXEntradaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticulosXEntradaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticulosXEntradaMapBuilder');
}
