<?php
/** op-app-skeleton-2023:/asset/init.php
 *
 * @created		2018-03-27
 * @renamed		2023-01-01   app.php --> init.php
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

//	...
try {
	/** Include Application environment config.
	 *
	 * @created   2016-11-22   Creation config.php at app-skeleton.
	 * @updated   2017-??-??   Generate _config.php at app-skeleton2.
	 * @updated   2019-12-16   Rebirth by app-skeleton-2020.
	 * @moved     2019-12-27   app-skeleton-2020-nep:/app.php --> asset/app.php
	 * @moved     2022-10-30   bootstrap.php | Initialize onepiece-framework application.
	 * @added     2022-10-30   rootpath.php  | Set meta root path file.
	 * @added     2022-12-17   check.php     | Check php module install and apache setting.
	 * @copied    2023-12-27   op-skeleton-2022 --> op-skeleton-2023
	 * @added     2024-02-27   Preload.php   | Preload main files.
	 */
	foreach([
		'config/php',
		'config/op',
		'bootstrap',
		'rootpath',
		'preload',
		/*
		'config',
		'_config',
		'check',
		*/
	] as $file){
		//	Build full path.
		$file = __DIR__.'/'.$file.'.php';

		//	Include file into closure.
		if( file_exists($file) ){
			call_user_func(function($file){
				include($file);
			}, $file);
		}
	}

	//	...
	unset($file);

} catch ( \Throwable $e ){
	//	...
	if( RootPath() and class_exists('OP\Notice', true) ){
		Notice::Set($e);
	}else{
		echo '<pre>';
		echo $e->getMessage() . "\n";
		echo $e->getTraceAsString() . "\n";
		echo '</pre>';
	}
}
