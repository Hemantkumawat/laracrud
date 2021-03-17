@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        @include('layouts.partials.flash_messages')
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>
                User Details
            </h4>
        </div>
        <div class="col-md-6">
            <div class="btn-group float-end">
                <a href="{{ route('users.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                <a onclick="confirmPureDelete('{{ route('users.edit',$user->id) }}')" class="btn btn-danger"><i class="fa fa-trash"></i> Edit</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <dl class="row">
                    <dt class="col-md-4">
                        Full Name
                    </dt>
                    <dd class="col-md-8">
                        {{ $user->full_name }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        Birthdate
                    </dt>
                    <dd class="col-md-8">
                        {{ $user->dob }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        Address
                    </dt>
                    <dd class="col-md-8">
                        {{ $user->address }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        Gender
                    </dt>
                    <dd class="col-md-8">
                        {{ $user->gender }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        hobbies
                    </dt>
                    <dd class="col-md-8">
                        @foreach($user->hobbies as $hobby)
                            <div class="badge bg-primary">{{ ucfirst($hobby) }}</div>
                        @endforeach
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        Country
                    </dt>
                    <dd class="col-md-8">
                        {{ ucfirst($user->country) }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        State
                    </dt>
                    <dd class="col-md-8">
                        {{ ucfirst($user->state) }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        City
                    </dt>
                    <dd class="col-md-8">
                        {{ ucfirst($user->city) }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        Status
                    </dt>
                    <dd class="col-md-8">
                        {{ \App\Models\User::STATUS[$user->status] }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        Created At
                    </dt>
                    <dd class="col-md-8">
                        {{ $user->created_at }}
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-4">
                        Updated At
                    </dt>
                    <dd class="col-md-8">
                        {{ $user->updated_at }}
                    </dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
