@extends('backend.layouts.app')

@section('content-admin')
    <div class="d-flex justify-content-center" style="width: 100%;">
        <div class="my-4 mx-4">
            <div class="d-flex col justify-content-between align-items-center text-secondary" style="width: 100%;">
                <div class="card " style="width: 30rem; font-weight: bold;">
                    <div class="card-header bg-danger fw-bold">
                        Profile
                    </div>
                    <div class="card-body text-black mx-5">
                        <div class="d-flex justify-content-between ">
                            <p>Nama : </p>
                            <p>{{ auth()->user()->name }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Email : </p>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Role : </p>
                            <p>{{ auth()->user()->is_admin == 1 ? 'admin' : 'staff' }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Departement: </p>
                            @foreach ($departement as $data)
                                <div class="d-flex">
                                    <p class>{{ $data->departement->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
