@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4>
                Create new User
            </h4>
        </div>
        <div class="col-md-6">
            <div class="btn-group float-end">
                <a href="{{ route('users.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="row">
            @include('users.partials.form',['editMode'=>false])
            <div class="col-md-12 text-end">
                <button class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
    @include('users.partials.hobbies_template')
@endsection
