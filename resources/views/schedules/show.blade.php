@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Schedule {{ $schedule->id }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('schedules.index')}}">Schedules</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <p>
    <div class="card card-primary">
        <div class="card-body" style="display: block;">
            <div class="form-group">
                <label for="title">Title</label>
                {{ $schedule->title }}
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                {{ $schedule->description }}
            </div>
            <div class="form-group">
                <label for="status">State</label>
                {{ $schedule->status }}
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                {{ $schedule->start_date }}
            </div>
            <div class="form-group">
                <label for="deadline_date">Deadline Date</label>
                {{ $schedule->start_date }}
            </div>
            <div class="form-group">
                <label for="conclusion_date">conclusion Date</label>
                {{ $schedule->start_date }}
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('schedules.index')}}" class="btn btn-secondary">Back schedules</a>
            <form action="{{ route('schedules.delete', $schedule->id) }} " method="POST" >
                @csrf()
                @method('delete')
                <input type="submit" value="Delete Product" class="btn btn-danger float-right">
            </form>
            
        </div>
    </div>
    </p>
@stop
