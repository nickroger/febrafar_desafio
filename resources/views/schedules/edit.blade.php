@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Schedules {{$schedule->id}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('schedules.index')}}">Schedules</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <p>
    <x-alert/>
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @method('put')
        @include('schedules.partials.form', [ 'product' => $schedule])
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Update Product" class="btn btn-success float-right">
            </div>
        </div>
    </form>
    </p>
@stop
