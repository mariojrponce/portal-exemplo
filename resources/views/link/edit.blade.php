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

                <h3 class="text-center">Edição {{$link->nome}}</h3>

                <div class="card">
                    <div class="card-body">
                            <form action="{{ route('link.update', $link->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        @php( $field = 'nome' )
                                        <label for="{{ $field }}">Nome</label>
                                        <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field, $link[$field] ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Nome">
                                    </div>
                                    <div class="form-group">
                                            @php( $field = 'descricao' )
                                            <label for="{{ $field }}">Descrição</label>
                                            <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field, $link[$field] ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Descrição">
                                        </div>
                                    <div class="form-group">
                                        @php( $field = 'url' )
                                        <label for="{{ $field }}">Url</label>
                                        <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field, $link[$field] ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="https:\\..">
                                    </div>
                                    <div class="form-group">
                                        @php( $field = 'imagem' )
                                        <label for="{{ $field }}">Imagem Atual</label>
                                        <img class="mb-3 ml-3" src="/{{'storage/'.$link->imagem}}" alt="{{ $link->imagem }}" height="128">
                                        <input type="file" class="form-control  @error($field) is-invalid @enderror" value="{{ old( $field, $link[$field] ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Imagem">
                                    </div>
                                    <a href="{{route('home')}}" class="btn btn-sm btn-outline-primary">Cancelar</a>
                                    <input type="submit"  class="btn btn-sm btn-outline-success" value="Salvar">
                                </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
