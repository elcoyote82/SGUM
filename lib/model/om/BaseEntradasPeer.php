<?php


abstract class BaseEntradasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'entradas';

	
	const CLASS_DEFAULT = 'lib.model.Entradas';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_ENTRADA = 'entradas.ID_ENTRADA';

	
	const ID_MD5_ENTRADA = 'entradas.ID_MD5_ENTRADA';

	
	const ID_PEDIDO = 'entradas.ID_PEDIDO';

	
	const ID_TRANSPORTE_CONDUCTOR = 'entradas.ID_TRANSPORTE_CONDUCTOR';

	
	const ID_ESTADO_ENTRADA = 'entradas.ID_ESTADO_ENTRADA';

	
	const NUM_ENTRADA = 'entradas.NUM_ENTRADA';

	
	const CREATED_AT = 'entradas.CREATED_AT';

	
	const UPDATED_AT = 'entradas.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdEntrada', 'IdMd5Entrada', 'IdPedido', 'IdTransporteConductor', 'IdEstadoEntrada', 'NumEntrada', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (EntradasPeer::ID_ENTRADA, EntradasPeer::ID_MD5_ENTRADA, EntradasPeer::ID_PEDIDO, EntradasPeer::ID_TRANSPORTE_CONDUCTOR, EntradasPeer::ID_ESTADO_ENTRADA, EntradasPeer::NUM_ENTRADA, EntradasPeer::CREATED_AT, EntradasPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id_entrada', 'id_md5_entrada', 'id_pedido', 'id_transporte_conductor', 'id_estado_entrada', 'num_entrada', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdEntrada' => 0, 'IdMd5Entrada' => 1, 'IdPedido' => 2, 'IdTransporteConductor' => 3, 'IdEstadoEntrada' => 4, 'NumEntrada' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (EntradasPeer::ID_ENTRADA => 0, EntradasPeer::ID_MD5_ENTRADA => 1, EntradasPeer::ID_PEDIDO => 2, EntradasPeer::ID_TRANSPORTE_CONDUCTOR => 3, EntradasPeer::ID_ESTADO_ENTRADA => 4, EntradasPeer::NUM_ENTRADA => 5, EntradasPeer::CREATED_AT => 6, EntradasPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id_entrada' => 0, 'id_md5_entrada' => 1, 'id_pedido' => 2, 'id_transporte_conductor' => 3, 'id_estado_entrada' => 4, 'num_entrada' => 5, 'created_at' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EntradasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EntradasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EntradasPeer::getTableMap();
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
		return str_replace(EntradasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EntradasPeer::ID_ENTRADA);

		$criteria->addSelectColumn(EntradasPeer::ID_MD5_ENTRADA);

		$criteria->addSelectColumn(EntradasPeer::ID_PEDIDO);

		$criteria->addSelectColumn(EntradasPeer::ID_TRANSPORTE_CONDUCTOR);

		$criteria->addSelectColumn(EntradasPeer::ID_ESTADO_ENTRADA);

		$criteria->addSelectColumn(EntradasPeer::NUM_ENTRADA);

		$criteria->addSelectColumn(EntradasPeer::CREATED_AT);

		$criteria->addSelectColumn(EntradasPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(entradas.ID_ENTRADA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT entradas.ID_ENTRADA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EntradasPeer::doSelectRS($criteria, $con);
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
		$objects = EntradasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EntradasPeer::populateObjects(EntradasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EntradasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EntradasPeer::getOMClass();
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
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$rs = EntradasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTransporteConductores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$rs = EntradasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEstadoEntradas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);

		$rs = EntradasPeer::doSelectRS($criteria, $con);
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

		EntradasPeer::addSelectColumns($c);
		$startcol = (EntradasPeer::NUM_COLUMNS - EntradasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PedidosPeer::addSelectColumns($c);

		$c->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasPeer::getOMClass();

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
										$temp_obj2->addEntradas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEntradass();
				$obj2->addEntradas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTransporteConductores(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasPeer::addSelectColumns($c);
		$startcol = (EntradasPeer::NUM_COLUMNS - EntradasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TransporteConductoresPeer::addSelectColumns($c);

		$c->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TransporteConductoresPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEntradas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEntradass();
				$obj2->addEntradas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEstadoEntradas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasPeer::addSelectColumns($c);
		$startcol = (EntradasPeer::NUM_COLUMNS - EntradasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EstadoEntradasPeer::addSelectColumns($c);

		$c->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EstadoEntradasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEstadoEntradas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEntradas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEntradass();
				$obj2->addEntradas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$criteria->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$criteria->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);

		$rs = EntradasPeer::doSelectRS($criteria, $con);
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

		EntradasPeer::addSelectColumns($c);
		$startcol2 = (EntradasPeer::NUM_COLUMNS - EntradasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PedidosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PedidosPeer::NUM_COLUMNS;

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TransporteConductoresPeer::NUM_COLUMNS;

		EstadoEntradasPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EstadoEntradasPeer::NUM_COLUMNS;

		$c->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$c->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$c->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasPeer::getOMClass();


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
					$temp_obj2->addEntradas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEntradass();
				$obj2->addEntradas($obj1);
			}


					
			$omClass = TransporteConductoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEntradas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEntradass();
				$obj3->addEntradas($obj1);
			}


					
			$omClass = EstadoEntradasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEstadoEntradas(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addEntradas($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initEntradass();
				$obj4->addEntradas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptPedidos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$criteria->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);

		$rs = EntradasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTransporteConductores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$criteria->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);

		$rs = EntradasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEstadoEntradas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EntradasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EntradasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$criteria->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$rs = EntradasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptPedidos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasPeer::addSelectColumns($c);
		$startcol2 = (EntradasPeer::NUM_COLUMNS - EntradasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TransporteConductoresPeer::NUM_COLUMNS;

		EstadoEntradasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoEntradasPeer::NUM_COLUMNS;

		$c->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);

		$c->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TransporteConductoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEntradas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEntradass();
				$obj2->addEntradas($obj1);
			}

			$omClass = EstadoEntradasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoEntradas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEntradas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEntradass();
				$obj3->addEntradas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTransporteConductores(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasPeer::addSelectColumns($c);
		$startcol2 = (EntradasPeer::NUM_COLUMNS - EntradasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PedidosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PedidosPeer::NUM_COLUMNS;

		EstadoEntradasPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EstadoEntradasPeer::NUM_COLUMNS;

		$c->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$c->addJoin(EntradasPeer::ID_ESTADO_ENTRADA, EstadoEntradasPeer::ID_ESTADO_ENTRADA);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasPeer::getOMClass();

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
					$temp_obj2->addEntradas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEntradass();
				$obj2->addEntradas($obj1);
			}

			$omClass = EstadoEntradasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEstadoEntradas(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEntradas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEntradass();
				$obj3->addEntradas($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstadoEntradas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EntradasPeer::addSelectColumns($c);
		$startcol2 = (EntradasPeer::NUM_COLUMNS - EntradasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PedidosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PedidosPeer::NUM_COLUMNS;

		TransporteConductoresPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TransporteConductoresPeer::NUM_COLUMNS;

		$c->addJoin(EntradasPeer::ID_PEDIDO, PedidosPeer::ID_PEDIDO);

		$c->addJoin(EntradasPeer::ID_TRANSPORTE_CONDUCTOR, TransporteConductoresPeer::ID_TRANSPORTE_CONDUCTOR);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EntradasPeer::getOMClass();

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
					$temp_obj2->addEntradas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEntradass();
				$obj2->addEntradas($obj1);
			}

			$omClass = TransporteConductoresPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTransporteConductores(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEntradas($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEntradass();
				$obj3->addEntradas($obj1);
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
		return EntradasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EntradasPeer::ID_ENTRADA); 

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
			$comparison = $criteria->getComparison(EntradasPeer::ID_ENTRADA);
			$selectCriteria->add(EntradasPeer::ID_ENTRADA, $criteria->remove(EntradasPeer::ID_ENTRADA), $comparison);

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
			$affectedRows += EntradasPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(EntradasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EntradasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Entradas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EntradasPeer::ID_ENTRADA, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += EntradasPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = EntradasPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/AlbaranesEntrada.php';

						$c = new Criteria();
			
			$c->add(AlbaranesEntradaPeer::ID_ENTRADA, $obj->getIdEntrada());
			$affectedRows += AlbaranesEntradaPeer::doDelete($c, $con);

			include_once 'lib/model/EntradasXArticulo.php';

						$c = new Criteria();
			
			$c->add(EntradasXArticuloPeer::ID_ENTRADA, $obj->getIdEntrada());
			$affectedRows += EntradasXArticuloPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Entradas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EntradasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EntradasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EntradasPeer::DATABASE_NAME, EntradasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EntradasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EntradasPeer::DATABASE_NAME);

		$criteria->add(EntradasPeer::ID_ENTRADA, $pk);


		$v = EntradasPeer::doSelect($criteria, $con);

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
			$criteria->add(EntradasPeer::ID_ENTRADA, $pks, Criteria::IN);
			$objs = EntradasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEntradasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EntradasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EntradasMapBuilder');
}
