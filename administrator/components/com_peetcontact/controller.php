<?php

defined('_JEXEC') or die;

/**
 * Peetcontact Component Controller
 *
 * @package		Peet.Administrator
 * @subpackage	com_peetcontact
 * @since 1.5
 */

jimport('joomla.application.component.controller');
jimport(JPATH_COMPONENT.DS.'models.peetcontact');
require_once JPATH_COMPONENT.DS.'helpers/peetcontact.php';

class PeetcontactController extends JControllerLegacy{

	public function display($cachable = false, $urlparams = array()){

		PeetcontactHelper::addSubmenu(JRequest::getCmd('view', 'peetcontact'));
		
		// Устанавливаем представление по умолчанию, если оно не было установлено.
		//К чему это установление ???
/*		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'peetcontact'));
*/
		//$model = $this->getModel('peetcontact');
		//$model->halo();

		parent::display($cachable);
		
	}
}

?>