<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
     <h1>pagar</h1>
    <form>
    <?php
      $PUBLIC_KEY= 'fd7567e4f978144ee5f88f01c410e5f4';

     $PRIVATE_KEY='34de3f0ff2fbf69cd227c9ca05657c3b';
    
      echo "
        <script
            src='https://checkout.epayco.co/checkout.js'
            class='epayco-button'
            data-epayco-key='$PUBLIC_KEY'
            data-epayco-private-key='$PUBLIC_KEY'
            data-epayco-amount='50000'
            data-epayco-name='Vestido Mujer Primavera'
            data-epayco-description='Vestido Mujer Primavera'
            data-epayco-currency='cop'
            data-epayco-country='co'
            data-epayco-test='true'
            data-epayco-external='true'
            data-epayco-response='http://localhost/epayco/respuesta.html'
            data-epayco-confirmation='http://localhost/epayco/confirmacion.php'>
        </script>
        <script src='' async defer></script>"
        ?>
    </form>
        
    </body>
</html>