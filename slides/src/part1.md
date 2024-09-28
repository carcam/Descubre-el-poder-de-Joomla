---
marp: true
paginate: true
theme: book
---
<!--
_class: cover 
-->

![bg contain](./images/ccamara.png)

---

<!--
_header: "Por qué estoy aquí"
footer: '[Developing Extensions for Joomla! 5](https://developingextensionsforjoomla5.com/jdayes2024)'
-->

<div class="columns">
<div class="column column__content">

- Autor de *Developing Extensions for Joomla! 5*
- Obsesionado con la productividad
- Actualmente Coordinador de Operaciones en Joomla!
- Apasionado de la Navidad
- 3 niños, 2 perros, <strike>1 gato</strike> 2 gatos y una esposa que adoro

</div>
<div class="column">

![width:500px](./images/2023.jpg)

## Carlos Cámara

</div>
</div>

---

<!--
_header: "Lo que vamos a ver"
footer: '[Developing Extensions for Joomla! 5](https://developingextensionsforjoomla5.com/jdayes2024)'
-->

## Parte 1: Desarrollar una aplicación de <strike>lista de tareas</strike> lista de deseos para Navidad
1. Planificando el componente
2. Creando las tablas en la base de datos
3. Entendiendo la estructura de carpetas
4. Describiendo nuestro componente a Joomla!

---
<!--
_header: "Lo que vamos a ver"
-->

## Parte 2: Desarrollando nuestro servicio web
1. Introducción a los servicios web
2. Enrutando nuestro servicio web
3. ¡A divertirse!

---
<!--
_header: "Planificando el componente"
-->

<div class="columns">
<div class="column column__content">

Objetivo: **Aplicación de lista de deseos para el Backend de Joomla!**

