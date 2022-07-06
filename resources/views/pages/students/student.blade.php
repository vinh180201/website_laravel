@extends('layouts.master')

@section('title', 'Student')

@section('style-libraries')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{url('css/student.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .test { padding: 2px 5px; }
    </style>
@stop

{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Student</title>--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <link type="text/css" rel="stylesheet" href="{{url('css/student.css')}}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">--}}


{{--<body>--}}
{{--@include('partials.header')--}}
@section('content')
<div class="container">
    <form type="submit" action="/student/search" method="GET">
        <div class="form-group d-flex">
            <div class="col-sm-1 nopadding">
                <h5>Sort by:</h5>
            </div>
            <div class="col-sm-1 nopadding" style="width: 8%">
                <select id="find_sort" class="form-control" name="sort">
                    <option value="name"
                    @if(isset($sort))
                        {{ $sort == 'name'?'selected':''}}
                        @endif
                    >Name</option>
                    <option value="age"
                    @if(isset($sort))
                        {{ $sort == 'age'?'selected':''}}
                        @endif
                    >Age</option>
                    <option value="month"
                    @if(isset($sort))
                        {{ $sort == 'month'?'selected':''}}
                        @endif
                    >Month</option>
                </select>
            </div>
            <div class="col-sm-2 nopadding">
                <input id="sort_input" class="form-control" type="text"
                       name="value" value="@if(isset($value)){{$value}}@endif">
            </div>
            <div class="col-sm-2 nopadding">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

    </form>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-2">
                    <h2>Student</h2>
                </div>
                {{--free space--}}
                <div class="col-sm-9"></div>
                <a href="/student/add" class="btn btn-success"><i
                        class="material-icons">&#xE147;</i> <span>Add</span></a>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Birthday</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->age}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{date('d-m-Y', strtotime($row->birthday))}}</td>

                    <td>
                        <form type="submit" class="oneline" action="/student/{{$row->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/student/edit/{{$row->id}}" class="edit">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <button type="submit" title="Delete" class="btn-no-border material-icons">&#xE872</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
{{--</body>--}}
{{--@include('partials.footer')--}}
{{--</html>--}}

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    {{--jquery.autocomplete.js--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
    {{--quick defined--}}
    <script src="{{url('js/student.js')}}"></script>
    <script>
        $(function () {
            // your custom javascript
        });
    </script>
@stop
{{--<script src="{{url('js/student.js')}}"></script>--}}
