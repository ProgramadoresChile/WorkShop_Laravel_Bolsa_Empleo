@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">Trabajos</div>
                    <div class="panel-body">
                        @foreach($jobs as $job)
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="{{ route('viewJob', $job->id) }}"> {{ $job->title }}</a>
                                </h4>
                                {{ $job->description }}
                            </div>
                        </div><hr>
                        @endforeach
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
