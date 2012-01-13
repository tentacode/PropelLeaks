<?php


/**
 * Base class that represents a query for the 'person' table.
 *
 * 
 *
 * @method     PersonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PersonQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     PersonQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     PersonQuery groupById() Group by the id column
 * @method     PersonQuery groupByName() Group by the name column
 * @method     PersonQuery groupByEmail() Group by the email column
 *
 * @method     PersonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PersonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PersonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PersonQuery leftJoinAdress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Adress relation
 * @method     PersonQuery rightJoinAdress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Adress relation
 * @method     PersonQuery innerJoinAdress($relationAlias = null) Adds a INNER JOIN clause to the query using the Adress relation
 *
 * @method     Person findOne(PropelPDO $con = null) Return the first Person matching the query
 * @method     Person findOneOrCreate(PropelPDO $con = null) Return the first Person matching the query, or a new Person object populated from the query conditions when no match is found
 *
 * @method     Person findOneById(int $id) Return the first Person filtered by the id column
 * @method     Person findOneByName(string $name) Return the first Person filtered by the name column
 * @method     Person findOneByEmail(string $email) Return the first Person filtered by the email column
 *
 * @method     array findById(int $id) Return Person objects filtered by the id column
 * @method     array findByName(string $name) Return Person objects filtered by the name column
 * @method     array findByEmail(string $email) Return Person objects filtered by the email column
 *
 * @package    propel.generator.propelleaks.om
 */
abstract class BasePersonQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePersonQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propelleaks', $modelName = 'Person', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PersonQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PersonQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PersonQuery) {
			return $criteria;
		}
		$query = new PersonQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Person|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PersonPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PersonPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PersonPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PersonPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PersonPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
	 * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $email The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PersonPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query by a related Adress object
	 *
	 * @param     Adress $adress  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function filterByAdress($adress, $comparison = null)
	{
		if ($adress instanceof Adress) {
			return $this
				->addUsingAlias(PersonPeer::ID, $adress->getPersonId(), $comparison);
		} elseif ($adress instanceof PropelCollection) {
			return $this
				->useAdressQuery()
					->filterByPrimaryKeys($adress->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAdress() only accepts arguments of type Adress or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Adress relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function joinAdress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Adress');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Adress');
		}
		
		return $this;
	}

	/**
	 * Use the Adress relation Adress object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdressQuery A secondary query class using the current class as primary query
	 */
	public function useAdressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdress($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Adress', 'AdressQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Person $person Object to remove from the list of results
	 *
	 * @return    PersonQuery The current query, for fluid interface
	 */
	public function prune($person = null)
	{
		if ($person) {
			$this->addUsingAlias(PersonPeer::ID, $person->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePersonQuery
