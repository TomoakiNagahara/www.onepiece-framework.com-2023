<?php
/** op-skeleton-2020:/ci.php
 *
 # <pre>
 # How to use: `php ci.php`
 #
 # This file does not git stash save.
 # You can inspect code before committing.
 # </pre>
 #
 * @created   2022-10-09 | op-app-skeleton-2020-nep:/asset/ci.php
 * @moved     2022-10-31 | op-module-develop:/selfcheck/action.php
 * @moved     2022-10-31 | op-app-skeleton-2020-nep:/ci.php
 * @version   2.0
 * @package   op-skeleton-2020
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
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
 * @created
 * @moved     2019-12-12   asset:/app.php --> app:/app.php
 * @changed   2019-01-03   $st --> _OP_APP_START_
 */
define('_OP_APP_START_', microtime(true));

/** CI AppID
 *
 * @created    2024-03-15
 */
define('_OP_APP_ID_CI_', 'CI');

//	...
try {
	//	...
	$_SERVER['APP_ROOT'] = __DIR__;
	include(__DIR__.'/asset/init.php');

	//	...
	Env::AppID( _OP_APP_ID_CI_ );

	/*
	// ...
	OP::Unit('Git')->Save();
	*/

	//	...
	$result = OP::Unit('CI')->Auto() ? 1: 0;

} catch ( \Throwable $e ){
	//	...
	$message = $e->getMessage();
	$file    = $e->getFile();
	$line    = $e->getLine();
	$file    = OP()->MetaPath($file);

	//	...
	echo "\n";
	echo "Exception: ".$message."\n\n";
	echo "{$file} #{$line}\n";
	DebugBacktrace::Auto($e->getTrace());
	echo "\n";
}

/*
// ...
OP::Unit('Git')->Pop();
*/

//	exit
exit($result ?? null);
