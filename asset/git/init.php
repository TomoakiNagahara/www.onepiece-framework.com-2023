<?php
/** op-skeleton-2023:/asset/git/init.php
 *
 * <pre>
 * php asset/git/init.php
 * </pre>
 *
 * @created    2023-12-25
 * @version    1.0
 * @package    op-skeleton-2023
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

//	init
$git_root    = trim(`git rev-parse --show-toplevel`);

//	...
chdir($git_root);
