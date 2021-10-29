<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WebSite</title>
        <link href="{{ asset('websiteIndex/styles.css') }}" rel="stylesheet">

    </head>
    <body>
    <section class="sec">
        <header>
        <a href="#"><img src="{{ asset('websiteIndex/pepegif.gif') }}" class="logo"></a>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Home2</a></li>
            <li><a href="#">Home3</a></li>
            <li><a href="#">Home4</a></li>
            <li><a href="#">Home5</a></li>
        </ul>
        </header>
        <div class="content">
            <div class="textBox">
                <h2>Pepe Frog<br><span>Lives here</span></h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                    specimen book.</p>
                <a href="#"> Check here</a>
            </div>
            <div class="imgBox">
                <img src="{{ asset('websiteIndex/peepo1.png')}}" class="pepe1">
            </div>
        </div>
    </section>
    </body>
</html>
