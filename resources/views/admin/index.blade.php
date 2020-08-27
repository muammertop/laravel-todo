@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo List</div>
                <div class="card-body">
                    <form action="{{ route('admin.index') }}" method="get" class="d-flex mb-4 col-md-12">
                        <select class="form-control m-1" name="user">
                            <option value="" selected disabled>Users</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm m-1" style="height: 37px;">Filter</button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Todo</th>
                                <th scope="col">User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <th scope="row">{{ $todo->id }}</th>
                                    <td>{{ $todo->todo }}</td>
                                    <td>{{ $todo->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
