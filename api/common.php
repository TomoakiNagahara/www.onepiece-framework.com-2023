<?php
/** op-skeleton-2023:/api/common.php
 *
 * @created		2024-01-24
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

//	CORS (Cross-Origin Resource Sharing)
if( true ){
	header('Access-Control-Allow-Origin: *'); // All
	header('Access-Control-Allow-Headers: "X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept"');
}
