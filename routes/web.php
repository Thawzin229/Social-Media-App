<?php

use App\Models\Like;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Commnet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CommnetController;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => "user_auth"],function(){
    Route::get("/",[UserController::class,"homePage"]);
    // User Setting
    Route::get("/setting",[UserController::class,"Setting"])->name('user#setting');
    // accout
    Route::get('/account',[UserController::class,"AccountInfo"])->name("user#accontInfo");
    // update info
    Route::post("/updateaccount",[UserController::class,"UpdateInfo"])->name("user#updateinfo");
    // social account
    Route::get("/social",[UserController::class,"SocialPage"])->name("user#Socialpage");
    Route::post('/social/create',[UserController::class,"CreateSocial"])->name("user#createSocial");
    Route::post("/social/update",[UserController::class,"UpdateSocial"])->name("user#updatesocial");
    // change password
    Route::get('/social/changepassword',[UserController::class,"ChangePassUser"])->name("user#changePass");
    Route::post("/social/updatepassword",[UserController::class,"UpdatePassUser"])->name('user#updatePassUser');

    // notificaiton
    Route::get("/notification",[UserController::class,"NotiPage"]);

    // post 
    Route::post("/post/create",[PostController::class,"PostCreate"])->name("user#postcreate");
    // profile or wall 
    Route::get("/user/profile/{id}",[PostController::class,"ProfilePage"])->name('user#profilepage');
    // edit post 
    Route::get("/user/profile/edit/{id}",[PostController::class,"EditPage"])->name("user#editpage");
    Route::post("/user/profile/update",[PostController::class,"UpdatePost"])->name("user#updatepost");
    // delete post 
    Route::get('user/profile/delete/{id}',[PostController::class,"DeletePost"])->name('user#deletepost');
    // like
    Route::post("/like",[LikeController::class,"Like"])->name('user#like');
    // commnet
    Route::get("/comment/{id}",[CommnetController::class,"CommentPage"]);
    // put the comment in 
    Route::post("/comment/create",[CommnetController::class,"CreateComment"]);
    // story
    Route::post("/story/create",[StoryController::class,"CreateStory"]);
    Route::get("/story/page",[StoryController::class,"StoryPage"]);
    Route::get("/story/delete/{id}",[StoryController::class,"DeleteStory"]);
    Route::get("/user/story/{id}",[StoryController::class,"UserStory"]);
    // user list 
    Route::get("/user/list",[ListController::class,"ListPage"]);
    // 404
Route::fallback([ErrorController::class,"Error"]);
    
});
//admin routes
Route::group(['prefix' => 'admin',"middleware" => 'admin_auth'],function(){
Route::get('/home',[AdminController::class,"adminHome"])->name("admin#home");
Route::get('/userlist',[AdminController::class,"UserList"])->name('admin#userlist');
Route::post('/deleteuser/{id}',[AdminController::class,"DeleteUser"])->name("admin#deleteuser");
// admin information 
Route::get('/detail',[AdminController::class,"DetailPage"])->name("admin#detail");
Route::post("/update",[AdminController::class,"UpdatInfo"])->name('admin#update');


// post
Route::get("/posts",[AdminController::class,"Post"])->name("admin#post");
Route::get("/posts/delete/{id}",[AdminController::class,"Delete"])->name("admin#delete");

});

// user authantication 
Route::group(['middleware' => "login_auth"],function(){

Route::get("/register",[AuthController::class,"registerPage"])->name("auth#registerpage");
Route::post("/registetheuser",[AuthController::class,"register"])->name("auth#register");
Route::get("/loginpage",[AuthController::class,"loginPage"])->name("user#loginpage");
Route::post("/login",[AuthController::class,"login"])->name("auth#login");

//Oauth - google and github
Route::get('auth/github',[AdminAuthController::class,"redirect"]);
Route::get('auth/github/call-back',[AdminAuthController::class,"loginAdminGitHub"])->name("admin#googlelogin");

Route::get("/auth/google",[GoogleController::class,"redirect"])->name("auth#googleredirect");
Route::get('/auth/google/call-back',[GoogleController::class,"loginWithGoogle"])->name("auth#loginwithgoogle");

// forget password
Route::get('/forgetpassword',[AuthController::class,"forgetPass"])->name("auth#forgetpass");
Route::post('/getemail',[AuthController::class,"getEmail"])->name("auth#getemail");
Route::get("/changepasswordpage/{id}",[AuthController::class,"changePassPage"])->name("auth#changepasswordpage");
Route::post("/changepass",[AuthController::class,"changePass"])->name("auth#changePass");

});


// admin auth
Route::group(['prefix' => "admin",'middleware' => "login_auth"],function(){
    Route::get('/register',[AdminAuthController::class,"registerPage"])->name("admin#registerpage");
    Route::post("/registertheuse",[AdminAuthController::class,"register"])->name('admin#registertheuse');
    Route::get('/loginpage',[AdminAuthController::class,"loginPage"])->name("auth#loginpage");
    Route::post('/login',[AdminAuthController::class,"login"])->name('admin#login');

    // forget password
    Route::get('/forgetpasswordpage',[AdminAuthController::class,"forgetPassPage"])->name("auth#forgetPassPage");
    Route::post("/getemail",[AdminAuthController::class,"getEmail"])->name("admin#getEmail");
    Route::get('/changepasswordpage/{id}',[AdminAuthController::class,"changPassPage"])->name('admin#changePassPage');
    Route::post('/changepassword',[AdminAuthController::class,"changePass"])->name('admin#changePass');


});
// logout
Route::post('admin/logout',[AdminAuthController::class,"logout"]);
Route::post("/logout",[AuthController::class,"logout"])->name("auth#logout");

