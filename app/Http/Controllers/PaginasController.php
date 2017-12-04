<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;


class PaginasController extends Controller
{
    
    public function ActualizarProductos($value='')
    {

    	/*
    	$crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
        $crawler->filter('.result__title .result__a')->each(function ($node) {
        dump($node->text());
    });
    return view('welcome');*/

     $client = new Client();
     $crawler = $client->request('GET', 'https://www.exito.com/products/0002647396716253/Celular+Asus+Zenfone+3+Negro');
     $crawler->filter('p.price.offer > span.money')->each(function ($node) {
      print $node->text()."\n";
      });


      // precio carulla
      $client = new Client();
     $crawler = $client->request('GET', 'http://www.carulla.com/products/0002299303610881/Celular+Samsung+Galaxy+J5+Lte+Ds+Blanco?nocity');
     $crawler->filter('h4.price')->each(function ($node) {
      print $node->text()."\n";
      });

   }
}
