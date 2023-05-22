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
