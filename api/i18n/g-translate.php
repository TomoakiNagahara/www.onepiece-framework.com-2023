<?php
/**
 * app-skeleton-2019-nep:/api/i18n/g-translate.php
 *
 * @created   2020-01-20
 * @version   1.0
 * @package   app-skeleton-2019-nep
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2020-01-20
 */
namespace OP;

/** use
 *
 * @created   2020-01-20
 */
use function OP\CompressPath;

/* @var $api \OP\UNIT\Api */
$api->Admin('file', CompressPath(__FILE__));

/* @var $i18n \OP\UNIT\i18n */
$i18n = Unit::Instantiate('i18n');

/* @var $request array */
$from    = $_POST['from']    ?? $_GET['from']    ?? null;
$to      = $_POST['to']      ?? $_GET['to']      ?? null;
$string  = $_POST['string']  ?? $_GET['string']  ?? null;
$strings = $_POST['strings'] ?? $_GET['strings'] ?? [$string] ?? null;

//	...
if( !$from or !$to or !$strings ){
	$api->Error('Empty "from" or "to" or "string(s)" value.');
	return;
}

//	Set sourse locale
$i18n->From($from);

//	Set destination locale
$i18n->To($to);

//	...
$translate = [];

//	...
foreach( $strings as $string ){
	//	...
	$translate[] = $i18n->Translate($string);
};

//	...
$api->Set('translate', $translate);
