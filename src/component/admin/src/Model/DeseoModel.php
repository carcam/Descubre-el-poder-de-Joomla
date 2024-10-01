<?php
namespace Langulero\Component\Aiwfc\Administrator\Model;

use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Factory;

class DeseoModel extends AdminModel
{
    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            'com_aiwfc.deseo', 'deseo', [
                'control' => 'jform',
                'load_data' => $loadData
            ]
        );
        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
	{
		$app = Factory::getApplication();
		$data = $app->getUserState( 'com_aiwfc.edit.deseo.data', []);
		if (empty($data)) {
			$data = $this->getItem();
		}
		return $data;
    }
}