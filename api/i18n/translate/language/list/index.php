<?php
/** op-skeleton-2023:/api/i18n/translate/language/list/index.php
 *
 * @created		2024-01-24
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
require_once( OP()->MetaPath('app:/common.php') );

/* @var $api \OP\UNIT\Api */
$api = OP()->Unit('Api');

//	...
$api->Result( OP()->Unit('Translate')->Language()->List('json') );

//	...
$api->Out();
