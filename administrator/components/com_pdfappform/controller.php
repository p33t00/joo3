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
require_once JPATH_COMPONENT.DS.'helpers/pdfappform.php';

class PdfappformController extends JControllerLegacy{

	public function display($cachable = false, $urlparams = array())
	{
		PdfappformHelper::addSubmenu($this->input->get('view', 'contacts'));
		parent::display($cachable);
	}
}
?>