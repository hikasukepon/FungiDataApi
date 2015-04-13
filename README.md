# FungiDataApi
KCP(hkcp.ga) API.
[Site](http://hkcp.cf/web.api)
+ KCP
+ Project
+ Fungi
+ Kinoko
+ 2015
+ mushroom

---

## Examples
#### include
```php
include("lib/api.php");
```
#### debug data
```php
$variable = new get_data();
$variable -> debug_array();
/*
 * output
 * array(
 *  [0] => array(
 *    ['name'] => 'name',
 *    ['date'] => 'date',
 * ..........
 */
```
#### search data
```php
$variable = new search_data();
$variable -> s_query = 'query';
$variable -> s_where = 'place';
$arr = $variable -> search();
print_r($arr);
/*
 * output
 * array(
 *  [0] => array(
 *    ['name'] => 'name',
 *    ['date'] => 'date',
 * ..........
 */
```
#### data list
```php
$variable = new lists();
$variable -> l_where = 'name';
$arr = $variable -> output();
print_r($arr);
/*
 * output
 * Array
 *  (
 *      [0] => name1
 *      [1] => name2
 *      ....
 *
 */
```
---
### License
MIT LICENSE.
Created by [@hikasukepon](//twitter.com/hikasukepon).
