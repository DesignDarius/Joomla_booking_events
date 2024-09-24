<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

class BookEventViewBooking extends HtmlView
{
    protected $items;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items'); // Učitava rezervacije iz modela
        parent::display($tpl);
    }
}
