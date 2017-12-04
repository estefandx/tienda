<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Compara Precios</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      
    <!-- MAIN.CSS FILE -->
    <link rel="stylesheet" type="text/css" href="main.css">
   
  </head>
    
  <body>

     <div class="container-fluid">
      <div class="row">
        <div class="col-xs-2 nav-information">
          <h5>Promociones</h5>
        </div>
        <div class="col-xs-2 nav-information">
          <h5>Categorias</h5>
        </div>
        <div class="col-xs-2 nav-information">
          <h5>Nosotros</h5>
        </div>
        <div class="col-xs-2 nav-information">
          <h5>Contacto</h5>
        </div>
      </div>
    </div>
    
    @yield('contenido')
      
<!-- SCRIPTS -->
      
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       
    <!-- BOOTSTRAP CDN SCRIPT -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="{{ url ('/js/edit.js') }}" type="text/javascript"></script>

    @yield('js')
      
  </body>
</html>
