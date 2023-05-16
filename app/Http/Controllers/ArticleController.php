<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function article($id)
    { //$id
        $article = Article::findOrFail($id);
        $doctor=DB::table('doctors')
            ->where('id_user','=', $article->id_user)
            ->first();
//dd($doctor);
        return view('medtest/article', ['article' => $article],['doctor'=>$doctor]);//, ['posts'=>$posts]
    }


    public function article_by_category($category)
    {
        $id_category = DB::table('categories')->where('category', '=',$category)->get('id');

        if($id_category){
            $categories = Category::all();
            $posts=DB::table('articles')->where('id_category', '=', $id_category[0]->id)->get();
            return view('services', ['posts' => $posts], ['categories' => $categories]);
        }
        return false;
    }

    public function list()
    {
        //позволяет найти статьи юзера по его ид
//        $comments =User::find(28)->post;
//        $comments =Article::find(28)->post;
//        dd($comments);
        $posts = Article::all();
        $categories = Category::all();
        return view('services', ['posts' => $posts], ['categories' => $categories]);
    }

    public function add(Request $request)
    {
        $filename = null;
        if ($request->isMethod('post') && $request->file('file')) {

            $request->validate([
                // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
                'file' => 'image',
                // поддерживаемые MIME файла (image/jpeg, image/png)
                'file' => 'mimetypes:image/jpeg,image/png',
            ]);

            $file = $request->file('file');
            $upload_folder = 'public/products';//'public/products';
            $filename = $file->getClientOriginalName(); // image.jpg

            Storage::putFileAs($upload_folder, $file, $filename);
            $path = Storage::path($filename);
        }

        $user = auth()->user();
        $product = new Article();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = 'products\\' . $filename;

        $product->id_category = $request->id_cat;
        $product->text = $request->message;

        $product->id_user = $user->id;
        $product->save();
        $posts = Article::all();
        $categories = Category::all();
        return view('services', ['posts' => $posts],['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('medtest/create_article', ['categories' => $categories]);
    }

    public function deleteArticle($id)
    {
        Article::where('id', $id)->firstOrFail()->delete();
        $posts = Article::all();
        $categories = Category::all();
        return view('services', ['posts' => $posts], ['categories' => $categories]);
    }
}
