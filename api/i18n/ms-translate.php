<?php
/** onepiece-framework.com:/api/i18n/ms-translate.php
 *
 * Microsoft Translate API
 * https://learn.microsoft.com/ja-jp/azure/cognitive-services/translator/reference/v3-0-translate
 *
 * @created   2022-12-20
 * @version   1.0
 * @package   onepiece-framework.com
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/* @var $api \OP\UNIT\Api */
$api->Admin('file', CompressPath(__FILE__));

//	...
$config = Env::Get('i18n');
$apikey = $config['Ocp-Apim-Subscription-Key'];

$compatible = $_GET['compatible'] ?? true;
$from    = $_POST['from']    ?? $_GET['from']    ?? '';
$to      = $_POST['to']      ?? $_GET['to']      ?? '';
$string  = $_POST['string']  ?? $_GET['string']  ?? 'You have not specified a string to translate.';
$strings = $_POST['strings'] ?? $_GET['strings'] ?? [$string];
$txttype = $_POST['txttype'] ?? $_GET['txttype'] ?? 'html';

//	...
if(!$to ){
	$api->Error("The target language is empty.");
	return;
}

//	...
foreach(['from'=>$from, 'to'=>$to] as $key => $lang){
	/* @var $match array */
	if( preg_match('|([^-a-z]+)|i', $lang, $match) ){
		$api->Error("Contains inappropriate characters. ({$key}, {$lang}, {$match[1]})");
		return;
	}
}

/* @var $app  UNIT\App  */
/* @var $i18n UNIT\i18n */
$search = false;
$result = [];
$hits   = [];
$i18n = $app->Unit('i18n');
foreach($strings as $i => $string){
	//	...
	if( $result[$i]  = $i18n->Get($string, $to)['translated'] ?? null ){
		$strings[$i] = '';
		$hits[$i]    = 'hit';
	}else{
		$search = true;
	}
}
$api->Admin('hits', $hits);

//	...
if(!$search ){
	$api->Set('translate', $result);
	return;
}

//	Build URL Query
$query = [];
$query[] = "api-version=3.0";
$query[] = "to={$to}";
$query[] = "textType={$txttype}";
$query = join('&', $query);
$api->Admin('to request query', $query);

//	Build request strings.
$text = [];
foreach( $strings as $string ){
	$string = addslashes($string);
	$text[] = "{'Text':'{$string}'}";
}
$text = join(',', $text);

/** cURL
 * -sS is disable Progress Meter
 * https://qiita.com/yasuhiroki/items/a569d3371a66e365316f#progress-meter
 */
/*
$curl = `curl -sS -X POST "https://api.cognitive.microsofttranslator.com/translate?{$query}" \
     -H "Ocp-Apim-Subscription-Key:{$apikey}" \
     -H "Ocp-Apim-Subscription-Region:japaneast" \
     -H "Ocp-Apim-Subscription-Region:"
     -H "Content-Type: application/json" \
     -d "[{$text}]"`;
*/

$curl = `curl -X POST "https://api.cognitive.microsofttranslator.com/translate?{$query}" \
-H "Ocp-Apim-Subscription-Region:japaneast" \
-H "Ocp-Apim-Subscription-Key: {$apikey}" \
-H "Content-Type: application/json; charset=UTF-8" \
-d "[{$text}]"`;

//  ...
if(!$curl ){
    $api->Error('Curl is return null.');
    return;
}

//	...
$json = json_decode($curl, true);
if( $json['error'] ?? null ){
	$api->Error('ms-translator: '.$json['error']['message']);
	return;
}

//	...
if( $compatible ){
	foreach( $json as $i => $unit ){
		foreach( $unit['translations'] as $translation ){
			if( $text       = $translation['text'] ){
				$to         = $translation['to'];
				$result[$i] = $text;
				$i18n->Save($strings[$i], $result[$i], $to);
			}
		}
		/*
		$score    = $unit['detectedLanguage']['score'];
		$detected = $unit['detectedLanguage']['language'];
		$api->Set('unit', $unit);
		$api->Set('debug', "$i, $score, $detected, $text, $to");
		*/
	}
	$api->Set('translate', $result);
}else{
	$api->Set('translate', $json);
}
