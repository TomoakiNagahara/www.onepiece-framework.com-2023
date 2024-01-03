<?php
/** op-skeleton-2023:/api/app.php
 *
 * @created		2014-02-24
 * @updated		2016-11-22
 * @updated		2019-11-18
 * @copied		2023-12-27
 * @version		1.0
 * @package		op-app-skeleton-2023
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

/**	Calc execute time.
 *
 * @created ????-??-??
 * @moved   2019-12-12	asset:/app.php --> app:/app.php
 * @changed 2019-01-03	$st --> _OP_APP_START_
 * @copied  2023-12-29	op-skeleton-2022
 */
define('_OP_APP_START_', microtime(true));

/** Launch onepiece-framework's core.
 *
 */
require('../asset/init.php');

/** Launch application.
 *
 */
try {
	//	Launch application.
	OP()->App()->Auto();
} catch ( \Throwable $e ){
	OP()->Notice($e);
}

//	...
include('../asset/template/app.phtml');
