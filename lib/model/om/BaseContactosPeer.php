<?php


abstract class BaseContactosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contactos';

	
	const CLASS_DEFAULT = 'lib.model.Contactos';

	
	const NUM_COLUMNS = 25;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_CONTACTO = 'contactos.ID_CONTACTO';

	
	const ID_MD5_CONTACTO = 'contactos.ID_MD5_CONTACTO';

	
	const ID_CONTACTADO = 'contactos.ID_CONTACTADO';

	
	const ID_JEFE = 'contactos.ID_JEFE';

	
	const NOMBRE = 'contactos.NOMBRE';

	
	const APELLIDOS = 'contactos.APELLIDOS';

	
	const PUESTO = 'contactos.PUESTO';

	
	const DIRECCION = 'contactos.DIRECCION';

	
	const CP = 'contactos.CP';

	
	const LOCALIDAD = 'contactos.LOCALIDAD';

	
	const PROVINCIA = 'contactos.PROVINCIA';

	
	const PAIS = 'contactos.PAIS';

	
	const TELEFONO = 'contactos.TELEFONO';

	
	const EXT_TELEFONO = 'contactos.EXT_TELEFONO';

	
	const TELEFONO_TRABAJO = 'contactos.TELEFONO_TRABAJO';

	
	const TELEFONO_OTRO = 'contactos.TELEFONO_OTRO';

	
	const MOVIL = 'contactos.MOVIL';

	
	const FAX = 'contactos.FAX';

	
	const EMAIL = 'contactos.EMAIL';

	
	const EMAIL_DOS = 'contactos.EMAIL_DOS';

	
	const EMAIL_TRES = 'contactos.EMAIL_TRES';

	
	const OBSERVACIONES = 'contactos.OBSERVACIONES';

	
	const OPCION = 'contactos.OPCION';

	
	const CREATED_AT = 'contactos.CREATED_AT';

	
	const UPDATED_AT = 'contactos.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdContacto', 'IdMd5Contacto', 'IdContactado', 'IdJefe', 'Nombre', 'Apellidos', 'Puesto', 'Direccion', 'Cp', 'Localidad', 'Provincia', 'Pais', 'Telefono', 'ExtTelefono', 'TelefonoTrabajo', 'TelefonoOtro', 'Movil', 'Fax', 'Email', 'EmailDos', 'EmailTres', 'Observaciones', 'Opcion', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ContactosPeer::ID_CONTACTO, ContactosPeer::ID_MD5_CONTACTO, ContactosPeer::ID_CONTACTADO, ContactosPeer::ID_JEFE, ContactosPeer::NOMBRE, ContactosPeer::APELLIDOS, ContactosPeer::PUESTO, ContactosPeer::DIRECCION, ContactosPeer::CP, ContactosPeer::LOCALIDAD, ContactosPeer::PROVINCIA, ContactosPeer::PAIS, ContactosPeer::TELEFONO, ContactosPeer::EXT_TELEFONO, ContactosPeer::TELEFONO_TRABAJO, ContactosPeer::TELEFONO_OTRO, ContactosPeer::MOVIL, ContactosPeer::FAX, ContactosPeer::EMAIL, ContactosPeer::EMAIL_DOS, ContactosPeer::EMAIL_TRES, ContactosPeer::OBSERVACIONES, ContactosPeer::OPCION, ContactosPeer::CREATED_AT, ContactosPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_contacto', 'id_md5_contacto', 'id_contactado', 'id_jefe', 'nombre', 'apellidos', 'puesto', 'direccion', 'cp', 'localidad', 'provincia', 'pais', 'telefono', 'ext_telefono', 'telefono_trabajo', 'telefono_otro', 'movil', 'fax', 'email', 'email_dos', 'email_tres', 'observaciones', 'opcion', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdContacto' => 0, 'IdMd5Contacto' => 1, 'IdContactado' => 2, 'IdJefe' => 3, 'Nombre' => 4, 'Apellidos' => 5, 'Puesto' => 6, 'Direccion' => 7, 'Cp' => 8, 'Localidad' => 9, 'Provincia' => 10, 'Pais' => 11, 'Telefono' => 12, 'ExtTelefono' => 13, 'TelefonoTrabajo' => 14, 'TelefonoOtro' => 15, 'Movil' => 16, 'Fax' => 17, 'Email' => 18, 'EmailDos' => 19, 'EmailTres' => 20, 'Observaciones' => 21, 'Opcion' => 22, 'CreatedAt' => 23, 'UpdatedAt' => 24, ),
		BasePeer::TYPE_COLNAME => array (ContactosPeer::ID_CONTACTO => 0, ContactosPeer::ID_MD5_CONTACTO => 1, ContactosPeer::ID_CONTACTADO => 2, ContactosPeer::ID_JEFE => 3, ContactosPeer::NOMBRE => 4, ContactosPeer::APELLIDOS => 5, ContactosPeer::PUESTO => 6, ContactosPeer::DIRECCION => 7, ContactosPeer::CP => 8, ContactosPeer::LOCALIDAD => 9, ContactosPeer::PROVINCIA => 10, ContactosPeer::PAIS => 11, ContactosPeer::TELEFONO => 12, ContactosPeer::EXT_TELEFONO => 13, ContactosPeer::TELEFONO_TRABAJO => 14, ContactosPeer::TELEFONO_OTRO => 15, ContactosPeer::MOVIL => 16, ContactosPeer::FAX => 17, ContactosPeer::EMAIL => 18, ContactosPeer::EMAIL_DOS => 19, ContactosPeer::EMAIL_TRES => 20, ContactosPeer::OBSERVACIONES => 21, ContactosPeer::OPCION => 22, ContactosPeer::CREATED_AT => 23, ContactosPeer::UPDATED_AT => 24, ),
		BasePeer::TYPE_FIELDNAME => array ('id_contacto' => 0, 'id_md5_contacto' => 1, 'id_contactado' => 2, 'id_jefe' => 3, 'nombre' => 4, 'apellidos' => 5, 'puesto' => 6, 'direccion' => 7, 'cp' => 8, 'localidad' => 9, 'provincia' => 10, 'pais' => 11, 'telefono' => 12, 'ext_telefono' => 13, 'telefono_trabajo' => 14, 'telefono_otro' => 15, 'movil' => 16, 'fax' => 17, 'email' => 18, 'email_dos' => 19, 'email_tres' => 20, 'observaciones' => 21, 'opcion' => 22, 'created_at' => 23, 'updated_at' => 24, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ContactosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ContactosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContactosPeer::getTableMap();
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
		return str_replace(ContactosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContactosPeer::ID_CONTACTO);

		$criteria->addSelectColumn(ContactosPeer::ID_MD5_CONTACTO);

		$criteria->addSelectColumn(ContactosPeer::ID_CONTACTADO);

		$criteria->addSelectColumn(ContactosPeer::ID_JEFE);

		$criteria->addSelectColumn(ContactosPeer::NOMBRE);

		$criteria->addSelectColumn(ContactosPeer::APELLIDOS);

		$criteria->addSelectColumn(ContactosPeer::PUESTO);

		$criteria->addSelectColumn(ContactosPeer::DIRECCION);

		$criteria->addSelectColumn(ContactosPeer::CP);

		$criteria->addSelectColumn(ContactosPeer::LOCALIDAD);

		$criteria->addSelectColumn(ContactosPeer::PROVINCIA);

		$criteria->addSelectColumn(ContactosPeer::PAIS);

		$criteria->addSelectColumn(ContactosPeer::TELEFONO);

		$criteria->addSelectColumn(ContactosPeer::EXT_TELEFONO);

		$criteria->addSelectColumn(ContactosPeer::TELEFONO_TRABAJO);

		$criteria->addSelectColumn(ContactosPeer::TELEFONO_OTRO);

		$criteria->addSelectColumn(ContactosPeer::MOVIL);

		$criteria->addSelectColumn(ContactosPeer::FAX);

		$criteria->addSelectColumn(ContactosPeer::EMAIL);

		$criteria->addSelectColumn(ContactosPeer::EMAIL_DOS);

		$criteria->addSelectColumn(ContactosPeer::EMAIL_TRES);

		$criteria->addSelectColumn(ContactosPeer::OBSERVACIONES);

		$criteria->addSelectColumn(ContactosPeer::OPCION);

		$criteria->addSelectColumn(ContactosPeer::CREATED_AT);

		$criteria->addSelectColumn(ContactosPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(contactos.ID_CONTACTO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contactos.ID_CONTACTO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContactosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContactosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContactosPeer::doSelectRS($criteria, $con);
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
		$objects = ContactosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContactosPeer::populateObjects(ContactosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContactosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContactosPeer::getOMClass();
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
		return ContactosPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ContactosPeer::ID_CONTACTO); 

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
			$comparison = $criteria->getComparison(ContactosPeer::ID_CONTACTO);
			$selectCriteria->add(ContactosPeer::ID_CONTACTO, $criteria->remove(ContactosPeer::ID_CONTACTO), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ContactosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContactosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contactos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContactosPeer::ID_CONTACTO, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Contactos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContactosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContactosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContactosPeer::DATABASE_NAME, ContactosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContactosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContactosPeer::DATABASE_NAME);

		$criteria->add(ContactosPeer::ID_CONTACTO, $pk);


		$v = ContactosPeer::doSelect($criteria, $con);

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
			$criteria->add(ContactosPeer::ID_CONTACTO, $pks, Criteria::IN);
			$objs = ContactosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContactosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ContactosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ContactosMapBuilder');
}
