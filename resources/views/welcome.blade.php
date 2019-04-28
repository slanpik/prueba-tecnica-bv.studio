@extends('layouts.master')
@section('content')

    <h2>Backend Code Test</h2>

    <br>

    <h4><b>Descripción:</b></h4>

    <p>Crear un sitio con dos páginas:</p>
    <ul class="list-group">
        <li class="list-group-item active">Un formulario con los siguientes inputs:</li>
        <li class="list-group-item">first name (required)</li>
        <li class="list-group-item">last name</li>
        <li class="list-group-item">email (required)</li>
        <li class="list-group-item active">Una página donde se muestran los entries creados desde el formulario, con una tabla datatable dinamica.</li>
    </ul>
<br>
    <p>Requisitos necesarios:</p>
    <ul class="list-group">
        <li class="list-group-item ">Usar php 7.2</li>
        <li class="list-group-item">usar composer</li>
        <li class="list-group-item">usar bootstrap</li>
        <li class="list-group-item">usar laravel o slim</li>
        <li class="list-group-item">usar todas las comunicaciones con AJAX</li>
        <li class="list-group-item">usar re-captcha</li>
        <li class="list-group-item">verificar valores de inputs del formulario y sus formatos, mostrar mensajes de alerta en caso de error</li>
        <li class="list-group-item">usar base de datos mysql</li>
        <li class="list-group-item ">Una página donde se muestran los entries creados desde el formulario, con una tabla datatable dinamica.</li>
    </ul>
<br>
    <p>Entregar:</p>
    <ul class="list-group">
        <li class="list-group-item ">Zip con codigo fuente</li>
        <li class="list-group-item">Archivo SQL con estructura de base de datos, no incluir datos</li>
        <li class="list-group-item">Incluir un archivo de text REAME.txt con la descripción de los archivos principales de la lógica del sitio (no librerias)</li>
    </ul>


@endsection