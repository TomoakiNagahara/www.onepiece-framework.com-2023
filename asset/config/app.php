<?php
/** op-skeleton-2023:/asset/config/www.php
 *
 * @created		2019-02-20
 * @copied		2023-12-26
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

/** Overwrite to X-Powered-By.
 *
 */
if( OP()->Env()->isHttp() ){
	header("X-Powered-By: The onepiece-framework", true);
}

/** Return config array.
 *
 * @return		array		$config
 */
return [
	'etag'      =>  false,
	'title'     => 'onepiece-framework.com',
	'copyright' => 'Copyright 2009 All right reserved.',
	'app.phtml' =>  OP()->Env()->isAdmin() ? true: false,
];
