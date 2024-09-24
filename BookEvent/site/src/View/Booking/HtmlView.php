<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

class BookEventViewBooking extends HtmlView
{
    protected $events;

    public function display($tpl = null)
    {
        $this->events = $this->get('Items'); // Dobavlja događaje iz baze
        parent::display($tpl);
    }
}
