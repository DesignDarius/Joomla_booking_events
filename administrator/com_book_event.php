<?php
echo "Controller initialized";
defined('_JEXEC') or die;

// Load the necessary libraries
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

// Load the helper file (optional)
require_once JPATH_ADMINISTRATOR . '/components/com_book_event/helpers/route.php';

// Get an instance of the controller prefixed by BookEvent
$controller = BaseController::getInstance('BookEvent');

// Execute the task from the request
$controller->execute(Factory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();
