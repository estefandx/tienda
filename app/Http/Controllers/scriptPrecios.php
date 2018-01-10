<?php  
require('simple_html_dom.php');


    function precioExito($url){
        $html = new simple_html_dom();
        $html->load_file($url);
        $post = $html->find('p[class=price offer]', 0)->plaintext;
        $resultado = str_replace ( ".0", '', $post);
        return $resultado;
      }

    function precioJumbo($url){
        $html = new simple_html_dom();
        $html->load_file($url); //Se carga la URL con la libreria
        $post = $html->find('strong[class=skuBestPrice]', 0)->plaintext;
        $resultado = str_replace ( "$", '', $post);
        $resultado = str_replace ( ".", '', $resultado);
        $resultado = str_replace ( ",00", '', $resultado);
        return $resultado;
    }

    function precioCarulla($url){
        $html = new simple_html_dom();
        $html->load_file($url); //Se carga la URL con la libreria
        $post = $html->find('div[class=pdpInfoProductPrice]', 0)->plaintext;
        $resultado = str_replace ( "$", '', $post);
        $resultado = str_replace ( ".", '', $resultado);
        return $resultado;
    }


    //Falta organizar EURO
    function precioEuro($url){
        $html = new simple_html_dom();
        $html->load_file($url); 
        $post = $html->find('p[class=price]', 0)->plaintext;
        $resultado = str_replace ( "$", '', $post);
        $resultado = str_replace ( ".", '', $resultado);
        return $resultado;
        }


    function precioMakro($url){
        $html = new simple_html_dom();
        $html->load_file($url);
        $post = $html->find('span[class=price-number]', 0)->plaintext;
        $resultado = str_replace ( "$", '', $post);
        $resultado = str_replace ( ".", '', $resultado);
        $resultado = str_replace ( ",00", '', $resultado);
        return $resultado;
?>