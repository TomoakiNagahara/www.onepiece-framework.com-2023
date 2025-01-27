<?php
/** op-skeleton-2023:/asset/rootpath.php
 *
 * @created		2022-10-30
 * @copied		2023-12-27
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

//	__DIR__ is real path. Not alias.
$asset_root = __DIR__.'/';

//	Branch per each SAPI.
switch( $sapi = php_sapi_name() ){
	//  Web Servers
	case 'fpm-fcgi':
	case 'apache2handler':
		//	App root.
		if( empty($_SERVER['APP_ROOT']) ){
			$_SERVER['APP_ROOT'] = dirname($_SERVER['SCRIPT_FILENAME']).'/';
		}
		break;

		//	CLI
	case 'cli':
		//	App root.
		if( empty($_SERVER['APP_ROOT']) ){
			//	Get current directory.
			$pwd = $_SERVER['PWD'];
			do{
				//	Find the directory where app.php file exists.
				if( file_exists( $pwd . '/app.php' ) ){
					//  Found.
					break;
				}
				//	Trim to upper directory.
				$pwd = dirname($pwd);
			}while( $pwd !== '/' );
			//	Assignment.
			$_SERVER['APP_ROOT'] = $pwd;
		}

		//	Document root.
		if( empty($_SERVER['DOCUMENT_ROOT']) ){
			$_SERVER['DOCUMENT_ROOT'] = $_SERVER['APP_ROOT'];
		}
		break;

	default:
		echo __FILE__ .' #'. __LINE__ . ' - ';
		exit("Undefined SAPI. ($sapi)");
}

//	App root
$app_root = $_SERVER['APP_ROOT'];

//	Document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];

//	Git root
if( file_exists("{$app_root}/.git") ){
	$git_root = $app_root;
}else if( file_exists(dirname($app_root).'/.git') ){
	$git_root = dirname($app_root);
}else{
	$current = getcwd();
	throw new \Exception("Does not found .git directory. (doc_root={$doc_root}, app_root={$app_root}, current={$current})");
}

//	Real path --> alias path
if( strpos($asset_root, realpath(dirname($doc_root))) === 0 ){
	$asset_root = str_replace(realpath(dirname($doc_root)), dirname($doc_root), $asset_root);
}

//	Entry each root directory.
RootPath('git'      , $git_root                 );
RootPath('real'     , realpath($git_root)       );
RootPath('doc'      , $doc_root                 );
RootPath('app'      , $app_root                 );
RootPath('asset'    , $asset_root               );
RootPath('op'       , realpath($asset_root.'core'   ) ); // Support to alias path.
RootPath('core'     , $asset_root.'core'        );
RootPath('template' , $asset_root.'template'    );
RootPath('unit'     , realpath($asset_root.'unit'   ) ); // Why converting to real path?
RootPath('layout'   , realpath($asset_root.'layout' ) );
RootPath('webpack'  , realpath($asset_root.'webpack') );
RootPath('module'   , $asset_root.'module'      );
