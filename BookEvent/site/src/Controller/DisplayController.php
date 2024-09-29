<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Book_event
 * @author     Darius Design <dariusdesign1@gmail.com>
 * @copyright  2024 Darius Design
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Bookevent\Component\Book_event\Site\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\MVC\Controller\BaseController;

/**
 * Display Component Controller
 *
 * @since  1.0.0
 */
class DisplayController extends BaseController
{
    /**
     * Constructor.
     *
     * @param  array                $config   An optional associative array of configuration settings.
     * Recognized key values include 'name', 'default_task', 'model_path', and
     * 'view_path' (this list is not meant to be comprehensive).
     * @param  MVCFactoryInterface  $factory  The factory.
     * @param  CMSApplication       $app      The JApplication for the dispatcher
     * @param  Input              $input    Input
     *
     * @since  1.0.0
     */
    public function __construct($config = array(), MVCFactoryInterface $factory = null, $app = null, $input = null)
    {
        parent::__construct($config, $factory, $app, $input);
    }

    /**
     * Method to display a view.
     *
     * @param   boolean  $cachable   If true, the view output will be cached.
     * @param   boolean  $urlparams  An array of safe URL parameters and their variable types, for valid values see {@link InputFilter::clean()}.
     *
     * @return  \Joomla\CMS\MVC\Controller\BaseController  This object to support chaining.
     *
     * @since   1.0.0
     */
    public function display($cachable = false, $urlparams = false)
    {
        $view = $this->input->getCmd('view', 'bookevents');
        $view = $view == "featured" ? 'bookevents' : $view;
        $this->input->set('view', $view);

        return parent::display($cachable, $urlparams);
    }

    /**
     * Method to handle form submission.
     *
     * @return void
     *
     * @since  1.0.0
     */
    public function submit()
    {
        // Check for request forgeries
        $this->checkToken();

        $app = Factory::getApplication();
        $model = $this->getModel('Form');
        
        $data = $this->input->post->get('jform', array(), 'array');

        if ($model->save($data)) {
            $app->enqueueMessage(Text::_('COM_BOOK_EVENT_BOOKING_SAVED'), 'message');
        } else {
            $app->enqueueMessage(Text::_('COM_BOOK_EVENT_BOOKING_SAVE_ERROR'), 'error');
        }

        $this->setRedirect('index.php?option=com_book_event&view=form');
    }
}