<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Book_event
 * @author     Darius Design <dariusdesign1@gmail.com>
 * @copyright  2024 Darius Design
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Session\Session;
use Joomla\Utilities\ArrayHelper;


?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo Text::_('COM_BOOK_EVENT_FORM_LBL_BOOKEVENT_NAME'); ?></th>
			<td><?php echo $this->item->name; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_BOOK_EVENT_FORM_LBL_BOOKEVENT_EMAIL'); ?></th>
			<td><?php echo $this->item->email; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_BOOK_EVENT_FORM_LBL_BOOKEVENT_PHONE'); ?></th>
			<td><?php echo $this->item->phone; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_BOOK_EVENT_FORM_LBL_BOOKEVENT_MESSAGE'); ?></th>
			<td><?php echo $this->item->message; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_BOOK_EVENT_FORM_LBL_BOOKEVENT_DATE'); ?></th>
			<td>				<?php
			$date = $this->item->date;
			echo $date > 0 ? HTMLHelper::_('date', $date, Text::_('DATE_FORMAT_LC4')) : '-';
			?>

			</td>
		</tr>

	</table>

</div>

