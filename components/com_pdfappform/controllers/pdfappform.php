<?php
/**
 * @package		Peet.Site
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

defined('_JEXEC') or die;


require_once(JPATH_LIBRARIES.'/tcpdf/tcpdf.php');
jimport('joomla.application.component.controllerform');

class PdfappformControllerPdfappform extends JControllerForm
{
	private $model;

	public function confirm()
	{
		$app = JFactory::getApplication('site');

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Get the data from POST
		$data = $app->input->post->get('jform', array(), 'ARRAY');

		// Save the data in the session.
		$app->setUserState('com_pdfappform.data', $data);

		$view = $this->getView('pdfappform','html');
		$view->formData = $data;
		$view->confirm();
	}

	public function cancel()
	{
		$app = JFactory::getApplication('site');
		$app->setUserState('com_pdfappform.data', $data);
		$this->setRedirect(JRoute::_(JURI::base(), false));
	}

	public function submit()
	{
		// Initialise variables.
		$app = JFactory::getApplication('site');
		$this->model = $this->getModel();
		$model = $this->model;

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

	// Validate the posted data.
		$form = $model->getForm();

		 if (!$form) {
			JError::raiseError(500, $model->getError());
			return false;
		}

		$data = $app->getUserState('com_pdfappform.data');

		if (!$this->_dataCompare($form, $data))
		{
			throw new Exception(JText::_('PDFAPPFORM_MILICIOUS_DATA_INJECTION'));
		}

		$validate = $model->validate($form, $data);

		if ($validate === false) {
			// Get the validation messages.
			$errors	= $model->getErrors();
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
				if ($errors[$i] instanceof Exception) {
					$app->enqueueMessage($errors[$i]->getMessage(), 'notice');
				} else {
					$app->enqueueMessage($errors[$i], 'notice');
				}
			}
			
			// Redirect back to the contact form.
			$this->setRedirect(JRoute::_('join-us', false));

			return false;
		}
		
		// Save data in DB
		$model->save($data);

		$view = $this->getView('pdfappform','html');
		$view->success();

		// Prepare data for pdf file to clear form data
		$app->setUserState('pdfData', $data);
		// Flush the data from the session
		$app->setUserState('com_pdfappform.data', null);

	}

	/**
	 * Compare form data and session data.
	 *
	 * @param   object  $form   JForm object with populated input values.
	 * @param   array   $data  An associative array of form values.
	 *
	 * @return  boolean 
	 *
	 * @since   2.5
	 */
	private function _dataCompare(JForm $form, $data)
	{
		foreach ($data as $key => $value) {
			if($form->getValue($key) != $value) return false;
		}
		return true;
	}
}
?>
