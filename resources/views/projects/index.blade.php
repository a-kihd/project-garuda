<!-- app/views/projects/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Modul Proyek</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>

<!-- buat modul atas -->
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

<h1>Semua Proyek</h1>

<!-- will be used to show any messages -->

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            
            <td>Nama Proyek</td>
			<td>Tanggal Mulai</td>
			<td>Tanggal Deadline</td>
			<td>Penanggung jawab</td>
            <td>Status</td>
            <td></td>
            <td></td>
            <td></td>
			
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            
            <td>{{ $project->name }}</td>
			<td>{{ $project->tgl_mulai = date("d-m-Y") }}</td>
			<td>{{ $project->tgl_deadline }}</td>
			<td>{{ $project->pen_jawab }}</td>
            <td>{{ $project->status }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td align="center">

                <!-- show the nerd (uses the show method found at GET /projects/{id} -->
                <a class="btn btn-small btn-success" href="{{ route('projects.show', $project->slug) }}">Lihat Proyek</a>
				
			</td>
			<td align="center">

                <!-- edit this nerd (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{  route('projects.edit', $project->slug) }}">Edit Proyek</a>
				
			</td>
			<td align="center">

				<!-- delete the nerd (uses the destroy method DESTROY /projects/{id} -->
				{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}
                    {!! Form::submit('Hapus Proyek', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>