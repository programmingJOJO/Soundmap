<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');
 
class SoundmapModelSoundmap extends JModelItem
{
        protected $sounds;

        public function getTable($type = 'Soundmap', $prefix = 'SoundmapTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }

        public function getSound() 
        {
                if (!is_array($this->sounds))
                {
                        $this->sounds = array();
                }
 
				$jinput = JFactory::getApplication()->input;
				$id = 74;

				$table = $this->getTable();
				$table->load($id);
				$this->sounds[$id] = $table->path;
 
                return $this->sounds[$id];
        }
}