Nombre del componente: **All I want for Christmas**
Alias: **com_*aiwfc***
Company: **Langulero** (L'Angulero SL)

Otras cositas: **Licencia**, formas de distribución, hoja de ruta...

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulo 1

</div>
</div>

<!--
- Necesitamos definir un nombre y un propósito para nuestra extensión.
- Esto aporta claridad y ayuda a seguir el plan.
- También necesitamos un buen nombre. No es necesario para el código, pero al menos algo que no odies.
- Obtendremos un alias más corto (lo más único posible) para nuestro componente.
- No necesitamos un nombre de empresa, pero sería bueno tener algún "propietario principal" para los espacios de nombres.
-->


---
<!--
_header: "Planificando el componente - Definiendo nuestros datos"
-->
<div class="columns">
<div class="column column__content">

### Una entidad llamada *Deseo*

- Título
- Descripcion
- Estado

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulo 1

</div>
</div>

<!--
- Necesitamos identificar las entidades de datos en nuestra extensión.
- Las entidades de datos son todo aquello que necesita ser almacenado para su posterior recuperación.
- Normalmente necesitamos permisos de Crear, Leer, Actualizar y Eliminar en las entidades.
-->
---
<!--
_header: "Planificando el componente"
-->

<div class="columns">
<div class="column column__content">

## Posibles campos de nuestros deseos

- *Autor*
- *Fecha de creación*
- *¿Cuánto lo quiero?*

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulo 1

</div>
</div>

<!--
- Es importante planificar para el futuro y añadir todos los campos posibles a nuestra entidad y crear todas las entidades posibles.
- ¿Necesitamos un autor?
- ¿Añadimos un campo de *Cuánto lo quiero*?
-->
---
<!--
_header: "Create the table in the database"
-->
<div class="columns">
<div class="column column__content">

Empezamos con el código:
~~~sql
CREATE TABLE IF NOT EXISTS `#__aiwfc_deseos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(255) NULL,
    `estado` TINYINT(1) NOT NULL DEFAULT 0,
    `descripcion` TEXT NOT NULL DEFAULT "",
    `creado` DATETIME NULL,
    `creado_por` INT(11) NULL,
    PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci
~~~

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulo 1

</div>
</div>

<!--

- Podemos comenzar creando la estructura de la base de datos para nuestro componente. En este código, reemplazamos los caracteres #_ con nuestro prefijo de base de datos de Joomla y lo ejecutamos en nuestra base de datos.

- Puedes verificar el prefijo directamente en la base de datos o en el backend: Sistema -> Configuración Global: Pestaña Servidor, sección de la base de datos.
-->
---

<!--
_header: "Añadiendo datos de prueba"
-->

Pregunta a tu AI (Amigo Imaginario) favorita:

> Hola amigo imaginario favorito, soy un desarrollador web y necesito algunos datos de prueba para la extensión de lista de deseos de Navidad que estoy creando para Joomla!. ¿Podrías por favor proporcionarme el código SQL para unas 30 filas de datos que tengan sentido para una tabla SQL creada con este comando SQL?:
>
> CREATE TABLE IF NOT EXISTS `#__aiwfc_deseos` (
    ...


<!--
- En el capítulo 1 del libro tienes algunas indicaciones sobre cómo construir los scripts para generar datos de prueba y el código para esos scripts está en Github.
- Con nuestra estructura simple, solo estamos pidiendo a la IA que proporcione los datos.
- Finalmente, insertamos estos datos en nuestra base de datos.
-->

---
<!--
_header: "Comprendiendo la estructura de directorios"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/1-bootstraping</div>
<div class="columns">
<div class="column column__content">

~~~
- administrator/components/com_aiwfc/
    - services
    - tmpl
    - src
        - Extension
        - Controller
        - Model
        - View
        - Table
~~~

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulo 2

</div>
</div>

<!-- 
- Nuestro componente estará ubicado en la carpeta **components** del backend, así que lo creamos en nuestra instalación de Joomla.
- Dentro de esta carpeta creamos los subdirectorios:

- **services**: Aquí se encuentra el archivo **provider.php**, que define los servicios que usamos en nuestro componente.
  
- **src**: Es donde reside tu lógica. En esta carpeta colocaremos nuestros modelos y todo el código que hace que las cosas funcionen.
  
- **tmpl**: Aquí es donde colocamos los layouts de nuestras vistas.
-->

---

<!--
_header: "Presentando nuestra extensión a Joomla!"
-->

<div class="columns">
<div class="column column__content">

~~~xml
<extension type="component" method="upgrade">
...
    <namespace path="src">Languero\Component\Aiwfc</namespace>
    <administration>
        <files folder="admin">
            <folder>services</folder>
            <folder>src</folder>
            <folder>tmpl</folder>
        </files>
        <menu link="option=COM_AIWFC" img="class:default">
            All I Want for Christmas
        </menu>
    </administration>
</extension>
~~~

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulos 2 y 14

</div>
</div>

<!--

- El archivo de manifiesto debe tener el mismo nombre que nuestro alias corto.
- Tenemos una primera parte de metadatos donde declaramos quiénes somos.
- Declaramos el espacio de nombres para nuestro componente y dónde se encuentra en nuestra estructura.
- La explicación completa del archivo está en el capítulo 14 del libro.

-->

---

<!--
_header: "Primera instalación"
-->

<div class="columns">
<div class="column column__content">

- Usamos la maravillosa función  **Descubrir** de Joomla!:
  - **Sistema** -> *Instalar extensiones* -> **Descubrir**

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulo 2

</div>
</div>

<!--

- Tenemos lo mínimo necesario para instalar la extensión.
- Esto creará la entrada del menú y los elementos de la base de datos.
- Intentar acceder al componente dará un error.

-->

---

<!--
_header: "Empezando nuestro componente"
-->

<div class="columns">
<div class="column column__content">

- Fichero *services/provider.php*
- Seguimos el patrón de inyección de dependencias en el contenedor (Dependency Injection Container - DIC)
- Inyectamos el servicio MVCFactory

</div>
<div class="column column__reference">

### Referencias

![](./images/cover.png)
Capítulo 2

</div>
</div>

<!--
- Desde Joomla! 4, utilizamos el patrón DIC para simplificar las dependencias y crear una plataforma más robusta.
- Copia y pega todo lo que puedas si no sabes lo que haces.
- ¿Por qué tanto código base para una extensión? - Fácil, porque no somos animales
-->

---

<!--
_header: "Fichero de arranque de nuestro componente"
-->

<div class="columns">
<div class="column column__content">

- En `src/Extension/CtlComponent.php`
- Joomla buscará este fichero para comenzar
- Implementa el método `boot()`

</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulo 2

</div>
</div>

---
<!--
_header: "Añadiendo el controlador principal"
-->

<div class="columns">
<div class="column column__content">

- En  `src/Controller/DisplayController.php*`
- Definimos la vista por defecto en este código

</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulo 2

</div>
</div>

---
<!--
_header: "Showing our default view"
-->

<div class="columns">
<div class="column column__content">

- EL MVC de Joomla! es mi señor, ¡¡Nada me falta!!
- Cuando solo obtenemos datos: Vista + Modelo
- Cuando vamos a ejecutar aciones: Vista + Modelo + Controlador
- Creamos nuestra carpeta ``View`` con la subcarpet ``Deseos``.
- Creamos el archivo ``src/tmpl/deseos/default.php``.

</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulo 2

</div>
</div>

<!--
- Creamos nuestra carpeta ``View`` con la subcarpet ``Deseos``.
- Creamos el archivo ``src/tmpl/deseos/default.php``.
-->
---
<!--
_header: "Añadiendo datos a nuestra vista"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/2-listview</div>
<div class="columns">
<div class="column column__content">

- La estructura de archivos de la vista de Joomla! es la misma, solo recuperamos y pasamos diferentes tipos de datos.
- Usamos los métodos del proxy de la vista para recuperar los datos del modelo.

</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulo 2

</div>
</div>

<!--
- Debemos crear el modelo para obtener nuestra lista de deseos.
- El MVC de Joomla facilita mucho las cosas.
- Añadimos código a nuestro archivo ``tmpl``.
-->

---
<!--
_header: "Añadiendo la vista de edición"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/3-editview</div>
<div class="columns">
<div class="column column__content">

- Usamos la misma vista para las acciones de **editar** y **agregar**.
- Para los elementos individuales no usamos una consulta, sino la clase ``Table``.
- Usamos la clase ``Forms`` para crear el formulario de manera sencilla.

</div>
<div class="column column__reference">

### Referencias
![](./images/cover.png)
Capítulos 2 y 4

</div>
</div>

<!--

- Creamos nuestra vista.
- Añadimos nuestra primera barra de herramientas en la vista.
- Creamos nuestro modelo extendiendo **AdminModel**.
- Creamos el archivo **src/Table/DeseoTable.php**.
- Creamos el archivo **forms/deseo.xml**.
- Añadimos un enlace al título de la tarea para editar.

-->
---
<!--
_header: "Cosas chulas que podríamos añadir"
-->

- Barra de herramientas para la vista de lista
- ACL
- Parte pública
- Zona de configuración del Componente
- Crear un módulo complementario de lista de tareas

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
    ¡Gracias!
</div>