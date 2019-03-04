<?php

namespace ViaVia\SDK;

class User
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
	public function getCurrentUser()
	{
		return $this->connection->get('user/details');
	}

	/**
	 * @param $data
	 * @return mixed
	 * @throws \Exception
	 */
	public function registerUser($data)
	{
		return $this->connection->post('user/register', $data);
	}
}