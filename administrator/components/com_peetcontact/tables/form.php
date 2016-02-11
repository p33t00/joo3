<?php
/**
 * @package		Administrator
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

// No direct access
defined('_JEXEC') or die;

// import Joomla table library
jimport('joomla.database.table');

/**
 * @package		Administrator
 * @subpackage	com_peetcontact
 */
class TableForm extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	public function __construct(& $db)
	{
		parent::__construct('#__peetcontact', 'id', $db);
	}

	public function bind($array, $ignore = '')
	{
		// Конвертируем поле параметров в JSON строку.
		if (isset($array['params']) && is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string) $registry;
		}
		return parent::bind($array, $ignore);
	}

}
