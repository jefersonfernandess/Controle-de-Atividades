<div class="collapse" id="teaches">
    <div class="card card-body">
        <a href="{{ route('teacher.index') }}" class="nav-link active">Ver Professores <i class="fa-solid fa-arrow-up-right-from-square fa-sm" style="color: #000000;"></i></a>
        <a class="nav-link active" data-bs-toggle="modal" href="#" role="button" aria-expanded="false"
            aria-controls="collapseExample" data-bs-target="#staticBackdrop">
            Novo professor <i class="fa-solid fa-user-plus fa-sm" style="color: #000000;"></i>
        </a>
        @include('teacher.modal.createTeacher')
    </div>
</div>
