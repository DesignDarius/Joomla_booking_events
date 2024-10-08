<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;

HTMLHelper::_('behavior.multiselect');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo Route::_('index.php?option=com_book_event&view=bookings'); ?>" method="post" name="adminForm" id="adminForm">
    <div class="row">
        <div class="col-md-12">
            <div id="j-main-container" class="j-main-container">
                <?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
                <?php if (empty($this->items)) : ?>
                    <div class="alert alert-info">
                        <span class="fa fa-info-circle" aria-hidden="true"></span><span class="sr-only"><?php echo Text::_('INFO'); ?></span>
                        <?php echo Text::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                    </div>
                <?php else : ?>
                    <table class="table" id="bookingsList">
                        <thead>
                            <tr>
                                <th scope="col" style="width:1%" class="text-center d-none d-md-table-cell">
                                    <?php echo HTMLHelper::_('grid.checkall'); ?>
                                </th>
                                <th scope="col">
                                    <?php echo HTMLHelper::_('searchtools.sort', 'COM_BOOK_EVENT_BOOKING_FIELD_NAME_LABEL', 'a.name', $listDirn, $listOrder); ?>
                                </th>
                                <th scope="col">
                                    <?php echo HTMLHelper::_('searchtools.sort', 'COM_BOOK_EVENT_BOOKING_FIELD_EVENT_LABEL', 'a.event', $listDirn, $listOrder); ?>
                                </th>
                                <th scope="col">
                                    <?php echo HTMLHelper::_('searchtools.sort', 'COM_BOOK_EVENT_BOOKING_FIELD_DATE_LABEL', 'a.booking_date', $listDirn, $listOrder); ?>
                                </th>
                                <th scope="col">
                                    <?php echo HTMLHelper::_('searchtools.sort', 'COM_BOOK_EVENT_BOOKING_FIELD_STATUS_LABEL', 'a.status', $listDirn, $listOrder); ?>
                                </th>
                                <th scope="col">
                                    <?php echo HTMLHelper::_('searchtools.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->items as $i => $item) : ?>
                            <tr class="row<?php echo $i % 2; ?>">
                                <td class="text-center d-none d-md-table-cell">
                                    <?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
                                </td>
                                <td>
                                    <?php echo $this->escape($item->name); ?>
                                </td>
                                <td>
                                    <?php echo $this->escape($item->event); ?>
                                </td>
                                <td>
                                    <?php echo $this->escape($item->booking_date); ?>
                                </td>
                                <td>
                                    <?php echo $this->escape($item->status); ?>
                                </td>
                                <td>
                                    <?php echo $item->id; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo $this->pagination->getListFooter(); ?>
                <?php endif; ?>
                <input type="hidden" name="task" value="">
                <input type="hidden" name="boxchecked" value="0">
                <?php echo HTMLHelper::_('form.token'); ?>
            </div>
        </div>
    </div>
</form>