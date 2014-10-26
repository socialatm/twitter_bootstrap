<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
 
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/engine/start.php");
require_once(elgg_get_plugins_path().'htmlawed/vendors/htmLawed/htmLawed.php');

$htmlawed_config = array(
		// seems to handle about everything we need.
		'safe' => true,
		// remove comments/CDATA instead of converting to text
		'comment' => 1,
		'cdata' => 1,
		'deny_attribute' => 'class, on*',
		'hook_tag' => 'htmlawed_tag_post_processor',
		'schemes' => '*:http,https,ftp,news,mailto,rtsp,teamspeak,gopher,mms,callto',
	);
	
// Get variables
$title = (string)htmLawed($_POST["title"][0], $htmlawed_config);
$desc = (string)htmLawed($_POST["description"][0], $htmlawed_config);
$access_id = (int)htmLawed($_POST["access"][0], $htmlawed_config);
$container_guid = elgg_get_logged_in_user_guid();
$tags = (string)htmLawed($_POST["tags"][0], $htmlawed_config);

// check if upload attempted and failed
if (!empty($_FILES['files']['name'][0]) && $_FILES['files']['error'][0] != 0) {
	$error = elgg_get_friendly_upload_error($_FILES['files']['error'][0]);
	register_error($error);
	forward(REFERER);
}

// must have a file if a new file upload
if (empty($_FILES['files']['name'][0])) {
	$error = elgg_echo('file:nofile');
	register_error($error);
	forward(REFERER);
}

$file = new FilePluginFile();
$file->subtype = "file";
$file->title = $title;
$file->description = $desc;
$file->access_id = $access_id;
$file->container_guid = $container_guid;
$file->tags = string_to_tag_array($tags);

// we have a file upload, so process it
if (isset($_FILES['files']['name'][0]) && !empty($_FILES['files']['name'][0])) {
	$prefix = "file/";
	$filestorename = elgg_strtolower(time().$_FILES['files']['name'][0]);
	$file->setFilename($prefix . $filestorename);
	$file->originalfilename = $_FILES['files']['name'][0];
	$mime_type = $_FILES['files']['type'][0];

	// hack for Microsoft zipped formats
	$info = pathinfo($_FILES['files']['name'][0]);
	$office_formats = array('docx', 'xlsx', 'pptx');
	if ($mime_type == "application/zip" && in_array($info['extension'], $office_formats)) {
		switch ($info['extension']) {
			case 'docx':
				$mime_type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
				break;
			case 'xlsx':
				$mime_type = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
				break;
			case 'pptx':
				$mime_type = "application/vnd.openxmlformats-officedocument.presentationml.presentation";
				break;
		}
	}

	// check for bad ppt detection
	if ($mime_type == "application/vnd.ms-office" && $info['extension'] == "ppt") {
		$mime_type = "application/vnd.ms-powerpoint";
	}

	$file->size = $_FILES['files']['size'][0];
	$file->setMimeType($mime_type);
	$file->simpletype = file_get_simple_type($mime_type);
	
	// Open the file to guarantee the directory exists
	$file->open("write");
	$file->close();
	move_uploaded_file($_FILES['files']['tmp_name'][0], $file->getFilenameOnFilestore());
	$guid = $file->save();
	
	// if image, we need to create thumbnails (this should be moved into a function)
	if ($guid && $file->simpletype == "image") {
		$file->icontime = time();
		
		$thumbnail = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 60, 60, true);
		if ($thumbnail) {
			$thumb = new ElggFile();
			$thumb->setMimeType($_FILES['upload']['type']);

			$thumb->setFilename($prefix."thumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumbnail);
			$thumb->close();

			$file->thumbnail = $prefix."thumb".$filestorename;
			unset($thumbnail);
		}

		$thumbsmall = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 153, 153, true);
		if ($thumbsmall) {
			$thumb->setFilename($prefix."smallthumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumbsmall);
			$thumb->close();
			$file->smallthumb = $prefix."smallthumb".$filestorename;
			unset($thumbsmall);
		}

		$thumblarge = get_resized_image_from_existing_file($file->getFilenameOnFilestore(), 600, 600, false);
		if ($thumblarge) {
			$thumb->setFilename($prefix."largethumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumblarge);
			$thumb->close();
			$file->largethumb = $prefix."largethumb".$filestorename;
			unset($thumblarge);
		}
	} elseif ($file->icontime) {
		// if it is not an image, we do not need thumbnails
		unset($file->icontime);
		
		$thumb = new ElggFile();
		
		$thumb->setFilename($prefix . "thumb" . $filestorename);
		$thumb->delete();
		unset($file->thumbnail);
		
		$thumb->setFilename($prefix . "smallthumb" . $filestorename);
		$thumb->delete();
		unset($file->smallthumb);
		
		$thumb->setFilename($prefix . "largethumb" . $filestorename);
		$thumb->delete();
		unset($file->largethumb);
	}
} else {
	// not saving a file but still need to save the entity to push attributes to database
	$file->save();
}

	if ($guid) {
		$message = elgg_echo("file:saved");
		system_message($message);
		elgg_create_river_item(array(
			'view' => 'river/object/file/create',
			'action_type' => 'create',
			'subject_guid' => elgg_get_logged_in_user_guid(),
			'object_guid' => $file->guid,
		));
	} else {
		// failed to save file object - nothing we can do about this
		$error = elgg_echo("file:uploadfailed");
		register_error($error);
	}
	$container = get_entity($container_guid);
	if (elgg_instanceof($container, 'group')) {
		forward("file/group/$container->guid/all");
	} else {
		$return = new stdClass();
		$return_file = new stdClass();
		$return_file->name = $file->get('title');
		$return_file->size = $file->__get('size');
		$return_file->url = $file->getURL();
		$return_file->thumbnailUrl = $file->getIconURL('small');
		$return_file->deleteUrl = elgg_add_action_tokens_to_url(elgg_get_config('url').'mod/file/actions/file/delete.php?guid='.$file->getGUID());
		$return_file->deleteType = "DELETE";
		$return_file->success = elgg_echo("file:saved");
		$return->files = array($return_file);
		echo json_encode($return);
		die();
	}
