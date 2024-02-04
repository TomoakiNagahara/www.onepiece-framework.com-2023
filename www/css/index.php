<?php
/** op-skeleton-2023:/css/index.php
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

//	...
$extension = basename(__DIR__);
$layout    = OP()->Request('layout') ?? OP()->Layout()->Name();

//	Load the import file first.
OP()->WebPack()->Auto("asset:/webpack/{$extension}/import.css");
OP()->WebPack()->Auto("asset:/layout/{$layout}/{$extension}/import.css");

//	Others
OP()->WebPack()->Auto("asset:/webpack/{$extension}/");
OP()->WebPack()->Auto("asset:/layout/{$layout}/{$extension}/");
OP()->WebPack()->Auto('./');
OP()->WebPack()->Auto();
