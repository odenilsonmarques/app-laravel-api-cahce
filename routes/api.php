<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    //response do tipo json
    return response()->json(['message'=>'ok']);

});
