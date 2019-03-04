<?php

namespace ViaVia\SDK;

class Plans
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
	public function getPlans()
	{
		return $this->connection->get('plans');
	}
}