<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
// Загружаем проверку формы.
JHtml::_('behavior.formvalidation');
?>

<form action="<?php echo JRoute::_('index.php?option=com_pdfappform&id='.(int) $this->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="width-100 fltlft">
		<fieldset class="adminform">
		<legend><?php echo JText::_('COM_PDFAPPFORM_FORM_EDIT'); ?></legend>
		<ul class="adminformlist">
			<li><?php echo $this->form->getLabel('id'); ?>
			<?php echo $this->form->getInput('id'); ?></li>

			<li><?php echo $this->form->getLabel('first_name'); ?>
			<?php echo $this->form->getInput('first_name'); ?></li>

			<li><?php echo $this->form->getLabel('last_name'); ?>
			<?php echo $this->form->getInput('last_name'); ?></li>

			<li><?php echo $this->form->getLabel('email'); ?>
			<?php echo $this->form->getInput('email'); ?></li>

			<li><?php echo $this->form->getLabel('phone'); ?>
			<?php echo $this->form->getInput('phone'); ?></li>
		</ul>
		</fieldset>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>