<!-- Modal -->
<div class="modal fade" id="deleteDiciplines-{{ $dicipline->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Você quer *EXCLUIR* a diciplina de <i>{{ $dicipline->name }}</i>?</h5>
                <div class="container content">
                    <form id="form" class="form-register" action="{{ route('diciplines.destroy', $dicipline->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            </div>
                            <div class="col d-flex flex-column justify-content-center">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
