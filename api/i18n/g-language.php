<?php
/**
 * app-skeleton-2019-nep:/api/i18n/g-language.php
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

//	...
if(!$locale = $_POST['locale'] ?? $_GET['locale'] ?? null ){
	$api->Error('locale has not been set.');
	return;
}

//	...
$api->Set('language', $i18n->Language($locale));
