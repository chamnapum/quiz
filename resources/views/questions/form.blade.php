<div class="form-group">
	<label for="question">Question</label>
		{!! Form::text('question', $question->question, ['placeholder' => 'question', 'class' => 'form-control']) !!}
</div>
<div class="form-group form-check">
	<label class="form-check-label">
		{{ Form::checkbox('is_active', $question->is_active, null, ['class' => 'form-check-input']) }} active
	</label>
</div>
<button type="submit" class="btn btn-primary">Submit</button>