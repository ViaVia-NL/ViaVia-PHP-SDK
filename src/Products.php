<?php

namespace ViaVia\SDK;

use ViaVia\SDK\Model\Product;

class Products
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
	 * @param Product $product
	 * @return mixed
	 * @throws \Exception
	 */
	public function upsertProduct(Product $product)
	{
		if(getenv('VIAVIA_INTERNAL')) {
			\App\Jobs\upsertProduct::dispatch($product->toArray(), auth()->user());
		} else {
			return $this->connection->post('products/upsert', $product->toArray());
		}
	}

	/**
	 * @return mixed
	 * @throws \Exception
	 */
	public function getAvailableAttributes()
	{
		return $this->connection->get('attributes/product');
	}
}