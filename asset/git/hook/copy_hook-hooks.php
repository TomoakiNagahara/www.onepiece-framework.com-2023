<?php
/** op-skeleton-2023:/asset/git/hook/copy_hook-hooks.php
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

//	Change to git root.
chdir(trim(`git rev-parse --show-toplevel`));

//	Check global hooks setting.
if( $hooks_dir = trim(`git config --get core.hooksPath` ?? '') ){
	//	Found
	echo "Found global hooks setting: {$hooks_dir}\n";

	//	Replace home dir.
	if( $hooks_dir[0] === '~' ){
		$hooks_dir[0] = '/';
		$hooks_dir    = $_SERVER['HOME'] . $hooks_dir;
	}

	//	Added slash.
	$hooks_dir .= '/';
	$hooks_dir  = str_replace('//', '/', $hooks_dir);

	//	Check path exist.
	if(!file_exists($hooks_dir) ){
		exit("Target directory is not exist: $hooks_dir");
	}

	//	Copy of hook the hooks.
	$hook_file   = 'hook-hooks.sh';
	if( file_exists( $hooks_dir . $hook_file ) ){
		//	Already installed.
		echo "Found hook the hooks file: {$hooks_dir}{$hook_file}\n";
	}else{
		//	Make a copy.
		if(!copy("asset/git/hooks/{$hook_file}", $hooks_dir . $hook_file) ){
			exit("Failed file copy: {$hooks_dir}{$hook_file}");
		}

		//	Last check.
		if( file_exists($hooks_dir . $hook_file) ){
			echo "File copy successful: {$hooks_dir}{$hook_file}";
		}else{
			exit("Does not exist: {$hooks_dir}{$hook_file}");
		}
	}
}
