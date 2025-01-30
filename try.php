<!DOCTYPE html>
<html>
    <head>
        <title>
            lana
        </title>
    </head>

    <body>
        <?php
       function howdy($lang) {
        if ($lang == 'es' ) return "Hola";
        if ($lang == 'fr' ) return "Bonjour";
        return "Hello";
       }
       print howdy('en') . " Glenn\n";
       print howdy('fr') . " Sally\n";

    ?>
    </body>
</html>