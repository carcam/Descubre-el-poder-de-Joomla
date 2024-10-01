<?php

namespace Langulero\Component\Aiwfc\Administrator\View\Deseos;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\MVC\View\GenericDataException;

use Joomla\CMS\Toolbar\Toolbar;
use Joomla\CMS\Toolbar\ToolbarHelper;

\defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    public $state;
    public $items=[];
    public $pagination;

    public function display($tpl=null): void
    {
        parent::display($tpl);
    }

    
}