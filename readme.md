# Backend Code Test  📖

_El proyecto es una aplicacion web que permite al usuario ver y crear usuarios a traves de dos paginas._

## Archivos principales

### Controlador UserController 

_En el controlador encontraremos las funciones principales que hacen que nuestro proyecto funcione entre ellas tenemos:_

```
• showAllUsers, esta funcion nos permite ver todos los usuarios creados.
• crateUser, esta funcion nos lleva a la vista para crear un nuevo usuario.
• storeUser, esta funcion nos permite guardar un nuevo usuarios despues de realizada las siguientes validaciones:
► El campo firstName es requerido y tiene que ser string.
► El campo email es requerido, tiene que ser string y tiene que ser un email valido.
► El reCaptcha es requerido.
```

### Vistas 

_Las vistas se contruyeron con blade templates y con bootstrap (framework css) y encontraremos los siguientes archivos:_

```
• Una plantilla para todo el sistema, se llama master.blade.php
• Una plantilla con el navbar, se llama navbar.blade.php
• La vista para ver el formularios de crear un usuario con sus validaciones, el formulario se envia por medio de AJAX, el archivo se llama CreateUser.blade.php
• La vista para ver todos los usuarios creados a traves de datatables con la carga de datos por medio de AJAX, el archivo de se llama showUser.blade.php
• La vista de home que contiene un html con los requisitos y parametros del proyecto.

```

### Traducciones

_Se utilizo para el proyecto el sistema de traducciones de laravel (@lang()) para el uso de las traducciones en español y ingles._

```
• Por defecto el lenguaje esta en ingles, pero si quieren cambiarlo a español lo pueden hacer cambiando los siguientes datos:
► En la ruta config/app.php linea de codigo 83 cambiar 'locale' => 'es', _de esta manera el sistema estara en español_

```

### Rutas 

_Las rutas son personalizadas y no se usa ninguna ruta del resource._

## Prueba del software

https://testbv.000webhostapp.com

## Autores ✒️

**Francisco Sanchez**
