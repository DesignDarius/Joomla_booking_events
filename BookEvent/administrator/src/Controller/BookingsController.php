<?php
namespace Bookevent\Component\Book_event\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\AdminController;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

class BookingsController extends AdminController
{
    public function getModel($name = 'Booking', $prefix = 'Administrator', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }

    // Allow adding new bookings
    protected function allowAdd($data = array())
    {
        return Factory::getApplication()->getIdentity()->authorise('core.create', 'com_book_event');
    }

    // Allow editing of bookings
    protected function allowEdit($data = array(), $key = 'id')
    {
        $recordId = (int) isset($data[$key]) ? $data[$key] : 0;
        $user = Factory::getApplication()->getIdentity();

        // Check general edit permission first.
        if ($user->authorise('core.edit', 'com_book_event'))
        {
            return true;
        }

        // Fallback on edit.own
        if ($user->authorise('core.edit.own', 'com_book_event'))
        {
            $ownerId = (int) isset($data['created_by']) ? $data['created_by'] : 0;
            if (empty($ownerId) && $recordId)
            {
                // Lookup from the model
                $record = $this->getModel()->getItem($recordId);
                if (empty($record))
                {
                    return false;
                }

                $ownerId = $record->created_by;
            }
            return ($ownerId === $user->id);
        }

        return false;
    }

    // Method to add a new booking
    public function add()
    {
        $this->setRedirect('index.php?option=com_book_event&view=booking&layout=edit');
    }

    // Method to edit an existing booking
    public function edit($key = null, $unique = false)
    {
        $this->setRedirect('index.php?option=com_book_event&view=booking&layout=edit&id=' . (int) $this->input->getInt('id'));
    }

    // Method to save a booking
    public function save($key = null, $task = null)
    {
        $model = $this->getModel('Bookings');

        // Get the form data
        $data = $this->input->post->get('jform', array(), 'array');

        if ($model->save($data)) {
            $this->setMessage(Text::_('COM_BOOK_EVENT_BOOKING_SAVED'));
            $this->setRedirect('index.php?option=com_book_event&view=bookings');
        } else {
            // Handle the error, which could be from validation or save issues
            $this->setMessage(Text::_('COM_BOOK_EVENT_SAVE_FAILED'), 'error');
            $this->setRedirect('index.php?option=com_book_event&view=booking&layout=edit&id=' . (int) $data['id']);
        }
    }

    // Method to delete bookings
    public function delete()
    {
        $model = $this->getModel('Bookings');
        
        // Get selected items
        $cid = $this->input->post->get('cid', array(), 'array');
        
        if (empty($cid)) {
            $this->setMessage(Text::_('JGLOBAL_NO_ITEM_SELECTED'), 'error');
            return $this->setRedirect('index.php?option=com_book_event&view=bookings');
        }

        // Attempt to delete
        if ($model->delete($cid)) {
            $this->setMessage(Text::plural('COM_BOOK_EVENT_N_ITEMS_DELETED', count($cid)));
        } else {
            $this->setMessage(Text::_('COM_BOOK_EVENT_DELETE_FAILED'), 'error');
        }

        // Redirect back to list
        $this->setRedirect('index.php?option=com_book_event&view=bookings');
    }
}