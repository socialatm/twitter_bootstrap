<?php
/**
 * New My Status river entry
 * @elgg-release: 1.9.1
 *
 */
$object = $vars['item']->getObjectEntity();

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => $object->description,
));
