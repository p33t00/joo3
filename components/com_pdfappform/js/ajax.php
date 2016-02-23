<?php
define( '_JEXEC', 1 );
// defining the base path.
if (stristr( $_SERVER['SERVER_SOFTWARE'], 'win32' )) 
{
    define( 'JPATH_BASE', realpath(dirname(__FILE__).'\..\..\..' ));
}
else define( 'JPATH_BASE', realpath(dirname(__FILE__).'/../../..' ));

define( 'DS', DIRECTORY_SEPARATOR );
// including the main joomla files
require_once ( JPATH_BASE.DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE.DS.'includes'.DS.'framework.php' );
require_once ('..'.DS.'..'.DS.'..'.DS.'libraries'.DS.'tcpdf'.DS.'tcpdf.php');

// Creating an app instance
$app =& JFactory::getApplication('site');
$app->initialise();

// Loading Language file
$lang =& JFactory::getLanguage();
$lang->load('com_pdfappform',JPATH_ROOT);
   
$data = $app->getUserState('pdfData');

$pdf = new TCPDF();
$pdf->SetFont('arialrus', '');
$pdf->AddPage();
$pdf->setTitle("Application to Club of Czeslaw Niemen");
$html = JText::sprintf(JText::_("COM_PDFAPPFORM_APPLICATION_FORM"), $data['first_name']);
$pdf->Write(3.3, "24 августа 2010 года");
$pdf->writeHTMLCell(0, 0, '', '', $html);
$pdf->Output("ManiggasTest.pdf", 'D');
?>
