<?php
$json = file_get_contents("http://hkcp.ga/ajax/api_json.php");


class get_data
{
	function debug_array($limit = '', $too = '')
	{
		echo "<pre>";
		$arr = array();
		$array = json_decode($GLOBALS['json'], true);
		foreach ($array as $key => $value) {
			if(!empty($limit)) {
				if (!empty($too)) {
					if($limit < $key) {
						if($key > $limit) {
							break;
						} else {
							$value['id'] = $key;
							$arr[$key] = $value;	
						}
					}
				} else {
					if($key > $limit) {
						break;
					} else {
						$value['id'] = $key;
						$arr[$key] = $value;	
					}
				}
				
			} else {
				$value['id'] = $key;
				$arr[$key] = $value;
			}
		}
		print_r($arr);
		echo "</pre>";
	}

	function debug_object($limit = '', $too = '')
	{
		echo "<pre>";
		$arr = array();
		$array = json_decode($GLOBALS['json'], true);
		foreach ($array as $key => $value) {
			if(!empty($limit)) {
				if (!empty($too)) {
					if($limit < $key) {
						if($key > $limit) {
							break;
						} else {
							$value['id'] = $key;
							$arr[$key] = (object)$value;	
						}
					}
				} else {
					if($key > $limit) {
						break;
					} else {
						$value['id'] = $key;
						$arr[$key] = (object)$value;	
					}
				}
				
			} else {
				$value['id'] = $key;
				$arr[$key] = (object)$value;
			}
		}
		print_r((object)$arr);
		echo "</pre>";
	}

	function return_array($limit = '', $too = '')
	{
		$arr = array();
		$array = json_decode($GLOBALS['json'], true);
		foreach ($array as $key => $value) {
			if(!empty($limit)) {
				if (!empty($too)) {
					if($limit < $key) {
						if($key > $limit) {
							break;
						} else {
							$value['id'] = $key;
							$arr[$key] = $value;	
						}
					}
				} else {
					if($key > $limit) {
						break;
					} else {
						$value['id'] = $key;
						$arr[$key] = $value;	
					}
				}
				
			} else {
				$value['id'] = $key;
				$arr[$key] = $value;
			}
		}
		return $arr;
	}

	function return_object($limit = '', $too = '')
	{
		$arr = array();
		$array = json_decode($GLOBALS['json'], true);
		foreach ($array as $key => $value) {
			if(!empty($limit)) {
				if (!empty($too)) {
					if($limit < $key) {
						if($key > $limit) {
							break;
						} else {
							$value['id'] = $key;
							$arr[$key] = (object)$value;	
						}
					}
				} else {
					if($key > $limit) {
						break;
					} else {
						$value['id'] = $key;
						$arr[$key] = (object)$value;	
					}
				}
				
			} else {
				$value['id'] = $key;
				$arr[$key] = (object)$value;
			}
		}
		return $arr;
	}

	function post_id($id)
	{
		$arr = array();
		$array = json_decode($GLOBALS['json'], true);
		foreach ($array as $key => $value) {
			if($key == $id) {
				$value['id'] = $key;
				$arr = $value;
			}
		}
		if(empty($arr)) {
			return false;
		} else {
			return $arr;
		}
	}
	function get_imgurl($id)
	{
		$arr = array();
		$array = json_decode($GLOBALS['json'], true);
		if (is_array($id)) {
			foreach ($id as $value) {
				foreach ($array as $key_2 => $value_2) {
					if($value == $key_2) {
						for ($i=0; $i < $value_2['img_num']; $i++) { 
							$param = "img_". $i;
							$arr[$value][] = $value_2[ $param ];
						}
					}
				}
			}
		} else {
			foreach ($array as $key => $value) {
				if($key == $id) {
					for ($i=0; $i < $value['img_num']; $i++) { 
						$param = "img_". $i;
						$arr[] = $value[ $param ];
					}
				}
			}
		}
		return $arr;
	}
	function latest()
	{
		$arr = array();
		$array = json_decode($GLOBALS['json'], true);
		foreach ($array as $key => $value) {
			$value['id'] = $key;
			$arr[] = $value;
		}
		$arr_count = count($arr) - 1;
		
		return $arr[$arr_count];
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

/*
こうやる！

$class = new search_data();

$class->set_query($query);

$class->query = '';
*/

class search_data
{

	public $s_query;
	public $s_where;


	// private $s_query;
	// private $s_where;
	
	/*private $s_date = "2015-04-12";

	public function __construct( $date='2015-04-13' /* 引数も入れられちゃう *\/ ){
		// new ()　で呼び出されるのが__construct
		$this->s_date = $date;

	}*/

	/*public function set_query($query = ''){
		if(is_array($query)){
			return false;
		}
		if($this->query = $query) return true;
		return false;
	}*/

	function search($k = '')
	{
		$array = array();

		$json = new get_data();
		$arr = $json -> return_array();

		foreach ($arr as $key => $value) {
			if(isset($value[$this -> s_where])) {
				if($k == true) {
					if($value[$this -> s_where] == $this -> s_query) {
						$array[] = $value;
					}
				} elseif($k == true) {
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

	function o_search()
	{
		$array = array();
		$json = new get_data();
		$arr = $json -> return_array();
		foreach ($arr as $key => $value) {
			if(stristr($value['gak'], $this -> s_query) || stristr($value['gakmei'], $this -> s_query)) {
				$array[] = $value;
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



/**
* class sc
*/
class statistics
{

	function when( $unit = '' )
	{

		if($unit == '月') {
			$date = 'n';
			$max = 12;
		} elseif ($unit == '日') {
			$date = 'j';
			$max = 31;
		}

		/*$variable = new search_data($date, $max);
		$val = $variable->newfunc($i . 'こんなコード見るなんて変態だな');
		return $val;*/


		$variable = new search_data();
		for ($i=1; $i <= $max; $i++) {
			$list = array();
			$variable -> s_query = $i . 'こんなコード見るなんて変態だな';
			$arr = $variable -> date_search($date . 'こんなコード見るなんて変態だな');
			foreach ($arr as $key => $value) {
				$list[] = $value['name'];
			}
			$list = array_unique($list);
			$m = 0;
			foreach ($list as $key2 => $value2) {
				$foo[$i][] = $value2;
				$m++;
			}
		}
		return $foo;
	}
	function when_where($unit='')
	{

		if($unit == '月') {
			$date = 'n';
			$max = 12;
		} elseif ($unit == '日') {
			$date = 'j';
			$max = 31;
		}
		$variable = new search_data();
		for ($i=1; $i <= $max; $i++) {
			$list = array();
			$variable -> s_query = $i . 'こんなコード見るなんて変態だな';
			$arr = $variable -> date_search($date . 'こんなコード見るなんて変態だな');
			foreach ($arr as $key => $value) {
				$list[] = $value;
			}
			$list = array_unique($list);
			$m = 0;
			foreach ($list as $key2 => $value2) {
				$foo[$value2['basho']][$i][] = $value2['name'];
				$m++;
			}
		}
		return $foo;
	}
}