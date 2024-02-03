<?php
/** op-skeleton-2023:/404.php
 *
 * @created   2018-10-30
 * @updated   2024-02-03  Switch output by MIME.
 * @version   2.0
 * @package   op-skeleton-2023
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-18
 * @updated   2024-02-03  OP\ERROR_404
 */
namespace OP\ERROR_404;

//	Change http status code.
http_response_code(404);

//	404 Error notice.
if( OP()->Config('execute')['notfound'] ?? null ){
	Unit('NotFound')->Auto();
}

//	...
$scheme  = $_SERVER['REQUEST_SCHEME'] ?? '(empty)';
$host    = $_SERVER['HTTP_HOST']      ?? '(empty)';
$url     = $_SERVER['REQUEST_URI']    ?? '(empty)';
$url     = $scheme .'://'. $host . $url;
$message = "404 Not Found Error - $url";

//	...
switch( OP()->Env()->Mime() ){
	case 'text/html':
		Html($message);
		break;

	case 'text/javascript':
		JS($message);
		break;

	case 'text/stylesheet':
		CSS($message);
		break;

	default:
		echo $message;
}

/** For HTML
 *
 */
function Html($message){
	//	...
	if( date('m', OP()->Time()) == '10' ){
		$path = '404_halloween.phtml';
	}else{
		$path = '404_notfound.phtml';
	}
	//	Display 404 page.
	OP()->Template($path);
}

/** For JavaScript
 *
 */
function JS($message){
	echo "console.error('{$message}');";
}

/** For StyleSheet
 *
 */
function CSS($message){
	echo "/* {$message} */";
}
