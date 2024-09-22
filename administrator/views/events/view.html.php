<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;

class BookEventViewEvents extends HtmlView
{
    protected $items;
    protected $pagination;
    protected $state;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');

        // Preparing filters
        $this->prepareFilters();

        // Provera grešaka
        if (count($errors = $this->get('Errors')))
        {
            Factory::getApplication()->enqueueMessage(implode("\n", $errors), 'error');
            return false;
        }

        // Set the toolbar
        $this->addToolbar();

        // Display the template
        parent::display($tpl);
    }

    protected function prepareFilters()
    {
        $app = Factory::getApplication();
        $input = $app->input;

        // Filter search
        $this->state->set('list.filter.search', $input->getString('filter-search'));

        // Filter state
        $this->state->set('filter.state', $input->getInt('filter_state'));
    }

    protected function addToolbar()
    {
        ToolbarHelper::title(Text::_('COM_BOOK_EVENT_EVENTS'), 'book-event events');

        ToolbarHelper::addNew('event.add');
        ToolbarHelper::editList('event.edit');
        ToolbarHelper::deleteList('', 'events.delete', 'JTOOLBAR_DELETE');
        ToolbarHelper::divider();
        ToolbarHelper::help('screen.book-event');
    }
}
