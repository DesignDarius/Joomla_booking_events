<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

$form = $this->form;
?>

<form action="<?php echo Route::_('index.php?option=com_book_event&task=display.submit'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
    <?php foreach ($form->getFieldsets() as $fieldset): ?>
        <fieldset>
            <?php if (isset($fieldset->label)): ?>
                <legend><?php echo Text::_($fieldset->label); ?></legend>
            <?php endif; ?>
            <?php foreach ($form->getFieldset($fieldset->name) as $field): ?>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $field->label; ?>
                    </div>
                    <div class="controls">
                        <?php echo $field->input; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </fieldset>
    <?php endforeach; ?>
    
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary validate">
                <?php echo Text::_('JSUBMIT'); ?>
            </button>
            <a class="btn" href="<?php echo JRoute::_('index.php?option=com_book_event&view=bookevents'); ?>" title="<?php echo Text::_('JCANCEL'); ?>">
                <?php echo Text::_('JCANCEL'); ?>
            </a>
        </div>
    </div>

    <?php echo HTMLHelper::_('form.token'); ?>
</form>