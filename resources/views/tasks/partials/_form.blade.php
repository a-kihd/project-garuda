<!-- /resources/views/tasks/partials/_form.blade.php -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
 
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
 
<div class="form-group">
    {!! Form::label('completed', 'Completed:') !!}
    {!! Form::checkbox('completed') !!}
</div>
 
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description') !!}
</div>
 
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
	 <a href="{{ route('projects.show', $project->slug)}}">{!! Form::button('Batal', ['class'=>'btn btn-danger']) !!}</a>
</div>