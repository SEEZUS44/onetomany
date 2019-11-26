<?php

use App\Post;
use App\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('create', function () {
    

    $user = User::findOrFail(1);

    $post = new Post(['title'=>'myFirstPostwitEdwin 4', 'body'=>'I like it for the PHP 4']);

    $user->posts()->save($post);

    /* 
    CREATE SOLUTION 2

    $user->posts()->save(new Post(['title'=>'myFirstPostwitEdwin', 'content'=>'I like it for the PHP')


    $ php artisan tinker
    This below to add the user
    Psy Shell v0.9.9 (PHP 7.3.9 — cli) by Justin Hileman
    >>> App\User::create(['name'=>'Sizwe K', 'email'=>'thisatest@test.com', 'password'=>bcrypt("this123test")]);
    => App\User {#3011
     name: "Sizwe K",
     email: "thisatest@test.com",
     updated_at: "2019-11-25 11:21:52",
     created_at: "2019-11-25 11:21:52",
     id: 1,
    }
    >>>
    */
});

Route::get('read', function () {

    $user = User::findOrFail(1);

    // return $user->posts;

    /*
    displays below what the item is
    dd($user->posts;)
    
    Because it's a collection, you need to run for loop
    */

    foreach($user->posts as $post){
        echo $post->title."<br>";
    }
});

Route::get('del', function () {
    
    $user = User::findOrFail(1);

    $user->posts()->delete();

    return "done";
    /*
    THE ABOVE FROM ME, I JUST COPIED THE ONETOONE STUFF

    $user->posts()->whereId(1)->delete(); 
    this would specify the field whereBody or whereTitle etc/

    */
});

Route::get('upd', function () {

    $user = User::find(1);

    $user->posts()->where('id','=','6')->update(['title'=>'Update Test2', 'body'=>'This is awesome, thanks Edwin2']);
    // $user->posts()->whereId(6)->update(['title'=>'Update Test', 'body'=>'This is awesome, thanks Edwin']);
});