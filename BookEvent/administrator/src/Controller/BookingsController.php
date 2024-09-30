<?php
namespace Bookevent\Component\Book_event\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\AdminController;
use Joomla\CMS\Factory;

class BookingsController extends AdminController
{
    public function getModel($name = 'Booking', $prefix = 'Administrator', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }

    protected function allowAdd($data = array())
    {
        return Factory::getApplication()->getIdentity()->authorise('core.create', 'com_book_event');
    }

    protected function allowEdit($data = array(), $key = 'id')
    {
        $recordId = (int) isset($data[$key]) ? $data[$key] : 0;
        $user = Factory::getApplication()->getIdentity();

        // Check general edit permission first.
        if ($user->authorise('core.edit', 'com_book_event'))
        {
            return true;
        }

        // Fallback on edit.own.
        // First test if the permission is available.
        if ($user->authorise('core.edit.own', 'com_book_event'))
        {
            // Now test the owner is the user.
            $ownerId = (int) isset($data['created_by']) ? $data['created_by'] : 0;
            if (empty($ownerId) && $recordId)
            {
                // Need to do a lookup from the model.
                $record = $this->getModel()->getItem($recordId);

                if (empty($record))
                {
                    return false;
                }

                $ownerId = $record->created_by;
            }

            // If the owner matches 'me' then do the test.
            if ($ownerId == $user->id)
            {
                return true;
            }
        }

        return false;
    }
}