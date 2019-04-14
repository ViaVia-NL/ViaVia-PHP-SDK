<?php

namespace ViaVia\SDK\Model;

class Attributes extends Model
{
	protected $attributes = array();

	/**
	 * @return array
	 */
	public function getAttributes()
	{
		return $this->attributes;
	}

	/**
	 * @param $key
	 * @param $value
	 * @return $this
	 */
	public function addAttribute($key, $value)
	{
		$this->attributes[] = array('key' => $key, 'value' => $value);
		return $this;
	}
}