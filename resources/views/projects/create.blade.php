@extends('layouts.app')

@section('content')

<body class="create-bg">

  <div class="container py-4">
    <h1>Inserisci un Progetto</h1>

    <form action="{{route('projects.store')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-2">
        <label for="title" class="form-label">Titolo: </label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
          value="{{ old('title') }}" required>
        @error('title')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-2">
        <label for="description" class="form-label">Descrizione: </label>
        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
          name="description" required>{{ old('description') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-2">
        <label for="image" class="form-label">Anteprima: </label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-2">

        <label for="type_id">Categoria: </label>

        <select class="form-select" name="type_id" id="type_id">

          <option value=""></option>
          @foreach ($types as $type)
          <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{
            $type->title }}</option>
          @endforeach

        </select>

      </div>

      <div class="mb-4">
        <label class="mb-2" for="">Tecnologie: </label>
        <div class="d-flex gap-2">

            @foreach($technologies as $technology)
            <div class="form-check ">

                <input 
                    type="checkbox" 
                    name="technologies[]"
                    value="{{$technology->id}}" 
                    class="form-check-input" 
                    id="technology-{{$technology->id}}"

                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                > 

                <label for="technology-{{$technology->id}}" class="form-check-label">{{$technology->title}}</label>
            </div>
            @endforeach

        </div>

      <button type="submit" class="btn btn-primary"><i class="fa-regular fa-paper-plane"></i> Registra!!</button>

    </form>
  </div>

</body>
@endsection