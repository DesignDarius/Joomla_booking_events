<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$wa = $this->document->getWebAssetManager();
$wa->useStyle('com_book_event.administrator');
$wa->registerAndUseScript('com_book_event.administrator-book-event', 'components/com_book_event/administrator/book-event.js', [], ['defer' => true]);
?>

<div class="container-fluid">
    <div id="j-main-container" class="span12">
        <?php echo HTMLHelper::_('uitab.tabs'); ?>
        <form action="<?php echo Route::_('index.php?option=com_book_event&view=events'); ?>" method="post" name="adminForm" id="adminForm">
            <div id="j-sidebar-container" class="span2">
                <?php echo $this->sidebar; ?>
            </div>
            <div id="j-main-container" class="span10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo Text::_('COM_BOOK_EVENT_ID');?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_NAME');?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_EMAIL');?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_PHONE');?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_MESSAGE');?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_CREATED_AT');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->items as $item): ?>
                        <tr>
                            <td><?php echo $item->id; ?></td>
                            <td><?php echo $item->name; ?></td>
                            <td><?php echo $item->email;```
