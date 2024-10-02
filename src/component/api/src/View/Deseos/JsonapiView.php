<?php

namespace Langulero\Component\Aiwfc\Api\View\Deseos;

use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;

class JsonapiView extends BaseApiView
{
	protected $fieldsToRenderList = [
        'id',
        'titulo',
        'description',
        'creado'
	];

        protected $fieldsToRenderItem = [
        'id',
        'titulo',
        'descripcion'
	];
}
