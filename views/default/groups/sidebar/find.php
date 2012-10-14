<?php
/**
 * Group search
 *
 * @package ElggGroups
 */
  
$url = elgg_get_site_url() . 'groups/search';
$search = elgg_echo('search');

$body = <<<FORM
<form class="form-search" action="{$url}" method="get">
<div class="input-append">
<input class="search-query" type="text" name="tag" value="">
<button class="btn" type="submit" >{$search}</button>
</div>
</form>
FORM;

echo elgg_view_module('aside', elgg_echo('groups:searchtag'), $body);