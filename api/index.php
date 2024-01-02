<?php
/** op-skeleton-2023:/api/index.php
 *
 * @created		2023-12-29
 * @version		1.0
 * @package		op-skeleton-2023
 * @author		Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright	Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

//	CORS (Cross-Origin Resource Sharing)
if( true ){
	header('Access-Control-Allow-Origin: *'); // All
	header('Access-Control-Allow-Headers: "X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept"');
}

/* @var $api \OP\UNIT\Api */
$api = OP()->Unit('Api');

//	...
$api->Admin('file', __FILE__);

//	...
$api->Set('layout', OP()->Layout()->Name());

//	...
$api->Error('This is test1.');
$api->Error('This is test2.');

//	...
//OP()->Notice('This is to admin notice.');

//	Dispatch to action.php
include('dispatcher.php');

//	...
$api->Out();
