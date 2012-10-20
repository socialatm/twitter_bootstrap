<?php
/**
 * Members sidebar
 */

$url = elgg_get_site_url() . 'members/search/';
$search = elgg_echo('search');

$body = <<<HTML

<form class="form-search" id="elgg-form-members-search" action="{$url}" method="get">
<div class="input-append">
<input class="search-query" type="text" name="name" value="">
<button class="btn" type="submit" >{$search}</button>
HTML;

$body .= elgg_view("input/radio", array(
			"name" => 'search_type',
			"value" => 'name',
			'options' => array(
				elgg_echo('twitter_bootstrap:searchtag') => 'tag',
				elgg_echo('twitter_bootstrap:searchname') => 'name',
			),
		));
		
$body .= <<<HTML
</div>
</form>
HTML;

echo elgg_view_module('aside', elgg_echo('twitter_bootstrap:members:searchtag'), $body);