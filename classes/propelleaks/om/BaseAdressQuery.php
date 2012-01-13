<?php


/**
 * Base class that represents a query for the 'adress' table.
 *
 * 
 *
 * @method     AdressQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdressQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method     AdressQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     AdressQuery orderByPostCode($order = Criteria::ASC) Order by the post_code column
 *
 * @method     AdressQuery groupById() Group by the id column
 * @method     AdressQuery groupByPersonId() Group by the person_id column
 * @method     AdressQuery groupByCity() Group by the city column
 * @method     AdressQuery groupByPostCode() Group by the post_code column
 *
 * @method     AdressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdressQuery leftJoinPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person relation
 * @method     AdressQuery rightJoinPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person relation
 * @method     AdressQuery innerJoinPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the Person relation
 *
 * @method     Adress findOne(PropelPDO $con = null) Return the first Adress matching the query
 * @method     Adress findOneOrCreate(PropelPDO $con = null) Return the first Adress matching the query, or a new Adress object populated from the query conditions when no match is found
 *
 * @method     Adress findOneById(int $id) Return the first Adress filtered by the id column
 * @method     Adress findOneByPersonId(int $person_id) Return the first Adress filtered by the person_id column
 * @method     Adress findOneByCity(string $city) Return the first Adress filtered by the city column
 * @method     Adress findOneByPostCode(string $post_code) Return the first Adress filtered by the post_code column
 *
 * @method     array findById(int $id) Return Adress objects filtered by the id column
 * @method     array findByPersonId(int $person_id) Return Adress objects filtered by the person_id column
 * @method     array findByCity(string $city) Return Adress objects filtered by the city column
 * @method     array findByPostCode(string $post_code) Return Adress objects filtered by the post_code column
 *
 * @package    propel.generator.propelleaks.om
 */
abstract class BaseAdressQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAdressQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propelleaks', $modelName = 'Adress', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdressQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdressQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdressQuery) {
			return $criteria;
		}
		$query = new AdressQuery();
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
	 * @return    Adress|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AdressPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdressPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdressPeer::ID, $keys, Criteria::IN);
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
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdressPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the person_id column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByPersonId(1234); // WHERE person_id = 1234
	 * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
	 * $query->filterByPersonId(array('min' => 12)); // WHERE person_id > 12
	 * </code>
	 *
	 * @see       filterByPerson()
	 *
	 * @param     mixed $personId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function filterByPersonId($personId = null, $comparison = null)
	{
		if (is_array($personId)) {
			$useMinMax = false;
			if (isset($personId['min'])) {
				$this->addUsingAlias(AdressPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($personId['max'])) {
				$this->addUsingAlias(AdressPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdressPeer::PERSON_ID, $personId, $comparison);
	}

	/**
	 * Filter the query on the city column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
	 * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $city The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function filterByCity($city = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($city)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $city)) {
				$city = str_replace('*', '%', $city);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdressPeer::CITY, $city, $comparison);
	}

	/**
	 * Filter the query on the post_code column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByPostCode('fooValue');   // WHERE post_code = 'fooValue'
	 * $query->filterByPostCode('%fooValue%'); // WHERE post_code LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $postCode The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function filterByPostCode($postCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($postCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $postCode)) {
				$postCode = str_replace('*', '%', $postCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdressPeer::POST_CODE, $postCode, $comparison);
	}

	/**
	 * Filter the query by a related Person object
	 *
	 * @param     Person|PropelCollection $person The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function filterByPerson($person, $comparison = null)
	{
		if ($person instanceof Person) {
			return $this
				->addUsingAlias(AdressPeer::PERSON_ID, $person->getId(), $comparison);
		} elseif ($person instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdressPeer::PERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPerson() only accepts arguments of type Person or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Person relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function joinPerson($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Person');
		
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
			$this->addJoinObject($join, 'Person');
		}
		
		return $this;
	}

	/**
	 * Use the Person relation Person object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonQuery A secondary query class using the current class as primary query
	 */
	public function usePersonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPerson($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Person', 'PersonQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Adress $adress Object to remove from the list of results
	 *
	 * @return    AdressQuery The current query, for fluid interface
	 */
	public function prune($adress = null)
	{
		if ($adress) {
			$this->addUsingAlias(AdressPeer::ID, $adress->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAdressQuery
