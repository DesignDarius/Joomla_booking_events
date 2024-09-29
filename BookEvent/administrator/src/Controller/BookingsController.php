<?php
namespace Bookevent\Component\Book_event\Administrator\Controller;

use Joomla\CMS\MVC\Controller\AdminController;

class BookingsController extends AdminController
{
    public function getModel($name = 'Booking', $prefix = 'Administrator', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}