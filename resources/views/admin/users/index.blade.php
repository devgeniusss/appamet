@extends('admin.layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="{{ subDomainRoute('admin.users.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i>
            Create
            User</a>
    </div>


    {{-- datatable --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a class="btn btn-info"
                                        href="{{ subDomainRoute('admin.users.edit', ['id' => $user->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger"
                                        href="{{ subDomainRoute('admin.users.destroy', ['id' => $user->id]) }}"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- table end --}}

    @push('script')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endpush
@endsection
