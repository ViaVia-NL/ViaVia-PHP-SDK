<?php

namespace ViaVia\SDK;

class CallBackUri
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

	public function requestCallBackUri($channel, $type, $reference)
	{
		return $this->connection->post('callbackuri/new', ['channel' => $channel, 'type' => $type, 'reference' => $reference]);
	}
}