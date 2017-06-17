@extends('layouts.event')

@section('content')

<h1>{{ Helper::tra('event.pages.details.title') }}</h1>
<p class="lead">Tervetuloa Connection Lan: eSports 2017 tapahtuman lipunmyyntiin. Täältä löydät tapahtuman kartat, liput, sekä turnaukset.
    Alla on myös muuta tietoa joka saattaa tulla hyvään tarpeeseen.</p>

<h2>Liput</h2>
<p>Ollaksesi osa tapahtumaa tarvitset lipun. Tarjoamme useita eri lipputyyppejä joista voit valita sen minkä sopii sinulle parhaiten.
    Kaikki lipputyypit ovat voimassa koko tapahtuman ajan.</p>

<p>Lipun ostaminen menee seuraavasti:</p>
<ol>
    <li>Valitset minkä lipputyypin haluat.</li>
    <li>Valitset montako kappaletta.</li>
    <li>Siirryt maksuun.</li>
    <li>Tässä vaiheessa sinulla on 1 tunti aikaa suorittaa maksu tai liput vapautetaan.</li>
    <li>Tulet takaisin järjestelmään, jossa voit valita haluamasi paikat mikäli lipputyyppisi sen mahdollistaa.</li>
</ol>

<p>Voit katsoa lippuvaihtoehdot <a href="{{ route('events.tickets') }}">liput</a> -sivulta.</p>

<h2>Maksuvaihtoehdot</h2>
<p>Hyväksymme Suomen suurimmat verkkopankit maksuvaihtoehtoina. Liput maksetaan oston yhteydessä. Tässä vielä koko lista pankeista: Nordea, Osuuspankki, Danske Bank, Ålandsbanken,
    Handelsbanken, Aktia, POP Pankki, Säästöpankki, S-Pankki, Visa, MasterCard, American Express, ja Oma
    Säästöpankki. Maksut käsittelee Paytrail Oyj.</p>

@endsection
