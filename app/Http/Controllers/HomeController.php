<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questionnaires = auth()->user()->questionnaires;

        return view('home' , compact('questionnaires'));
    }
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answer.responses');
        $questionnaire->delete();
    }
}
