<div class="collapse" id="students">
    <div class="card card-body">
        <a href="{{ route('student.index') }}" class="nav-link active">Ver Alunos</a>
        <a class="nav-link active" data-bs-toggle="modal" href="#" role="button" aria-expanded="false"
            aria-controls="collapseExample" data-bs-target="#createStudent">
            Novo Aluno(a)
        </a>
        @include('students.modal.createStudent')
    </div>
</div>


