@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <div class="container">
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <a href="{{ route('lesson.create')  }} " class="btn btn-success">Create Lesson</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room ID</th>
                <th scope="col">Teacher ID</th>
                <th scope="col">Subject ID</th>
                <th scope="col">Group ID</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($lessons as $lesson )
                <tr>
                    <th scope="row">{{$lesson->id}}</th>
                    <td>{{$lesson->room_id}}</td>
                    <td>{{$lesson->teacher_id}}</td>
                    <td>{{$lesson->subject_id}}</td>
                    <td>{{$lesson->group_id}}</td>
                    <td>{{$lesson->start_time}}</td>
                    <td>{{$lesson->end_time}}</td>
                    <td class="table-buttons">
                        <a href="{{ route('lesson.edit', $lesson)  }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form method="post" action="{{ route('lesson.destroy', $lesson)  }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
