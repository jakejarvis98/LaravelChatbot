<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $infos = \App\Info::all();
    
    return view('welcome', ['infos' => $infos]);
});

Route::get('/submit', function () {
    return view('submit');
});

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'info_name' => 'required|unique:infos|max:255',
        'event_name' => 'required|max:255',
        'category' => 'required',
        'industry' => 'required',
        'actual_info' => 'required|max:255',
        'keywords' => 'required|max:255',
        'activity_date' => 'required|date',
        'expiry_date' => 'required|date',
        'related_agency' => 'nullable|max:255',
        'numerical_value' => 'nullable',
        'other_details' => 'nullable|max:255',
        'enabled' => 'required',
    ]);
    
//    $info = new \App\Info($data);
//    $info->save();
//    return $info;
    $info = tap(new App\Info($data))->save();
    return redirect('/')->with('success', 'Information submitted!');
});

Route::get('/view/{id}', function ($id) {
    $info = \App\Info::find($id);
    
    return view('view', ['info' => $info]);
});

Route::get('/view/{id}/update', function ($id) {
    $info = \App\Info::find($id);
    
    return view('update', ['info' => $info]);
});

Route::post('/view/{id}/update', function (Request $request, $id) {
    $data = $request->validate([
        'info_name' => 'required|max:255',
        'event_name' => 'required|max:255',
        'category' => 'required',
        'industry' => 'required',
        'actual_info' => 'required|max:255',
        'keywords' => 'required|max:255',
        'activity_date' => 'required|date',
        'expiry_date' => 'required|date',
        'related_agency' => 'nullable|max:255',
        'numerical_value' => 'nullable',
        'other_details' => 'nullable|max:255',
        'enabled' => 'required',
    ]);
    
    $info = \App\Info::find($id);
    $info->info_name = $data['info_name'];
    $info->event_name = $data['event_name'];
    $info->category = $data['category'];
    $info->industry = $data['industry'];
    $info->actual_info = $data['actual_info'];
    $info->keywords = $data['keywords'];
    $info->activity_date = $data['activity_date'];
    $info->expiry_date = $data['expiry_date'];
    $info->related_agency = $data['related_agency'];
    $info->numerical_value = $data['numerical_value'];
    $info->other_details = $data['other_details'];
    $info->enabled = $data['enabled'];
    $info->save();
    
    return view('view', ['info' => $info]);
});

Route::get('/delete/{id}', function ($id) {
    $info = \App\Info::find($id);
    $info->delete();
    
    return redirect('/')->with('success', 'Information deleted!');
});

Route::get('/category/{mod}', function ($mod){
    $infos = DB::select('select * from infos where category = ?', [$mod]);
    
    return view('welcome', ['infos' => $infos]);
});

Route::get('/industry/{mod}', function ($mod){
    $infos = DB::select('select * from infos where industry = ?', [$mod]);
    
    return view('welcome', ['infos' => $infos]);
});

Route::get('/date/{mod}', function ($mod){
    $date = date('Y-m-d');
    if ($mod === 'this week'){
        $date = date_create($date);
        date_sub($date, date_interval_create_from_date_string('7 days'));
    }
    elseif ($mod === 'this_month'){
        $date = date_create($date);
        date_sub($date, date_interval_create_from_date_string('1 month'));
    }
    elseif ($mod === 'this_year'){
        $date = date_create($date);
        date_sub($date, date_interval_create_from_date_string('1 year'));
    }
    
    $infos = DB::select("select * from infos where activity_date >= ?", [$date]);
    
    return view('welcome', ['infos' => $infos]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
