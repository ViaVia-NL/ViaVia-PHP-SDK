<?php

namespace ViaVia\SDK;

class ViaVia
{
	protected $connection;

	/**
	 * ViaVia constructor.
	 * @param Connection $connection
	 */
	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * @return User
	 */
	public function user()
	{
		return new User($this->connection);
	}

	/**
	 * @return Plans
	 */
	public function plans()
	{
		return new Plans($this->connection);
	}

	/**
	 * @return Payments
	 */
	public function payments()
	{
		return new Payments($this->connection);
	}

	/**
	 * @return Subscriptions
	 */
	public function subscriptions()
	{
		return new Subscriptions($this->connection);
	}

	/**
	 * @return Products
	 */
	public function products()
	{
		return new Products($this->connection);
	}

	/**
	 * @return Customers
	 */
	public function customers()
	{
		return new Customers($this->connection);
	}

	/**
	 * @return RedirectUri
	 */
	public function redirecturi()
	{
		return new RedirectUri($this->connection);
	}

}