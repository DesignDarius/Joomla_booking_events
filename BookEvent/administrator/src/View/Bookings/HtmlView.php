<?php
namespace Bookevent\Component\Book_event\Administrator\View\Bookings;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;

class HtmlView extends BaseHtmlView
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $booking; // for the booking item editing

    public function display($tpl = null)
    {
        // Check the layout, it could be 'edit' or 'default'
        $layout = $this->getLayout();

        if ($layout === 'edit') 
        {
            $this->booking = $this->get('Item'); // Fetch the single booking item for editing
        } 
        else 
        {
            // For the default layout
            $this->items         = $this->get('Items');
            $this->pagination    = $this->get('Pagination');
            $this->state         = $this->get('State');

            // Check for errors.
            if (count($errors = $this->get('Errors'))) 
            {
                throw new \Exception(implode("\n", $errors), 500);
            }

            $this->addToolbar();
        }

        return parent::display($tpl);
    }

    protected function addToolbar()
    {
        ToolbarHelper::title(Text::_('COM_BOOK_EVENT_MANAGER_BOOKINGS'), 'calendar');

        // Check if the user can add a new booking
        if (Factory::getUser()->authorise('core.create', 'com_book_event')) 
        {
            ToolbarHelper::addNew('booking.add');
        }

        // Check if the user can edit
        if ($this->booking) 
        {
            ToolbarHelper::editList('booking.edit');
            ToolbarHelper::deleteList('', 'bookings.delete');
        }
    }

    protected function getBookingForm($input)
    {
        $model = $this->getModel('Bookings');
        $form = $model->getForm();

        if (empty($this->booking)) 
        {
            return false; // No booking available to edit
        }

        $form->bind($this->booking); // Bind booking data to form
        return $form;
    }
}