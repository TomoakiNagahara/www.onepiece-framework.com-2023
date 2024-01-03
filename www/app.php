<?php
/** op-skeleton-2023:/www/app.php
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
