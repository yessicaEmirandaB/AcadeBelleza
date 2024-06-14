@extends('Plantilla.Menu')
@section('content')
<!-- about us -->
<section class="about" id="about">
    <div class="row">

        <div class="image">
            <img src="img/imagen1.jpg" alt="">
        </div>

        <div class="content">
            <h1 class="headin">Llamanos o escribenos</h1>
            <h3 class="title">"¡Estamos aqui para ayudarte!</h3>
            <p>¿Tienes dudas sobre nuestros cursos?</p>
            <p>Puedes escribirnos en cualquiera de nuestras redes sociales o escribenos un mensaje en whatsapp para mas información.</p>
        </div>

        <br>
    </div>
</section>
<!-- fin about us -->

<!-- la barra de iconos -->
<section class="iconos" id="iconos">

<div class="wrapper">
        <ul>
            <li class="facebook"><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li class="instagram"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li class="tiktok"><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
            <li class="youtube"><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
            <li class="whatsapp"><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
        
        </div>
</section>
<!-- fin de la barra de iconos -->

<!-- la barra de mensaje -->
<section class="mensaje" id="mensaje">

    <div class="content">
        <h3>Quieres aprender<br>este arte?</h3>
        <h1>Conoce la Academia</h1>

    </div>
</section>
<!-- fin de la barra de mensaje -->
<!-- la barra de google maps -->
<section class="maps" id="maps">

    <div class="content">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799.795214537192!2d-63.20173492500599!3d-17.754285783196774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e78b39fa9d8f%3A0xdc5dac8747e6ce3e!2sVentura%20Mall!5e0!3m2!1ses!2sbo!4v1708730892411!5m2!1ses!2sbo" 
            width="1320" 
            height="500">
    </iframe>

    </div>
</section>
<!-- fin de la barra de google maps -->

@endsection