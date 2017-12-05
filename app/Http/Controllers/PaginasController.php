<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;




class PaginasController extends Controller
{
    
    public function ActualizarProductos($value='')
    {
       //Libreria
    	/*
    	$crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
        $crawler->filter('.result__title .result__a')->each(function ($node) {
        dump($node->text());
    });
    return view('welcome');*/

       // precio exito

    
     $client = new Client();
     $crawler = $client->request('GET', 'https://www.exito.com/products/0002722260739913/Celular+Samsung+Galaxy+J7+Metal+Dorado()
      ');
     $crawler->filter('p.price.offer > span.money')->each(function ($node) {
      echo "exito";
      print $node->text()."\n";
     
      });


      // precio carulla
      $client = new Client();
     $crawler = $client->request('GET', 'http://www.carulla.com/products/0002299303610881/Celular+Samsung+Galaxy+J5+Lte+Ds+Blanco?nocity');
     $crawler->filter('div.pdpInfoProductPrice > h4.price')->each(function ($node) {
      echo "carulla";
      print $node->text()."\n";
      });

     // precio euro
      $client = new Client();
     $crawler = $client->request('GET', 'http://www.eurosupermercados.com/producto/chorizo-con-ternera-zenu-500gr/');

     $crawler->filter('span.woocommerce-Price-amount.amount')->each(function ($node) {
      echo "euro";
      print $node->text()."\n";
      });
   }


   public function bueno(){

     $client = new Client();
     $crawler = $client->request('GET', 'https://www.exito.com/products/0002722260739913/Celular+Samsung+Galaxy+J7+Metal+Dorado()
      ');
     $crawler->filter('p.price.offer > span.money')->each(function ($node) {
      echo "exito";
      print $node->text()."\n";
      dd($node);
      });


      // precio carulla
      $client = new Client();
     $crawler = $client->request('GET', 'http://www.carulla.com/products/0002299303610881/Celular+Samsung+Galaxy+J5+Lte+Ds+Blanco?nocity');
     $crawler->filter('div.pdpInfoProductPrice > h4.price')->each(function ($node) {
      echo "carulla";
      print $node->text()."\n";
      });

     // precio euro
      $client = new Client();
     $crawler = $client->request('GET', 'http://www.eurosupermercados.com/producto/chorizo-con-ternera-zenu-500gr/');

     $crawler->filter('span.woocommerce-Price-amount.amount')->each(function ($node) {
      echo "euro";
      print $node->text()."\n";
      });
   }
}
