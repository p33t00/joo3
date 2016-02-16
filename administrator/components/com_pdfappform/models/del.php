<?php
/**
 * @package		Peet.Administrator
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude !!!
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Peetcontact Component Model
 *
 * @package		Peet.Administrator
 * @subpackage	com_peetcontact
 * @since 1.5
 */

class PdfappformModelDel extends JModelAdmin
{
	public function getTable($name = 'Edit', $prefix = 'Table', $options = array())
	{
		$tbl = parent::getTable($name, $prefix, $options);
		return $tbl;
	}

	public function getForm($data = array(), $loadData = true)
	{
		//...need to define this method cos it's abstract
	}
}
