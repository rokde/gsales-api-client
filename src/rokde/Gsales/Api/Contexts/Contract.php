<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\Contract\BasePosition;
use Rokde\Gsales\Api\Types\Contract\CreateContract;
use Rokde\Gsales\Api\Types\Contract\Position;
use Rokde\Gsales\Api\Types\Contract\UpdateContract;
use Rokde\Gsales\Api\Types\ContractType;
use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;
use Rokde\Gsales\Api\Types\Type;

/**
 * Class Contract
 *
 * @package Rokde\Gsales\Api\Contexts
 */
class Contract extends Api
{
	/**
	 * returns a contract by id
	 *
	 * @param int $contractId
	 *
	 * @return \Rokde\Gsales\Api\Types\ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.1
	 */
	public function get($contractId)
	{
		return $this->getEntity('getRefund', 'contractid', $contractId);
	}

	/**
	 * returns contracts by filter and ordering, pagination possible
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 *
	 * @return \Rokde\Gsales\Api\Types\ContractType[]
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.2
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getContracts', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns all repayable contracts
	 *
	 * @return ContractType[]
	 */
	public function repayable()
	{
		return $this->call('getContractsRepayable');
	}

	/**
	 * processes all repayable contracts
	 *
	 * @return int
	 */
	public function processRepayable()
	{
		return $this->call('processContractsRepayable');
	}

	/**
	 * processes all repayable contracts for a customer
	 *
	 * @param int|CustomerType $customer
	 *
	 * @return int
	 */
	public function processRepayableForCustomer($customer)
	{
		$customerId = Type::getId($customer);

		return $this->call('processContractsRepayableForCustomerId', ['customerid' => $customerId]);
	}

	/**
	 * processes a defined repayable contract
	 *
	 * @param int|ContractType $contract
	 *
	 * @return int
	 */
	public function processRepayableContract($contract)
	{
		$contractId = Type::getId($contract);

		return $this->call('processContractRepayableNow', ['contractid' => $contractId]);
	}

	/**
	 * returns number of invoices by filter
	 *
	 * @param Filter[] $filter
	 *
	 * @return int
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.3
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getContractsCount', $filter);
	}

	/**
	 * enables a contract
	 *
	 * @param int|ContractType $contract
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.4
	 */
	public function enable($contract)
	{
		return $this->modifyState('setContractStateEnabled', 'contractid', $contract);
	}

	/**
	 * disables a contract
	 *
	 * @param int|ContractType $contract
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.5
	 */
	public function disable($contract)
	{
		return $this->modifyState('setContractStateDisabled', 'contractid', $contract);
	}

	/**
	 * creates a contract position
	 *
	 * @param int|ContractType $contract
	 * @param BasePosition $position
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.6
	 */
	public function createPosition($contract, BasePosition $position)
	{
		$contractId = Type::getId($contract);

		return $this->call('createContractPosition', ['contractid' => $contractId, 'data' => $position]);
	}

	/**
	 * updates a contract position
	 *
	 * @param int|ContractType $contract
	 * @param \Rokde\Gsales\Api\Types\Contract\Position $position
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.7
	 */
	public function updatePosition($contract, Position $position)
	{
		$contractId = Type::getId($contract);
		$positionId = $position->getId();

		return $this->call('updateContractPosition', ['contractid' => $contractId, 'positionid' => $positionId, 'data' => $position]);
	}

	/**
	 * deletes a contract position
	 *
	 * @param int|ContractType $contract
	 * @param int|\Rokde\Gsales\Api\Types\Contract\Position $position
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.8
	 */
	public function deletePosition($contract, $position)
	{
		$contractId = Type::getId($contract);
		$positionId = Type::getId($position);

		return $this->call('deleteContractPosition', ['contractid' => $contractId, 'positionid' => $positionId]);
	}

	/**
	 * deletes a contract
	 *
	 * @param int|ContractType $contract
	 *
	 * @return bool
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.9
	 */
	public function delete($contract)
	{
		$contractId = Type::getId($contract);

		return $this->call('deleteContract', ['contractid' => $contractId]);
	}

	/**
	 * create a contract for a customer
	 *
	 * @param int|CustomerType $customer
	 * @param CreateContract $contract
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.10
	 */
	public function createForCustomer($customer, CreateContract $contract)
	{
		$customerId = Type::getId($customer);

		return $this->call('createContractForCustomer', ['customerid' => $customerId, 'data' => $contract]);
	}

	/**
	 * updates a contract
	 *
	 * @param int|ContractType $contract
	 * @param UpdateContract $data
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.11
	 */
	public function update($contract, UpdateContract $data)
	{
		$contractId = Type::getId($contract);

		return $this->call('updateContract', ['contractid' => $contractId, 'data' => $data]);
	}

	/**
	 * updates end date of contract
	 *
	 * @param int|ContractType $contract
	 * @param int $month
	 * @param int $year
	 *
	 * @return ContractType
	 *
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.12
	 */
	public function updateEndDate($contract, $month, $year)
	{
		$contractId = Type::getId($contract);

		return $this->call('updateContractEndDate', ['contractid' => $contractId, 'month' => $month, 'year' => $year]);
	}

	/**
	 * removes end date of contract
	 *
	 * @param int|ContractType $contract
	 *
	 * @return ContractType
	 *
	 * @since api 2.3
	 * @see http://www.gsales.de/api_documentation.pdf#9.5.13
	 */
	public function removeEndDate($contract)
	{
		$contractId = Type::getId($contract);

		return $this->call('updateContractEndDate', ['contractid' => $contractId]);
	}
}