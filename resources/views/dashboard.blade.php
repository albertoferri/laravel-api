@extends('layouts.app')

@section('content')
<body class="dashboard-bg">
    
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('DashBoard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card dashboard-bg">
                <div class="card-header">{{ __('Admin DashBoard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Bentornato Capo') }}

                    <div class="d-flex justify-content-between">
                    <div class="mt-4 d-flex gap-2 flex-column w-25">
                        <h4>Crea:</h4>
                        <a href="{{ route('projects.create') }}" class="btn btn-outline-success">Crea Nuovo Progetto</a>
                        <a href="{{ route('admin.types.create') }}" class="btn btn-outline-success">Crea Nuova Categoria</a>
                        <a href="{{ route('admin.technologies.create') }}" class="btn btn-outline-success">Crea Nuova Tecnologia</a>
                    </div>

                    <div class="mt-4 d-flex gap-2 flex-column w-25">
                        <h4>Visualizza:</h4>
                        <a href="{{ route('admin.types.show') }}" class="btn btn-outline-success">Visualizza Categorie</a>
                        <a href="{{ route('admin.technologies.show') }}" class="btn btn-outline-success">Visualizza Tecnologie</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <a href="{{ route('admin') }}" class="btn btn-primary mt-4">Vai alla AdminPage</a>
    </div>
    
</div>

</body>
@endsection
