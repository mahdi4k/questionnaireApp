@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$questionnaire->title}}</div>

                    <div class="card-body">
                        <a class="btn btn-dark" href="/questionnaires/{{$questionnaire->id}}/questions/create">Add new
                            Question </a>
                        <a class="btn btn-dark"
                           href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}">Take Survey </a>
                    </div>
                </div>
                @foreach ($questionnaire->questions as $item)
                    <div class="card mt-4">
                        <div class="card-header">{{$item->question}}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($item->answer as $value)
                                    <li class="list-group-item d-flex justify-content-between">
                                       <div> {{$value->answer}}</div>
                                        @if($value->responses->count())
                                            <div>{{(intval($value->responses->count() * 100) / $item->responses->count()) }}%</div>
                                        @endif
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$item->id}}" method="post">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete question</button>
                        </form>
                    </div>
                @endforeach
            </div>

        </div>

    </div>


@endsection
