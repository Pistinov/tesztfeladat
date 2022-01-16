<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CompanyStoreRequest;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    function add(CompanyStoreRequest $request){

        $validated=$request->validated();

        DB::transaction(function() use ($request){

            $user = User::create( [ 
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'     => $request->email, 
                'password'  => Hash::make($request->password)
            ] );

            $user=User::findOrFail($user->id);

            $logo = $request->hasFile('logo') ? $request->file('logo')->store('public/companies') : null;
 

            $user->companyidentity->create([
                'user_id'           => $user->id,
                'name'              => $request->name,
                'official_email'    => $request->official_email,
                'logo'              => $logo ? $request->logo->hashName():null,
                'website'           => $request-> website
            ]);
            
        });

   
        return back()->with('message', 'Sikeres mentés!');
    }

    function list(){
        return view('admin.companies.list', [
                'list'=>Company::get()
        ]);
               
    }

    function edit(Company $company, CompanyStoreRequest $request){
        
        $validated=$request->validated();

        DB::transaction(function() use ($request, $company){

            $company->user->update([
                'email'=>$request->email, 
                'first_name'=>$request->first_name,
                'last_name' =>$request->last_name]);
            
            if( $request->password )
                $company->user->update(['password'=>Hash::make($request->password
                )]);

        

                $logo = $request->hasFile('logo') ? $request->file('logo')->store('public/companies') : null;                

                $company->update([
                    'name'              => $request->name,
                    'official_email'    => $request->official_email,
                    'logo'              => $logo ? $request->logo->hashName() : $company->logo,
                    'website'           => $request-> website
                ]);
        });

        return back()->with('message', 'Sikeres mentés!');
    }

    function delete( Company $company, Request $request ){
        DB::transaction(function() use ($request, $company){
            $company->delete();
            $company->user->delete();
        });
        return redirect()   ->route('companies-list-view')
                            ->with('message', 'Sikeres törlés!');
    }
}
