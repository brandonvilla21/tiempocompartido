<?php


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/busqueda', function () {
    return view('busqueda');
});

// SESSION
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

// REGISTRATION
Route::get('/signup', 'RegistrationController@create');
Route::post('/signup', 'RegistrationController@store');

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
Route::get('/mis-datos', function () {
    return view('mis-datos');
});
Route::get('/mis-membresias', function () {
    return view('mis-membresias');
});
Route::get('/mis-mensajes', function () {
    return view('mis-mensajes');
});
Route::get('/mis-favoritos', function () {
    return view('mis-favoritos');
});
Route::get('/new-membresia', function () {
    return view('new-membresia');
});
Route::get('/edit-membresia/{id}', function () {
    return view('edit-membresia');
});
Route::get('/mi-cuenta/membresia-ubicacion/{id}', function () {
    return view('membresia-ubicacion');
});
Route::get('/membresia/{titulo}/{id}', function () {
    return view('membresia-ubicacion');
});
Route::get('/promociones', function () {
    return view('promociones');
});
Route::get('/promociones/{titulo}/{id}', function () {
    return view('promociones-detail');
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
