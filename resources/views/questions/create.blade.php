@extends('layouts.app')

@section('content')
<div class="container">
  	<h2>Questions</h2> 
  	@include('flash::message')

    @if ($errors->all())
        <div class="alert alert-block alert-danger">
            <p>{{ Html::ul($errors->all()) }}</p>
        </div>
    @endif
   
  	{!! Form::open(['route' => 'question_store', 'class' => 'smart-form','id'=>'checkout-form']) !!}
	  @include('questions.form', ['question' => $ques])
	{!! Form::close() !!}
</div>
@endsection


