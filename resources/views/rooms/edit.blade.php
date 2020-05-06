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

            <form method="post" action="{{ route('room.update', $room) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="group-name">Room Number</label>
                    <input value="{{$room->room_number}}" name="room_number" type="text" class="form-control" id="group-name" aria-describedby="emailHelp" placeholder="Enter room number">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
