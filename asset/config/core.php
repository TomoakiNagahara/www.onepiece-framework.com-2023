<?php
/** op-skeleton-2023:/asset/config/core.php
 *
 * @created		2024-03-03
 * @version		1.0
 * @package		op-skeleton-2023
 * @author		Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright	Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** Can to convert a meta-path from full-path.
 *
 * @created    2024-03-03
 * @var        array      $meta_path
 */
$meta_path = [
	'CanConvertFromFullPath' => false,
];

/** Select template logic.
 *
 * core      --> core:/function/Template.php
 * template  --> op-unit-template
 * template2 --> op-unit-template2
 * sandbox   --> op-unit-sandbox
 *
 * @created    2024-03-09
 * @var        string     $template
 */
$template = 'core';

//	...
return [
	'MetaPath' => $meta_path,
	'Template' => $template,
];
