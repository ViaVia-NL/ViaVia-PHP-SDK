<?php

namespace ViaVia\SDK;

class RedirectUri
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

	public function requestRedirectUri($channel, $type)
	{
		return $this->connection->post('redirecturi/new', ['channel' => $channel, 'type' => $type]);
	}
}