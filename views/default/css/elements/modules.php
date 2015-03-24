/* <style> /**/

/* ***************************************
	Modules
*************************************** */
.elgg-module {
	overflow: hidden;
	margin-bottom: 20px;
}

/* Aside */
.elgg-module-aside .elgg-head {
	border-bottom: 1px solid #CCC;
	
	margin-bottom: 5px;
	padding-bottom: 5px;
}

/* Info */
.elgg-module-info  .elgg-head {
	background-color: #FAFAFA;
	background-repeat: repeat-x;
	border: 1px solid #D4D4D4;
	padding: 5px;
	margin-bottom: 10px;
	border-radius: 3px;
}
.elgg-module-info > .elgg-head * {
	color: #333;
}

/* Popup */
.elgg-module-popup {
	background-color: white;
	border: 1px solid #ccc;
	z-index: 9999;
	margin-bottom: 0;
	padding: 5px;
	border-radius: 6px;
	box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
}
.elgg-module-popup > .elgg-head {
	margin-bottom: 5px;
}
.elgg-module-popup > .elgg-head * {
	color: #0054A7;
}

/* Dropdown */
.elgg-module-dropdown {
	background-color:white;
	border:5px solid #CCC;
	border-radius: 5px 0 5px 5px;
	display:none;
	width: 210px;
	padding: 12px;
	margin-right: 0;
	z-index:100;
	box-shadow: 0 3px 3px rgba(0, 0, 0, 0.45);
	position:absolute;
	right: 0;
	top: 100%;
}

/* Featured */
.elgg-module-featured {
	border: 1px solid #4690D6;
	border-radius: 6px;
}
.elgg-module-featured > .elgg-head {
	padding: 5px;
	background-color: #4690D6;
}
.elgg-module-featured > .elgg-head * {
	color: white;
}
.elgg-module-featured > .elgg-body {
	padding: 10px;
}

/* ***************************************
	Widgets
*************************************** */
.elgg-widgets {
	min-height: 30px;
}
.elgg-widget-add-control {
	text-align: right;
	margin: 5px 5px 15px;
}
.elgg-widgets-add-panel {
	padding: 10px;
}

.elgg-widgets-add-panel ul {
	padding: 10px;
	margin: 10px;
}

.elgg-widgets-add-panel li {
	margin: 2px 0;
}
.elgg-widgets-add-panel li a {
	display: block;
}
.elgg-widgets-add-panel .elgg-state-available {
	color: #333;
	cursor: pointer;
}
.elgg-widgets-add-panel .elgg-state-available:hover {
	background-color: #bcbcbc;
}
.elgg-widgets-add-panel .elgg-state-unavailable {
	color: #888;
}

.elgg-module-widget {
	background-color: #dedede;
	padding: 2px;
	margin-bottom: 15px;
	position: relative;
}
.elgg-module-widget:hover {
	background-color: #ccc;
}
.elgg-module-widget > .elgg-head {
	overflow: hidden;
	background-color: #FAFAFA;
	background-repeat: repeat-x;
	border: 1px solid #D4D4D4;
	min-height: 40px;
}
.elgg-module-widget > .elgg-head h3 {
	float: left;
	padding: 4px 45px 0 20px;
	color: #666;
}

// this is a must keep
.elgg-module-widget.elgg-state-draggable .elgg-widget-handle {	
	cursor:move;
}

.elgg-module-widget > .elgg-body {
	background-color: white;
	width: 100%;
	overflow: hidden;
	border-top: 2px solid #dedede;
}
.elgg-widget-edit {
	display: none;
	background-color: #f9f9f9;
}

//	this is a must keep
.elgg-widget-placeholder {							
	border: 2px dashed #dedede;
	margin-bottom: 15px;
}