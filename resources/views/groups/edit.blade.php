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

            <form method="post" action="{{ route('group.update', $group) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="group-name">First Name</label>
                    <input value="{{$group->group_name}}" name="group_name" type="text" class="form-control" id="group-name" aria-describedby="emailHelp" placeholder="Enter group name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
