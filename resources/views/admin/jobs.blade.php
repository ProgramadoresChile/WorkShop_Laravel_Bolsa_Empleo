@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <a href="{{ url('/create-job') }}" class="btn btn-default">Crear</a>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ $job->id }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->description }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-link" href="{{ route('editJob', $job->id) }}">Edit</a>
                                                <form method="post" action="{{ route('deleteJob', $job->id) }}">
                                                    <input type="hidden" value="delete" name="_method">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-link">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/otro.js') }}"></script>
@endsection