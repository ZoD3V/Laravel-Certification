@extends('backend.layouts.app')

@section('javascript-admin')
@endsection
@section('content-admin')
    {{-- content --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users | Edit') }}</div>
                    <div class="card-body">
                        <form action="{{ route('b.manage.edit.process.user', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" value="{{ $user->name }}" placeholder="Name"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="email" value="{{ $user->email }}" placeholder="email"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            password <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            placeholder="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Status <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" name="is_admin" aria-label="Default select example">
                                            <option selected>Select Privilage</option>
                                            <option value="1" @selected($user->is_admin == 1)>admin</option>
                                            <option value="2" @selected($user->is_admin == 2)>staff</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end content --}}
@endsection
