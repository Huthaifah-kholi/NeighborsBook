<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::post('stuff', 'huz@stuff');
Route::post('authcheck', 'huz@authcheck');
Route::post('Addstuff', 'huz@addstuff');
Route::post('Addskill', 'huz@addskill');
Route::post('addphoto', 'huz@addphoto');
Route::post('cat', 'huz@getcat');
Route::post('getthing', 'huz@getthing');
Route::post('orders', 'huz@orders');
Route::post('getusers', 'huz@getusers');
Route::post('done', 'huz@done');


Route::group(['middleware' => ['web', 'cors']], function () {

Route::auth();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/thanks', function () {
    return view('thank');
});

Route::get('/home', 'HomeController@index');
Route::get('/tt', 'test@b');
Route::get('/addThing', 'HomeController@addSomthing');
Route::post('/addsomthing', 'HomeController@addthing');
Route::post('/addpicture', 'HomeController@addpicture');
Route::get('/addSkill', 'HomeController@addskill');
Route::post('/addskill', 'HomeController@databaseSill');
Route::get('/profile', 'HomeController@profile');
Route::get('/location', 'HomeController@location');
Route::get('/myuploads', 'HomeController@myuploads');
Route::get('/myneighbors', 'HomeController@myneighbors');
Route::get('/notifications', 'HomeController@notify');
Route::post('sendmessage', 'chatController@sendMessage');
Route::post('sendNotifications', 'chatController@sendNotifications');


Route::get('/pick-skill', 'HomeController@pickskill');
Route::get('/pick-need', 'HomeController@pickneed');

Route::post('/addpickskill', 'HomeController@addpickskill');
Route::post('/addpickneed', 'HomeController@addpickneed');

Route::get('/categories/{id}',
        ['as'=> 'categories', 'uses'=>'HomeController@catg']
);

Route::get('/user-profile/{id}',
        ['as'=> 'user-profile', 'uses'=>'HomeController@userprofile']
);

Route::get('/mystuff/{id}',
        ['as'=> 'mystuff', 'uses'=>'HomeController@mystuff']
);

Route::get('/stuffpreview/{cat}/{id}',
        ['as'=> 'stuffpreview', 'uses'=>'HomeController@stuffpreview']
);

Route::get('/stuffget/{id}',
        ['as'=> 'stuffget', 'uses'=>'stuff@getstuff']
);

Route::get('/stuff-location/{cat}/{id}',
        ['as'=> 'stuff-location', 'uses'=>'HomeController@stufflocation']
);

Route::get('/stuff-find/{cat}/{id}',
        ['as'=> 'stuff-find', 'uses'=>'HomeController@stufffind']
);

Route::get('/auth/token', 'authtoken@token');

});

