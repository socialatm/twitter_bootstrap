<?php
/**
 * Group module (also called a group widget)
 *
 * @uses $vars['title']    The title of the module
 * @uses $vars['content']  The module content
 * @uses $vars['all_link'] A link to list content
 * @uses $vars['add_link'] A link to create content
 */

$group = elgg_get_page_owner_entity();
$title = $vars['title'];
$content = $vars['content'];
$all_link = $vars['all_link'];
$add_link = $vars['add_link'];
$selector = str_replace(' ', '-', $title);

$header = $title;
$header .= '<div class="pull-right">'.$all_link.'</div>';
$expanded = ($title == "Group activity") ? 'true' : 'false' ;
$in = ($title == "Group activity") ? 'in' : '' ;

if ($group->canWriteToContainer() && isset($vars['add_link'])) {
	$content .= "<span class='elgg-widget-more'>{$add_link}</span>";
}

echo <<<HTML

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading{$selector}">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#groups-tools" href="#collapse{$selector}" aria-expanded="{$expanded}" aria-controls="collapse{$selector}">
          {$header}
        </a>
      </h4>
    </div>
    <div id="collapse{$selector}" class="panel-collapse collapse {$in}" role="tabpanel" aria-labelledby="heading{$selector}">
      <div class="panel-body">
        {$content}
      </div>
    </div>
  </div>
HTML;
