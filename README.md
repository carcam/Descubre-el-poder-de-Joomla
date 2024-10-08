# JDayES 2024 - Descubre el poder de Joomla! 5: Desarrolla tu primer componente con Servicios Web

Este repositorio almacena el código de mi taller sobre desarrollo de extensiones para Joomla! 5 en el [JoomlaDay ES 2024](https://jday.joomlaes.org) titulada: **Descubre el Poder de Joomla! 5: Desarrolla tu Primer Componente con Servicios Web**.

En esta sesión mostré cómo construir un componente de Joomla! mínimo y lo fácil que es agregar servicios web a un componente bien estructurado.

Esta sesión siguió la estructura de mi libro sobre desarrollo de extensiones para Joomla! 5 titulado *[Developing Extensions For Joomla! 5](https://developingextensionsforjoomla5.com/?utm_source=gh-jdes24)*.

<a href="https://developingextensionsforjoomla5.com/" style="text-align: center"><img alt="Portada del libro Developing Extensions For Joomla! 5" src="https://developingextensionsforjoomla5.com/images/cover.webp" align="center" width="150"></a>

## Descarga la presentación en pdf

- [Primera parte - Crear el componente](https://carcam.github.io/Descubre-el-poder-de-Joomla/slides/part1.pdf)
- [Segunda parte - Añade el servicio web](https://carcam.github.io/Descubre-el-poder-de-Joomla/slides/part2.pdf)

## Cómo usar este repositorio

### Código del componente

El código del componente se encuentra en la rama *main* de este repositorio y está dividido en las siguientes etiquetas, siguiendo los diferentes pasos de mi sesión:

- *1-bootstraping* : Este es el código mínimo para tener un componente instalable que muestre contenido en el backend.
- *2-listview* : Esta iteración muestra los datos de la vista de lista.
- *3-editview*: Esta iteración añade una forma de crear, leer y actualizar elementos.
- *4-webservices-plugin*: Esta iteración añade un plugin del tipo *webservice* que enruta nuestra extensión. Utiliza la nueva arquitectura de Joomla 5.
- *5-api*: Esta iteración añade el código mínimo para crear la lógica del servicio web.

### Ficheros de la presentación

Los ficheros de la presentación se encuentran en la rama *gh-pages* de este repositorio. Concretamente en la carpeta *slides*.

La presentación está hecha con [Marp](https://marp.app/) y los ficheros fuente se encuentran en la carpeta *slides/src*.

El comando para generar la presentación es:

```bash
marp --html part1.md --theme-set book.css --pdf-notes --allow-local-files --output slides/part1.pdf
```

```bash
marp --html part2.md --theme-set book.css --pdf-notes --allow-local-files --output slides/part2.pdf
```

### Para saber más

Además de las referencias en la última pantalla de cada presentación, puedes encontrar más información sobre el desarrollo de extensiones para Joomla! 5 en:

- [Blog del libro Developing Extensions For Joomla! 5](https://developingextensionsforjoomla5.com/blog?utm_source=gh-jdes24)
- [Repositorio de código del libro Developing Extensions For Joomla! 5 en GitHub](https://github.com/PacktPublishing/Developing-Extensions-for-Joomla-5/)
