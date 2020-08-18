@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h3 class="text-center">Edição {{$note->titulo}}</h3>

                <div class="card">
                    <div class="card-body">
                            <form action="{{ route('note.update', $note->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        @php( $field = 'titulo' )
                                        <label for="{{ $field }}">Titulo</label>
                                        <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field, $note[$field] ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="titulo">
                                    </div>
                                    <div class="form-group">
                                            @php( $field = 'descricao' )
                                            <label for="{{ $field }}">Descrição</label>
                                            <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field, $note[$field] ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Descrição">
                                        </div>
                                    <div class="form-group">
                                        @php( $field = 'texto' )
                                        <label for="{{ $field }}">Texto</label>
                                        <textarea type="text" class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}">{{ old( $field, $note[$field] ) }}</textarea>
                                    </div>
                                    <a href="{{route('note')}}" class="btn btn-sm btn-outline-primary">Cancelar</a>
                                    <input type="submit"  class="btn btn-sm btn-outline-success" value="Salvar">
                                </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
