<?php
/**
 * @package		Peet.Site
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class PeetcontactControllerPeetcontact extends JControllerForm
{
	private $model;

	public function submit()
	{
		// Initialise variables.
		$app	= JFactory::getApplication('site');
		$this->model = $this->getModel();
		$model = $this->model;

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Get the data from POST
		$data = JRequest::getVar('jform', array(), 'post', 'array');

	// Validate the posted data.
		$form = $model->getForm();
		if (!$form) {
			JError::raiseError(500, $model->getError());
			return false;
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
			
			// Save the data in the session.
			$app->setUserState('com_peetcontact.data', $data);

			// Redirect back to the contact form.
			$this->setRedirect(JRoute::_('index.php', false));

			return false;
		}
		
		// Save data in DB
//		$model->save($data);

		$adminEmail = $this->getParams()->get('email_address');

		if($this->getParams()->get('send_email') && !empty($adminEmail))
		{
			$sent = $this->_sendEmail($data,$adminEmail);
		}

		// Flush the data from the session
		$app->setUserState('com_peetcontact.data', null);

		// Redirect back to the contact form.
		$this->setRedirect(JRoute::_('index.php'), JText::_('COM_PEETCONTACT_PEETCONTACT_SUCCESSFULL_MESSAGE_SEND'), 'message');
	}

	private function getParams()
	{
		$params = $this->model->getItem()->params;
		return $params;
	}

	private function _sendEmail($data, $sendTo)
	{
			$mailfrom	= "JoomlaPeetMessages@myservice.com";
			$sitename	= JFactory::getApplication()->getCfg('sitename');

			$name		= $data['first_name'];
			$last		= $data['last_name'];
			$email		= $data['email'];
			$phone		= $data['phone'];
			$message	= $data['message'];

			// Prepare email body
			$format = JText::_('COM_PEETCONTACT_EMAIL_MESSAGE_BODY');
			$body = JText::sprintf($format, $name, $last, $email, $phone, stripslashes($message));						//	CHECK IF THERE ARE ANY SLASHES

			$mail = JFactory::getMailer();
			$mail->addRecipient($sendTo);
			$mail->setSender($mailfrom);
			$mail->setSubject($sitename.': '.$name.' '.$last);
			$mail->setBody($body);
			$sent = $mail->Send();

			return $sent;
	}
}
?>
