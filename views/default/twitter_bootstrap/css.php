<?php
/**
 * Custom styles / required Elgg styles where I don't want to include the whole Elgg file
 **/
?>

/** SOME CORE OVERRIDES **/

body {
	position: relative;
}

.hidden {
	display:none;
}

.elgg-page .elgg-page-header {
	position: relative;
	padding-top:15px;
	margin-top:40px;
}

.elgg-page-header h1 {
	padding-bottom:10px;
}

.elgg-page-header h1 a {
	font-size:32px;
	color:#000;
}

.elgg-menu-extras-default {
	margin:10px 0 10px -10px;
	min-height: 20px;
  padding: 19px;
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid #eee;
  border: 1px solid rgba(0, 0, 0, 0.05);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
}

.elgg-menu-longtext-default > li, .elgg-menu-extras-default > li {
	padding:0 10px 0 10px;
}

ul.elgg-menu-river-default, ul.elgg-menu-annotation-default {
	float:right;
}

ul.elgg-tags {
	margin:0;
}

.page-header {
	margin:0 0 5px 0;
	padding:0 0 5px 0;
}

li {
	list-style:none;
}

.elgg-foot {
	margin-top:20px;
}

/** system messages **/

.elgg-page-messages {
	position:relative;
}

.bootstrap-messages {
	position:absolute;
	top:40px;
	z-index:100;
 	right:0;
}

/** Footer **/

.elgg-page-footer li  {
	padding:0 0 0 10px;
}

.elgg-page-footer {
	padding-bottom:20px;
}

.elgg-body:after,
.elgg-col-last:after {
	display: block;
	visibility: hidden;
	height: 0 !important;
	line-height: 0;
	overflow: hidden;
	
	/* Stretch to fill up available space */
	font-size: xx-large;
	content: " x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x ";
}

/** This should not be required, @todo figure out why it is **/
/** navigation / menu / topbar line 52 **/
.nav-collapse-margin-issue {
	margin-top:-16px;
}

/* Aside */
.elgg-module-aside .elgg-head {
	border-bottom: 0px solid #CCC;
	margin-bottom: 0px;
	padding-bottom: 0px;
}

/** Elgg access label **/

.elgg-access {
	 font-size: 10.998px;
  font-weight: bold;
  line-height: 14px;
  color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  white-space: nowrap;
  vertical-align: baseline;
  background-color: #999999;
	padding: 1px 9px 2px;
  -webkit-border-radius: 9px;
     -moz-border-radius: 9px;
          border-radius: 9px;
}

.elgg-access:hover {
  color: #ffffff;
  text-decoration: none;
}

/** Elgg Avatar within elgg-page-body **/

.elgg-page-body .elgg-avatar {
	float:left;
	margin:0 10px 10px 0;
}


/* ***************************************
	ENTITY AND ANNOTATION
*************************************** */

.elgg-menu-entity, elgg-menu-annotation {
	float: right;
	margin-left: 15px;
	font-size: 90%;
	color: #aaa;
	line-height: 16px;
	height: 16px;
}
.elgg-menu-entity > li, .elgg-menu-annotation > li {
	margin-left: 15px;
}
.elgg-menu-entity > li > a, .elgg-menu-annotation > li > a {
	color: #aaa;
}

.elgg-menu-entity > li > a, .elgg-menu-annotation > li > a {
	display: block;
}
.elgg-menu-entity > li > span, .elgg-menu-annotation > li > span {
	vertical-align: baseline;
}

/* ***************************************
	LONGTEXT
*************************************** */
.elgg-menu-longtext {
	float: right;
}

/*** MISC ***/

.elgg-tagcloud {
	margin:10px 0 10px 0;
}

/* ***************************************
	SIDEBAR EXTRAS (rss, bookmark, etc)
*************************************** */
.elgg-menu-extras {
	margin-bottom: 15px;
}

/* ***************************************
	WIDGET MENU
*************************************** */
.elgg-menu-widget > li {
	position: absolute;
	top: 4px;
	display: inline-block;
	width: 18px;
	height: 18px;
	padding: 2px 2px 0 0;
}

.elgg-menu-widget > .elgg-menu-item-collapse {
	left: 5px;
}
.elgg-menu-widget > .elgg-menu-item-delete {
	right: 5px;
}
.elgg-menu-widget > .elgg-menu-item-settings {
	right: 25px;
}

/* ***************************************
	HOVER MENU
*************************************** */
.elgg-menu-hover {
	display: none;
	position: absolute;
	z-index: 10000;

	overflow: hidden;

	min-width: 165px;
	max-width: 250px;
	border: solid 1px;
	border-color: #E5E5E5 #999 #999 #E5E5E5;
	background-color: #FFF;
	
	-webkit-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	-moz-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
}
.elgg-menu-hover > li {
	border-bottom: 1px solid #ddd;
}
.elgg-menu-hover > li:last-child {
	border-bottom: none;
}
.elgg-menu-hover .elgg-heading-basic {
	display: block;
}
.elgg-menu-hover a {
	padding: 2px 8px;
	font-size: 92%;
}
.elgg-menu-hover a:hover {
	background: #ccc;
	text-decoration: none;
}
.elgg-menu-hover-admin a {
	color: red;
}
.elgg-menu-hover-admin a:hover {
	color: white;
	background-color: red;
}

