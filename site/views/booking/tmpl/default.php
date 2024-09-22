<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
?>
<form action="<?php echo Route::_('index.php?option=com_book_event&task=booking.save'); ?>" method="post" name="bookingForm" id="bookingForm">
    <div class="form-group">
        <label for="name"><?php echo Text::_('COM_BOOK_EVENT_NAME'); ?></label>
        <input type="text" name="jform[name]" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email"><?php echo Text::_('COM_BOOK_EVENT_EMAIL'); ?></label>
        <input type="email" name="jform[email]" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone"><?php echo Text::_('COM_BOOK_EVENT_PHONE'); ?></label>
        <input type="text" name="jform[phone]" id="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="message"><?php echo Text::_('COM_BOOK_EVENT_MESSAGE'); ?></label>
        <textarea name="jform[message]" id="message" class="form-control" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><?php echo Text::_('COM_BOOK_EVENT_SUBMIT'); ?></button>
    <input type="hidden" name="task" value="booking.save">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>
