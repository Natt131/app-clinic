<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function article($id)
    { //$id
        $article = Article::findOrFail($id);

        return view('medtest/article', ['article' => $article]);//, ['posts'=>$posts]
    }


    public function article_by_category($category)
    { //$id
        //   $posts=Product::select();
        $id_category = Category::query()->where('category', '=',$category)->get();
        if($id_category){
            $article = Article::findOrFail($id_category);
            return view('services', ['posts' => $article], ['categories' => $id_category]);//, ['posts'=>$posts]

        }
        return false;
        //dd("id"+$id_category);
            // DB::table('users')->where('name', 'John')->value('email');
    }

    public function list()
    {
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
        $product->id_user = $user->id;
        $product->save();
        $posts = Article::all();
        return view('services', ['posts' => $posts]);
    }

    public function create()
    {
        return view('medtest/create_article');
    }
}
