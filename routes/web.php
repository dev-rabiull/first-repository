<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\categoriesController;

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

Route::get('/hello', function(){
    return "<h1>Hello World</h1>";
});
Route::get('/form', function(){
    return view('test-form');
});



// RABBIL HASSAN


/*

Route::get('/test','FirstController@Contact');

Route::get('/test/{testValue}','FirstController@NameTest');

Route::get('/test/{name}/{age}','FirstController@Test');

*/


Route::get('/test', [FirstController::class, 'Contact']);




// IQBAL VAIYA


//






Route::get('/contact', function () {
    $todos = DB::table('todos')->get();
    return view('contact', compact('todos'));
})->name('todos');



// Route::get('/contact', [FirstController::class, 'dataFetch'])->name('todos');


/**
 *
 * todo create
 *
 */
Route::post('/todo-create', function (Request $request) {

    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required',
        'phone_no' => 'required',
        'description' => 'required'
    ]);


    DB::table('todos')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'phone_no' => $request->phone_no,
        'description' => $request->description
    ]);
    return redirect()->route('todos');
})->name('todos.create');

/**
 *
 * todo delete
 *
 */
Route::get('/todos/{id}/delete', function ($id) {
    DB::table('todos')->where('id', $id)->delete();

    return redirect()->route('todos');
})->name('todo.delete');

/**
 *
 *
 * todo edit
 *
 *
 */
Route::get('/todo/{id}/edit', function ($id) {
    $todo = DB::table('todos')->where('id', $id)->first();


    if (!$todo) {
        return view('error');
    }
    $todos = DB::table('todos')->get();
    return view('contact', compact('todos', 'todo'));
})->name('todo.edit');


/**
 *
 * todo update
 *
 */
Route::post('/todo/{id}/update', function ($id, Request $request) {
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required',
        'phone_no' => 'required',
        'description' => 'required'
    ]);

    $todo = DB::table('todos')->where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone_no' => $request->phone_no,
        'description' => $request->description
    ]);
    return redirect()->route('todos');
})->name('todo.update');




/*
*
*
*
* Categories Route
*
*
*/



// Hit URL Home

Route::get('/categories', [categoriesController::class, 'index'])->name('categories.index');


// Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

// Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

// Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

// Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');

// Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');

// Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');

// Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

// Route::resource('/category', CategoryController::class);
