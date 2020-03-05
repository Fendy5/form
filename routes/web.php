<?php

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

//Route::get('/', function () {
//    return view('login.login');
//});
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/login', 'Home\LoginController@login');
//
//Route::group(['middleware' => 'auth'], function () {
//	Route::resource('user', 'UserController', ['except' => ['show']]);
//	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
//	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
//	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
//});
//
use App\Models\Form;
use function EasyWeChat\Kernel\Support\str_random;

Route::get('/login', 'Home\LoginController@login');
Route::post('/login', 'Home\LoginController@login_post');
Route::post('/sign_up', 'Home\LoginController@sign_up');


Route::group(['namespace'=>'Home','middleware'=>['login']], function () {
    Route::get('/', 'IndexController@index');
    Route::post('save_data', 'FormController@saveData');
    Route::post('get_forms', 'FormController@getMyForm');
    Route::post('delete_form', 'FormController@deleteForm');
    Route::post('release', 'FormController@release');
    Route::get('/logout', 'LoginController@logout');
});

Route::get('/s/{id}','Home\FormController@display');
Route::post('/s','Home\FormController@getData');
Route::post('/submit_answer','Home\FormController@submitAnswer');

Route::get('/test', function () {
    //字符串拼接
//    $str = 'I am Fendy , KaiYing is my wife';
//    $res = Str::slug($str, '*');
//    dd($res);

    //检测数组里面的key是否存在
//    $book = ['name'=>['Chinese'=>'我','English'=>'Me']];
//    dd(Arr::has($book,'name.English'));

    //产生唯一字符串
//    dd(Str::uuid());
    dd(getUserId());
//    $parents = [
//            ['parent' => ['id' => 1, 'name' => 'James']],
//            ['parent' => ['id' => 8, 'name' => 'Lisa']],
//    ];
//    dd(Arr::pluck($parents,'parent.name'));
//    $res=DB::table('forms') ->where('content->[*]->select->[*]->key', '15810542257241')->get();
//    ddd($res);
//    dd(str_random(16));
});
