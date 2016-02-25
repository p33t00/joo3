<?php 
// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="pdf-app-form">
	<div id="pdfappform">
		<div class="success-wrap">
		<h3><?php echo JText::_('COM_PDFAPPFORM_SUCCESSFULL_APPLICATION_SEND'); ?></h3>
		<a class="button" href="index.php"><h5><?php echo JText::_('COM_PDFAPPFORM_SUCCESSFULL_APPLICATION_SEND_GO_HOME'); ?></h5></a>
		<div class="pdfLinkContainer">
			<a href="#" id="foo">
				<img src="<?php echo JURI::root().'components/com_pdfappform/img/small464c52.png';?>" width='13' height='14'>
				<p><?php echo JText::_('COM_PDFAPPFORM_SUCCESSFULL_APPLICATION_GET_PDF'); ?></p>
			</a>
		</div>
		</div>
	</div>
</div>	

<div id="response"></div>

<script>
var link;
link = document.getElementById("foo");
link.onclick = function()
{
	window.location = "../components/com_pdfappform/js/ajax.php";
}
</script>