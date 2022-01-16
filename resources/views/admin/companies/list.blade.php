@extends('layouts.admin')
@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cégek</h1>

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
                            <th>Logó</th>
                            <th>Felhasználó</th>
                            <th>Cégnév</th>
                            <th>E-mail</th>
                            <th>Web</th>
                            <th>Művelet</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach( $list as $company )
                       <tr>
                           {{-- http://127.0.0.1:8000/storage/companies/eBbRE3TKANvyy4NrHVkzfSlUR5uFQspJf4eFAKC4.png --}}
                            <td> {!! $company->logo ? '<a href="'.asset('storage/companies/'.$company->logo).'" class="logo-link" target="_blank"><img src="'.asset('storage/companies/'.$company->logo).'" class="list-logo">':'' !!} </td>
                            <td> {{$company->user->first_name}} {{$company->user->last_name}} </td>
                            <td> {{$company->name}} </td>
                            <td> {{$company->official_email}} </td>
                            <td> {{$company->website}} </td>
                            <td width="10%"><a class="btn btn-info" href="{{route('company-edit-view', $company)}}">Szerkesztés</a> </td> 
                            </tr>
                        @endforeach    


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection