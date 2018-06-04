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
     
  {!! Form::model($ques, ['route' => ['question_update', $ques->id], 'class' => 'smart-form', 'id'=>'checkout-form', 'method' => 'put']) !!}
  @include('questions.form', ['question' => $ques])
  {!! Form::close() !!}
</div>
@endsection


