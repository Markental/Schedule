@extends('layouts.app')

@section('title', 'Create')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="{{ route('lesson.update', $lesson) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="group-name">Room ID</label>
                    <input value="{{$lesson->room_id}}" name="room_id" type="text" class="form-control" id="group-name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="group-name">Teacher ID</label>
                    <input value="{{$lesson->teacher_id}}" name="teacher_id" type="text" class="form-control" id="group-name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="group-name">Subject ID</label>
                    <input value="{{$lesson->subject_id}}" name="subject_id" type="text" class="form-control" id="group-name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="group-name">Group ID</label>
                    <input value="{{$lesson->group_id}}" name="group_id" type="text" class="form-control" id="group-name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="group-name">Start Time</label>
                    <input value="{{$lesson->start_time}}" name="start_time" type="datetime-local" class="form-control" id="group-name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="group-name">End Time</label>
                    <input value="{{$lesson->end_time}}" name="end_time" type="datetime-local" class="form-control" id="group-name" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
