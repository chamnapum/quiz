@extends('layouts.app')

@section('content')
<div class="container">
  	<div class="row">
	  	<div class="col-sm-6">	
		  	<h2>Questions</h2>
		  </div> 
		  <div class="col-sm-6 text-right">	
		  	<a href="{{ route('create_question_path') }}" class="btn btn-warning btn-xs">Add question</a>
			</div>
	  	
	  </div>

	  @include('flash::message')

    @if ($errors->all())
        <div class="alert alert-block alert-danger">
            <p>{{ Html::ul($errors->all()) }}</p>
        </div>
    @endif        

  <table class="table">
    <thead>
      <tr>
        <th>Question</th>
        <th>Active</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php $i=0;?>
  	@foreach($resutl as $data)
  	<?php $i++;?>
      <tr class="question_{{$data->id}}">
        <td>{{ $data->question}}</td>
        <td>{{ $data->is_active}}</td>
        <td>
        	<a href="{{ route('question_edit', ['id'=>$data->id]) }}" class="btn btn-warning btn-xs">Edit</a>
        	<form action="{{ route('questions.destroy', $data->id) }}" method="POST" style="display: inline-block;">
			     {{ method_field('DELETE') }}
			     {{ csrf_field() }}
			     <button class="btn btn-danger btn-xs">Delete</button>
			</form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@section('javascript')

@endsection        	


