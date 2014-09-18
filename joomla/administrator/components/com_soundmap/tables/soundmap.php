<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');

class SoundmapTableSoundmap extends JTable
{
        /**
         * Constructor
         *
         * @param object Database connector object
         */
        function __construct(&$db) 
        {
                parent::__construct('sm_sounds', 'id', $db);
        }
}