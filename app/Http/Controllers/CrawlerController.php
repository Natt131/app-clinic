<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerController extends Controller
{
   // public $arr=array();
    public function getCrawler(){
        $pageUrl = 'https://www.mk.ru/social/health/'; //'http://www.tradetu.com';
        if(!$pageUrl) {
            return response()->json($this->getActionStatus("ERROR", "Product page url not found."));
        }
        $errors = array();

        $result = $this->makeWebRequest($pageUrl, $errors);

        if(empty($errors)) {
            $response= $this->parseQuickProductsJson($result);
            return view('medtest/blog', ['response' => $response]);
      /*      $response['content'] = $this->parseQuickProductsJson($result, '');
            $response['Status'] = 'SUCCESS';
            $response['Message'] = 'Products downloaded successfully';*/
        } else {
            //перебросить на ошибку
            return view('medtest/blog');
            $response= 'errooorrr';
            $response1['Errors'] = $errors;
            $response1['Status'] = 'ERROR';
            $response1['Message'] = "Error in fetching products from the url. Errors: " . implode('|', $errors);
        }
        // dd($response);
        return response()->json($response);
    }
    private function makeWebRequest($url, &$errors) {
        $client = new Client();
        $response = $client->get($url);

        if($response->getStatusCode() == 200) {
            // dd($response->getBody(), "resp");
            return (string)$response->getBody();
        } else {
            array_push($errors, $response->getReasonPhrase());
            //  dd("no");
            return;
        }
        //  dd($response);
    }
    private function parseQuickProductsJson($result) {
        $response = '';
        $crawler = new Crawler($result);
        $filter = $crawler->filter('ul.article-listing__day-list');
        $len1 = $filter->filter('li.article-listing__item');
        $article=$len1->filter('article');
        $arr=array();
        foreach ($article as $i=>$domElement){
            $_crawler1 = new Crawler($domElement);
            $_crawler = $_crawler1->filter('div.listing-item__content');
          //  $str=$_crawler->filter('a')->attr('href');
            $articleUrl1 = strstr($_crawler->filter('a')->attr('href'), 'social');//https://www.mk.ru/
            $articleUrl = strstr($articleUrl1, '.html',true);
            $articleUrl=str_replace('/','--',$articleUrl);
            $arr[$i]=array(
                'articleName' => $_crawler->filter('h3')->text(),
                'articleUrl' => $articleUrl,//$_crawler->filter('a')->attr('href'),
                'articleContent' => $_crawler->filter('p')->text(),
                'articleImg' => $_crawler1->filter('div.listing-item__picture')->filter('img')->attr('src')
            );
        }
        //возвращаем массив всех статей последних
        return $arr;
    }

    public function getConttentArticle($url){
        $url = str_replace('--','/',$url);
        $pageUrl = 'https://www.mk.ru/'.$url.'.html'; //'http://www.tradetu.com';
        //dd($pageUrl,'content');
        if(!$pageUrl) {
            return response()->json($this->getActionStatus("ERROR", "Product page url not found."));
        }
        $errors = array();
        $result = $this->makeWebRequest($pageUrl, $errors);

        if(empty($errors)) {
            $response= $this->parseContentArticle($result);

            return view('medtest/news', ['response' => $response[0]]);
        } else {
            $response['Errors'] = $errors;
            $response['Status'] = 'ERROR';
            $response['Message'] = "Error in fetching products from the url. Errors: " . implode('|', $errors);
        }
        // dd($response);
        return response()->json($response);
    }

    private function parseContentArticle($result){
        $response = '';
        $crawler = new Crawler($result);
        $filter = $crawler->filter('div.article-grid__content');
        $article=array();
        foreach ($filter as $i=>$domElement){
            $_crawler = new Crawler($domElement);
            $body=$_crawler->filter('div.article__body')->filter('p');
            //пробегаемся по тексту
            $text='';
            $text.='<p>'.$_crawler->text().'</p>';
            $text1=preg_replace('/(?>w).*/', '$1', $text);
            //dd($text1);
            $article[$i]=array(
                'articleName' => $_crawler->filter('h1.article__title')->text(),
                'articleDescription' => $_crawler->filter('div.article__description')->text(),
                'articleImg' => $_crawler->filter('img.article__picture-image')->attr('src'),
                'articleText' => $text1,
            );
        }
        //dd($article[0]['articleDescription']);
        return $article;
    }
}
