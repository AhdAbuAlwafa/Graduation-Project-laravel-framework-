@extends('layouts.master')

@section('content')
    <div class="container">
        <h20>The user information</h20>
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive">
                   
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr> 
                                <th scope=”col”></th>
                                <th>id</th>
                                <th>fname</th>
                                <th>lname</th>
                                <th>number</th>
                                <th>image</th>
                                <th>password</th>
                                <th>description</th>
                                <th>gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="col"></th>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->fname }}</td> 
                                    <td>{{ $user->lname }}</td> 
                                    <td>{{ $user->number }}</td> 
                                    <td>{{ $user->image }}</td> 
                                    <td>{{ $user->password }}</td> 
                                    <td>{{ $user->description }}</td> 
                                    <td>{{ $user->gender }}</td> 

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@endsection


