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

<h1>Data {{ $project->name }}</h1>

    <div class="text-center">
        <h2>{{ $project->name }}</h2>
        <p>
            <strong>Tanggal Mulai:</strong> {{ $project->created_at }}<br>
            <strong>Tanggal Update:</strong> {{ $project->updated_at }}
        </p>
    </div>
	
	
	 <div>
		<h3>Daftar Tugas</h3>
		
		<!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	</div>
	<div>
		 <a class="btn btn-small btn-success" href="{{ route('projects.tasks.create', $project->slug) }}">Buat Tugas Baru</a>
	</div>
	
	<br>
	
	<div>
		 @if ( !$project->tasks->count() )
        Proyek ini tidak memiliki tugas.
    @else
    <ul>	
	<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nama Tugas</td>
			<td>Deskripsi</td>
			<td>Selesai</td>
            <td>Tanggal Mulai</td>
            <td>Tanggal Update</td>
            <td></td>
			<td></td>
			<td></td>
        </tr>
    </thead>
    <tbody>
            @foreach( $project->tasks as $task )	
             <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->name }}</td>
			<td>{{ $task->description }}</td>
			<td>{{ $task->completed }}</td>
            <td>{{ $task->created_at }}</td>
            <td>{{ $task->updated_at }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td align="center">

                <!-- show the nerd (uses the show method found at GET /tasks/{id} -->
                <a class="btn btn-small btn-success" href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">Lihat Tugas</a>
				
			</td>
			<td align="center">

                <!-- edit this nerd (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{  route('projects.tasks.edit', [$project->slug, $task->slug]) }}">Edit Tugas</a>
				
			</td>
			<td align="center">

				<!-- delete the nerd (uses the destroy method DESTROY /projects/{id} -->
				{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
                    {!! Form::submit('Hapus Tugas', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

            </td>
			</tr>
            @endforeach
        </ul>
    @endif
	</div>

</div>
</body>
</html>