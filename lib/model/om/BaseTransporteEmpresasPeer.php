<?php


abstract class BaseTransporteEmpresasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'transporte_empresas';

	
	const CLASS_DEFAULT = 'lib.model.TransporteEmpresas';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_TRANSPORTE_EMPRESA = 'transporte_empresas.ID_TRANSPORTE_EMPRESA';

	
	const ID_MD5_TRANSPORTE_EMPRESA = 'transporte_empresas.ID_MD5_TRANSPORTE_EMPRESA';

	
	const NOMBRE = 'transporte_empresas.NOMBRE';

	
	const CIF_NIF = 'transporte_empresas.CIF_NIF';

	
	const DIRECCION = 'transporte_empresas.DIRECCION';

	
	const POBLACION = 'transporte_empresas.POBLACION';

	
	const PROVINCIA = 'transporte_empresas.PROVINCIA';

	
	const CP = 'transporte_empresas.CP';

	
	const PAIS = 'transporte_empresas.PAIS';

	
	const TELEFONO = 'transporte_empresas.TELEFONO';

	
	const TELEFONO2 = 'transporte_empresas.TELEFONO2';

	
	const MOVIL = 'transporte_empresas.MOVIL';

	
	const FAX = 'transporte_empresas.FAX';

	
	const EMAIL = 'transporte_empresas.EMAIL';

	
	const WEB = 'transporte_empresas.WEB';

	
	const BORRADO = 'transporte_empresas.BORRADO';

	
	const CREATED_AT = 'transporte_empresas.CREATED_AT';

	
	const UPDATED_AT = 'transporte_empresas.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdTransporteEmpresa', 'IdMd5TransporteEmpresa', 'Nombre', 'CifNif', 'Direccion', 'Poblacion', 'Provincia', 'Cp', 'Pais', 'Telefono', 'Telefono2', 'Movil', 'Fax', 'Email', 'Web', 'Borrado', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA, TransporteEmpresasPeer::ID_MD5_TRANSPORTE_EMPRESA, TransporteEmpresasPeer::NOMBRE, TransporteEmpresasPeer::CIF_NIF, TransporteEmpresasPeer::DIRECCION, TransporteEmpresasPeer::POBLACION, TransporteEmpresasPeer::PROVINCIA, TransporteEmpresasPeer::CP, TransporteEmpresasPeer::PAIS, TransporteEmpresasPeer::TELEFONO, TransporteEmpresasPeer::TELEFONO2, TransporteEmpresasPeer::MOVIL, TransporteEmpresasPeer::FAX, TransporteEmpresasPeer::EMAIL, TransporteEmpresasPeer::WEB, TransporteEmpresasPeer::BORRADO, TransporteEmpresasPeer::CREATED_AT, TransporteEmpresasPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_transporte_empresa', 'id_md5_transporte_empresa', 'nombre', 'cif_nif', 'direccion', 'poblacion', 'provincia', 'cp', 'pais', 'telefono', 'telefono2', 'movil', 'fax', 'email', 'web', 'borrado', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdTransporteEmpresa' => 0, 'IdMd5TransporteEmpresa' => 1, 'Nombre' => 2, 'CifNif' => 3, 'Direccion' => 4, 'Poblacion' => 5, 'Provincia' => 6, 'Cp' => 7, 'Pais' => 8, 'Telefono' => 9, 'Telefono2' => 10, 'Movil' => 11, 'Fax' => 12, 'Email' => 13, 'Web' => 14, 'Borrado' => 15, 'CreatedAt' => 16, 'UpdatedAt' => 17, ),
		BasePeer::TYPE_COLNAME => array (TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA => 0, TransporteEmpresasPeer::ID_MD5_TRANSPORTE_EMPRESA => 1, TransporteEmpresasPeer::NOMBRE => 2, TransporteEmpresasPeer::CIF_NIF => 3, TransporteEmpresasPeer::DIRECCION => 4, TransporteEmpresasPeer::POBLACION => 5, TransporteEmpresasPeer::PROVINCIA => 6, TransporteEmpresasPeer::CP => 7, TransporteEmpresasPeer::PAIS => 8, TransporteEmpresasPeer::TELEFONO => 9, TransporteEmpresasPeer::TELEFONO2 => 10, TransporteEmpresasPeer::MOVIL => 11, TransporteEmpresasPeer::FAX => 12, TransporteEmpresasPeer::EMAIL => 13, TransporteEmpresasPeer::WEB => 14, TransporteEmpresasPeer::BORRADO => 15, TransporteEmpresasPeer::CREATED_AT => 16, TransporteEmpresasPeer::UPDATED_AT => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id_transporte_empresa' => 0, 'id_md5_transporte_empresa' => 1, 'nombre' => 2, 'cif_nif' => 3, 'direccion' => 4, 'poblacion' => 5, 'provincia' => 6, 'cp' => 7, 'pais' => 8, 'telefono' => 9, 'telefono2' => 10, 'movil' => 11, 'fax' => 12, 'email' => 13, 'web' => 14, 'borrado' => 15, 'created_at' => 16, 'updated_at' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TransporteEmpresasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TransporteEmpresasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TransporteEmpresasPeer::getTableMap();
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
		return str_replace(TransporteEmpresasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA);

		$criteria->addSelectColumn(TransporteEmpresasPeer::ID_MD5_TRANSPORTE_EMPRESA);

		$criteria->addSelectColumn(TransporteEmpresasPeer::NOMBRE);

		$criteria->addSelectColumn(TransporteEmpresasPeer::CIF_NIF);

		$criteria->addSelectColumn(TransporteEmpresasPeer::DIRECCION);

		$criteria->addSelectColumn(TransporteEmpresasPeer::POBLACION);

		$criteria->addSelectColumn(TransporteEmpresasPeer::PROVINCIA);

		$criteria->addSelectColumn(TransporteEmpresasPeer::CP);

		$criteria->addSelectColumn(TransporteEmpresasPeer::PAIS);

		$criteria->addSelectColumn(TransporteEmpresasPeer::TELEFONO);

		$criteria->addSelectColumn(TransporteEmpresasPeer::TELEFONO2);

		$criteria->addSelectColumn(TransporteEmpresasPeer::MOVIL);

		$criteria->addSelectColumn(TransporteEmpresasPeer::FAX);

		$criteria->addSelectColumn(TransporteEmpresasPeer::EMAIL);

		$criteria->addSelectColumn(TransporteEmpresasPeer::WEB);

		$criteria->addSelectColumn(TransporteEmpresasPeer::BORRADO);

		$criteria->addSelectColumn(TransporteEmpresasPeer::CREATED_AT);

		$criteria->addSelectColumn(TransporteEmpresasPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(transporte_empresas.ID_TRANSPORTE_EMPRESA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT transporte_empresas.ID_TRANSPORTE_EMPRESA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TransporteEmpresasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TransporteEmpresasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TransporteEmpresasPeer::doSelectRS($criteria, $con);
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
		$objects = TransporteEmpresasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TransporteEmpresasPeer::populateObjects(TransporteEmpresasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TransporteEmpresasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TransporteEmpresasPeer::getOMClass();
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
		return TransporteEmpresasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA); 

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
			$comparison = $criteria->getComparison(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA);
			$selectCriteria->add(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA, $criteria->remove(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA), $comparison);

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
			$affectedRows += TransporteEmpresasPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(TransporteEmpresasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TransporteEmpresasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TransporteEmpresas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += TransporteEmpresasPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = TransporteEmpresasPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/TransporteConductores.php';

						$c = new Criteria();
			
			$c->add(TransporteConductoresPeer::ID_TRANSPORTE_EMPRESA, $obj->getIdTransporteEmpresa());
			$affectedRows += TransporteConductoresPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(TransporteEmpresas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TransporteEmpresasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TransporteEmpresasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TransporteEmpresasPeer::DATABASE_NAME, TransporteEmpresasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TransporteEmpresasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TransporteEmpresasPeer::DATABASE_NAME);

		$criteria->add(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA, $pk);


		$v = TransporteEmpresasPeer::doSelect($criteria, $con);

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
			$criteria->add(TransporteEmpresasPeer::ID_TRANSPORTE_EMPRESA, $pks, Criteria::IN);
			$objs = TransporteEmpresasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTransporteEmpresasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TransporteEmpresasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TransporteEmpresasMapBuilder');
}
