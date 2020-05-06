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

            <form method="post" action="{{ route('teacher.update', $teacher) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="teacher-firstName">First Name</label>
                    <input value="{{$teacher->f_name}}" name="first_name" type="text" class="form-control" id="teacher-firstName" aria-describedby="emailHelp" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="teacher-lastName">Last Name</label>
                    <input value="{{$teacher->l_name}}" name="last_name" type="text" class="form-control" id="teacher-lastName" placeholder="Enter last name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
