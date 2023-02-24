@extends('backend.layouts.app')

@section('javascript-admin')
@endsection
@section('content-admin')
    {{-- content --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('User Departement') }}
                        <a href="{{ route('b.manage.create.user_departement') }}" class=" btn btn-sm btn-success">Create</a>
                    </div>

                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-success">
                                {!! Session::get('error') !!}
                            </div>
                        @endif

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {!! Session::get('success') !!}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Departement</th>
                                    <th>Action</th>

                                </thead>
                                @foreach ($departement as $item)
                                    <tbody>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->departement->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary"><i
                                                    class="fas fa-search pe-1"></i> Show</a>
                                            <a href="{{ route('b.manage.edit.user_departement', $item->id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i>
                                                Edit</a>
                                            <form action="{{ route('b.manage.delete.user_departement', $item->id) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt pe-1"> Destroy</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end content --}}
@endsection
