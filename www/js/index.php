<?php
/** op-skeleton-2023:/js/index.php
 *
 * @created   2023-01-22
 * @version   1.0
 * @package   op-skeleton-2023
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

//	Init
$is_admin   = OP()->Env()->isAdmin();	//	Get isAdmin.
$layout     = OP()->Layout()->Name();	//	Get current layout name.
$extention  = basename(__DIR__);
$index_file = "index.{$extention}";

//	...
$roots = [
	'./',
	OP()->MetaPath()->Decode("layout:/{$layout}/{$extention}/"),
];

//	...
foreach( $roots as $root ){
	//	...
	chdir($root);

	//	...
	if(!$is_admin and file_exists($index_file) ){
		include($index_file);
		continue;
	}

	//	...
	foreach( glob("*.{$extention}") as $file ){
		//	...
		if( $file === $index_file ){
			//	index_file is already packaged file.
			continue;
		}

		//	...
		if( $file[0] === '.' or $file[0] === '_' ){
			continue;
		}

		//	...
		OP()->Template($file);
	}
}
