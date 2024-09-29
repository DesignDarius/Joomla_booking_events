<?php
namespace Bookevent\Component\Book_event\Site\Model;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\FormModel;
use Joomla\CMS\Language\Text;

class BookingModel extends FormModel
{
    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_book_event.booking', 'booking', array('control' => 'jform', 'load_data' => $loadData));

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $data = Factory::getApplication()->getUserState('com_book_event.edit.booking.data', array());

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    public function save($data)
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $columns = ['name', 'email', 'event_id', 'booking_date', 'status'];
        $values = [
            $db->quote($data['name']),
            $db->quote($data['email']),
            (int) $data['event_id'],
            $db->quote(Factory::getDate()->toSql()),
            $db->quote('pending')
        ];

        $query->insert($db->quoteName('#__book_event_bookings'))
            ->columns($db->quoteName($columns))
            ->values(implode(',', $values));

        try {
            $db->setQuery($query);
            $db->execute();
            return true;
        } catch (\Exception $e) {
            Factory::getApplication()->enqueueMessage(Text::_('COM_BOOK_EVENT_DATABASE_ERROR') . $e->getMessage(), 'error');
            return false;
        }
    }

    // You can keep the existing saveBooking method if you need it for other purposes
    public function saveBooking($data)
    {
        return $this->save($data);
    }
}