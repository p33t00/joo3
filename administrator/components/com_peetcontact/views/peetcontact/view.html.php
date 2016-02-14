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
 * @subpackage	com_peetcontact
 * @since 		1.5
 */
class PeetcontactViewPeetcontact extends JViewLegacy{

	public $state;
	public $items;
	public $itm;
	public $pagination;

	public function display($tpl=null){

		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->sortDirection = $this->state->get('list.direction');
		$this->sortColumn = $this->state->get('list.ordering');

		$this->addToolbar();
		parent::display($tpl);
	}


	/*
	* 	Method for displaying a message
	*	Uses JModelForm::getItem();
	*/
	public function showMess()
	{
		$model = $this->getModel();
		$this->itm = $model->getItem(JRequest::getInt('id'));

		$this->addToolbar();
		parent::display('message');
	}

	protected function addToolbar()
	{
		JRequest::getWord('layout') ?
		JToolBarHelper::cancel() :
		JToolBarHelper::deleteList('','peetcontact.delete');
	}
}