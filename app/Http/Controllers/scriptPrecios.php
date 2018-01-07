<?php  
require('simple_html_dom.php');


    function precioExito($url){
        $html = new simple_html_dom();
        $html->load_file($url); //Se carga la URL con la libreria
        $posts = $html->find('p[class=price offer]'); //Guardamos en Posts el precio que esta en span:price-number
        foreach($posts as $post) {  //Devuelve un array se recorre con el for para imprimir, como es unico valor, solo imprime 1
            $resultado = str_replace ( ".0", '', $post);

            //echo $resultado;
            break;
        }
        return $resultado;
      }

    function precioJumbo($url){
        $html = new simple_html_dom();
        $html->load_file($url); //Se carga la URL con la libreria
        $posts = $html->find('strong[class=skuBestPrice]'); //Guardamos en Posts el precio que esta en span:price-number
        foreach($posts as $post) {  //Devuelve un array se recorre con el for para imprimir, como es unico valor, solo imprime 1
            $resultado = str_replace ( "$", '', $post);
            $resultado = str_replace ( ".", '', $resultado);
            $resultado = str_replace ( ",00", '', $resultado);
            //echo $resultado;
            break;
        }
        return $resultado;
    }

    function precioCarulla($url){
        $html = new simple_html_dom();
        $html->load_file($url); //Se carga la URL con la libreria
        $posts = $html->find('div[class=pdpInfoProductPrice]'); //Guardamos en Posts el precio que esta en span:price-number
        foreach($posts as $post) {  //Devuelve un array se recorre con el for para imprimir, como es unico valor, solo imprime 1
            $resultado = str_replace ( "$", '', $post);
            $resultado = str_replace ( ".", '', $resultado);
            //echo $resultado;
            break;
        }
        return $resultado;
    }

    function precioEuro($url){
        $html = new simple_html_dom();
        $html->load_file($url); //Se carga la URL con la libreria
        $posts = $html->find('span[class=woocommerce-Price-amount amount]'); //Guardamos en Posts el precio que esta en span:price-number
        foreach($posts as $post) {  //Devuelve un array se recorre con el for para imprimir, como es unico valor, solo imprime 1
            $resultado = str_replace ( ".", '', $post);   
            //echo $resultado;
            break;
            }
            return $resultado;
        }

    function precioMakro($url){
        $html = new simple_html_dom();
        $html->load_file($url); //Se carga la URL con la libreria
        $posts = $html->find('span[class=price-number]'); //Guardamos en Posts el precio que esta en span:price-number
        foreach($posts as $post) {  //Devuelve un array se recorre con el for para imprimir, como es unico valor, solo imprime 1
            $resultado = str_replace ( "$", '', $post);
            $resultado = str_replace ( ".", '', $resultado);
            $resultado = str_replace ( ",00", '', $resultado);
            //echo $resultado;
            break;
        }
        return $resultado;
    }


?>