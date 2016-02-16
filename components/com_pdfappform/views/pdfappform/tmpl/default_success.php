<?php 
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div>
	<h3><?php echo JText::_('COM_PDFAPPFORM_SUCCESSFULL_APPLICATION_SEND'); ?></h3>
	<a href="#" id="aaaid">Click MEe</a>
</div>	

<div id="response"></div>


<script>
var link;
link = document.getElementById("aaaid");
link.onclick = function()
{
	window.location = "components/com_pdfappform/js/ajax.php";
}
</script>