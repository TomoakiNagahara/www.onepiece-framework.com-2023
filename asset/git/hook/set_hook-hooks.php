<?php
/** op-skeleton-2023:/asset/git/hook/set_hook-hooks.php
 *
 * @created    2024-04-01
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
$local_hooks = 'asset/git/hooks/';

//	Set local hooks
chdir($git_root);
if( $hooks_dir = trim(`git config --get core.hooksPath` ?? '') ){
	echo "Already set custom local hooks: {$hooks_dir}\n";
}else{
	`git config --local core.hooksPath {$local_hooks}`;
}

//	Loop to each submodules.
foreach( ['unit','layout','module','webpack'] as $base ){
	//	...
	chdir($git_root);
	//	...
	foreach( glob("asset/{$base}/*") as $path ){
		//	...
		chdir("{$git_root}/{$path}");
		//	...
		echo getcwd() . "\n";
		//	...
		if( $hooks_dir = trim(`git config --get core.hooksPath` ?? '') ){
			echo "Already set custom local hooks: {$hooks_dir}\n";
		}else{
		//	Set git root's local hooks directory.
		`git config --local core.hooksPath {$git_root}/{$local_hooks}`;
		}
	}
}
