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

### References

![](./images/cover.png)
Chapter 1

</div>
</div>

<!--
- We need to define a name and a purpose for our extension
- This brings clarity and helps to stick to your plan
- We also need a good name. It's not necessary for the code, but at least something you do not hate
- We will get a shorter alias (as unique as possible) por our component
- We do not need a company name, but it will be good to have some "main owner" for the namespaces
-->

---
<!--
_header: "Planificando el componente - Definiendo nuestros datos"
-->
<div class="columns">
<div class="column column__content">

### Task Entity

- Title
- Description
- State
- Deadline
- Creation date
</div>
<div class="column column__reference">

### References

![](./images/cover.png)
Chapter 1

</div>
</div>

<!--
- We need to identify the data entities in our extension
- Data entities are all stuff that needs to be stored for later retrieval
- We usually need Create, Read, Update and Delete permissions on entities
-->
---
<!--
_header: "Planificando el componente"
-->

<div class="columns">
<div class="column column__content">

## Task Entity possible fields

- *Owner?*
- *Author?*
- *Follow-ups?*

</div>
<div class="column column__reference">

### References

![](./images/cover.png)
Chapter 1

</div>
</div>

<!--
- It's important to plan for the future and add all possible fields to our entity and create all possible entities
- Do we need an owner (maybe), author (definitely will help)?
- Do we need comments or follow-ups?
-->
---
<!--
_header: "Create the table in the database"
-->
<div class="columns">
<div class="column column__content">

Let's start with some code:

~~~sql
CREATE TABLE IF NOT EXISTS `#__awco_ctl_tasks` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NULL,
    `state` TINYINT(1) NOT NULL DEFAULT 0,
    `description` TEXT NOT NULL DEFAULT "",
    `deadline` DATETIME NULL,
    `created` DATETIME NULL,
    `created_by` INT(11) NULL,
    PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci
~~~

</div>
<div class="column column__reference">

### References

![](./images/cover.png)
Chapter 1

</div>
</div>

<!--

- We may start creating the database structure for our component. In this code we replace the #_ characters with our Joomla DB prefix and we execute it in our DB

- You may check the prefix directly in the Database or in the backend: System -> Global Configuration: Tab Server, database section.

-->
---

<!--
_header: "Adding some fake data"
-->

Ask your favourite AI friend:

