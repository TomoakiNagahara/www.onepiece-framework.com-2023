<?php
/** op-skeleton-2023:/api/i18n/action.php
 *
 * @created		2019-04-26	www.onepece-framework.com-2019:/api/i18n/action.php
 * @updated		2023-12-30	op-skeleton-2023:/api/i18n/action.php
 * @version		1.0
 * @package		op-skeleton-2023
 * @author		Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright	Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/* @var $api \OP\UNIT\Api */
$api = OP()->Unit('Api');

//	...
$api->Admin('file', CompressPath(__FILE__));

//	...
$target = OP()->Router()->Args()[1] ?? 'empty';

//	...
switch( $target ){
	case 'translate':
	case 'language':
		include("ms-{$target}.php");
		break;
	default:
		$api->Error("Unknown target value. Is translate or language? ({$target})");
		return;
}
