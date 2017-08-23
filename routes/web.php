<?php

// HOME
Route::get('/', 'HomeController@index')->name('home');

// SESSION
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

// REGISTRATION
Route::get('/signup', 'RegistrationController@create');
Route::post('/signup', 'RegistrationController@store');

// USER
Route::get('/mis-datos', 'UserController@edit');
Route::get('/cambiar-contrasena', 'UserController@editPassword');
Route::put('/guardar-datos', 'UserController@update');
Route::post('/guardar-contrasena', 'UserController@updatePassword');
Route::get('/mis-membresias', 'UserController@showMembresias');
Route::get('/mis-favoritos', 'UserController@showFavoritos');
Route::post('/store-message', 'UserController@storeMessage');

// MEMBRESIAS
Route::get('/new-membresia', 'MembresiaController@create');
Route::post('/new-membresia', 'MembresiaController@store');
Route::get('/membresia/{titulo}/{id}', 'MembresiaController@show');
Route::get('/edit-membresia/{id}', 'MembresiaController@edit');
Route::put('/update-membresia', 'MembresiaController@update');
Route::get('/mi-cuenta/membresia-ubicacion/{id}','MembresiaController@setLocation');

// MEMBRESIAS->IMAGENES
Route::get('/guardar-imagenes/{membresia}', 'MembresiaController@createImage');
Route::post('/save-image', 'MembresiaController@storeImage')->name('saveImage');

// PROMOCIONES
Route::get('/promociones', 'PromocionController@index');
Route::get('/promociones/{titulo}/{id}', 'PromocionController@show');


Route::get('/busqueda', function () {
    return view('busqueda');
});
Route::get('/condiciones-de-uso', function () {
    return view('condiciones-de-uso');
});
Route::get('/acerca-de-nosotros', function () {
    return view('acerca-de-nosotros');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/politicas-de-privacidad', function () {
    return view('politicas-de-privacidad');
});
Route::get('/preguntas-frecuentes-sobre-tiempos-compartidos', function () {
    return view('preguntas-frecuentes-sobre-tiempos-compartidos');
});
Route::get('/mi-cuenta', function () {
    return view('mi-cuenta');
});

Route::get('/mis-mensajes', function () {
    return view('mis-mensajes');
});
Route::get('/listados', function () {
    return view('listados');
});
Route::get('/listados/{categoria}/{titulo}', function () {
    return view('listados-categoria');
});
Route::get('/listados/{categoria}/{subcategoria}/{titulo}', function () {
    return view('listados-detail');
});
Route::get('/concepto-de-tiempo-compartido', function () {
    return view('concepto-de-tiempo-compartido');
});
