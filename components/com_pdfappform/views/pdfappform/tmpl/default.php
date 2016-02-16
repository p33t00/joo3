<?php 
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="pdf-app-form">
	<form method="post" id="pdfappform" name="pdfappform" class="form-validate">
		<dl>
		<div>
			<div>
				<dt><?php echo $this->form->getLabel('first_name'); ?></dt>
				<dd><?php echo $this->form->getInput('first_name'); ?></dd>
				
			</div>
			<div>
				<dt><?php echo $this->form->getLabel('last_name'); ?></dt>
				<dd><?php echo $this->form->getInput('last_name'); ?></dd>
			</div>
		</div>
		<div>
			<div>
			<dt><?php echo $this->form->getLabel('email'); ?></dt>
			<dd><?php echo $this->form->getInput('email'); ?></dd>
			</div>
			<div>
			<dt><?php echo $this->form->getLabel('phone'); ?></dt>
			<dd><?php echo $this->form->getInput('phone'); ?></dd>
			</div>
		</div>
			<dt></dt>
			<dd><button class="button validate" type="submit"><?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_SUBMIT'); ?></button>
		</dl>
			<dd><input type="hidden" name="option" value="com_pdfappform" />		
				<input type="hidden" name="task" value="pdfappform.confirm" />
				<?php echo JHtml::_( 'form.token' ); ?>
			</dd>
	</form>
</div>