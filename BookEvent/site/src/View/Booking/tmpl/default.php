<form action="<?php echo JRoute::_('index.php?option=com_book_event&task=booking.save'); ?>" method="post" name="bookingForm" id="bookingForm">
    <div class="form-group">
        <label for="name"><?php echo JText::_('COM_BOOK_EVENT_NAME'); ?></label>
        <input type="text" name="jform[name]" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email"><?php echo JText::_('COM_BOOK_EVENT_EMAIL'); ?></label>
        <input type="email" name="jform[email]" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="event"><?php echo JText::_('COM_BOOK_EVENT_SELECT_EVENT'); ?></label>
        <select name="jform[event_id]" id="event" class="form-control" required>
            <?php foreach ($this->events as $event) : ?>
                <option value="<?php echo $event->id; ?>"><?php echo $event->title; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><?php echo JText::_('COM_BOOK_EVENT_SUBMIT'); ?></button>
    <?php echo JHtml::_('form.token'); ?>
</form>
