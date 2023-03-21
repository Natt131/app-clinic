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
    Route::get('/about', [\App\Http\Controllers\DoctorsController::class, 'list'])->name('about');
    Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'blogs'])->name('blog');

    Route::get('/elements', function () {
        return view('medtest/elements');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');


    //страницы докторов
    Route::get('/doc_profile/{id}', [\App\Http\Controllers\DoctorsController::class, 'doctor'])->name('doc_profile');//Route::get('/doc_profile/{id}',
    //редактирование профиля
    Route::get('/edit_profile', [\App\Http\Controllers\ProfileDoctorController::class, 'list'])->name('edit_profile')->middleware(['auth']);//Route::get('/doc_profile/{id}',
    Route::post('/edit_profile', [\App\Http\Controllers\ProfileDoctorController::class, 'updateData'])->name('edit_profile');
    Route::get('getClinic', '\App\Http\Controllers\ProfileDoctorController@getClinic')->name('ProfileDoctorController.fetch');

    //создание, отображение статей
    Route::group(['prefix' => 'services'], function () {
        Route::get('/{id}', [\App\Http\Controllers\ArticleController::class, 'article']);
        Route::put('', [\App\Http\Controllers\ArticleController::class, 'article'])->name('services');
        Route::get('', [\App\Http\Controllers\ArticleController::class, 'list'])->name('services');
        Route::get('/slug/{category}', [\App\Http\Controllers\ArticleController::class, 'article_by_category']);
    });

    Route::get('/create_article', [\App\Http\Controllers\ArticleController::class, 'create'])->name('create_article');
    Route::post('/create_article', [\App\Http\Controllers\ArticleController::class, 'add'])->name('create_article');
    Route::post('', [\App\Http\Controllers\ArticleController::class, 'add'])->name('services');

    //чаты
    Route::group(['prefix' => 'chats'], function () {
        Route::get('', [\App\Http\Controllers\ChatController::class, 'list']);
        Route::post('', [\App\Http\Controllers\ChatController::class, 'create']);
    });

    Route::get('/reg', [\App\Http\Controllers\AccountController::class, 'registration'])->name('reg');

    Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account')->middleware('auth');
    Route::post('/account', [\App\Http\Controllers\UserController::class, 'user_info_add'])->name('/account');

    require __DIR__.'/auth.php';

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');//home
    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
