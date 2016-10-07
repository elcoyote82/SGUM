<?php


abstract class BaseClientesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'clientes';

	
	const CLASS_DEFAULT = 'lib.model.Clientes';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_CLIENTE = 'clientes.ID_CLIENTE';

	
	const ID_MD5_CLIENTE = 'clientes.ID_MD5_CLIENTE';

	
	const NOMBRE = 'clientes.NOMBRE';

	
	const CIF_NIF = 'clientes.CIF_NIF';

	
	const DIRECCION = 'clientes.DIRECCION';

	
	const POBLACION = 'clientes.POBLACION';

	
	const PROVINCIA = 'clientes.PROVINCIA';

	
	const CP = 'clientes.CP';

	
	const PAIS = 'clientes.PAIS';

	
	const TELEFONO = 'clientes.TELEFONO';

	
	const TELEFONO2 = 'clientes.TELEFONO2';

	
	const MOVIL = 'clientes.MOVIL';

	
	const FAX = 'clientes.FAX';

	
	const EMAIL = 'clientes.EMAIL';

	
	const WEB = 'clientes.WEB';

	
	const BORRADO = 'clientes.BORRADO';

	
	const CREATED_AT = 'clientes.CREATED_AT';

	
	const UPDATED_AT = 'clientes.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdCliente', 'IdMd5Cliente', 'Nombre', 'CifNif', 'Direccion', 'Poblacion', 'Provincia', 'Cp', 'Pais', 'Telefono', 'Telefono2', 'Movil', 'Fax', 'Email', 'Web', 'Borrado', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ClientesPeer::ID_CLIENTE, ClientesPeer::ID_MD5_CLIENTE, ClientesPeer::NOMBRE, ClientesPeer::CIF_NIF, ClientesPeer::DIRECCION, ClientesPeer::POBLACION, ClientesPeer::PROVINCIA, ClientesPeer::CP, ClientesPeer::PAIS, ClientesPeer::TELEFONO, ClientesPeer::TELEFONO2, ClientesPeer::MOVIL, ClientesPeer::FAX, ClientesPeer::EMAIL, ClientesPeer::WEB, ClientesPeer::BORRADO, ClientesPeer::CREATED_AT, ClientesPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_cliente', 'id_md5_cliente', 'nombre', 'cif_nif', 'direccion', 'poblacion', 'provincia', 'cp', 'pais', 'telefono', 'telefono2', 'movil', 'fax', 'email', 'web', 'borrado', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdCliente' => 0, 'IdMd5Cliente' => 1, 'Nombre' => 2, 'CifNif' => 3, 'Direccion' => 4, 'Poblacion' => 5, 'Provincia' => 6, 'Cp' => 7, 'Pais' => 8, 'Telefono' => 9, 'Telefono2' => 10, 'Movil' => 11, 'Fax' => 12, 'Email' => 13, 'Web' => 14, 'Borrado' => 15, 'CreatedAt' => 16, 'UpdatedAt' => 17, ),
		BasePeer::TYPE_COLNAME => array (ClientesPeer::ID_CLIENTE => 0, ClientesPeer::ID_MD5_CLIENTE => 1, ClientesPeer::NOMBRE => 2, ClientesPeer::CIF_NIF => 3, ClientesPeer::DIRECCION => 4, ClientesPeer::POBLACION => 5, ClientesPeer::PROVINCIA => 6, ClientesPeer::CP => 7, ClientesPeer::PAIS => 8, ClientesPeer::TELEFONO => 9, ClientesPeer::TELEFONO2 => 10, ClientesPeer::MOVIL => 11, ClientesPeer::FAX => 12, ClientesPeer::EMAIL => 13, ClientesPeer::WEB => 14, ClientesPeer::BORRADO => 15, ClientesPeer::CREATED_AT => 16, ClientesPeer::UPDATED_AT => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id_cliente' => 0, 'id_md5_cliente' => 1, 'nombre' => 2, 'cif_nif' => 3, 'direccion' => 4, 'poblacion' => 5, 'provincia' => 6, 'cp' => 7, 'pais' => 8, 'telefono' => 9, 'telefono2' => 10, 'movil' => 11, 'fax' => 12, 'email' => 13, 'web' => 14, 'borrado' => 15, 'created_at' => 16, 'updated_at' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ClientesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ClientesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ClientesPeer::getTableMap();
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
		return str_replace(ClientesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ClientesPeer::ID_CLIENTE);

		$criteria->addSelectColumn(ClientesPeer::ID_MD5_CLIENTE);

		$criteria->addSelectColumn(ClientesPeer::NOMBRE);

		$criteria->addSelectColumn(ClientesPeer::CIF_NIF);

		$criteria->addSelectColumn(ClientesPeer::DIRECCION);

		$criteria->addSelectColumn(ClientesPeer::POBLACION);

		$criteria->addSelectColumn(ClientesPeer::PROVINCIA);

		$criteria->addSelectColumn(ClientesPeer::CP);

		$criteria->addSelectColumn(ClientesPeer::PAIS);

		$criteria->addSelectColumn(ClientesPeer::TELEFONO);

		$criteria->addSelectColumn(ClientesPeer::TELEFONO2);

		$criteria->addSelectColumn(ClientesPeer::MOVIL);

		$criteria->addSelectColumn(ClientesPeer::FAX);

		$criteria->addSelectColumn(ClientesPeer::EMAIL);

		$criteria->addSelectColumn(ClientesPeer::WEB);

		$criteria->addSelectColumn(ClientesPeer::BORRADO);

		$criteria->addSelectColumn(ClientesPeer::CREATED_AT);

		$criteria->addSelectColumn(ClientesPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(clientes.ID_CLIENTE)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT clientes.ID_CLIENTE)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ClientesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ClientesPeer::doSelectRS($criteria, $con);
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
		$objects = ClientesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ClientesPeer::populateObjects(ClientesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ClientesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ClientesPeer::getOMClass();
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
		return ClientesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ClientesPeer::ID_CLIENTE); 

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
			$comparison = $criteria->getComparison(ClientesPeer::ID_CLIENTE);
			$selectCriteria->add(ClientesPeer::ID_CLIENTE, $criteria->remove(ClientesPeer::ID_CLIENTE), $comparison);

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
			$affectedRows += ClientesPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(ClientesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ClientesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Clientes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ClientesPeer::ID_CLIENTE, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += ClientesPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = ClientesPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Ventas.php';

						$c = new Criteria();
			
			$c->add(VentasPeer::ID_CLIENTE, $obj->getIdCliente());
			$affectedRows += VentasPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Clientes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ClientesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ClientesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ClientesPeer::DATABASE_NAME, ClientesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ClientesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ClientesPeer::DATABASE_NAME);

		$criteria->add(ClientesPeer::ID_CLIENTE, $pk);


		$v = ClientesPeer::doSelect($criteria, $con);

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
			$criteria->add(ClientesPeer::ID_CLIENTE, $pks, Criteria::IN);
			$objs = ClientesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseClientesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ClientesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ClientesMapBuilder');
}
