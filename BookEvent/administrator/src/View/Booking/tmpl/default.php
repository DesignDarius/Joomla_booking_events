<table class="table">
    <thead>
        <tr>
            <th><?php echo JText::_('COM_BOOK_EVENT_NAME'); ?></th>
            <th><?php echo JText::_('COM_BOOK_EVENT_EMAIL'); ?></th>
            <th><?php echo JText::_('COM_BOOK_EVENT_EVENT'); ?></th>
            <th><?php echo JText::_('COM_BOOK_EVENT_CREATED_AT'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->items as $item): ?>
            <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->email; ?></td>
                <td><?php echo $item->event_id; ?></td>
                <td><?php echo $item->created_at; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
