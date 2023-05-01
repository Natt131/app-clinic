<?php

namespace App\Http\Controllers;

use App\Article;
use App\Models\ArticleComplain;

use Illuminate\Http\Request;

class ArticleComplainController extends Controller
{
    public function list() {

    }

    public function complainArticle (Request $request) {//
        $complain = new ArticleComplain();
            $complain->id_user = $request->id_user;
            $complain->id_article = $request->id_article;
            $complain->id_user_indicted = $request->id_user_indicted;
            $complain->reason =  $request->reason;
        $complain->save();

        return redirect()->back()->with('message', "Жалоба отправлена модератору");
    }
    //удаляем запись о жалобе на чат
    public function deleteArticleComplain($id){
        // $chatComplain = chatComplain::findOrFail($id);
       ArticleComplain::where('id', $id)->firstOrFail()->delete();
        return redirect('/admin/article_complaint');
    }

}
