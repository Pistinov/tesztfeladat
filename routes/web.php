<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Company;
use App\Models\User;
use App\Models\Employee;
use App\Http\Middleware\Admin;
use App\Http\Middleware\NotAdmin;


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
    return view('login');
})->middleware(['guest']);

Route::post('/', [UserController::class, 'login'])
                ->name('login')
                ->middleware(['guest']);


Route::get('/logout', [UserController::class, 'logout'])
            ->name('logout')
            ->middleware(['auth']);

Route::get('/profile', [UserController::class, 'profile'])
            ->name('profile')
            ->middleware(['auth']);

 
Route::get('/admin', function () {
    return view('admin.login');
})->name('admin-login')->middleware([NotAdmin::class]);

Route::post('/admin', [AdminController::class, 'login'])->middleware([NotAdmin::class]);

Route::group(['prefix'=>'admin', 'middleware'=>[Admin::class]], function(){


    Route::get('/logout', [AdminController::class, 'logout'])->name('admin-logout');

    

    Route::get('/dashboard', function () {
                    return view('admin.dashboard', [
                        'employeescount'=>Employee::count(),
                        'compainescount'=>Company::count(),
                        'lastemployee'  =>Employee::get()->sortByDesc('created_at')->take(1)->first(),
                        'lastcompany'  =>Company::get()->sortByDesc('created_at')->take(1)->first(),
                    ]);
           })->name('dashboard');
 
    Route::group(['prefix'=>'user', 'namespace'=>'App\Http\Controllers\Admin'], function(){       

            Route::get('/list', 'UserController@list')->name('users-list-view');

            Route::get('/add', function () {
                    return view('admin.users.add', [
                            'companies'=>Company::get()
                        ]);
                })->name('user-add-view');

            Route::post('/add', 'UserController@add')
                        ->name('user-add');

            Route::get('/edit/{user}', function (User $user) {
                    return view('admin.users.edit', [
                            'user'=>$user, 
                            'companies'=>Company::get()
                        ]);
                })->name('user-edit-view');

            Route::post('/edit/{user}', 'UserController@edit')
                        ->name('user-edit');

            Route::post('/delete/{user}', 'UserController@delete')           
                        ->name('user-delete');
    });    
 

    Route::group(['prefix'=>'companies', 'namespace'=>'App\Http\Controllers\Admin'], function(){       

        Route::get('/list', 'CompanyController@list')->name('companies-list-view');

        Route::get('/add', function () {
                return view('admin.companies.add');
            })->name('companies-add-view');

        Route::post('/add', 'CompanyController@add')
                    ->name('company-add');

        Route::get('/edit/{company}', function (Company $company) {
                return view('admin.companies.edit', [
                        'company'=>$company 
                    ]);
            })->name('company-edit-view');

        Route::post('/edit/{company}', 'CompanyController@edit')
                    ->name('company-edit');

        Route::post('/delete/{company}', 'CompanyController@delete')           
                    ->name('company-delete');
});  

});

