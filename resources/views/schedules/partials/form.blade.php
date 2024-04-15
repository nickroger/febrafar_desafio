@csrf()
<div class="card card-primary">
    <div class="card-body" style="display: block;">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $schedule->name ?? old('name') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ $schedule->description ?? old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $schedule->start_date ??  old('start_date') }}">
        </div>
        <div class="form-group">
            <label for="deadline_date">Deadline Date</label>
            <input type="date" name="deadline_date" id="deadline_date" class="form-control" value="{{ $schedule->deadline_date ??  old('deadline_date') }}">
        </div>
        <div class="form-group">
            <label for="conclusion_date">Conclusion Date</label>
            <input type="date" name="conclusion_date" id="conclusion_date" class="form-control" value="{{ $schedule->conclusion_date ??  old('conclusion_date') }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control custom-select">
                <option selected="" disabled="">Select one</option>
                <option value="N" @if ($schedule->status ?? old('status') == 'O') selected @endif>Open</option>
                <option value="U" @if ($schedule->status ?? old('status') == 'C') selected @endif>Closed</option>
            </select>
        </div>
    </div>

</div>
