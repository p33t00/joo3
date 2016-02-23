<?php 
// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="success-wrap">
	<h3><?php echo JText::_('COM_PDFAPPFORM_SUCCESSFULL_APPLICATION_SEND'); ?></h3>
	<a class="button" href="index.php"><h5><?php echo JText::_('COM_PDFAPPFORM_SUCCESSFULL_APPLICATION_SEND_GO_HOME'); ?></h5></a>
	<div>
		<img src="<?php echo JURI::root().'components/com_pdfappform/img/464c52.png';?>">
		<a href="#" id="foo"><?php echo JText::_('COM_PDFAPPFORM_SUCCESSFULL_APPLICATION_GET_PDF'); ?></a>
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