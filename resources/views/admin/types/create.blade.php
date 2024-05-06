@extends('layouts.app')

@section('content')

<body class="create-bg">

  <div class="container py-4">
    <h1>Inserisci una Categoria</h1>

    <form method="POST" action="{{ route('admin.types.store') }}">
      @csrf

      <div class="mb-2">
        <label for="title" class="form-label">Titolo: </label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
        @error('title')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="mb-2">
        <label for="description" class="form-label">Descrizione: </label>
        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"></textarea>
        @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Salva Categoria</button>
    </form>
    
  </div>

</body>
@endsection