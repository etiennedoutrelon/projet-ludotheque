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
Route::get('/welcome',function (){
    return view('welcome');
});

/*Ressources --> */
Route::resource('jeux', 'JeuController');
Route::resource('tags', 'TagController');
Route::resource('commentaires', 'CommentaireController')->middleware('auth');

/*Accueil et menu --> */
Route::get('/','MenuController@accueil')->name('menu.accueil');
Route::get('/apropos','MenuController@apropos')->name('apropos');
Route::get('/contact','MenuController@contact')->name('contact');

/*Vues jeu --> */
Route::get('jeux', 'JeuController@index')->name('jeux.index');
Route::get('/search', 'JeuController@search')->name('search');
Route::get('jeux/{id}', function (){
    return view('JeuController@show','{{id}}');
})->name('jeux.show');
Route::any('jeux/{id}/edit', function (){
    return view('JeuController@edit','{{id}}');
})->name('jeux.edit');
Route::any('jeux/create', 'JeuController@create')->name('jeux.create');

/*Vues commentaire --> */
Route::get('commentaires', 'CommentaireController@index')->name('commentaires.index')->middleware('auth');
Route::get('commentaires/{id}', function (){
    return view('CommentaireController@index','{{id}}');
})->name('commentaires.show');
Route::get('commentaires/create','CommentaireController@create')->name('commentaires.create');

/*Vues tag --> */
Route::get('tags', 'TagController@index')->name('tags.index')->middleware('auth');
Route::any('tags/create', 'TagController@create')->name('tags.create')->middleware('auth');

/*Authentification --> */
Auth::routes();

/*Administration --> */
Route::get('/administration', 'AdministrationController@index')->middleware('is_admin')->name('administration');
Route::get('/administration/utilisateurs', 'AdministrationController@utilisateurs')->middleware('is_admin')->name('administration.utilisateurs');
Route::post('/administration/utilisateurs/update', 'AdministrationController@update')->middleware('is_admin')->name('utilisateurs.update');
