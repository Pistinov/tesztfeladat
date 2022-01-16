@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Alkalmazottak</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Válassza ki a szerkeszteni kívánt bejegyzést.</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                @include("admin.includes.message")

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Vezetéknév</th>
                            <th>Keresztnév</th>
                            <th>Cég</th>
                            <th>E-mail</th>
                            <th>Telefonszám</th>
                            <th>Művelet</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach( $list as $employee )
                       <tr>
                            <td> {{$employee->user->first_name}} </td>
                            <td> {{$employee->user->last_name}} </td>
                            <td> {{$employee->company->name}} </td>
                            <td> {{$employee->user->email}} </td>
                            <td> {{$employee->phone}} </td>
                            <td width="10%"><a class="btn btn-info" href="{{route('user-edit-view', $employee->user)}}">Szerkesztés</a> </td> 
                            </tr>
                        @endforeach    


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection