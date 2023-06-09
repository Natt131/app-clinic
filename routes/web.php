    <?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);//home
    Route::get('/contact', function () {

        return view('medtest/contact');
    });
    Route::get('/about', [\App\Http\Controllers\DoctorsController::class, 'list'])->name('about');
    Route::get('/about/slug/{category}', [\App\Http\Controllers\DoctorsController::class, 'doctors_by_spec'])->name('about');

   // Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'blogs'])->name('blog');
    Route::get('/news', [\App\Http\Controllers\CrawlerController::class, 'getCrawler'])->name('blog');
    Route::get('/news/{url}', [\App\Http\Controllers\CrawlerController::class, 'getConttentArticle']);

    Route::get('/elements', function () {
        return view('medtest/elements');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    //страницы докторов
    Route::get('/doc_profile/{id}', [\App\Http\Controllers\DoctorsController::class, 'doctor'])->name('doc_profile');//Route::get('/doc_profile/{id}',
    Route::get('/messanger', [\App\Http\Controllers\ChatController::class, 'index'])->middleware(['auth']);;//Route::get('/doc_profile/{id}',
    //редактирование профиля
    Route::get('/edit_profile', [\App\Http\Controllers\ProfileDoctorController::class, 'list'])->name('edit_profile')->middleware(['auth']);//Route::get('/doc_profile/{id}',
    Route::post('/edit_profile', [\App\Http\Controllers\ProfileDoctorController::class, 'updateData'])->name('edit_profile');
    Route::get('getClinic', '\App\Http\Controllers\ProfileDoctorController@getClinic')->name('ProfileDoctorController.fetch');

    //создание, отображение статей
    Route::group(['prefix' => 'services'], function () {
        Route::get('/{id}', [\App\Http\Controllers\ArticleController::class, 'article']);
        Route::put('', [\App\Http\Controllers\ArticleController::class, 'article'])->name('services');
        Route::get('', [\App\Http\Controllers\ArticleController::class, 'list'])->name('services');
        Route::get('/slug/{category}', [\App\Http\Controllers\ArticleController::class, 'article_by_category'])->name('services');
    });

    Route::get('/create_article', [\App\Http\Controllers\ArticleController::class, 'create'])->name('create_article');
    Route::post('/create_article', [\App\Http\Controllers\ArticleController::class, 'add'])->name('create_article');
    Route::post('', [\App\Http\Controllers\ArticleController::class, 'add'])->name('services');

    //чаты
    Route::group(['prefix' => 'chats'], function () {
        Route::get('', [\App\Http\Controllers\ChatController::class, 'list'])->middleware(['auth']);
        Route::post('', [\App\Http\Controllers\ChatController::class, 'create'])->middleware(['auth']);

    });

    Route::post('/complain', [\App\Http\Controllers\ChatComplainController::class, 'complainChat'])->name('complain');
    Route::post('/complain_article', [\App\Http\Controllers\ArticleComplainController::class, 'complainArticle'])->name('complain_article');
    Route::get('/deleteChatComplain/{id}', [\App\Http\Controllers\ChatComplainController::class, 'deleteChatComplain'])->name('deleteChatComplain');
    Route::get('/deleteArticleComplain/{id}', [\App\Http\Controllers\ArticleComplainController::class, 'deleteArticleComplain'])->name('deleteArticleComplain');
    Route::get('/deleteUserComplain/{id}', [\App\Http\Controllers\AdminUserController::class, 'deleteUserComplain'])->name('deleteUserComplain');
    Route::get('/deleteArticle/{id}', [\App\Http\Controllers\ArticleController::class, 'deleteArticle'])->name('deleteArticle');


    Route::get('/crawler', [\App\Http\Controllers\ChatComplainController::class, 'getCrawler']);


    Route::get('/reg', [\App\Http\Controllers\AccountController::class, 'registration'])->name('reg');
    Route::get('/get_verify', [\App\Http\Controllers\DoctorsController::class, 'getVerify'])->name('getVerify');
    Route::post('/createVerify', [\App\Http\Controllers\DoctorsController::class, 'createVerify'])->name('createVerify');
   Route::post('/store_comment',[\App\Http\Controllers\DoctorsController::class, 'storeComment'])->name('store_comment');

    Route::get('/verifyUser/{id}', [\App\Http\Controllers\AdminUserController::class, 'addVerifyUser']);
    //grades of doctor
    Route::get('/grade/{id}/garde/{grade}',[\App\Http\Controllers\DoctorsController::class, 'storeGrade']);

    Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account')->middleware('auth');
    Route::post('/account', [\App\Http\Controllers\UserController::class, 'user_info_add'])->name('/account');

    Route::get('/admin', [\App\Http\Controllers\AdminUserController::class, 'index']);
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/message_complaint', [\App\Http\Controllers\AdminUserController::class, 'messageComplain']);
        Route::get('message_complaint/{id}', [\App\Http\Controllers\AdminUserController::class, 'messageComplainChat']);
        Route::get('/article_complaint', [\App\Http\Controllers\AdminUserController::class, 'articleComplain']);
        Route::get('article_complaint/{id}', [\App\Http\Controllers\AdminUserController::class, 'getArticleComplain']);
        Route::get('/verify_list', [\App\Http\Controllers\AdminUserController::class, 'getVerifyList']);
        Route::get('verify_doctor/{id}', [\App\Http\Controllers\AdminUserController::class, 'getVerify']);
        //Route::get('verifyUser/{id}', [\App\Http\Controllers\AdminUserController::class, 'verifyUser']);
    });

    //emaail verification
    Auth::routes(['verify' => true]);


    require __DIR__.'/auth.php';
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');//home
/*    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });*/
