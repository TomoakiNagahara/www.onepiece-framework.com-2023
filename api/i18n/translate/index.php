<?php
/** op-skeleton-2023:/api/i18n/translate/index.php
 *
 * @created		2024-01-30
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
$pre       = true;
$lang_code = OP()->Request('to');
$from_code = OP()->Request('from', '');
$string    = OP()->Request('string');
$strings   = OP()->Request('strings');
if(!$strings ){
	$strings = [$string];
}

//	...
if(!$lang_code ){
	$api->Error("Empty translate language code. (to=ja)");
	$pre = false;
}

//	...
if(!$strings ){
	$api->Error("Empty transalte string. (string=hello, world)");
	$pre = false;
}

//	...
if( $pre ){
	$api->Result( OP()->Unit('Translate')->Strings($strings, $lang_code, $from_code) );
}

//	...
$api->Out();
