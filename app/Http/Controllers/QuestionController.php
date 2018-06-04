<?php

namespace App\Http\Controllers;

use App\Question;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use Validator;
use Redirect;
use Flash;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'question';
        // Auth::id();
        $resutl = Question::orderBy('id', 'DESC')->get();
        return view('questions.index', compact('page','resutl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'question';

        $ques = New Question();
        
        return view('questions.create', compact('page','ques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'question' => 'required|string'
        ];

        $messages = [
            'question.required' => 'question required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $isactive = 0;
        if($request->is_active=='on'){
            $isactive = 1;
        }


        if ($validator->fails()) {
            return redirect()->route('create_question_path')->withInput($request->all())->withErrors($validator);
        } else {
            $question = new Question([
                'question' => $request->question,
                'is_active' => $isactive
            ]);

            if ($question->save()){
                flash('A question was added.')->success();
                return redirect()->route('question_link');
            }else{
                flash('Adding new question failed.')->error();
                return redirect()->route('create_question_path')->withInput($request->all())->withErrors($validator);
            }

        }

        return redirect()->route('create_question_path')->withInput($request->all())->withErrors($validator);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $page = 'questions';

        $ques = Question::find($question->id);

        return view('questions.edit', compact('page', 'ques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $rules =[
            'question' => 'required|string'
        ];

        $messages = [
            'question.required' => 'question required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $isactive = 0;
        if($request->is_active=='on'){
            $isactive = 1;
        }


        if ($validator->fails()) {
            return redirect()->route('create_question_path')->withInput($request->all())->withErrors($validator);
        } else {
            $questions = Question::find($question->id);
            $questions->question = $request->question;
            $questions->is_active = $isactive;

            if ($questions->save()){
                flash('A question was added.')->success();
                return redirect()->route('question_link');
            }else{
                flash('Update patient failed.')->error();
                return redirect('question/'.$question->id.'/edit')->withInput($request->all())->withErrors($validator);
            }

        }

        return redirect('question/'.$question->id.'/edit')->withInput($request->all())->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $check = Question::where('id',$question->id)->first();
        if($check){
            $checkUser = Question::where('id','=',$question->id)->delete();
            if($checkUser){
                flash('A question was deleted.')->success();
                return redirect()->route('question_link');
            }
        }else{
            flash('delete question failed.')->error();
            return redirect()->route('question_link');

        }
    }
}
