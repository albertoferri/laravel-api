@extends('layouts.app')

@section('content')

<body class="edit-bg">

  <div class="container py-4">
    <h1>Modifica il Progetto</h1>

    <form action="{{route('projects.update', $project)}}" method="POST" enctype="multipart/form-data">
      @csrf

      @method("PUT")

      <div class="mb-2">
        <label for="title" class="form-label">Titolo: </label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
          value="{{ old('title') ?? $project->title }}" name="title" required>
        @error('title')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-2">
        <label for="description" class="form-label">Descrizione: </label>
        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
          name="description" required>{{ old('description') ?? $project->description }}</textarea>
        @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-2 bg-black">
        <label for="image" class="form-label">Anteprima: </label>
        <img class="img-size" src="{{ asset('storage/' . $project->image) }}" alt="">
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-2">

        <label for="type_id">Categoria</label>

        <select class="form-select" name="type_id" id="type_id">


          @foreach ($types as $type)

          <option value="{{$type->id}}" {{ $type->id == old('type_id', $project->type ? $project->type->id
            : '') ? 'selected' : '' }}>
            {{ $type->title }}
          </option>

          @endforeach

        </select>

      </div>

      <div class="mb-4">
        <label class="mb-2">Tecnologie:</label>
        <div class="d-flex gap-2">
          @foreach($technologies as $technology)
          <div class="form-check">
            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
              id="technology-{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' :
            '' }}
            >
            <label for="technology-{{ $technology->id }}" class="form-check-label">{{ $technology->title }}</label>
          </div>
          @endforeach
        </div>
      </div>

      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrows-rotate"></i> Registra!!</button>

    </form>
  </div>

</body>
@endsection