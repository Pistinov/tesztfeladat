@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Új alkalmazott</h1>
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('users-list-view')}}" class="btn btn-primary">Lista</a> Új alkalmazott felvételéhez, adja meg az alábbi adatokat!</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">

        @include("admin.includes.message")

    <form action="" method="post">
        @csrf
    <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="first_name">Vezetéknév:</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name')}}">
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div>
                        <div class="col-6">
                            <label for="last_name">Keresztnév:</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}">
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div>
                    </div>
                    
                    <div class="row  mt-4">
                        <div class="col-4">
                            <label for="company_id">Cég:</label>
                            <select name="company_id" class="form-control" id="company_id">
                                <option value=""> - válasszon - </option>
                                @foreach( $companies as $company )
                                    <option value="{{ $company->id }}" {{ old('company_id')==$company->id ? 'selected':'' }}> {{ $company->name }} </option>
                                @endforeach
                            </select>
                                @error('company_id')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div>    
                        <div class="col-4">
                        <label for="email">E-mail cím:</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div> 
                        <div class="col-4">
                        <label for="phone">Telefonszám:</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>       
                                @enderror
                        </div>
                    </div>   
                    <div class="row  mt-4">
                        <div class="col-md-3">
                            <label for="phone">Jelszó:</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>       
                            @enderror
                        </div>
                    
                        <div class="col-md-3">
                            <label for="phone">Jelszó ismét:</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-success">Mentés <i class="fa fa-save"></i></button>
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