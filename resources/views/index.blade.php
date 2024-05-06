@extends('layouts.app')
@section('content')

<body class="welcome-bg">
    
<div class="content">
    <div class="container text-center mt-4">
        <h1>WELCOME TO MY PORTFOLIO</h1>
    </div>

    <div class="d-flex justify-content-center text-center gap-4 mt-5">
        @foreach($projects as $project)
        <a class="text-decoration-none text-white" href="{{ route('projects.show', $project) }}">
        <div class="pointer">
            <h2>{{ $project->title }}</h2>
                <small>{{ $project->type?->title }}</small>
            <p>{{ $project->description }}</p>
            <div class="mb-2">
                <img class="img-size" src="{{ asset('storage/' . $project->image) }}" alt="Copertina immagine">
            </div>
            <p>Tecnologie: {{ $project->technology }}</p>
        </div>
        <div class="mb-2 d-flex justify-content-center gap-2">
            @foreach($project->technologies as $technology)
            <img class="technologies-size" src="{{ asset('storage/' . $technology->preview) }}" alt="Anteprima tecnologia">
            @endforeach
        </div>
        </a>
        @endforeach
    </div>

</div>

</body>
@endsection