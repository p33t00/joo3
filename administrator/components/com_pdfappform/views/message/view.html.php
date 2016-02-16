<?php
/**
 * @package		Peet.Admin
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML Contact View class for the Peet Contact component
 *
 * @package		Peet.Admin
 * @subpackage	com_pdfappform
 * @since 		1.5
 */
class PdfappformViewMessage extends JViewLegacy{

	public $state;
	public $items;
	public $pagination;

	public function display($tpl=null)
	{/*
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->sortDirection = $this->state->get('list.direction');
		$this->sortColumn = $this->state->get('list.ordering');

		$this->addToolbar();*/
		parent::display($tpl);
	}

	private function addToolbar()
	{
		JToolBarHelper::editList('edit.edit'); 
		JToolBarHelper::deleteList('','del.delete');
	}
}