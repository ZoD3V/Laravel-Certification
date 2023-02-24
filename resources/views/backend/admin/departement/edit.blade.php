@extends('backend.layouts.app')

@section('javascript-admin')
@endsection
@section('content-admin')
    {{-- content --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Departement | Edit') }}</div>
                    <div class="card-body">
                        <form id="contactForm" action="{{ route('b.manage.edit.process.departement', $departement->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" value="{{ $departement->name }}"
                                            placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">
                                            slug <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="slug" value="{{ $departement->slug }}"
                                            placeholder="slug" class="form-control @error('slug') is-invalid @enderror">
                                        @error('slug')
                                            <small class="text-danger">{!! $message !!}</small>
                                        @enderror
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
