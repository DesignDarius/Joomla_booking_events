<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Book_event
 * @author     Darius Design <dariusdesign1@gmail.com>
 * @copyright  2024 Darius Design
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Bookevent\Component\Book_event\Site\Dispatcher;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcher;
use Joomla\CMS\Language\Text;

/**
 * ComponentDispatcher class for Com_Book_event
 *
 * @since  1.0.0
 */
class Dispatcher extends ComponentDispatcher
{
	/**
	 * Dispatch a controller task. Redirecting the user if appropriate.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function dispatch()
	{
		parent::dispatch();
	}
}
