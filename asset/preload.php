<?php
/** op-skeleton-2023:/asset/shortcut.php
 *
 * @created		2024-02-27
 * @version		1.0
 * @package		op-skeleton-2023
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

//	...
foreach( ['OP','Env','Config','Unit'] as $name ){
	include_once(__DIR__."/core/{$name}.class.php");
}
