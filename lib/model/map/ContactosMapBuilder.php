<?php



class ContactosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ContactosMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('contactos');
		$tMap->setPhpName('Contactos');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_CONTACTO', 'IdContacto', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_MD5_CONTACTO', 'IdMd5Contacto', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('ID_CONTACTADO', 'IdContactado', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ID_JEFE', 'IdJefe', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 45);

		$tMap->addColumn('APELLIDOS', 'Apellidos', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('PUESTO', 'Puesto', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CP', 'Cp', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('LOCALIDAD', 'Localidad', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PROVINCIA', 'Provincia', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PAIS', 'Pais', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EXT_TELEFONO', 'ExtTelefono', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('TELEFONO_TRABAJO', 'TelefonoTrabajo', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELEFONO_OTRO', 'TelefonoOtro', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MOVIL', 'Movil', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FAX', 'Fax', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EMAIL_DOS', 'EmailDos', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EMAIL_TRES', 'EmailTres', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('OPCION', 'Opcion', 'string', CreoleTypes::CHAR, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 