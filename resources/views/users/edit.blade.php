@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4>
                Update User Details
            </h4>
        </div>
        <div class="col-md-6">
            <div class="btn-group float-end">
                <a href="{{ route('users.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                <a href="{{ route('users.show',$user->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
            </div>
        </div>
    </div>
    <form action="{{ route('users.update',$user->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            @include('users.partials.form',['editMode'=>true])
            <div class="col-md-12 text-end">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </div>
    </form>
    @include('users.partials.hobbies_template')
@endsection
