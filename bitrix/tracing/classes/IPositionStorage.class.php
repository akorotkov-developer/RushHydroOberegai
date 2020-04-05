<?php
interface IPositionStorage {

	/**
	 * @param string $file
	 * @return IPositionStorage
	 */
	public function __construct($file);
	
	/**
	 * @param mixed $value
	 * @return IPositionStorage
	 */
	public function append($value);
	
	/**
	 * @return IPositionStorage
	 */
	public function deleteLast();
	
	/**
	 * @return IPositionStorage
	 */
	public function clear();
	
	/**
	 * @return IPositionStorage
	 */
	public function save();
	
	/**
	 * @return array
	 */
	public function getData();
	
	/**
	 * @return array
	 */
	public function getLastPosition();
	
}