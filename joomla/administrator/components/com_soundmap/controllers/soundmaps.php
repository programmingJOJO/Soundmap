<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controlleradmin');
 
class SoundmapControllerSoundmaps extends JControllerAdmin
{
        /**
         * Proxy for getModel.
         * @since       2.5
         */
        public function getModel($name = 'Soundmap', $prefix = 'SoundmapModel') 
        {
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }
}