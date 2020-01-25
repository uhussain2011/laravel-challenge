
@extends('layout.layout')

@section('content')

<h1>Form page</h1>







<?php


//use this later to 
foreach ($teacher as $id => $values){

}

var_dump($teacher[0]->firstname); // value="michael" need this inserted into table value 
var_dump($teacher[1]->firstname); // value="Simon" need this inserted into table value 

?>





<form action="/form" method="post">
    @csrf


    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email Address</th>
            <th>Job Role</th>
            <th>Delete</th>
        </tr>


@foreach ($teacher as $id => $values)
        <tr>
            <td><input type="text" name="teacher[1][firstnamez]" value="michael" /></td>
            <td><input type="text" name="teacher[1][lastnamez]" value="salad" /></td>
            <td><input type="text" name="teacher[1][emailz]" value="michaelsalad@gmail.com" /></td>
            <td><input type="text" name="teacher[1][job_rolez]" value="french" /></td>
            <td><input type="checkbox" name="teacher[1][deletez]" value="1" /></td>
        </tr>

@endforeach

        <tr>
        <tr>
            <td><input type="text" name="teacher[5][firstname]" placeholder="Add new..." /></td>
            <td><input type="text" name="teacher[5][lastname]" placeholder="Add new..." /></td>
            <td><input type="text" name="teacher[5][email]" placeholder="Add new..." /></td>
            <td><input type="text" name="teacher[5][job_role]" placeholder="Add new..." /></td>
        </tr>
    </table>
    <input type="submit" value="Submit!" />
</form>
@endsection