/* ***************************************
	BREADCRUMBS
*************************************** */
.elgg-breadcrumbs {
	font-size: 80%;
	font-weight: bold;
	line-height: 1.2em;
	color: #bababa;
	margin-left:4px;
	padding:10px 0 0 0;
}
.elgg-breadcrumbs > li {
	display: inline-block;
}
.elgg-breadcrumbs > li:after {
	content: "\003E";
	padding: 0 4px;
	font-weight: normal;
}
.elgg-breadcrumbs > li > a {
	display: inline-block;
	color: #999;
}
.elgg-breadcrumbs > li > a:hover {
	color: #0054a7;
	text-decoration: underline;
}

.elgg-main .elgg-breadcrumbs {
	position: relative;
	left: 0;
	margin-top:5px;
}

/** The wire **/

#thewire-textarea {
	height: 40px;
	padding: 4px;
}


/** Subnav as seen on Twitter bootstrap - you will want to change this. It is here as an example. **/
/** This code was originally found here: http://jsfiddle.net/baptme/ydY6W/ **/
.subnav-fixed {
   	position: fixed;
	top: 40px;
	left: 0;
	right: 0;
	z-index: 1020;
	border-color: #D5D5D5;
	border-width: 0 0 1px;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	-webkit-box-shadow: inset 0 1px 0 white, 0 1px 5px rgba(0, 0, 0, .1);
	-moz-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
	box-shadow: inset 0 1px 0 white, 0 1px 5px rgba(0, 0, 0, .1);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}

.subnav {
    width: 100%;
    height: 36px;
    background-color: #eeeeee; /* Old browsers */
    background-repeat: repeat-x; /* Repeat the gradient */
    background-image: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%); /* FF3.6+ */
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f5f5f5), color-stop(100%,#eeeeee)); /* Chrome,Safari4+ */
    background-image: -webkit-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* Chrome 10+,Safari 5.1+ */
    background-image: -ms-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* IE10+ */
    background-image: -o-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* Opera 11.10+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f5f5', endColorstr='#eeeeee',GradientType=0 ); /* IE6-9 */
    background-image: linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* W3C */
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.subnav .nav {
    margin-bottom: 0;
}
.subnav .nav > li > a {
  margin: 0;
  padding-top:    11px;
  padding-bottom: 11px;
  border-left: 1px solid #f5f5f5;
  border-right: 1px solid #e5e5e5;
  -webkit-border-radius: 0;
     -moz-border-radius: 0;
          border-radius: 0;
}
.subnav .nav > .active > a,
.subnav .nav > .active > a:hover {
  padding-left: 13px;
  color: #777;
  background-color: #e9e9e9;
  border-right-color: #ddd;
  border-left: 0;
  -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.05);
     -moz-box-shadow: inset 0 3px 5px rgba(0,0,0,.05);
          box-shadow: inset 0 3px 5px rgba(0,0,0,.05);
}
.subnav .nav > .active > a .caret,
.subnav .nav > .active > a:hover .caret {
  border-top-color: #777;
}
.subnav .nav > li:first-child > a,
.subnav .nav > li:first-child > a:hover {
  border-left: 0;
  padding-left: 12px;
  -webkit-border-radius: 4px 0 0 4px;
     -moz-border-radius: 4px 0 0 4px;
          border-radius: 4px 0 0 4px;
}
.subnav .nav > li:last-child > a {
  border-right: 0;
}
.subnav .dropdown-menu {
  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
          border-radius: 0 0 4px 4px;
}

/** SPECIFIC @media conditions **/

@media (max-width: 768px) {
    .subnav {
        position: static;
        top: auto;
        z-index: auto;
        width: auto;
        height: auto;
        background: #fff; /* whole background property since we use a background-image for gradient */
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
    .subnav .nav > li {
        float: none;
    }
    .subnav .nav > li > a {
        border: 0;
    }
    .subnav .nav > li + li > a {
        border-top: 1px solid #e5e5e5;
    }
    .subnav .nav > li:first-child > a,
    .subnav .nav > li:first-child > a:hover {
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }
    .elgg-page-header {
		height:auto;
	}
	body {
		padding-top:0;
	}
}

@media (min-width: 980px) {
  .subnav-fixed {
   left: 0;
    right: 0;
    z-index: 1020; /* 10 less than .navbar-fixed to prevent any overlap */
    border-color: #d5d5d5;
    border-width: 0 0 1px; /* drop the border on the fixed edges */
    -webkit-border-radius: 0;
       -moz-border-radius: 0;
            border-radius: 0;
    -webkit-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
       -moz-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
            box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false); /* IE6-9 */
  }
  .subnav-fixed .nav {
    width: 938px;
    margin: 0 auto;
    padding: 0 1px;
  }
  .subnav .nav > li:first-child > a,
  .subnav .nav > li:first-child > a:hover {
    -webkit-border-radius: 0;
       -moz-border-radius: 0;
            border-radius: 0;
  }
}

@media (min-width: 1210px) {
  .subnav-fixed .nav {
    width: 1168px; /* 2px less to account for left/right borders being removed when in fixed mode */
  }

}​

@media (min-width: 768px) and (max-width: 979px) {
	body {
		padding-top: 0;
	}
	.elgg-header-wrapper {
		margin-top:0;
	}
	.elgg-page-header {
		height:auto;
	}
}

@media (min-width: 480px) and (max-width:767px) {
	body {
		padding-top: 0;
	}
	.elgg-header-wrapper {
		margin:-20px;
		padding-left:10px;
	}
	.elgg-page-header {
		height:auto;
	}
}

@media (max-width: 480px) {
	body {
		padding-top: 0;
	}
	.elgg-page-header {
		height:auto;
	}
	.elgg-page .elgg-page-header {
		padding-top:0;
		margin-top:0;
	}
	.bootstrap-messages {
		z-index:100;
	 	right:0;
	 	top:0;
	}
}
	