<?php
/**
 * @package		Administrator
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

// No direct access
defined('_JEXEC') or die;


/**
 * @package		Administrator
 * @subpackage	com_peetcontact
 */
class TableEdit extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	public function __construct(& $db)
	{
		parent::__construct('#__paf_messages', 'id', $db);
	}
}
