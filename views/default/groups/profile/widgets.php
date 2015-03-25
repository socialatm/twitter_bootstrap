<?php
/**
* Profile widgets/tools
* 
* @package ElggGroups
*/ 
	
// tools widget area
echo '<div class="panel-group" id="groups-tools" role="tablist" aria-multiselectable="true">';
  
// enable tools to extend this area
echo elgg_view("groups/tool_latest", $vars);
  
echo '</div>';
