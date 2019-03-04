<?php

namespace ViaVia\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class Connection
{
	protected $apiUrl = 'https://dashboard.viavia.cloud/api/';

	protected $apiKey;

	protected $client;

	public function __construct($apiKey = null)
	{
		$this->apiKey = $apiKey;
	}

	/**
	 * @return Client
	 */
	public function client()
	{
		if ($this->client) return $this->client;

		$clientConfig = [
			'base_uri' => $this->apiUrl,
			'verify' => false,
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
				'Authorization' => 'Bearer ' . $this->apiKey,
			]
		];

		$this->client = new Client($clientConfig);
		return $this->client;
	}

	/**
	 * @param $url
	 * @param array $params
	 * @return mixed
	 * @throws \Exception
	 */
	public function get($url, $params = [])
	{
		try {
			$result = $this->client()->get($url, ['query' => $params]);
			return $this->parseResponse($result);
		} catch (RequestException $e) {
			if ($e->hasResponse()) {
				$this->parseResponse($e->getResponse());
			}
			throw new \Exception($e->getMessage(), $e->getResponse()->getStatusCode());
		}
	}

	/**
	 * @param $url
	 * @param $body
	 * @return mixed
	 * @throws \Exception
	 */
	public function post($url, $body)
	{
		try {
			$result = $this->client()->post($url, ['form_params' => $body]);
			return $this->parseResponse($result);
		} catch (RequestException $e) {
			if ($e->hasResponse()) {
				$this->parseResponse($e->getResponse());
			}
			throw new \Exception($e->getResponse(), $e->getResponse()->getStatusCode());
		}
	}

	/**
	 * @param ResponseInterface $response
	 * @return mixed
	 * @throws \Exception
	 */
	public function parseResponse(ResponseInterface $response)
	{
		try {
			$responseBody = $response->getBody()->getContents();
			$resultArray = json_decode($responseBody, true);

			if ( ! is_array($resultArray)) {
				throw new \Exception(sprintf($response->getStatusCode(), $responseBody), $response->getStatusCode());
			}
			if (array_key_exists('error', $resultArray)
				&& is_array($resultArray['error'])
				&& array_key_exists('message', $resultArray['error'])
			) {
				throw new \Exception($resultArray['error']['message'], $resultArray['error']['code']);
			}
			return $resultArray;
		} catch (\RuntimeException $e) {
			throw new \Exception($e->getMessage());
		}
	}

}
