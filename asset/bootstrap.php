<?php
/** op-app-skeleton-2023:/asset/bootstrap.php
 *
 * @created		2018-03-27
 * @copied		2023-12-23
 * @version		1.0
 * @package		op-app-skeleton-2020-nep
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

//	Bootstrap the onepiece-framework's core.
$path = __DIR__.'/core/Bootstrap.php';
if(!file_exists($path) ){
	echo "File is not exists. ($path)";
	exit();
}
require($path);
