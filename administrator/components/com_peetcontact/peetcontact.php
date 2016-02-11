<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

defined('_JEXEC') or die;

$controller	= JControllerLegacy::getInstance('peetcontact');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

?>