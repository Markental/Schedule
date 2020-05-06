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
        <a href="{{ route('room.create')  }} " class="btn btn-success">Create Room</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room Number</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room )
                <tr>
                    <th scope="row">{{$room->id}}</th>
                    <td>{{$room->room_number}}</td>
                    <td class="table-buttons">
                        <a href="{{ route('room.edit', $room)  }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form method="post" action="{{ route('room.destroy', $room)  }}">
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
