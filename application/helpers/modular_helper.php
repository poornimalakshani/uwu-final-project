<?php

class Models {

	public static $ci;
	protected static $prefix = '';
	protected static $suffix = '_model';

	public static function load($model)
	{
		$model_name = self::$prefix.$model.self::$suffix;
		self::$ci->load->model($model_name);
	}

	public static function get($model)
	{
		$model_name = self::$prefix.$model.self::$suffix;

		if(!isset(self::$ci->$model_name) || !is_object(self::$ci->$model_name)) {
			self::load($model);
		}

		return self::$ci->$model_name;
	}

}

class Libs {

	public static $ci;
	protected static $prefix = '';
	protected static $suffix = '';

	public static function load($lib)
	{
		$lib_name = self::$prefix.$lib.self::$suffix;
		self::$ci->load->library($lib_name);
	}

	public static function get($lib)
	{
		$lib_name = self::$prefix.$lib.self::$suffix;

		if(!is_object(self::$ci->$lib_name)) {
			self::load($lib);
		}

		return self::$ci->$lib_name;
	}

}

class Views {

	public static $ci;

	public static function show($view, $data = array())
	{
		self::$ci->load->view($view, $data);
	}

	public static function parse($view, $data)
	{
		return self::$ci->load->view($view, $data, TRUE);
	}

}

//class DB {
//
//	public static $ci;
//
//	protected static $handles = array();
//	protected static $default;
//	protected static $last;
//
//	public static function load($db = NULL, $default = FALSE)
//	{
//		if($db === NULL) {
//			include(APPPATH.'config/database.php');
//			$db = $active_group;
//		}
//
//		self::$handles[$db] = self::$ci->load->database($db, TRUE);
//
//		if($default || !self::$default) {
//			self::$default = $db;
//		}
//	}
//
//	public static function conn($db = NULL)
//	{
//		if($db === NULL) {
//
//			if(!self::$default) {
//				self::load(NULL, TRUE);
//			}
//
//			return self::$handles[self::$default];
//		}
//
//		if(!isset(self::$handles[$db])) {
//			self::load($db);
//		}
//
//		return self::$handles[$db];
//	}
//
//}


# initialize the static classes

Models::$ci =& get_instance();
Views::$ci  =& get_instance();
Libs::$ci   =& get_instance();
//DB::$ci     =& get_instance();
//DB::load(NULL, TRUE);	// load the default database


# shortcut functions

function Model($model) {
	return Models::get($model);
}

function Library($lib) {
	return Libs::get($lib);
}

//function Database($db = NULL) {
//	return DB::conn($db);
//}
