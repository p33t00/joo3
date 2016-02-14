<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 // Загружаем тултипы.
JHtml::_('behavior.tooltip');
// Загружаем проверку формы.
JHtml::_('behavior.formvalidation');
?>

<form action="<?php echo JRoute::_('index.php?option=com_peetcontact'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	
	<div class="form-horizontal">
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'cont-info')); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'cont-info', JText::_('COM_PEETCONTACT_CONTACT_EDIT')); ?>
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid form-horizontal-desktop">
					<div class="span6">
						<?php echo $this->form->renderField('name'); ?>
						<?php echo $this->form->renderField('last_name'); ?>
						<?php echo $this->form->renderField('tel_01'); ?>
						<?php echo $this->form->renderField('tel_02'); ?>
						<?php echo $this->form->renderField('fax'); ?>
						<?php echo $this->form->renderField('email'); ?>
						<?php echo $this->form->renderField('social01'); ?>
						<?php echo $this->form->renderField('social02'); ?>
					</div>
				</div>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display', JText::_('COM_PEETCONTACT_FIELD_DISPLAY_SETTINGS')); ?>
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid form-horizontal-desktop">
					<div class="span6">
						<?php echo $this->form->renderFieldset('contact-params'); ?>
					</div>
				</div>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'form-settings', JText::_('COM_PEETCONTACT_FIELD_FORM_SETTINGS')); ?>
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid form-horizontal-desktop">
					<div class="span6">
						<?php echo $this->form->renderFieldset('contact-form-display'); ?>
					</div>
				</div>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>

