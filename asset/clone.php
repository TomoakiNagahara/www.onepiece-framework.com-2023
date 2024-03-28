<?php
/** op-skeleton-2023:/asset/clone.php
 *
 * Extract the Git repository to "/www/op/" from "~/repo/op/".
 *
 * <pre>
 * php asset/git/clone.php
 * </pre>
 *
 * @created   2023-12-25
 * @version   1.0
 * @package   op
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

//	...
try {
	//	...
	$source_dir = "{$_SERVER['HOME']}/repo/op/";
	$destin_dir = '/www/op/';

	//	...
	chdir($destin_dir);

	//	Loop for type.
	foreach( ['core','unit','layout','module'] as $type ){
		//	Make directory.
		if( file_exists($type) ){
			echo "Exists: {$destin_dir}{$type}\n";
		}else{
			if(!mkdir($type, 0644) ){
				throw new \Exception("Failed make directory. ($destin_dir, $type)");
			}
		}

		//	...
		chdir($type);

		//	Get source repository path.
		foreach( glob("{$source_dir}{$type}/*.git") as $path ){
			//	...
			$base_name = basename($path,'.git');

			//	...
			if( $base_name[0] === '_' ){
				continue;
			}

			//	...
			if( file_exists($base_name) ){
				continue;
			}

			`git clone $path $base_name`;
		}

		//	...
		chdir('..');
	}

} catch ( \Throwable $e ) {
	echo $e->getMessage() . "\n";
	echo $e->getTraceAsString() . "\n";
}
