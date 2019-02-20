<?php
include_once 'Request.php';
include_once 'Router.php';

$router = new Router(new Request);

$router->get('/cotizacion', function() {
  require_once 'view.html';
});

$router->get('/cotizacion/dolar', function() {
  cambioToday();
});
$router->get('/cotizacion/euro', function() {
  cambioToday();
});
$router->get('/cotizacion/real', function() {
  cambioToday();
});



function cambioToday()
{
   $request_uri = explode('/', $_SERVER['REQUEST_URI']);
   $moneda = $request_uri[2];
   switch($moneda)
   {
       case "dolar";
          $mon ="USD";
       break;
       case "euro";
          $mon ="EUR";
       break;
       case "real";
          $mon ="BRL";
       break;
   } 
    
   if (function_exists('curl_init') and isset($mon)) 
   {
       $ch = curl_init();
       
       curl_setopt($ch, CURLOPT_URL,"https://api.cambio.today/v1/quotes/$mon/ARS/json?quantity=1&key=1764|fn063Pr*wLnRz3jvbTF0pVndS0chXO3g");
       curl_setopt($ch, CURLOPT_TIMEOUT, 30);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
       
       $resultado = curl_exec ($ch);
          
       $a = json_decode($resultado);
       
       $amount = $a->result->amount;
       
       $rpta["moneda"] =$moneda;
       $rpta["precio"] =$amount;
       
       echo json_encode($rpta);

   } 
   else
   {
       header('HTTP/1.0 404 Not Found'); 
       echo "no hay soporte";
   }
};
                     
?>