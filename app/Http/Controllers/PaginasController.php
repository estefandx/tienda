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

   }
}
