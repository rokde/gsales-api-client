<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 14:33
 */

namespace Rokde\Gsales\Api\Contexts;


use Rokde\Gsales\Api\Exceptions\ApiException;
use Rokde\Gsales\Api\Exceptions\CustomerAuthenticationException;
use Rokde\Gsales\Api\Exceptions\CustomerFrontendException;
use Rokde\Gsales\Api\Exceptions\CustomerNotFoundException;
use Rokde\Gsales\Api\Types\CustomerType;

class Authentication extends Api {

	/**
	 * Saves a token for the customer so he can set a new password in the frontend
	 *
	 * @param Customer|int $customer
	 * @param string $newPassword
	 * @return bool
	 */
	public function passwordLost($customer, $newPassword)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;
		$password = $this->prepareMd5PasswordParameter($newPassword);

		return $this->call('customerFrontendPasswordLost', ['customerid' => $customerId, 'md5password' => $password]);
	}

	/**
	 * Saves a password for the customer login (frontend)
	 *
	 * @param Customer|int $customer
	 * @param string $newPassword
	 * @return bool
	 */
	public function changePassword($customer, $newPassword)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;
		$password = $this->prepareMd5PasswordParameter($newPassword);

		return $this->call('changeCustomerFrontendPassword', ['customerid' => $customerId, 'md5password' => $password]);
	}

	/**
	 * does the customer frontend login
	 *
	 * @param Customer|string $customer Customer to retrieve data automatically or the credential
	 * @param string $password
	 * @param bool $forceEmail
	 * @param bool $forceCustomerNumber
	 * @return int customer id
	 * @throws ApiException when credentials not set correct (argument validation)
	 * @throws CustomerNotFoundException when no customer found for credentials
	 * @throws CustomerAuthenticationException when credentials are incorrect
	 */
	public function login($customer, $password, $forceEmail = false, $forceCustomerNumber = false)
	{
		$customerNoOrEmail = $this->prepareCustomerNumberOrEmailParameter($customer, $forceEmail, $forceCustomerNumber);
		if (empty($customerNoOrEmail))
		{
			throw new ApiException('Customer could not be identified if customer number or email is missing');
		}
		$password = $this->prepareMd5PasswordParameter($password);

		$result = $this->call('doCustomerFrontendLogin', ['customernooremail' => $customerNoOrEmail, 'md5password' => $password]);

		switch ($result)
		{
			case -1:
				throw new CustomerAuthenticationException('Customer can not be identified by given credentials', -1);
			case -2:
				throw new CustomerNotFoundException('Customer not found', -2);
			case -3:
				throw new CustomerAuthenticationException('Customer can not be logged', -3);// no password set or frontend not activated
			case -4:
				throw new CustomerAuthenticationException('Password is wrong', -4);
		}

		return $result;
	}

	/**
	 * enables the customer frontend login
	 *
	 * @param Customer|string $customer Customer to retrieve data automatically or the credential
	 * @param bool $forceEmail
	 * @param bool $forceCustomerNumber
	 * @throws \Rokde\Gsales\Api\Exceptions\ApiException
	 * @throws \Rokde\Gsales\Api\Exceptions\CustomerNotFoundException
	 * @throws \Rokde\Gsales\Api\Exceptions\CustomerFrontendException
	 * @throws \Rokde\Gsales\Api\Exceptions\CustomerAuthenticationException
	 * @return bool
	 */
	public function enableLogin($customer, $forceEmail = false, $forceCustomerNumber = false)
	{
		$customerNoOrEmail = $this->prepareCustomerNumberOrEmailParameter($customer, $forceEmail, $forceCustomerNumber);
		if (empty($customerNoOrEmail))
		{
			throw new ApiException('Customer could not be identified if customer number or email is missing');
		}

		$result = $this->call('doCustomerFrontendLogin', ['customernooremail' => $customerNoOrEmail]);

		switch ($result)
		{
			case -1:
				throw new CustomerAuthenticationException('Customer can not be identified by given credentials', -1);
			case -2:
				throw new CustomerNotFoundException('Customer not found', -2);
			case -3:
				//  frontend is already enabled
				return true;
			case -4:
				throw new CustomerFrontendException('Frontend could not be enabled', -4);
		}

		return ($result == 1);
	}

	/**
	 * enables the customer frontend login, using the customer id
	 *
	 * @param Customer|int $customer
	 * @return bool
	 */
	public function enableLoginById($customer)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;

		return $this->call('enableCustomerFrontendLoginById', ['customerid' => $customerId]);
	}

	/**
	 * disables the customer frontend login
	 *
	 * @param Customer|string $customer Customer to retrieve data automatically or the credential
	 * @param bool $forceEmail
	 * @param bool $forceCustomerNumber
	 * @throws \Rokde\Gsales\Api\Exceptions\ApiException
	 * @throws \Rokde\Gsales\Api\Exceptions\CustomerNotFoundException
	 * @throws \Rokde\Gsales\Api\Exceptions\CustomerFrontendException
	 * @throws \Rokde\Gsales\Api\Exceptions\CustomerAuthenticationException
	 * @return bool
	 */
	public function disableLogin($customer, $forceEmail = false, $forceCustomerNumber = false)
	{
		$customerNoOrEmail = $this->prepareCustomerNumberOrEmailParameter($customer, $forceEmail, $forceCustomerNumber);
		if (empty($customerNoOrEmail))
		{
			throw new ApiException('Customer could not be identified if customer number or email is missing');
		}

		$result = $this->call('disableCustomerFrontendLogin', ['customernooremail' => $customerNoOrEmail]);

		switch ($result)
		{
			case -1:
				throw new CustomerAuthenticationException('Customer can not be identified by given credentials', -1);
			case -2:
				throw new CustomerNotFoundException('Customer not found', -2);
			case -3:
				throw new CustomerFrontendException('Frontend could not be disabled', -3);
		}

		return ($result == 1);
	}

	/**
	 * disables the customer frontend login, using the customer id
	 *
	 * @param Customer|int $customer
	 * @return bool
	 */
	public function disableLoginById($customer)
	{
		$customerId = ($customer instanceof CustomerType) ? $customer->getId() : $customer;

		return $this->call('disableCustomerFrontendLoginById', ['customerid' => $customerId]);
	}

	/**
	 * prepares parameter md5password for api call
	 *
	 * @param string $password
	 * @return string
	 */
	private function prepareMd5PasswordParameter($password)
	{
		$password = md5($password);
		return $password;
	}

	/**
	 * prepares parameter customernooremail for api call
	 *
	 * @param Customer|string $customer
	 * @param bool $forceEmail
	 * @param bool $forceCustomerNumber
	 * @return string
	 */
	private function prepareCustomerNumberOrEmailParameter($customer, $forceEmail, $forceCustomerNumber)
	{
		$customerNoOrEmail = $customer;
		if ($customer instanceof CustomerType)
		{
			$customerNoOrEmail = $customer->getCustomerNumberOrEmail();
			if ($forceEmail) {
				$customerNoOrEmail = $customer->getEmail();
			}
			if ($forceCustomerNumber) {
				$customerNoOrEmail = $customer->getCustomerNumber();
			}
		}

		return $customerNoOrEmail;
	}
} 