@extends('layouts.app')

@section('content')

<body class="show-bg">

    <div class="container">
        <h1>Crea una nuova tecnologia</h1>
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="preview" class="form-label">Anteprima: </label>
                <input type="file" class="form-control @error('preview') is-invalid @enderror" id="preview" name="preview">
                @error('preview')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crea tecnologia</button>
        </form>
    </div>

</body>
@endsection