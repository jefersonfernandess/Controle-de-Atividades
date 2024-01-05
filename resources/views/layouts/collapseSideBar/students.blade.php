<div class="collapse" id="students">
    <div class="card card-body">
        <a href="{{ route('student.index') }}" class="nav-link active">Ver Alunos <i class="fa-solid fa-arrow-up-right-from-square fa-sm" style="color: #000000;"></i></a>
        <a class="nav-link active" data-bs-toggle="modal" href="#" role="button" aria-expanded="false"
            aria-controls="collapseExample" data-bs-target="#createStudent">
            Novo Aluno(a) <i class="fa-solid fa-user-plus fa-sm" style="color: #000000;"></i>
        </a>
        @include('students.modal.createStudent')
    </div>
</div>


