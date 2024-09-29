<?php
namespace Bookevent\Component\Book_event\Administrator\Model;

use Joomla\CMS\MVC\Model\ListModel;

class BookingsModel extends ListModel
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'name', 'a.name',
                'event', 'a.event',
                'booking_date', 'a.booking_date',
                'status', 'a.status'
            );
        }

        parent::__construct($config);
    }

    protected function getListQuery()
    {
        $db    = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('a.*')
              ->from($db->quoteName('#__book_event_bookings', 'a'));

        return $query;
    }
}