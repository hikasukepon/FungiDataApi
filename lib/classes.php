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

	function when()
	{
		$variable = new search_data();
		$arr = '';
		$list = array();
		for ($i=1; $i <= 12; $i++) { 
			$variable -> s_query = $i."月";
			$arr = $variable -> date_search('n月');
			foreach ($arr as $key => $value) {
				$list[$i][] = $value['name'];
			}
		}
		foreach ($list as $key => $value) {
			$value = array_unique($value);
		}
		return $list;
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