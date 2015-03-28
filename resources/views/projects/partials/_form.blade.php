<!-- /resources/views/projects/partials/_form.blade.php -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::text('deskripsi') !!}
</div>
<div class="form-group">
    {!! Form::label('tgl_deadline', 'Deadline:') !!}
    {!! Form::text('tgl_deadline') !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::checkbox('status') !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
	 <a href="{{ route('projects.index')}}">{!! Form::button('Batal', ['class'=>'btn btn-danger']) !!}</a>
</div>