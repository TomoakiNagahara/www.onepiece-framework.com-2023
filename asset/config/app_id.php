<?php
/** op-skeleton-2023:/asset/config/app_id.php
 *
 * @created   2023-12-27
 * @version   1.0
 * @package   op-skeleton-2023
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

//	Seed
$seed = __FILE__;

//	Calc App ID.
$app_id = substr(md5($seed), 0, 8);

/** Return config array.
 *
 * @return    array        $config
 */
$config = [
	'app_id' => $app_id
];

//	...
return $config;
