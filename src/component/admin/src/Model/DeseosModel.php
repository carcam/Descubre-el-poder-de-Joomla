<?php

namespace Langulero\Component\Aiwfc\Administrator\Model;

use Joomla\CMS\MVC\Model\ListModel;
use Joomla\CMS\Factory;

\defined('_JEXEC') or die;

class DeseosModel extends ListModel
{
    protected function getListQuery()
    {
        $db	= $this->getDatabase();
        $query = $db->getQuery(true);
        $query->select(
            $this->getState('list.select',
                [
                    $db->quoteName('a.id'),
                    $db->quoteName('a.titulo'),
                    $db->quoteName('a.descripcion'),
                    $db->quoteName('a.estado'),
                    $db->quoteName('a.creado'),
                ]
            )
        )->from($db->quoteName('#__aiwfc_deseos', 'a'));

        $orderCol = $this->state->get('list.ordering', 'a.creado');
        $orderDirn = $this->state->get('list.direction', 'ASC');
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));

        return $query;
    }
}