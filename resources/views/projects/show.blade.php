@extends('layouts.app')

@section('content')

<body class="show-bg">

<div class="d-flex justify-content-center mt-5">
   
    <div class="pointer">
        <h2>{{ $project->title }}</h2>
            <small>{{ $project->type?->title }}</small>
        <p>{{ $project->description }}</p>
        <div class="mb-2">
            <img class="img-size" src="{{ asset('storage/' . $project->image) }}" alt="Copertina immagine">
        </div>
        <p>Tecnologie: {{ $project->technology }}</p>
        <div class="mb-2 d-flex justify-content-center gap-2">
            @foreach($project->technologies as $technology)
            <img class="technologies-size" src="{{ asset('storage/' . $technology->preview) }}" alt="Anteprima tecnologia">
            @endforeach
        </div>
    </div>
    
</div>

</body>
@endsection