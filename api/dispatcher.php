<?php
/** op-skeleton-2023:/api/dispatcher.php
 *
 * @created		2019-04-05	www.onepece-framework.com-2019:/api/router.php
 * @updated		2023-12-31	op-skeleton-2023:/api/dispatcher.php
 * @version		1.0
 * @package		op-skeleton-2023
 * @author		Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright	Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

//	Get SmartURL Query.
$args = OP()->Router()->Args();

//	Init
$join = [];

//	Generate End-Point.
while( $arg = array_shift($args) ){
	//	...
	$join[] = $arg;

	//	...
	$path = join('/', $join).'/action.php';

	//	...
	if( file_exists($path) ){
		include($path);
	}
};
