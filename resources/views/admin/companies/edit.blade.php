@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">A Cég adatainak módosítása</h1>
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('companies-list-view')}}" class="btn btn-primary">Lista</a> {{$company->name}} adatainak szerkesztéséhez, adja meg az alábbi adatokat!</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">

        @include("admin.includes.message")

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{$company->user_id}}">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>
                    <div class="row mt-4">
                        <div class="col-4">
                            <label for="first_name">User vezetéknév:</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name', $company->user->first_name) }}">
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div>
                        <div class="col-4">
                            <label for="last_name">User keresztnév:</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name', $company->user->last_name) }}">
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div>
                        <div class="col-4">
                            <label for="name">Cégnév:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $company->name) }}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div> 
                    </div>
                    
                    <div class="row  mt-4">
                           
                        <div class="col-4">
                        <label for="official_email">Cég e-mail címe:</label>
                            <input type="email" class="form-control" name="official_email" id="official_email" value="{{ old('official_email', $company->official_email) }}">
                                @error('official_email')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div> 
                        <div class="col-4">
                        <label for="website">Website:</label>
                            <input type="text" class="form-control" name="website" id="website" onfocus="this.value= this.value.length === 0 ? 'http://':this.value"  value="{{ old('website', $company->website) }}" onblur="this.value= this.value== 'http://' ? '':this.value">
                                @error('website')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div>
                        <div class="col-4">
                            <label for="logo" class="d-block">Logó {!! $company->logo ? '<a href="'.asset('storage/companies/'.$company->logo).'" target="_blank">[jelenlegi]<a>':''!!} :</label>
                            <input type="file" name="logo" id="logo">
                            @error('logo')
                            <span class="text-danger">{{$message}}</span>       
                        @enderror
                        </div>
                    </div>   
                    <div class="row  mt-4">
                        <div class="col-md-4">
                            <label for="email">User e-mail (login email):</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $company->user->email) }}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>       
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone">Jelszó:</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>       
                            @enderror
                        </div>
                    
                        <div class="col-md-4">
                            <label for="phone">Jelszó ismét:</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-success"  formaction="">Mentés <i class="fa fa-save"></i></button>
                    <button class="btn btn-danger deleteconfirm"  formaction="{{ route('company-delete', $company) }}">Törlés <i class="fa fa-trash"></i></button>
                </td>
            </tr>   
    </table>
    </form>
    </div>
    </div>
    </div>
    
   
    <!-- /.container-fluid -->
    
</div>
@endsection