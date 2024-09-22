<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;
use Joomla\CMS\Factory;

class BookEventModelEvents extends ListModel
{
    protected $_context = 'com_book_event.events';

    protected function getListQuery()
    {
        $db = Factory::getDbo();
        $query = $db->getQuery(true);

        $query->select('*')
              ->from('#__book_event');

        return $query;
    }

    protected function populateState($ordering = null, $direction = null)
    {
        // List state information
        parent::populateState('id', 'ASC');
    }

    protected function getStoreId($id = '')
    {
        // Compile the store id
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }
}
