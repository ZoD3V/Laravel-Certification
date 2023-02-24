@extends('backend.layouts.app')

@section('javascript-admin')
@endsection
@section('content-admin')
    {{-- content --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Departement | Edit') }}</div>
                    <div class="card-body">
                        <form id="contactForm"
                            action="{{ route('b.manage.edit.process.user_departement', $user_departement->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Select User <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" name="user" aria-label="Default select example">
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}" @selected($item->id == $user_departement->users_id)>
                                                    {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Select Departement <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" name="departement" aria-label="Default select example">
                                            @foreach ($departement as $item)
                                                <option value="{{ $item->id }}" @selected($item->id == $user_departement->department_id)>
                                                    {{ $item->name }} </option>
                                            @endforeach
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
