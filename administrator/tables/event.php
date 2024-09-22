<?php
defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;

class BookEventTableEvent extends Table
{
    public $id = null;
    public $name = null;
    public $email = null;
    public $phone = null;
    public $message = null;
    public $created_at = null;

    public function __construct(&$db)
    {
        parent::__construct('#__book_event', 'id', $db);
    }
}
