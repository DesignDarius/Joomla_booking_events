<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Book_event
 * @author     Darius Design <dariusdesign1@gmail.com>
 * @copyright  2024 Darius Design
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Bookevent\Component\Book_event\Administrator\Service\Html;

// No direct access
defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\DatabaseAwareTrait;
use Joomla\Database\DatabaseDriver;

/**
 * Book_event HTML Helper.
 *
 * @since  1.0.0
 */
class BOOK_EVENT
{
	use DatabaseAwareTrait;

	/**
	 * Public constructor.
	 *
	 * @param   DatabaseDriver  $db  The Joomla DB driver object for the site's database.
	 */
	public function __construct(DatabaseDriver $db)
	{
		$this->setDbo($db);
	}

	public function toggle($value = 0, $view='', $field='', $i='')
	{
		$states = array(
			0 => array('icon-unpublish', Text::_('Toggle'), ''),
			1 => array('icon-publish', Text::_('Toggle'), '')
		);

		$state  = ArrayHelper::getValue($states, (int) $value, $states[0]);
		$text   = '<span aria-hidden="true" class="' . $state[0] . '"></span>';
		$html   = '<a href="javascript:void(0);" class="tbody-icon ' . $state[2] . '"';
		$html  .= 'onclick="return Joomla.toggleField(\'cb'.$i.'\',\'' . $view . '.toggle\',\'' . $field . '\')" title="' . Text::_($state[1]) . '">' . $text . '</a>';

		return $html;
	}
}
