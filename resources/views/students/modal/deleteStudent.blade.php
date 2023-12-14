<!-- Modal -->
<div class="modal fade" id="deleteModal-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-5" id="staticBackdropLabel">Você quer *<b>DESVINCULAR</b>* esse aluno(a)?</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-2">
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-angle-left" aria-hidden="true"></i> Voltar</button>
                </div>
                <div>
                    <form action="{{ route('student.unlink', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa fa-chain-broken" aria-hidden="true"></i> Desvincular</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
