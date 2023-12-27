@extends('layouts.adminpanel')

@section('content')
<h1>Create Role</h1>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<form action="{{ route('admin.roles.store') }}" method="post">
    @csrf
    <label for="name">Role Name:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Create Role</button>
</form>

@endsection