<?php

defined('_JEXEC') or die;

class plgSystemPeetLibPlg extends JPlugin
{
	public function onAfterInitialise()
    {
        JLoader::register('PeetLibThmbmaker', JPATH_LIBRARIES . '/peetthmb/thmbmaker.php');
    }
}
?>