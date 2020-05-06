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
        <a href="{{ route('teacher.create')  }} " class="btn btn-success">Create Teacher</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher )
            <tr>
                <th scope="row">{{$teacher->id}}</th>
                <td>{{$teacher->f_name}}</td>
                <td>{{$teacher->l_name}}</td>
                <td class="table-buttons">
                    <a href="{{ route('teacher.edit', $teacher)  }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form method="post" action="{{ route('teacher.destroy', $teacher)  }}">
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
