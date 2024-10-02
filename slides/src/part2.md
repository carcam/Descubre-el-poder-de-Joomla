---
marp: true
paginate: true
theme: book
---
<!--
_class: cover 
-->

![bg contain](./images/portada.png)

---
<!--
_header: "Lo que ya hemos visto"
footer: '[Developing Extensions for Joomla! 5](https://developingextensionsforjoomla5.com/jdayusa2024)'
-->

# ~~Parte 1: Desarrollar una aplicación de lista de deseos para Navidad~~
1. ~~Planificando el componente~~
2. ~~Creando las tablas en la base de datos~~
3. ~~Entendiendo la estructura de carpetas~~
4. ~~Describiendo nuestro componente a Joomla!~~

---
<!--
_header: "Lo que vamos a ver"
-->

## Parte 2: Desarrollando nuestro servicio web
1. Editando nuestros deseos
1. Introducción a los servicios web
2. Enrutando nuestro servicio web
3. ¡A divertirse!

---

<!--
_header: "Editando deseos"
-->

<div class="columns">
<div class="column column__content">

- Fichero: `src/Controller/DeseoController.php`

```php
<?php

namespace Langulero\Component\Aiwfc\Administrator\Controller;

use Joomla\CMS\MVC\Controller\FormController;

\defined('_JEXEC') or die;

class DeseoController extends FormController
{
}
```


</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulo 2

</div>
</div>

<!--
- Empezamos definiendo el controlador de nuestra entidad
-->

---

<!--
_header: "Editando deseos"
-->

<div class="columns">
<div class="column column__content">

- Fichero: `src/Model/DeseoModel.php`

```php
<?php

namespace Langulero\Component\Aiwfc\Administrator\Model;

use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Factory;

\defined('_JEXEC') or die;

class DeseoModel extends AdminModel
{
    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            'com_aiwfc.deseo',
            'deseo',
            [
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
		$data = $app->getUserState(
			'com_aiwfc.edit.deseo.data',
			[]
		);
		if (empty($data)) {
			$data = $this->getItem();
		}
		return $data;
    }
}
```


</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulo 2

</div>
</div>

<!--
- Empezamos definiendo el controlador de nuestra entidad
-->


---

<!--
_header: "Editando deseos"
-->

<div class="columns">
<div class="column column__content">

- Fichero: `src/View/Deseo/HtmlView.php`

```php

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
```

</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulo 2

</div>
</div>

<!--
- Empezamos definiendo el controlador de nuestra entidad
-->

---
<!--
_header: "Editando deseos"
-->
<div class="columns">
<div class="column column__content">

Añadimos nuestro formulario: `forms/deseo.xml`.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<form>
    <field name="id" type="hidden" />
    <field name="titulo" type="text" label="Título" required="true" />
    <field name="descripcion" type="editor" label="Descripción" required="false" />
    <field name="creado" type="calendar" default="NOW" label="Creado en" required="false" readonly="true"/>
    <field name="creado_por" type="user" label="Creado por" readonly="true" default="CURRENT" />
</form>

```


</div>
<div class="column column__reference">

### References

![](./images/cover.png)

Capítulos 2 y 4

</div>
</div>

---
<!--
_header: "Editando deseos"
-->
<div class="columns">
<div class="column column__content">

Modificamos el layout del listado: `tmpl/deseos/default.php`.

Reemplazando:

```html
<div class="item-title">
    <?php echo $item->name; ?>
</div>
```

Por esto:

```php
use Joomla\CMS\Router\Route;
```

```html
<div class="item-title">
  <a href="<?php echo Route::_('index.php?option=com_aiwfc&view=deseo&layout=edit&id=' . (int) $item->id); ?>">
      <?php echo $task->titulo;?>
  </a>
</div>
```


</div>
<div class="column column__reference">

### References

![](./images/cover.png)

Capítulo 2

</div>
</div>

---

<!--
_header: "Editando deseos"
-->
<div class="columns">
<div class="column column__content">

Añadimos el layout de edición: `tmpl/deseo/edit.php`

```php
<?php

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

\defined('_JEXEC') or die;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

?>
<form action="<?php echo Route::_('index.php?option=com_aiwfc&view=deseo&layout=edit&id=' . (int) $this->item->id); ?>"
            method="post" name="adminForm" id="deseo-form" class="form-validate">
	<div>
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
                        <?php echo $this->form->renderField('id'); ?>
						<?php echo $this->form->renderField('titulo'); ?>
						<?php echo $this->form->renderField('descripcion'); ?>
						<?php echo $this->form->renderField('creado'); ?>
                        <?php echo $this->form->renderField('creado_por'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="task" value="">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
```


</div>
<div class="column column__reference">

### References

![](./images/cover.png)

Capítulo 2

</div>
</div>

---

<!--
_header: "Introducción a los servicios web"
-->
<div class="columns">
<div class="column column__content">

- Forma de hablar entre máquinas
- Sin HTML, responde en JSON, XML...
- Difícil de probar en un navegador
- 4 verbos: POST, GET, PATCH, DELETE
- Sin sesión de usuario

</div>
<div class="column column__reference">

### References

![](./images/cover.png)

Capítulo 6

</div>
</div>

---
<!--
_header: "Consuming Joomla Web Services"
-->
<div class="columns">
<div class="column column__content">

- POSTMAN, **HOPPSCOTCH**, PHP scripts, cURL, plugins de tu IDE...
- Necesitas crear un token para tu usuario de Joomla en cualquier caso.

</div>
<div class="column column__reference">

### References

![](./images/cover.png)

Capítulo 6

</div>
</div>

---
<!--
_header: "Creando un punto final para nuestro servicio web"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/4-plugin-servicios-web</div>

<div class="columns">
<div class="column column__content">

- Las rutas se añaden con plugins del tipo `webservices`.
- En la ruta puedes definir las diferentes acciones que permites.
- El método `createCRUDRoutes()` añade todas las acciones posibles al servicio web.

</div>
<div class="column column__reference">


### References


![](./images/cover.png)

Capítulo 6


</div>
</div>

---
<!--
_header: "Gesitonando las peticiones en nuestro componente"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/5-api</div>

<div class="columns">
<div class="column column__content">

- Creamos el fichero `ProjectsController.php`
- Creamos el fichero `JsonapiView.php`



</div>
<div class="column column__reference">


### References


![](./images/cover.png)

Capítulo 6


</div>
</div>

<!--

- Extendemos la clase `ApiController` de Joomla, lo que nos ahorrará mucho código, ya que esta clase ya proporciona los métodos básicos como `displayList()` y `add()`.

-->

---

<!--
_header: "En brazos de gigantes"
-->

- Libro online *Joomla Extension Development* by Nicholas Dionysopoulos
  - https://www.dionysopoulos.me/book.html
- Libro de Astrid: *Joomla 4 – Developing Extensions: Step by step to an working Joomla extension*
  - https://a.co/d/1BIVa8j
  - https://web.archive.org/web/20230518080457/https://blog.astrid-guenther.de/en/der-weg-zu-joomla4-erweiterungen/

- Documentación Joomla! para programadores
  - https://manual.joomla.org

  <!-- Si vi más lejos que otros hombres es porque estaba subido a hombros de gigantes. -->
---
<!--
_class: thank-you
footer: ''
-->

<div class="text-huge">
    Thank you!
</div>