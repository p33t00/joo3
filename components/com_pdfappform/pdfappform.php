<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

defined('_JEXEC') or die;

$controller	= JControllerLegacy::getInstance('pdfappform');

// get path to component
$path = $controller->get('basePath');
// Add a reference to a CSS file
// The default path is 'media/system/css/'
JHtml::stylesheet(substr($path, (strpos($path, 'comp'))).'/css/style.css');

$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
?>
