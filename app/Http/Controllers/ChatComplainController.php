<?php

namespace App\Http\Controllers;

use App\Models\chatComplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Response;
//use App\Models\Crawler;

use App\Http\Controllers\BaseController;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ChatComplainController extends Controller
{
    public function list() {

    }
    public function getCrawler(){
/*        Crawler::create()
            ->ignoreRobots()
            ->setCrawlObserver(new Observer)
            ->startCrawling('https://www.lipsum.com');
        $crawler=Crawler::orderBy('status', 'asc')->get();
       dd($crawler);*/
        $pageUrl = 'https://www.mk.ru/social/health/'; //'http://www.tradetu.com';
        if(!$pageUrl) {
            return response()->json($this->getActionStatus("ERROR", "Product page url not found."));
        }
        $errors = array();

        $result = $this->makeWebRequest($pageUrl, $errors);

        if(empty($errors)) {
            $response['content'] = $this->parseQuickProductsJson($result, '');
            $response['Status'] = 'SUCCESS';
            $response['Message'] = 'Products downloaded successfully';
        } else {
            $response['Errors'] = $errors;
            $response['Status'] = 'ERROR';
            $response['Message'] = "Error in fetching products from the url. Errors: " . implode('|', $errors);
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
    private function parseQuickProductsJson($result, $category) {
        $response = '';
        $crawler = new Crawler($result);
        $filter = $crawler->filter('ul.article-listing__day-list');
        $len1 = $filter->filter('li.article-listing__item');
        $article=$len1->filter('article');
        $arr=array();
        foreach ($article as $i=>$domElement){
            $_crawler1 = new Crawler($domElement);
            $_crawler = $_crawler1->filter('div.listing-item__content');
            $arr[$i]=array(
               'articleName' => $_crawler->filter('h3')->text(),
               'articleUrl' => $_crawler->filter('a')->attr('href'),
               'articleContent' => $_crawler->filter('p')->text(),
               'articleImg' => $_crawler1->filter('div.listing-item__picture')->filter('img')->attr('src')
            );
        }
       // dd($arr[0]['articleName']);
        $this->getConttentArticle($arr[0]['articleUrl']);
        return $arr;
    }

    public function getConttentArticle($url){
        $pageUrl = $url; //'http://www.tradetu.com';
        if(!$pageUrl) {
            return response()->json($this->getActionStatus("ERROR", "Product page url not found."));
        }
        $errors = array();
        $result = $this->makeWebRequest($pageUrl, $errors);

        if(empty($errors)) {
            $response['content'] = $this->parseContentArticle($result, '');
            $response['Status'] = 'SUCCESS';
            $response['Message'] = 'Article downloaded successfully';
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
     //   dd($crawler, "newnewnew");
        $filter = $crawler->filter('div.article-grid__content');
       // $len1 = $filter->filter('li.article-listing__item');
       // $article=$len1->filter('article');
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
         dd($article[0]);
        return $article;
    }
    ///////////old

    public function complainChat (Request $request) {//
        $complain = new chatComplain();
        $complain->id_user = $request->id_user;
        $complain->id_user_indicted = $request->id_user_indicted;
        $complain->reason =  $request->reason;
        $complain->save();

        return redirect()->back()->with('message', "Жалоба отправлена модератору");;
    }
    //удаляем запись о жалобе на чат
    public function deleteChatComplain($id){
       // $chatComplain = chatComplain::findOrFail($id);
        chatComplain::where('id', $id)->firstOrFail()->delete();
        return redirect('/admin/message_complaint');
    }
}
