<?php namespace Rokde\Gsales\Api\Contexts;

use Rokde\Gsales\Api\Types\Contract\BasePosition;
use Rokde\Gsales\Api\Types\Contract\CreateContract;
use Rokde\Gsales\Api\Types\Contract\Position;
use Rokde\Gsales\Api\Types\Contract\UpdateContract;
use Rokde\Gsales\Api\Types\ContractType;
use Rokde\Gsales\Api\Types\CustomerType;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;

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
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;

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
		$contractId = ($contract instanceof CustomerType) ? $contract->getId() : $contract;

		return $this->call('processContractRepayableNow', ['contractid' => $contractId]);
	}

	/**
	 * returns number of invoices by filter
	 *
	 * @param Filter[] $filter
	 *
	 * @return int
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
	 */
	public function createPosition($contract, BasePosition $position)
	{
		$contractId = ($contract instanceof ContractType) ? $contract->getId() : $contract;

		return $this->call('createContractPosition', ['contractid' => $contractId, 'data' => $position]);
	}

	/**
	 * updates a contract position
	 *
	 * @param int|ContractType $contract
	 * @param \Rokde\Gsales\Api\Types\Contract\Position $position
	 *
	 * @return ContractType
	 */
	public function updatePosition($contract, Position $position)
	{
		$contractId = ($contract instanceof ContractType) ? $contract->getId() : $contract;
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
	 */
	public function deletePosition($contract, $position)
	{
		$contractId = ($contract instanceof ContractType) ? $contract->getId() : $contract;
		$positionId = ($position instanceof Position) ? $position->getId() : $position;

		return $this->call('deleteContractPosition', ['contractid' => $contractId, 'positionid' => $positionId]);
	}

	/**
	 * deletes a contract
	 *
	 * @param int|ContractType $contract
	 *
	 * @return bool
	 */
	public function delete($contract)
	{
		$contractId = ($contract instanceof ContractType) ? $contract->getId() : $contract;

		return $this->call('deleteContract', ['contractid' => $contractId]);
	}

	/**
	 * create a contract for a customer
	 *
	 * @param int|CustomerType $customer
	 * @param CreateContract $contract
	 *
	 * @return ContractType
	 */
	public function createForCustomer($customer, CreateContract $contract)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;

		return $this->call('createContractForCustomer', ['customerid' => $customerId, 'data' => $contract]);
	}

	/**
	 * updates a contract
	 *
	 * @param int|ContractType $contract
	 * @param UpdateContract $data
	 *
	 * @return ContractType
	 */
	public function update($contract, UpdateContract $data)
	{
		$contractId = ($contract instanceof ContractType) ? $contract->getId() : $contract;

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
	 */
	public function updateEndDate($contract, $month, $year)
	{
		$contractId = ($contract instanceof ContractType) ? $contract->getId() : $contract;

		return $this->call('updateContractEndDate', ['contractid' => $contractId, 'month' => $month, 'year' => $year]);
	}
}