<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modellist');

class SoundmapModelSoundmaps extends JModelList
{
        /**
         * Method to build an SQL query to load the list data.
         *
         * @return      string  An SQL query
         */
        protected function getListQuery()
        {
                // Create a new query object.           
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                // Select some fields from the sounds table
                $query
                    ->select('id,name,path,description,category_id')
                    ->from('sm_sounds');
 
                return $query;
        }
}