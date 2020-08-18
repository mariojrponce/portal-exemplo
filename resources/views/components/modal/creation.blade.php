{{-- INICIO: Modal Criar --}}
    <!-- Modal -->
    <div class="modal fade" id="{{$idCriacao}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{$tituloModal}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$conteudoCriacao}}
                </div>
            </div>
        </div>
    </div>
{{-- FIM: Modal criar --}}
    