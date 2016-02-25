<?php 
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="pdf-app-form">
	<form method="post" id="pdfappform" name="pdfappform" class="form-validate">
		<dl>
			<p>
				<?php echo JText::sprintf(JText::_("COM_PDFAPPFORM_CONFIRMATION_FORM"), $this->formData['first_name'], $this->formData['last_name'], $this->formData['phone'], $this->formData['email']); ?>
			</p>
			<input class="button validate" type="submit" value="<?php echo JText::_('COM_PDFAPPFORM_APPLICATION_DATA_CONFIRM'); ?>" />
			<input class="button" type="button" onclick="location.href='?task=pdfappform.cancel';" value="<?php echo JText::_('COM_PDFAPPFORM_APPLICATION_DATA_CANCEL');?>" />
			<input type="hidden" name="option" value="com_pdfappform" />
			<input type="hidden" name="task" value="pdfappform.submit" />
			<?php echo JHtml::_( 'form.token' ); ?>
		</dl>
	</form>
</div>