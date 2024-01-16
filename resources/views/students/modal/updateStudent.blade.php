<!-- Modal -->
<div class="modal fade" id="updateModal-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModal">Atualizar dados do aluno(a)</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-2">
                <form action="{{ route('student.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <input type="text" name="userId" value="{{ $user->id }}" hidden>
                        <div class="row mt-2">
                            <input type="text" name="name" id="name" value="{{ $user->name }}" placeholder="Nome">
                        </div>
                        <div class="row mt-2">
                            <input type="text" name="email" id="email" value="{{ $user->email }}" placeholder="Email">
                        </div>
                        <div class="row mt-2">
                            <button type="submit" class="btn btn-success">Atualizar aluno</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
