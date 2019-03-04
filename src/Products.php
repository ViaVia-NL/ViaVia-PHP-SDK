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
			\App\Jobs\CreateProduct::dispatch($product->toArray(), auth()->user())->onQueue('products');;
		} else {
			return $this->connection->post('products/upsert', $product->toArray());
		}
	}

	/**
	 * @param array $products
	 * @return mixed
	 * @throws \Exception
	 */
	public function bulkUpsertProducts(array $products)
	{
		foreach($products as $product) {
			if(getenv('VIAVIA_INTERNAL')) {
				\App\Jobs\CreateProduct::dispatch($product->toArray(), auth()->user())->onQueue('products');;
			} else {
				return $this->connection->post('products/upsert', $product->toArray());
			}
		}
	}
}