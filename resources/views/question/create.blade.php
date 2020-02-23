@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Questionnire</div>

                <div class="card-body">
                <form action="/questionnaires/{{$questionnaire->id}}/questions" method="get">
                            @csrf

                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" class="form-control" name="question[question]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Question">
                                <small id="emailHelp" class="form-text text-muted">Ask simple and to-the-point questions for best results</small>
                            @error('question.question')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            </div>

                            <div class="form-group">
                                 <fieldset>
                                     <legend>Choices</legend>
                                     <small>choise your answer</small>

                                     <div>
                                         <div class="form-group">
                                             <label for="answer1">Choice 1</label>
                                             <input name="answers[][answer]" type="text" class="form-control" id="answer1" >
                                         </div>
                                         @error('answers.0.answer')
                                         <small class="text-danger">{{$message}}</small>
                                         @enderror
                                     </div>

                                     <div>
                                        <div class="form-group">
                                            <label for="answer2">Choice 2</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer2" >
                                        </div>
                                        @error('answers.1.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                     </div>

                                     <div>
                                        <div class="form-group">
                                            <label for="answer3">Choice 3</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer3" >
                                        </div>
                                        @error('answers.2.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                     </div>

                                     <div>
                                        <div class="form-group">
                                            <label for="answer4">Choice 4</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer4" >
                                        </div>
                                        @error('answers.3.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                     </div>



                                    </fieldset>
                            </div>
                            <button type="submit" class="btn btn-primary">create </button>

                        </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
