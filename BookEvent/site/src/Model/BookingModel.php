<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\AdminModel;

class BookEventModelBooking extends AdminModel
{
    public function saveBooking($data)
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $columns = ['name', 'email', 'event_id'];
        $values = [
            $db->quote($data['name']),
            $db->quote($data['email']),
            (int) $data['event_id']
        ];

        $query->insert($db->quoteName('#__book_event_bookings'))
            ->columns($db->quoteName($columns))
            ->values(implode(',', $values));

        try {
            $db->setQuery($query);
            $db->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
