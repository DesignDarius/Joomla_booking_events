<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\FormModel;

class BookingModelBooking extends FormModel
{
    protected function populateState()
    {
        $app = \JFactory::getApplication('site');
        $id = $app->input->getInt('id');
        $this->setState('booking.id', $id);
        parent::populateState();
    }

    public function getItem($pk = null)
    {
        $pk = $pk ?: $this->getState('booking.id');
        $table = $this->getTable();
        if (!$table->load($pk)) {
            return false;
        }
        return $table;
    }

    public function getTable($type = 'Booking', $prefix = 'BookingTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }
}
