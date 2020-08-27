@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo Edit</div>
                <div class="card-body">
                    <form action="{{ route('todo.update', $todo->id) }}" method="post">
                        @csrf
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" name="todo" placeholder="Todo..." value="{{ $todo->todo }}">
                            <button type="submit" class="btn btn-success ml-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
