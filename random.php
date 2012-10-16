<?php
/*
Usage:
echo Random::lastname(); //Johnson
echo Random::firstname(); //Mary
echo Random::array(array('Dr', 'Mr')); //Mr
*/
Class Random {
	private static $states = array();
	private static $letters = array();
	private static $digits = array(0,1,2,3,4,5,6,7,8,9);
	private static $vowels = array();
	private static $constants = array();


	public static function lastname() {

	}
	public static function firstname() {

	}
	public static function address1(){

	}
	public static function address2(){

	}
	public static function city(){

	}
	public static function state(){
		return static::pick(static::$states);
	}
	public static function zip(){
		return static::digits(5);
	}
	public static function digits($size) {
		$digits = '';
		for($i = 1;$i<=$size;$i++){
			$digits .= static::pick(static::$digits);
		}
		return $digits;
	}
	public static function pick($array){
		return $array[rand(0, sizeof($array)-1)];
	}
}
echo Random::digits(10);
?>