    <?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);//home

    Route::get('/contact', function () {
        return view('medtest/contact');
    });

    Route::get('/doc_profile/{id}', [\App\Http\Controllers\DoctorsController::class, 'doctor'])->name('doc_profile');//Route::get('/doc_profile/{id}',
//works, without 2select
  //  Route::get('/edit_profile', [\App\Http\Controllers\ProfileDoctorController::class, 'list'])->name('edit_profile');//Route::get('/doc_profile/{id}',
  //  Route::post('/edit_profile', [\App\Http\Controllers\ProfileDoctorController::class, 'updateData'])->name('edit_profile');

    Route::get('/edit_profile','\App\Http\Controllers\ProfileDoctorController@list');
//    Route::get('/edit_profile/{id}','\App\Http\Controllers\ProfileDoctorController@data')->name('edit_profile');
    Route::get('getClinic', '\App\Http\Controllers\ProfileDoctorController@getClinic')->name('ProfileDoctorController.fetch');




    Route::get('/about', [\App\Http\Controllers\DoctorsController::class, 'list'])->name('about');
//    Route::get('/about', function () { return view('medtest/about');
//    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/{id}', [\App\Http\Controllers\ArticleController::class, 'article']);
        Route::put('', [\App\Http\Controllers\ArticleController::class, 'article'])->name('services');
        Route::get('', [\App\Http\Controllers\ArticleController::class, 'list'])->name('services');
        //Route::post('', [\App\Http\Controllers\ArticleController::class, 'add'])->name('services');

        Route::get('/slug/{category}', [\App\Http\Controllers\ArticleController::class, 'article_by_category']);
    });
    //new 1/02
    Route::get('/create_article', [\App\Http\Controllers\ArticleController::class, 'create'])->name('create_article');
    Route::post('/create_article', [\App\Http\Controllers\ArticleController::class, 'add'])->name('create_article');
    //end new
    Route::post('', [\App\Http\Controllers\ArticleController::class, 'add'])->name('services');

    Route::group(['prefix' => 'chats'], function () {
        Route::get('', [\App\Http\Controllers\ChatController::class, 'list']);
        Route::post('', [\App\Http\Controllers\ChatController::class, 'create']);
    });
    Route::get('/reg', [\App\Http\Controllers\AccountController::class, 'registration'])->name('reg');
    //регистрация

    //Route::get('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'register'])->name('register');
    //Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'login'])->name('login');

 //   Route::get('/doctor_register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'register'])->name('register');

    Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account')->middleware('auth');
    Route::post('/account', [\App\Http\Controllers\UserController::class, 'user_info_add'])->name('/account');


    Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'blogs'])->name('blog');
    //Route::get('/blog', function () {
    //    return view('medtest/blog');
    //});

    //Route::get('/services', function () {
    //    return view('medtest/services');
    //});
    Route::get('/elements', function () {
        return view('medtest/elements');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    require __DIR__.'/auth.php';

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');//home
    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
