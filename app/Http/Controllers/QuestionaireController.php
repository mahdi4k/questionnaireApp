<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionaireController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }
     public function create(){
         return view('questionnaire.create');
     }
     public function store()
     {
         $data = request()->validate([
            'title'=>'required',
            'purpose'=>'required'
         ]);
        //  $data['user_id']=auth()->user()->id;
        //  $questionaire = Questionnaire::create($data);
        $questionaire = auth()->user()->questionnaires()->create($data);
         return redirect('/questionnaires/'.$questionaire->id);
     }

     public function show(Questionnaire $questionnaire)
     {
         $questionnaire->load('questions.answer.responses');

        return view('questionnaire.show',compact('questionnaire'));
     }
}
