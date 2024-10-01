<?php

namespace Langulero\Component\Aiwfc\Administrator\View\deseo;

use Joomla\CMS\Factory;
use Joomla\CMS\Toolbar\Toolbar;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

\defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    public $state;
    public $item;
    public $form;

    public function display($tpl = null): void
    {
        $this->form = $this->get('Form');
        $this->state = $this->get('State');
        $this->item = $this->get('Item');

        if (count($errors = $this->get('Errors'))) {
            throw new GenericDataException(implode('\n', $errors), 500);
        }

        $this->addToolbar();

        parent::display($tpl);
    }

    protected function addToolbar()
    {
        Factory::getApplication()->input->set('hidemainmenu', true);

        $isNew = ($this->item->id == 0);
        $toolbar = Toolbar::getInstance();

        ToolbarHelper::title(($isNew ? 'Add' : 'Edit'));

        if ($isNew) {
            $toolbar->apply('deseo.save');
        } else {
            $toolbar->apply('deseo.apply');
        }
        $toolbar->save('deseo.save');

        $toolbar->cancel('deseo.cancel', 'JTOOLBAR_CLOSE');
    }
}
