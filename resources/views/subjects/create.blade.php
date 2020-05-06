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

            <form method="post" action="{{ route('subject.store') }}">
                @csrf
                <div class="form-group">
                    <label for="group-name">Subject Name</label>
                    <input value="{{old('subject_name')}}" name="subject_name" type="text" class="form-control" id="group-name" aria-describedby="emailHelp" placeholder="Enter subject name">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
