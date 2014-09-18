<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');
 
class SoundmapViewSoundmaps extends JViewLegacy
{
        /**
         * Soundmaps view display method
         * @return void
         */
        function display($tpl = null) 
        {
                // Get data from the model
                $items = $this->get('Items');
                $pagination = $this->get('Pagination');
 
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Assign data to the view
                $this->items = $items;
                $this->pagination = $pagination;
 
                // Set the toolbar and number of found items
                $this->addToolBar($this->pagination->total);
 
                // Display the template
                parent::display($tpl);
 
                // Set the document
                $this->setDocument();
        }
 
        /**
         * Setting the toolbar
         */
        protected function addToolBar($total=null) 
        {
                JToolBarHelper::title(JText::_('COM_SOUNDMAP_MANAGER_SOUNDMAPS').
                        //Reflect number of items in title!
                        ($total?' <span style="font-size: 0.5em; vertical-align: middle;">('.$total.')</span>':'')
                        , 'soundmap');
                JToolBarHelper::deleteList('', 'soundmaps.delete');
                JToolBarHelper::editList('soundmap.edit');
                JToolBarHelper::addNew('soundmap.add');
        }
        /**
         * Method to set up the document properties
         *
         * @return void
         */
        protected function setDocument() 
        {
                $document = JFactory::getDocument();
                $document->setTitle(JText::_('COM_SOUNDMAP_ADMINISTRATION'));
        }
}