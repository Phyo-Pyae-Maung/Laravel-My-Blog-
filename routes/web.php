<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\{AuthController, UiController, LikeDislikeController};
use App\Http\Controllers\CommentController;



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





// Route::get('greet/developers/{name}', function($name){
//     return "hello ".$name. " developers";
// });


// Route::get('greet/developers/Laravel', function(){
//     return "hello Laravel developers";
// });



// //--------for doc--------
// Route::get('test',function(){
//     return "Test for docx";
// });

// Route::get('test/producer/{name}',function($name){
//     return "Bro what the f???".$name;
// });

// Route::get('test/controller',[TestController::class,'test1']);

// Route::get('test/controller',[TestController::class,'test1']);

// Route::get('try1/monday',[TrialController::class,'trial1']);

// Route::get('index',[PostController::class,'welcome']);

// //laratest

// Route::get('/laratest',[BlogController::class,'welcome']);

// //---save
// Route::get('/laratest/index',[BlogController::class,'index']);
// Route::post('/laratest',[BlogController::class,'save']);


//

# welcome
Route::get('/', function () {
    return view('welcome');
});

# authentication
Route::get('/login',[AuthController::class,'loginForm']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::post('/store',[AuthController::class,'userRegister']);
Route::get('/logout',[AuthController::class,'logOut']);

# home
Route::get('/home',[UiController::class,'index']);
Route::get('/home/postdetail/{id}',[UiController::class,'postDetail']);
Route::get('/home/searchbycategory/{id}',[UiController::class,'searchByCategory']);

Route::middleware('checkAuth')->group(function()
{
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        });
    # posts
Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/create',[PostController::class,'create']);
Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/{id}/edit',[PostController::class,'edit']);
Route::post('/posts/{id}',[PostController::class,'update']);
Route::post('/posts/{id}/delete',[PostController::class,'destory']);
//post with commments
Route::get('/posts/{id}/comments',[PostController::class,'postCommentsIndex']);
Route::post('/posts/comments/{commentId}/deny',[PostController::class,'denyComment']);

# categories
Route::resource('/categories',CategoryController::class);
# users
Route::resource('/users',UserController::class);

#comments
Route::post('/post/comment/{id}',[CommentController::class,'storecomment']);
Route::get('/posts/comments/{id}',[CommentController::class,'postComments']);

#likedislike
Route::post('/posts/like/{id}',[LikeDislikeController::class,'like']);
Route::post('/posts/dislike/{id}',[LikeDislikeController::class,'dislike']);



});
    });





