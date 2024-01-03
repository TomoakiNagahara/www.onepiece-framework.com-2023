<?php
/** op-skeleton-2023:/www/index.php
 *
 * @created		2023-12-29
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

/************************************************/
//	.htaccess file has not been initialized.	//
if( defined('_OP_NAME_SPACE_') === false ){
	include('app.php');
	exit(__FILE__.' #'.__LINE__);
}
//	You should leave this logic. It's for you.	//
/***********************************************/

//	Get SmartURL arguments.
$args = OP::Router()->Args();

//	Whether there is an arguments.
if( empty($args) ){

	/** If there are no arguments.
	 *
	 */
	OP::Template('index.phtml');

}else if( $args[0] === 'cd.php' ){

	/** cd.php file is in current directory.
	 *
	 */
	OP::Template('cd.php');

}else{

	/** 404.php file is in current directory.
	 *
	 */
	OP::Template('404.php');

}
