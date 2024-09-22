<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;

class BookEventHelperRoute
{
    public static function getEventRoute($id, $catid = 0)
    {
        return Route::_('index.php?option=com_book_event&view=event&id=' . $id . ':' . $catid);
    }
}
