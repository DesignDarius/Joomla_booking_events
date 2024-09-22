<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

class BookEventViewEvent extends HtmlView
{
    protected $item;
    protected $form;
    protected $state;

    public function display($tpl = null)
    {
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');
        $this->state = $this->get('State');

        if (count($errors = $this->get('Errors')))
        {
            JFactory::getApplication()->enqueueMessage(implode("\n", $errors), 'error');
            return false;
        }

        parent::display($tpl);
    }
}
