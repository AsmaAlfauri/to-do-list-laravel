@extends('layouts.main')

@section('content')
    <h1 class="text-center my-5">Create Todos</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create New Todo</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/store-todos" method="post">
                        @csrf
                        <div class="form-group">
                            <label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <textarea name="description" placeholder="Description" cols="50" rows="10" class="form-control"></textarea>
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                Create Todo
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




@endsection
