<?php

namespace ViaVia\SDK\Model;

class Product extends Model
{
	protected $name;

	protected $sku;

	protected $price;

	protected $status;

	protected $weight;

	protected $attributes;

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param $name
	 * @return $this
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSku()
	{
		return $this->sku;
	}

	/**
	 * @param $sku
	 * @return $this
	 */
	public function setSku($sku)
	{
		$this->sku = $sku;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param $price
	 * @return $this
	 */
	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param $status
	 * @return $this
	 */
	public function setStatus($status)
	{
		$this->status = $status;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getWeight()
	{
		return $this->weight;
	}

	/**
	 * @param $weight
	 * @return $this
	 */
	public function setWeight($weight)
	{
		$this->weight = $weight;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAttributes()
	{
		return $this->attributes;
	}

	/**
	 * @param $attributes
	 * @return $this
	 */
	public function setAttributes(Attributes $attributes)
	{
		$this->attributes = $attributes->getAttributes();
		return $this;
	}
}