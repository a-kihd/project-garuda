<!DOCTYPE html>
<html>
<head>
    <title>Modul Proyek</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('projects') }}">Modul Proyek</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('projects') }}">Lihat Semua Proyek</a></li>
        <li><a href="{{ URL::to('projects/create') }}">Buat Proyek Baru</a>
    </ul>
</nav>

<h1>Buat Proyek Baru</h1>

<div class="content">
	@if (Session::has('message'))
		<div class="flash alert-info">
			<p>{{ Session::get('message') }}</p>
		</div>
	@endif
	@if ($errors->any())		
	<div class='flash alert-danger'>			
	@foreach ( $errors->all() as $error )				
	<p>{{ $error }}</p>			
	@endforeach		
	</div>	@endif 
	@yield('content')
</div>

{!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug]]) !!}
        @include('projects/partials/_form', ['submit_text' => 'Update Project'])
    {!! Form::close() !!}

</div>
</body>
</html>