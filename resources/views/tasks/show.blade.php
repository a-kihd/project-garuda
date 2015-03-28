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

<h1>Showing {{ $task->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $task->name }}</h2>
		
		<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

        <p>
            <strong>Tanggal Mulai:</strong> {{ $task->created_at }}<br>
            <strong>Tanggal Update:</strong> {{ $task->updated_at }}<br>
			<strong>Deskripsi:</strong> {{ $task->description }}<br>
			<strong>Selesai:</strong> {{ $task->completed }}
			
        </p>
    </div>
	<br>
	
	<div>
		 @if ( !$task->workers->count() )
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
            @foreach( $task->workers as $worker )	
             <tr>
            <td>{{ $worker->id }}</td>
            <td>{{ $worker->name }}</td>
			<td>{{ $worker->description }}</td>
			<td>{{ $worker->completed }}</td>
            <td>{{ $worker->created_at }}</td>
            <td>{{ $worker->updated_at }}</td>

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
				{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.workers.destroy', $project->slug, $task->slug, $worker))) !!}
                    {!! Form::submit('Hapus Tugas', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

            </td>
			</tr>
            @endforeach
        </ul>
    @endif
	</div>

	<div>
	 <a class="btn btn-small btn-danger" href="{{ route('projects.show', $project->slug) }}">Kembali ke Halaman Proyek</a>
	</div>

</div>
</body>
</html>