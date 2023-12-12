<!-- Modal -->
<div class="modal fade" id="showModal-{{ $activity->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nome da Atividade: <i>{{ $activity->name }}</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <h2 class="text-center mt-2 mb-1">Atividade</h2>
            <div class="modal-body mt-0">
                <h4 class="card-title"></h4>
                <div class="card">
                    <div class="card-body">
                        {!! $activity->description !!}
                    </div>
                    @if ($activity->filepath == null)
                    @else
                        <div class="card-footer">
                            <p class="text-center mb-1"><i>Arquivos de apoio</i></p>
                            <div class="btn-group">
                                <a class="dropdown-item" href="{{ asset('storage') . '/' . $activity->filepath }}"
                                    download="{{ asset('storage') . '/' . $activity->filepath }}">Arquivo <i
                                        class="fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
