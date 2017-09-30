@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        @foreach($errors->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    </div>
                    @endif
                    <form class="form-horizontal" action="{{ route('saveJob') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="title" class="form-control" id="inputEmail3" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Salary</label>
                            <div class="col-sm-2">
                                <input type="number" name="salary" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" name="city" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-10">
                                <input type="text" name="country" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Type Job</label>
                            <div class="col-sm-10">
                                <select name="type_job_id" id="" class="form-control">
                                    <option value="">Select type job ..</option>
                                    @foreach($jobTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                @foreach($categories as $category)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection