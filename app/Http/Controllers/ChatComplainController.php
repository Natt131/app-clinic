<?php

namespace App\Http\Controllers;

use App\Models\chatComplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Response;
use App\Models\Crawler;
use App\Modules\Observer;
use Psr\Http\Message\UriInterface;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObservers\CrawlObserver;

class ChatComplainController extends Controller
{
    public function list() {

    }
    public function complainChat1(){
        Crawler::create()
            ->ignoreRobots()
            ->setCrawlObserver(new Observer)
            ->startCrawling('https://www.lipsum.com');
        $crawler=Crawler::orderBy('status', 'asc')->get();
       dd($crawler);
    }
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
