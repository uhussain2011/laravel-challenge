

@extends('layout.layout')

@section('content')



<style>

.is-danger {
    color:red;
    border-color:red;
}



</style>


<div class="container">
<h1>Employees</h1>





@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('Message'))
    <div class="alert alert-danger">
       <p> {{ Session::get('Message') }}</p>
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-auto">

<form action="{{route('people.store')}}" method="post">
    @csrf

    <table class="table table-striped">
    
        <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Job Role</th>
            <th scope="col">Delete</th>
        </tr>




        @foreach ($people as $id => $values)
            <tr>
                <th scope="row">{{$loop->iteration}}<input type="hidden" name="{{'people['.$id.'][id]'}}"  value="{{$values->id}}" /></th>
                <td><input type="text" class="form-control" name="{{'people['.$id.'][firstname]'}}"  value="{{$values->firstname}}" /></td>
                <td><input type="text" class="form-control" name="{{'people['.$id.'][lastname]'}}"  value="{{$values->lastname}}" /></td>
                <td><input type="text" class="form-control" name="{{'people['.$id.'][email]'}}"  value="{{$values->email}}" /></td>
                <td><input type="text" class="form-control" name="{{'people['.$id.'][job_role]'}}"  value="{{$values->role}}" /></td>
                <td><input  type="checkbox" class="form-check-input mx-auto" name="{{'delete['.$id.']'}}" value="{{$values->id}}" /></td>
            </tr>
        @endforeach
        <tr>
        <tr>
            <td/>


            <!-- Add ternary to create red box -->
            <td><input type="text" class="form-control" name="firstname" placeholder="Add new..." value="{{old('firstname')}}" />
            @if ($errors->has('firstname')) <p class="is-danger">{{ $errors->first('firstname')}}</p> @endif</td>
            <td><input type="text" class="form-control" name="lastname" placeholder="Add new..." value="{{old('lastname')}}" />
            @if ($errors->has('lastname')) <p class="is-danger">{{ $errors->first('lastname')}}</p> @endif</td>

            <td><input type="text" class="form-control" name="email" placeholder="Add new..." value="{{old('email')}}" />
            @if ($errors->has('email')) <p class="is-danger">{{ $errors->first('email')}}</p> @endif</td>
            
            <td><input type="text" class="form-control" name="job_role" placeholder="Add new..." value="{{old('job_role')}}" />
            @if ($errors->has('job_role')) <p class="is-danger">{{ $errors->first('job_role')}}</p> @endif</td>
        </tr>
    </table>

    <input type="submit" class="btn btn-primary float-right" value="Submit!" />
</form>
</div>
</div>


</div>
@endsection
