<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;

/**
 * Class Customer
 *
 * Client Facade for all customer related calls
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Customer extends Api
{
	/**
	 * finds a customer by id
	 *
	 * @param int $customerId
	 *
	 * @return CustomerType
	 */
	public function get($customerId)
	{
		return $this->getEntity('getCustomer', 'customerid', $customerId);
	}

	/**
	 * returns customers by filter and ordering, pagination possible
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 *
	 * @return CustomerType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getCustomers', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns number of customers by filter
	 *
	 * @param Filter[] $filter
	 *
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getCustomersCount', $filter);
	}

	/**
	 * returns all customers who are repayable
	 *
	 * @return CustomerType[]
	 */
	public function repayable()
	{
		return $this->call('getCustomersRepayable');
	}

	/**
	 * creates a new customer
	 *
	 * @param CustomerType $customer
	 *
	 * @return CustomerType
	 */
	public function create(CustomerType $customer)
	{
		return $this->call('createCustomer', ['data' => $customer]);
	}

	/**
	 * updates a customer
	 *
	 * @param CustomerType $customer
	 * @param int|null $customerId overriding customer id to be used
	 *
	 * @return CustomerType
	 */
	public function update(CustomerType $customer, $customerId = null)
	{
		$customerId = ($customerId === null) ? $customer->getId() : $customerId;

		return $this->call('updateCustomer', ['customerid' => $customerId, 'data' => $customer]);
	}

	/**
	 * updates a customer, needs approval on gsales
	 *
	 * @param CustomerType $customer
	 * @param int|null $customerId overriding customer id to be used
	 *
	 * @return CustomerType
	 */
	public function updateProposal(CustomerType $customer, $customerId = null)
	{
		$customerId = ($customerId === null) ? $customer->getId() : $customerId;

		return $this->call('updateCustomerProposal', ['customerid' => $customerId, 'data' => $customer]);
	}

	/**
	 * deletes a customer
	 *
	 * @param Customer|int $customer
	 *
	 * @return bool
	 */
	public function delete($customer)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;

		return $this->call('deleteCustomer', ['customerid' => $customerId]);
	}
}