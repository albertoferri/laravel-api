@extends('layouts.app')

@section('content')

<body class="show-bg">

    <div class="container py-4">
        @foreach($types as $type)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $type->title }}</h5>
                    <p class="card-text">{{ $type->description }}</p>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$type->id}}">
                        Elimina!!
                    </button>
                </div>
            </div>

            <div class="modal fade" id="deleteModal{{$type->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$type->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{$type->id}}">Conferma</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Elimini la Categoria?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                            <form action="{{route('admin.types.destroy', $type->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>

@endsection