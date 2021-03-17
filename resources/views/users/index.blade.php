@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        @include('layouts.partials.flash_messages')
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>
                Users Lists
            </h4>
        </div>
        <div class="col-md-6">
            <div class="btn-group float-end">
                <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Na me</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ ucfirst($user->gender) }}</td>
                            <td>{{ \App\Models\User::STATUS[$user->status] }}</td>
                            <th class="text-end">
                                <div class="btn-group">
                                    <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"
                                       title="User Details">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-success btn-sm" href="{{ route('users.edit',$user->id) }}"
                                       title="User Details">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                       onclick="confirmPureDelete('{{ route('users.destroy',$user->id) }}');"
                                       title="User Details">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
