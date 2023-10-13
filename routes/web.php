<?php

use App\Http\Controllers\aller\AllerController;
use App\Http\Controllers\HtmlController;
use App\Models\Technique;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HtmlController::class)->prefix('htmltag')->group(function () {
    Route::get('', 'list')->name('html_tags_list');
});

Route::get('test', function () {
    // $technique = DB::connection('sqlite1')->table('technique')->get();

    // dd($technique);
    $technique = Technique::get();
    dd($technique);
});

Route::controller(AllerController::class)->prefix('aller')->group(function(){
    Route::get('/','index')->name('aller.commands');
    Route::get('list','techniquelist')->name('aller.technique.list');
    Route::get('{technique}/listview','commandView')->name('aller.technique.list.view');
    Route::get('{id}/commandlist','commandlist')->name('aller.commandlist');
    Route::post('{commandlist}/update','updateCommandlist')->name('aller.comandlist.update');
});
