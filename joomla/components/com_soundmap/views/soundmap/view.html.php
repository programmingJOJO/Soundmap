<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');
 
class SoundmapViewSoundmap extends JViewLegacy
{
        function display($tpl = null) 
        {
                // Assign data to the view
                $this->sound = $this->get('Sound');
				
				$this->pageUrl = 'http';
 				if ($_SERVER["HTTPS"] == "on")
				{
					$this->pageUrl .= "s";
				}
 				$this->pageUrl .= "://";
 				if ($_SERVER["SERVER_PORT"] != "80")
				{
  					$this->pageUrl .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/joomla/administrator/components/com_soundmap";
 				} else
				{
  					$this->pageUrl .= $_SERVER["SERVER_NAME"]."/soundmap/joomla/administrator/components/com_soundmap";
				 }
				 
				$this->soundUrl = $this->pageUrl;
				$this->soundUrl .= $this->sound;

                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
                        return false;
                }
                // Display the view
                parent::display($tpl);
        }
}