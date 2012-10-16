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


	public static lastname() {

	}
	public static firstname() {

	}
	public static address1(){

	}
	public static address2(){

	}
	public static city(){

	}
	public static state(){
		return static::pick(static::$states);
	}
	public static zip(){
		return static::digits(5);
	}
	public static digits($size) {
		$digits = '';
		for($i = 1;$i<=5;$size;$i++){
			$digits .= static::array(static::$digits);
		}
		return $digits;
	}
	public static pick($array){
		return $array[rand(0, sizeof($array)-1)];
	}
}

?>