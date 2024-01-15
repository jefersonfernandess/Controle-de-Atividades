<!-- Modal -->
<div class="modal fade" id="editDiciplines-{{ $dicipline->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container content">
                    <form id="form" class="form-register" action="{{ route('diciplines.update', $dicipline->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <h2>Editar diciplina</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex flex-column justify-content-center">
                                <input type="text" name="name" id="name" placeholder="Nome da diciplina"
                                    value="{{ $dicipline->name }}">
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex flex-column justify-content-center">
                                <button class="btn btn-warning" type="submit">Atualizar diciplina</button>
                            </div>
                        </div>
                        @if (session('fail'))
                            <div class="row">
                                <div class="col d-flex justify-content-center ">
                                    <p class="errorMessage">{{ session('fail') }}</p>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