> Hi nice AI, I'm a web developer and I need some fake data for the Awesome To-Do list extension I'm building in Joomla. Could you please provide the SQL code around 30 rows that makes sense on a table created with this command and be sure that when there is no deadline date, you use NULL instead of an empty value:
>
> CREATE TABLE IF NOT EXISTS `#__clt_tasks` (
    ...


<!--
- In chapter 1 of the book you have some directions on how to build the scritps to generate test data and the code for those is at Github
- With our simple structure we are just asking AI to provide the data.
- In case any of you is asking about the politeness of my question, please remember Terminator movie.
- Finally we insert this data into our DB
-->

---
<!--
_header: "Understanding folder structure"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/1-bootstraping</div>
<div class="columns">
<div class="column column__content">

- administrator/components/com_ctl/
    - services
    - tmpl
    - src
        - Extension
        - Controller
        - Model
        - View
        - Table


</div>
<div class="column column__reference">

### References

![](./images/cover.png)
Chapter 2

</div>
</div>

<!-- 

- Our component will be located in the components folder of the backend soso we create it in our Joomla installation
- Inside this folder we create the subfolders

- services: It hosts the provider.php file which defines the services we use in our component

- src: It's where your logic lives. In this folder we will place our models and all the code that make things work

- tmpl: It's where we place the html templates for our views

-->

---

<!--
_header: "Telling Joomla about our extension"
-->

<div class="columns">
<div class="column column__content">

~~~xml
<extension type="component" method="upgrade">
...
    <namespace path="src">AwCo\Component\Ctl</namespace>
    <administration>
        <files folder="admin">
            <folder>services</folder>
            <folder>src</folder>
            <folder>tmpl</folder>
        </files>
        <menu link="option=COM_CTL" img="class:default">
            Clear To-Do List
        </menu>
    </administration>
</extension>
~~~

</div>
<div class="column column__reference">

### References

![](./images/cover.png)
Chapters 2 and 14

</div>
</div>

<!--

- Manifest file should have the same name as our short alias
- We have a first part of MetaData where we declare who we are
- We declare the namespace for our component and where is located in our structure
- Full explanation of the file in chapter 14 of the book

-->

---

<!--
_header: "First install"
-->

<div class="columns">
<div class="column column__content">

- We use the nice *Discover* function at Joomla! Backend

</div>
<div class="column column__reference">

### References

![](./images/cover.png)
Chapter 2

</div>
</div>

<!--

- We have the bare minimum to install the extension
- This will create the menu entry and the Database stuff
- Trying to access the component will give an error

-->

---

<!--
_header: "Registering our component"
-->

<div class="columns">
<div class="column column__content">

- File *services/provider.php*
- Dependency Injection Container pattern
- We inject the MVCFactory service

</div>
<div class="column column__reference">

### References

![](./images/cover.png)
Chapter 2

</div>
</div>

<!--
- Since Joomla! 4 we use DIC pattern to simplify dependencies and create a more robust platform
- Copy and paste this Whenever possible
-->

---

<!--
_header: "Boot file for our component"
-->

<div class="columns">
<div class="column column__content">

- At *src/Extension/CtlComponent.php*
- Joomla Will look for this file first
- It implements the *boot()* method

</div>
<div class="column column__reference">

### References
![](./images/cover.png)
Chapter 2

</div>
</div>

---
<!--
_header: "Adding the main controller"
-->

<div class="columns">
<div class="column column__content">

- At *src/Controller/DisplayController.php*
- We define the default view in this code

</div>
<div class="column column__reference">

### References
![](./images/cover.png)
Chapter 2

</div>
</div>

---
<!--
_header: "Showing our default view"
-->

<div class="columns">
<div class="column column__content">

- In Joomla's MVC we trust!!
- When we just retrieve data: View + Model
- When we perform actions: View + Model + Controller

</div>
<div class="column column__reference">

### References
![](./images/cover.png)
Chapter 2

</div>
</div>

<!--
- We create our View folder with the subfolder *Tasks*
- We create our *src/tmpl/tasks/default.php* file.
-->
---
<!--
_header: "Filling our view with data"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/2-listview</div>
<div class="columns">
<div class="column column__content">

- Joomla View file structure is the same, we just retrieve and pass different types of data
- We use the view proxy methods to retrieve the data from the model

</div>
<div class="column column__reference">

### References
![](./images/cover.png)
Chapter 2

</div>
</div>

<!--
- We must create the Model to get our list of tasks
- Joomla MVC makes things really easy 
- We add code to our tmpl file
-->

---
<!--
_header: "Adding the edit view"
-->
<div class="url">https://developingextensionsforjoomla5.com/jdayes2024/live/3-editview</div>
<div class="columns">
<div class="column column__content">

- We use the same View for *edit* and *add* actions
- For individual items we do not use a query, but the Table class
- We use JForms to easily create the form

</div>
<div class="column column__reference">

### References
![](./images/cover.png)
Chapters 2 and 4

</div>
</div>

<!--

- We create our View
- We add our first Toolbar in the view
- We create our Model exnteding AdminModel
- We create the file src/Table/TaskTable.php
- We create the file forms/task.xml
- We add a link to the task title for editing

-->
---
<!--
_header: "Nice-to-haves"
-->

- Toolbar for the list view
- ACL
- Frontend part
- Component configuration
- Calendar field
- Create a companion module (Check Shirat's presentation on the topic)

---

<!--
_header: "on the shoulder of giants"
-->

- Joomla Extension Development by Nicholas Dionysopoulos
  - https://www.dionysopoulos.me/book.html
- Joomla 4 – Developing Extensions: Step by step to an working Joomla extension
  - https://a.co/d/1BIVa8j
  - https://web.archive.org/web/20230518080457/https://blog.astrid-guenther.de/en/der-weg-zu-joomla4-erweiterungen/

- Joomla! Documentation
  - https://manual.joomla.org

  <!-- I have not seen furhther but I definitely was on the shoulders of giants.-->

---
<!--
_class: thank-you
footer: ''
-->

<div class="text-huge">
    Thank you!
</div>