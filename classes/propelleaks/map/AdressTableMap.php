<?php



/**
 * This class defines the structure of the 'adress' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.propelleaks.map
 */
class AdressTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'propelleaks.map.AdressTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('adress');
		$this->setPhpName('Adress');
		$this->setClassname('Adress');
		$this->setPackage('propelleaks');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PERSON_ID', 'PersonId', 'INTEGER', 'person', 'ID', true, null, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', true, 128, null);
		$this->addColumn('POST_CODE', 'PostCode', 'VARCHAR', true, 128, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Person', 'Person', RelationMap::MANY_TO_ONE, array('person_id' => 'id', ), null, null);
	} // buildRelations()

} // AdressTableMap
