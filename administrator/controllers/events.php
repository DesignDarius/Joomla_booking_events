<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\AdminController;

class BookEventControllerEvents extends AdminController
{
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->registerTask('unfeatured', 'featured');
    }

    public function display($cachable = false, $urlparams = array())
    {
        // Postavlja podrazumevani pogled na 'events'
        $view = $this->input->getCmd('view', 'events');
        $this->input->set('view', $view);
        parent::display($cachable, $urlparams);
    }

    public function getModel($name = 'Event', $prefix = 'BookEventModel')
    {
        return parent::getModel($name, $prefix);
    }

    protected function allowAdd($data = array())
    {
        return Factory::getUser()->authorise('core.create', 'com_book_event');
    }

    protected function allowEdit($data = array(), $key = 'id')
    {
        $recordId = isset($data[$key]) ? $data[$key] : 0;
        $userId = Factory::getUser()->getId();
        $assetKey = $this->option . '.book_event.' . $recordId;

        // Check general edit permission first.
        if ($userId == 0 || !Factory::getUser()->authorise('core.edit', $assetKey))
        {
            return false;
        }

        // The record has been locked, return false.
        if (isset($table) && property_exists($table, 'checked_out') && $table->checked_out > 0 && $table->checked_out != $userId)
        {
            return false;
        }

        // Fallback to edit own if edit exists regardless of author
        $allowOwn = $this->allowEditOwn($data);

        if ($allowOwn !== null)
        {
            return $allowOwn;
        }

        // Inherit rights from the asset if not explicitly set!
        return Factory::getUser()->authorise('core.edit', $assetKey);
    }

    protected function allowEditState($record)
    {
        $userId = Factory::getUser()->getId();
        $recordId = isset($record->id) ? $record->id : 0;
        $assetKey = $this->option . '.book_event.' . $recordId;

        // Check general edit permission first.
        if ($userId == 0 || !Factory::getUser()->authorise('core.edit.state', $assetKey))
        {
            return false;
        }

        // The record has been locked, return false.
        if (property_exists($record, 'checked_out') && $record->checked_out > 0 && $record->checked_out != $userId)
        {
            return false;
        }

        // If this is a new item, they may not want to edit state!
        if (!$recordId)
        {
            return false;
        }

        // Inherit rights from the asset if not explicitly set!
        return Factory::getUser()->authorise('core.edit.state', $assetKey);
    }
}
