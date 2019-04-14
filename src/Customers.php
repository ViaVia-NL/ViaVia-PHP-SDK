<?php

namespace ViaVia\SDK;

use ViaVia\SDK\Model\Customer;

class Customers
{
	protected $connection;

	/**
	 * User constructor.
	 * @param Connection $connection
	 */
	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * @param Customer $customer
	 * @return mixed
	 * @throws \Exception
	 */
	public function upsertCustomer(Customer $customer)
	{
		if(getenv('VIAVIA_INTERNAL')) {
			\App\Jobs\upsertCustomer::dispatch($customer->toArray(), auth()->user());
		} else {
			return $this->connection->post('customers/upsert', $customer->toArray());
		}
	}
}