@csrf()
<div class="card card-primary">
    <div class="card-body" style="display: block;">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $schedule->title ?? old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ $schedule->description ?? old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            @php
            if(!empty($schedule)){
                if($schedule->start_date){ $datastart=date('d/m/Y', strtotime($schedule->start_date));}
                if($schedule->deadline_date){ $datadeadline=date('d/m/Y', strtotime($schedule->deadline_date));}
                if($schedule->conclusion_date){ $dataconclusion=date('d/m/Y', strtotime($schedule->conclusion_date));}
            }
            @endphp
            <input type="text" name="start_date" id="start_date" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric" value="{{ $datastart ??  old('start_date') }}">
        </div>
        <div class="form-group">
            <label for="deadline_date">Deadline Date</label>
            <input type="text" name="deadline_date" id="deadline_date" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric" value="{{ $datadeadline ??  old('deadline_date') }}">
        </div>
        <div class="form-group">
            <label for="conclusion_date">Conclusion Date</label>
            <input type="text" name="conclusion_date" id="conclusion_date" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric" value="{{ $dataconclusion ??  old('conclusion_date') }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control custom-select">
                <option selected="" disabled="">Select one</option>
                <option value="o" @if ($schedule->status ?? old('status') == 'o') selected @endif>Open</option>
                <option value="c" @if ($schedule->status ?? old('status') == 'c') selected @endif>Closed</option>
            </select>
        </div>
    </div>

</div>

@section('plugins.InputMask', true)

@section('js')
    <script>
        $(function() {
            //Datemask dd/mm/yyyy
            $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        });
    </script>
@stop