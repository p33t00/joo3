<?php
  defined('_JEXEC') or die;

  JHtml::_('behavior.framework', true);            // !!! Attention  !!!

  header("Content-Type: text/html; charset=utf-8");             //возможно для русских шрифтов
  jimport('joomla.environment.browser');

  $doc =     JFactory::getDocument();
  $browser = JBrowser::getInstance();
?>

<!DOCTYPE html>
<html>
<head>
  <jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/main.css" type="text/css" />
  <?php if ($browser->getBrowser() === "chrome"){ echo "<link rel='stylesheet' href='$this->baseurl/templates/$this->template/css/general_chrome.css' type='text/css' />";} ?>     
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>CN Club</title>
</head>

<body>
  <div class="wrapper">
  
    <header>
      <jdoc:include type="modules" name="header" style="xhtml" />    <!-- style="xhtml"    делает возможным отражение заголовка модулей  -->
    </header>

    <div class="main-menu">
      <jdoc:include type="modules" name="Main-Menu" style="xhtml" />
    </div>

    <div class="breadCramps">
      <jdoc:include type="modules" name="bread-cramps" style="xhtml" />
    </div>

     <div class="content">
      <div>
        <jdoc:include type="modules" name="mid-top" style="xhtml" />
      </div>

      <jdoc:include type="message" />
      <div class="components">
        <jdoc:include type="component" />
      </div>

      <div class="mid-bottom">
        <jdoc:include type="modules" name="mid-bottom" style="xhtml" />
      </div>
    </div>

   
  </div>
  <footer class="footer">
     <jdoc:include type="modules" name="footer" style="xhtml" />
  </footer>
</body>
</html>