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
1. Introducción a los servicios web
2. Enrutando nuestro servicio web
3. ¡A divertirse!

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