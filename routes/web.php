<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    //return view('welcome');
    // $users = DB::table('users')->insert([
    //     'username' => 'waqar',
    //     'email' => 'waqar@gmail.com',
    //     'password' => "1234"
    // ]);
    // $user=User::create([
    //     'username' => 'wiki',
    //     'email' => 'wxyz@gmail.com',
    //     'password' => "1234"
    // ]);
// $user= new User();
// $user->username='ahmad';
// $user->email='ahmad@gmail.com';
// $user->password='ahmad';
// $user->save();
//$users=DB::table('users')->get();
// $user=DB::table('users')
// ->where('id',3)
// ->update(['email'=>'wiki@gmail.com']);
// $user =DB::table('users')
// ->where('id',2)
// ->delete();
$user = User::find(3);
$user = $user->username;


    dd($user);
});
//Route::view('/', 'home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

