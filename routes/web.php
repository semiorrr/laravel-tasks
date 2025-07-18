<?php

use Illuminate\Support\Facades\Route;

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

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

/**
    * Show Task Dashboard
    */
Route::get('/', function () {
    $students = Student::all();
    return view('students', compact('students'));
});

/**
    * Add New Task
    */
Route::post('/task', function (Request $request) {
    Log::info("Post /task");
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        Log::error("Add task failed.");
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();
    // Clear the cache
    Cache::flush();

    return redirect('/');
});

/**
    * Delete Task
    */
Route::delete('/task/{id}', function ($id) {
    Log::info('Delete /task/'.$id);
    Task::findOrFail($id)->delete();
    // Clear the cache
    Cache::flush();

    return redirect('/');
});
