@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        {{-- @auth --}}
                            <!-- Botão para acionar modal -->
                            <div class="btn">
                                <a data-toggle="modal" data-target="#modalCentralizado" class="btn btn-sm btn-outline-success">Criar anotação</a>
                            </div>

                            {{-- INICIO: Componente Criar --}}
                                @component('components.modal.creation')
                                @slot('idCriacao')
                                    modalCentralizado
                                @endslot
                                @slot('tituloModal')
                                    <h5 class="modal-title" id="TituloModalCentralizado">Nova anotação</h5>
                                @endslot
                                    @slot('conteudoCriacao')
                                    <form action="{{ route('note.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                @php( $field = 'titulo' )
                                                <label for="{{ $field }}">Titulo</label>
                                                <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Titulo">
                                            </div>
                                            <div class="form-group">
                                                    @php( $field = 'descricao' )
                                                    <label for="{{ $field }}">Descrição</label>
                                                    <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Descrição">
                                                </div>
                                            <div class="form-group">
                                                @php( $field = 'texto' )
                                                <label for="{{ $field }}">Texto</label>
                                                <textarea class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" rows="12">{{ old( $field ) }}</textarea>
                                            </div>
                                            <a href="" class="btn btn-primary">Cancelar</a>
                                            <input type="submit"  class="btn btn-success" value="Salvar">
                                        </form>
                                    @endslot
                                @endcomponent
                            {{-- FIM: Componente criar --}}
                        {{-- @endauth --}}
                    </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @forelse ($notes as $note)
                <div class="card mt-2">
                    <div class="px-4 pt-4">
                        <h5 class="float-left">
                            <b>{{ $note->titulo}}</b>
                        </h5>
                        <div class="float-right">
                            <a href="{{ route('note.edit', $note->id ) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                           <a href="{{ route('note.delete', $note->id ) }}" class="btn btn-sm btn-outline-danger">Deletar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-title">{{ $note->descricao }}</p>
                        <div class="card-text">{!! $note->texto !!}</div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Não foram encontradas anotações.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
