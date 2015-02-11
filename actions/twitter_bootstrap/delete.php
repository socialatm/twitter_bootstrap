<?php
/**
* Elgg file delete
* @elgg-release: 1.9.4
* @package ElggFile
*/

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/engine/start.php");

$guid = (int) get_input('guid');
$file = new FilePluginFile($guid);
if (!$file->guid) {
	register_error(elgg_echo("file:deletefailed"));
	forward(REFERER);
}

if (!$file->canEdit()) {
	register_error(elgg_echo("file:deletefailed"));
	forward(REFERER);
}

if (!$file->delete()) {
	register_error(elgg_echo("file:deletefailed"));
} else {
	system_message(elgg_echo("file:deleted"));
}
