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

//	...
require_once('common.php');

/* @var $api \OP\UNIT\Api */
$api = OP()->Unit('Api');

//	...
$api->Admin('file', OP()->MetaPath()->Encode(__FILE__));

//	Dispatch to action.php
include('dispatcher.php');

//	...
$api->Out();
