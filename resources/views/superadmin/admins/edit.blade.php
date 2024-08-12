@extends('superadmin.layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admins</h1>
    </div>


    {{-- form --}}

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Admin</h1>
                                </div>
                                <form class="user" action="{{ route('superadmin.admins.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $admin->id }}">
                                    <div class="form-group">
                                        <label for="">Name:</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Name..." value="{{ $admin->name }}">
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Email:</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Email..." value="{{ $admin->email }}">
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Password:</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter password...">
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Domain:</label><br>
                                        <select name="domains[]" id="" multiple class="form-select">
                                            <option value="">Select Domain to attach</option>
                                            @foreach ($domains as $domain)
                                                <option value="{{ $domain->id }}"
                                                    @if (in_array($domain->id, $admin['domains']->pluck('id')->toArray())) selected @endif>{{ $domain->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Save
                        </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>


    {{-- form end --}}
@endsection
