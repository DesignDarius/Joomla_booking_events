<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;

class BookEventControllerBooking extends FormController
{
    public function save()
    {
        $data = $this->input->get('jform', array(), 'array');
        $model = $this->getModel();

        if ($model->saveBooking($data)) {
            $this->sendConfirmationEmail($data);
            $this->setRedirect(JRoute::_('index.php?option=com_book_event&view=events', false), JText::_('COM_BOOK_EVENT_BOOKING_SUCCESS'));
        } else {
            $this->setRedirect(JRoute::_('index.php?option=com_book_event&view=events', false), JText::_('COM_BOOK_EVENT_BOOKING_FAILED'), 'error');
        }
    }

    private function sendConfirmationEmail($data)
    {
        $mailer = Factory::getMailer();
        $config = Factory::getConfig();

        $mailer->setSender(array($config->get('mailfrom'), $config->get('fromname')));
        $mailer->addRecipient($data['email']);
        $mailer->setSubject('Booking Confirmation');
        $mailer->setBody('Your booking for the event is confirmed.');

        $mailer->Send();
    }
}
