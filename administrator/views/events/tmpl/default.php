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
                            <th><?php echo Text::_('COM_BOOK_EVENT_ID'); ?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_NAME'); ?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_EMAIL'); ?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_PHONE'); ?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_MESSAGE'); ?></th>
                            <th><?php echo Text::_('COM_BOOK_EVENT_CREATED_AT'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($this->items)) : ?>
                            <?php foreach ($this->items as $item) : ?>
                                <tr>
                                    <td><?php echo $item->id; ?></td>
                                    <td><?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($item->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($item->phone, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($item->message, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo HTMLHelper::_('date', $item->created_at, Text::_('DATE_FORMAT_LC4')); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6"><?php echo Text::_('COM_BOOK_EVENT_NO_EVENTS_FOUND'); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <input type="hidden" name="task" value="" />
                <?php echo HTMLHelper::_('form.token'); ?>
            </div>
        </form>
    </div>
</div>
