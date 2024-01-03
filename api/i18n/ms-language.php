<?php
/** onepiece-framework.com:/api/i18n/ms-language.php
 *
 * @created   2022-12-19
 * @version   1.0
 * @package   onepiece-framework.com
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/* @var $apcu \OP\UNIT\APCu */
if( $apcu = Unit::isInstall('apcu') ){
	$apcu = Unit::Instantiate('APCu');
}

/* @var $api \OP\UNIT\Api */
$api->Admin('file', CompressPath(__FILE__));
$api->Admin('apcu', $apcu ? 'Loaded': false);

//	...
if( $apcu ){
	$apcu_language_key = substr(md5(__FILE__), 0, 10) ;
	$result = $apcu->Get($apcu_language_key);
}

//	...
if(!empty($result) ){
	$api->Admin('apcu', 'Hit');
}else{
	//	...
	$result = `curl -sS "https://api.cognitive.microsofttranslator.com/languages?api-version=3.0&scope=translation"`;
}

//	...
if( $result ){
	$apcu->Set($apcu_language_key, $result);
}else{
	$api->Error('Curl is return null.');
}

//  ...
$result = $result ? json_decode($result, true): [];

//  ...
$result = $result['translation'] ?? [];

//  ...
$api->Set('language', $result);
