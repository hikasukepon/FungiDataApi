<?php
$json = include "get_json.php";



/**
* get data
*
* example
* --------
* $variable = new get_data();
* $variable -> debug_array();  // dataArray
* $variable -> debug_object(); // dataObject
* $variable -> return_array();  // dataArray
* $variable -> return_object(); // dataObject
*/
class get_data
{
	function debug_array()
	{
		echo "<pre>";
		print_r(json_decode($GLOBALS['json'], true));
		echo "</pre>";
	}

	function debug_object()
	{
		echo "<pre>";
		print_r((object)json_decode($GLOBALS['json']));
		echo "</pre>";
	}

	function return_array()
	{
		return json_decode($GLOBALS['json'], true);
	}

	function return_object()
	{
		return (object)json_decode($GLOBALS['json']);
	}
} 


/**
* search data
*
* example
* --------
* $variable = new search_data();
* $variable -> s_query = ' SEARCH QUERY ';
* $variable -> s_where = ' SEARCH PLACE ';
* $variable -> search(); // array( [0] => array( 'name' => '', 'gakmei' => '', ............
*/
class search_data
{
	public $s_query;
	public $s_where;
	
	function search($k = '')
	{
		$array = array();

		$json = new get_data();
		$arr = $json -> return_array();

		foreach ($arr as $key => $value) {
			if(isset($value[$this -> s_where])) {
				if($k == 'true') {
					if($value[$this -> s_where] == $this -> s_query) {
						$array[] = $value;
					}
				} elseif($k == 'true') {
					foreach ($value as $kk => $val) {
						if(stristr($val, $this -> s_query)) {
							$array[] = $value;
						}
					}
				} else {
					if(stristr($value[$this -> s_where], $this -> s_query)) {
						$array[] = $value;
					}
				}
			} else {
				return false;
			}
		}

		return $array;
	}

	function date_search($date)
	{
		$array = array();

		$json = new get_data();
		$arr = $json -> return_array();

		foreach ($arr as $key => $value) {
			$date_2 = date($date, strtotime($value['date']));
			if(stristr($date_2, $this -> s_query)) {
				$array[] = $value;
			}
		}

		return $array;
	}

	function o_search($k = '')
	{
		$array = array();
		$json = new get_data();
		$arr = $json -> return_array();
		foreach ($arr as $key => $value) {
			if($k == 'true') {
				if(stristr($value['keisai'], $this -> s_query) || stristr($value['keisai_2'], $this -> s_query)) {
					$array[] = $value;
				}
			} else {
				if(stristr($value['gak'], $this -> s_query) || stristr($value['gakmei'], $this -> s_query)) {
					$array[] = $value;
				}
			}
		}
		return $array;
	}
}


/**
* lists
*
* example
* --------
* $variable = new lists();
* $variable -> l_where = ' LIST PLACE ';
* $variable -> output(); // array( [0] => array( 0 => array( name => '' ......
*/
class lists
{
	public $l_where;
	
	function output()
	{
		$array = array();

		$json = new get_data();
		$arr = $json -> return_array();
		$i = 1;

		foreach ($arr as $key => $value) {
			if(isset($value[$this -> l_where])) {
				if($value['name'] == '和名なし') {
					$array[] = $value[$this -> l_where] . $i;
					$i++;
				} else {
					$array[] = $value[$this -> l_where];
				}
			} else {
				return false;
			}
		}

		$array = array_unique( $array );

		asort($array);

		$array = array_values( $array );

		return $array;
	}

	function num()
	{
		$array = array();

		$json = new get_data();
		$arr = $json -> return_array();
		$i = 1;

		foreach ($arr as $key => $value) {
			if(isset($value[$this -> l_where])) {
				if($value['name'] == '和名なし') {
					$array[] = $value[$this -> l_where] . $i;
					$i++;
				} else {
					$array[] = $value[$this -> l_where];
				}
			} else {
				return false;
			}
		}

		$array = array_unique( $array );

		asort($array);

		$array = array_values( $array );

		$array = count($array);

		return $array;
	}
}