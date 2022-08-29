<?php

use Illuminate\Support\Facades\Route;

use App\Events\ChatMessageEvent;

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
if(\Illuminate\Support\Facades\App::environment('local')) {

    Route::get('/playground', function (){

        event(new \App\Events\ChatMessageEvent());
//        $url = URL::temporarySignedRoute('share-video', now()->addSeconds(30), [
//            'video' => 123
//        ]);
//        return $url;
        return null;
    });

    Route::get('/ws', function () {
        return view('websocket');
    });

    Route::post('/chat-message', function (\Illuminate\Http\Request $request) {
        event(new \App\Events\ChatMessageEvent($request->message));
        return null;
    });


}


