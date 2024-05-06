@extends('layouts.app')

@section('content')

<body class="admin-bg">

    <div class="container text-center mt-4">
        <h1>
            Pagina Super Segreta Admin
        </h1>
    </div>

    <div class="d-flex justify-content-center text-center gap-4 mt-5">
        @foreach($projects as $project)
        <div class="pointer">
            <h2>{{ $project->title }}</h2>
            <p>{{ $project->description }}</p>
            <small>{{ $project->type?->title }}</small>
            <div class="mb-2">
                <img class="img-size" src="{{ asset('storage/' . $project->image) }}" alt="Copertina immagine">
            </div>

            
            <div class="mb-2 d-flex justify-content-center gap-2">
                @foreach($project->technologies as $technology)
                <img class="technologies-size" src="{{ asset('storage/' . $technology->preview) }}" alt="Anteprima tecnologia">
                @endforeach
            </div>
           
            
            <div class="d-flex justify-content-center gap-4">
                <a href="{{ route('projects.edit', ['project' => $project]) }}"
                    class="btn btn-outline-primary">Modifica</a>
                <form action="{{ route('projects.destroy', ['project' => $project]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Elimina</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="container text-center mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Vai alla DashBoard</a>
    </div>

</body>
@endsection