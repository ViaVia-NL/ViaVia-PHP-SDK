<?php

namespace ViaVia\SDK\Model;

class Customer extends Model
{
	protected $email;

	protected $attributes;

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param $email
	 * @return $this
	 */
	public function setEmail($email)
	{
		$this->email = $email;
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