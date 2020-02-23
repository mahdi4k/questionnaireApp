@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$questionnaire->title}}</h1>
                    <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                        @csrf
                        @foreach ($questionnaire->questions as $key => $questions)
                            <div class="card mt-4">
                                <div class="card-header"><strong>{{$key + 1}}{{ $questions->question  }}</strong></div>
                                <div class="card-body">
                                    @error('responses.' . $key . '.answer_id')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    <ul class="list-group">
                                        @foreach ($questions->answer as $value)
                                            <label for="answer{{$value->id}}">
                                                <li class="list-group-item">
                                                    <input value="{{$value->id}}" type="radio"
                                                        {{(old('responses.'. $key . '.answer_id') == $value->id) ? 'checked' : ''}}
                                                           name="responses[{{$key}}][answer_id]" id="answer{{$value->id}}">
                                                    {{$value->answer}}
                                                    <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$questions->id}}">
                                                </li>
                                            </label>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        @endforeach
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Your name</label>
                                <input type="text" name="survey[name]" class="form-control" id="name">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Your email</label>
                                <input type="text" name="survey[email]" class="form-control" id="email">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <input class="btn btn-dark" type="submit" value="send survey">
                    </form>

            </div>
        </div>
    </div>
@endsection
