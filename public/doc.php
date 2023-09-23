<?php

    include('../config/config.php');

    $title = 'Doc';

    include('../view/header.php');

    include('../view/navbar.php');
?>

<main class="main">
    <h1>Dokumentation</h1>
    <p>
        Kodstrukturen är i princip den samma som vi har använt under kursens gång. 
        Jag har försökt att dela upp hmtl och php koden så mycket som möjligt. 
        Htlm:en på en sida där jag sedan inkluderar de php filer jag behöver på den sidan.
        Jag har också dela upp php koden för vardera sida så att de har sina egna filer, 
        samt gjort funktioner av de bitar kod jag tycket var lämpliga. Både för att slippa
        upprepning, men också för att jag tycker det ser snyggare ut med funktioner.
    </p>
    <p>
        Responsiviteten på sidan är acceptabel. Alla funktioner är åtkomliga på alla plattformar, 
        såsom att navbaren blir mindre på mindre enheter och anpassa sig. Bilder skalar också sig 
        utefter hur mycket utrymme dem har.
    </p>
    <p>
        Utseende mesig design kan förbättras en hel del. Koden på alla sidor kan antagligen effektiviseras
        alternativt göras snyggar än vad jag har gjort. Uppvisningen av bilder tycker jag själv är lite
        tråkig och hade kunnat göras bättre. Men största fokusen hade nog hamnat på att göra responsiviteten
        bättre än vad den är.
    </p>
</main>

<?php include('../view/footer.php') ?>