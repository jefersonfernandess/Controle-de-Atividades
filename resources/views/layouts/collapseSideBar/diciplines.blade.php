<div class="collapse" id="diciplines">
    <div class="card card-body">
        <a href="{{ route('diciplines.index') }}" class="nav-link active">Ver Disciplinas <i
                class="fa-solid fa-arrow-up-right-from-square fa-sm" style="color: #000000;"></i></a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDiciplines">
            Ver Disciplinas <i class="fa-solid fa-arrow-up-right-from-square fa-sm" style="color: #ffffff;"></i>
        </button>
        @include('diciplines.modal.createDiciplines')
    </div>
</div>
