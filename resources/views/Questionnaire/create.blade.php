@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Questionnire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
                                <small id="emailHelp" class="form-text text-muted">ُسوال خود را در این قسمت بپرسید</small>
                            @error('title')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Purpose</label>
                                <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="emailHelp" placeholder="Enter Purpose">
                                <small id="purpose" class="form-text text-muted" > asdsdsadasdsad</small>
                                @error('purpose')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">create </button>

                        </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
