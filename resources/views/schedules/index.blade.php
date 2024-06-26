@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Show all schedules</h1>
                <a href="{{ route('schedules.create') }}">
                    <div class="btn btn-lg btn-flat bg-success">
                        Add New
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">schedules</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="container-fluid">
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="data_start">Start Date</label>
                                <input type="date" name="data_start" id="data_start" class="form-control" inputmode="numeric" value="{{ old('data_start') }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="data_end">End Date</label>
                                <input type="date" name="data_end" id="data_end" class="form-control" inputmode="numeric" value="{{ old('data_end') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="submit" value="Search" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <p>
    <table id="list" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>Conclusion Date</th>
                <th>Deadline Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule["title"] }}</td>
                    <td>{{ date('d/m/Y', strtotime($schedule['start_date'])) }}</td>
                    <td>{{ date('d/m/Y', strtotime($schedule['conclusion_date'])) }}</td>
                    <td>{{ date('d/m/Y', strtotime($schedule['deadline_date'])) }}</td>
                    <td>{{ getStatusSchedule($schedule['status']) }}</td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('schedules.show', $schedule['id']) }}">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('schedules.edit', $schedule['id']) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>

                        <form class="btn btn-sm"  action="{{ route('schedules.delete', $schedule['id']) }} " method="POST">
                            @csrf()
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>Conclusion Date</th>
                <th>Deadline Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    </p>
@stop

@section('plugins.Datatables', true)
@section('js')
    <script>
        $(function() {
            $('#list').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@stop
