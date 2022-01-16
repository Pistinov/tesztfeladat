<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function add(UserStoreRequest $request){

        $validated=$request->validated();

        DB::transaction(function() use ($request){

            $user = User::create( [ 'email'     => $request->email, 
                                    'password'  => Hash::make($request->password),
                                    'first_name'=>$request->first_name,
                                    'last_name' =>$request->last_name
                                ] );

            $user=User::findOrFail($user->id);

            $user->employeeidentity->create([
                'user_id'   => $user->id,
                'company_id'=> $request->company_id,
                'phone'     => $request->phone 
            ]);
            
        });

        return back()->with('message', 'Sikeres mentés!');
    }

    function list(){
        return view('admin.users.list', [
                'list'=>Employee::with(['user', 'company'])->get()
        ]);
               
    }

    function edit(User $user, UserStoreRequest $request){
        
        $validated=$request->validated();

        DB::transaction(function() use ($request, $user){

            $user->update([
                'email'=>$request->email,                 'first_name'=>$request->first_name,
                'last_name' =>$request->last_name]);
            
            if( $request->password )
                $user->update([
                        'password'  =>Hash::make($request->password)
            ]);

            $user->employeeidentity->update([
                'user_id'   => $user->id,
                'company_id'=> $request->company_id,
                'phone'     => $request->phone 
            ]);
        });

        return back()->with('message', 'Sikeres mentés!');
    }

    function delete( User $user ){
        DB::transaction(function() use ( $user){
            $user->employeeidentity->delete();
            $user->delete();
        });
        return redirect()   ->route('users-list-view')
                            ->with('message', 'Sikeres törlés!');
    }
}
