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
                        @forelse ($links as $link)
                            <div class="card col-sm-3 m-3" style="width: 15rem;">
                                <a href="//{{ $link->url }}" target="_blank">
                                    <img class="card-img-top pt-3 px-3" src="{{'storage/'.$link->imagem}}" alt="{{ $link->nome }}" height="240px">
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $link->nome }}</h5>
                                    <p class="card-text">{{ $link->descricao }}</p>
                                        <a href="{{route('link.edit', $link->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-sm btn-outline-primary mr-2">
                                            Editar
                                        </a>
                                    @auth
                                        <a href="{{route('link.delete', $link->id)}}" data-toggle="tooltip" data-placement="top" title="Deletar"  class="btn btn-sm btn-outline-danger">
                                            Excluir
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        @empty
                        <div class="alert alert-info">
                            Não foram encontrados urls.
                        </div>
                        @endforelse
                        {{-- @auth --}}
                        <div class="card col-sm-3 m-3" style="width: 15rem;">
                                <!-- Botão para acionar modal -->
                                <a data-toggle="modal" data-target="#modalCentralizado">
                                    <img class="card-img-top pt-3 px-3" src="/imagens/plus.png">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">Novo Card</h5>
                                    <p class="card-text">Crie um atalho para o link mais utilizado</p>
                                </div>
                            </div>

                            {{-- INICIO: Componente Criar --}}
                                    @component('components.modal.creation')
                                    @slot('idCriacao')
                                        modalCentralizado
                                    @endslot
                                    @slot('tituloModal')
                                        <h5 class="modal-title" id="TituloModalCentralizado">Nova Url</h5>
                                    @endslot
                                    @slot('conteudoCriacao')
                                    <form action="{{ route('link.store') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                @php( $field = 'nome' )
                                                <label for="{{ $field }}">Nome da página:</label>
                                                <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Nome">
                                            </div>
                                            <div class="form-group">
                                                    @php( $field = 'descricao' )
                                                    <label for="{{ $field }}">Descrição:</label>
                                                    <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Descrição">
                                                </div>
                                            <div class="form-group">
                                                @php( $field = 'url' )
                                                <label for="{{ $field }}">Url:</label>
                                                <input type="text" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field ) }}" id="{{ $field }}" name="{{ $field }}" placeholder="Url do site">
                                            </div>
                                            <div class="form-group">
                                                @php( $field = 'imagem' )
                                                <label class="file-label" for="{{ $field }}">Escolha uma imagem: </label>
                                                <input type="file" class="form-control @error($field) is-invalid @enderror" value="{{ old( $field ) }}" id="{{ $field }}" name="{{ $field }}" accept=".png,.jpeg,.gif,.svg,.bitmap" placeholder="Imagem" required >
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
@endsection
