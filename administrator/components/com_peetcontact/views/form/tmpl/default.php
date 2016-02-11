<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 // Загружаем тултипы.
JHtml::_('behavior.tooltip');
// Загружаем проверку формы.
JHtml::_('behavior.formvalidation');
?>

<form action="<?php echo JRoute::_('index.php?option=com_peetcontact'); ?>" method="post" name="adminForm" id="message-form" class="form-validate">
	<div class="width-60 fltlft">
	
		<fieldset class="adminform">
		<legend><?php echo JText::_('COM_PEETCONTACT_CONTACT_EDIT'); ?></legend>
		<ul class="adminformlist">
			<li><?php echo $this->form->getLabel('name'); ?>
			<?php echo $this->form->getInput('name'); ?></li>

			<li><?php echo $this->form->getLabel('last_name'); ?>
			<?php echo $this->form->getInput('last_name'); ?></li>

			<li><?php echo $this->form->getLabel('tel_01'); ?>
			<?php echo $this->form->getInput('tel_01'); ?></li>

			<li><?php echo $this->form->getLabel('tel_02'); ?>
			<?php echo $this->form->getInput('tel_02'); ?></li>
			
			<li><?php echo $this->form->getLabel('fax'); ?>
			<?php echo $this->form->getInput('fax'); ?></li>

			<li><?php echo $this->form->getLabel('email'); ?>
			<?php echo $this->form->getInput('email'); ?></li>

			<li><?php echo $this->form->getLabel('social01'); ?>
			<?php echo $this->form->getInput('social01'); ?></li>

			<li><?php echo $this->form->getLabel('social02'); ?>
			<?php echo $this->form->getInput('social02'); ?></li>
		</ul>
		</fieldset>
	</div>
		

	<div class="width-40 fltrt">
		<?php echo  JHtml::_('sliders.start', 'peetcontact-slider'); ?>
	
<fieldset class="panelform">
		<?php	$fieldSets = $this->form->getFieldsets('params');
foreach ($fieldSets as $name => $fieldSet) :
	echo JHtml::_('sliders.panel', JText::_($fieldSet->label), $name.'-params');
	if (isset($fieldSet->description) && trim($fieldSet->description)) :
		echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
	endif;
	?>
	<fieldset class="panelform" >
		<ul class="adminformlist">
			<?php foreach ($this->form->getFieldset($name) as $field) : ?>
				<li><?php echo $field->label; ?>
				<?php echo $field->input; ?></li>
			<?php endforeach; ?>
		</ul>
	</fieldset>
<?php endforeach; ?>
		</fieldset>


		<?php echo JHtml::_('sliders.end'); ?>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
