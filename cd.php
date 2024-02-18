<?php
/** op-skeleton-2020:/cd.php
 *
 # <pre>
 # How to use: `php cd.php upstream master`
 # </pre>
 #
 * @created    2023-02-05
 * @version    1.0
 * @package    op-skeleton-2020
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/**	Execute time.
 *
 */
define('_OP_APP_START_', microtime(true));

//	...
try {
	//	...
	$_SERVER['APP_ROOT'] = __DIR__;
	include(__DIR__.'/asset/init.php');

	//	...
	if( OP()->Unit('CI')->Dryrun() ){
		return;
	}

	//	...
	$result = OP::Unit('CD')->Auto() ? 1: 0;

}catch( \Throwable $e ){
	//	...
	$message = $e->getMessage();

	//	...
	echo "\n\n";
	echo "Exception: {$message}\n\n";
	foreach( $e->getTrace() as $trace){
		echo ' * ' . DebugBacktrace::Numerator($trace) . "\n";
	}
	echo "\n";
}

//	exit
exit($result ?? null);
