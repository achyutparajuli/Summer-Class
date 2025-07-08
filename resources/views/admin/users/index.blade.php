@extends('admin.master')

@section('content')

<div class="container my-5">
    <h2 class="mb-4">User Information</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Achyut Parajuli</td>
                <td>achyut@example.com</td>
                <td>Admin</td>
            </tr>
            <tr>
                <td>2</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Editor</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>Subscriber</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection