<?php

namespace ViaVia\SDK;

class Subscriptions
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
	 * @return mixed
	 * @throws \Exception
	 */
	public function isActive()
	{
		return $this->connection->get('subscriptions/isactive');
	}

	/**
	 * @return mixed
	 * @throws \Exception
	 */
	public function getActiveSubscription()
	{
		return $this->connection->get('subscriptions/active');
	}

	/**
	 * @param $planId
	 * @return mixed
	 * @throws \Exception
	 */
	public function newSubscription($planId)
	{
		return $this->connection->post('subscriptions/new', ['plan_id' => $planId]);
	}
}