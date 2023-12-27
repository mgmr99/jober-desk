@extends('layouts.adminpanel')
@section('content')
    
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add Role</a>
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <form action="{{ route('admin.roles.search') }}" method="GET">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                        </form>
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Current Role</th>
                            <th>Change Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>{{ $user->name }}</td>
                            <td> {{ $user->email }} </td>
                            <td>
                                @foreach($user->getRoleNames() as $role)
                                    {{ $role }} @if($loop->last ? '' : ',')@endif
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('admin.roles.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" class="form-control" onchange="this.form.submit()">
                                        {{-- <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                        <option value="reviewer" {{ $user->hasRole('reviewer') ? 'selected' : '' }}>Reviewer</option>
                                        <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option> --}}
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.card -->
    <!-- Modal Container -->
    <div id="flash-message-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-top-right">
            <div class="modal-content">
                <!-- Message content will be inserted here dynamically -->
            </div>
        </div>
    </div>

    <!-- Your scripts and other content here -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if a message is present in the session
            var message = '{{ session("message") }}';

            if (message) {
                // Update the modal content with the message
                $('#flash-message-modal .modal-content').html('<div class="modal-body">' + message + '</div>');

                // Show the modal
                $('#flash-message-modal').modal('show');
            }
        });
    </script>
</section>
    
@endsection