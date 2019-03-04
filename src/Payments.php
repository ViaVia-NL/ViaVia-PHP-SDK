<?php

namespace ViaVia\SDK;

class Payments
{
	protected $connection;

	/**
	 * Plans constructor.
	 * @param Connection $connection
	 */
	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * @return mixed
	 * @throws \Exception
	 */
	public function getPayments()
	{
		return $this->connection->get('payments');
	}
}