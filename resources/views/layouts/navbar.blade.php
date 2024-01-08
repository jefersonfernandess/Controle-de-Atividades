<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-center aling-center">
                @if ($userAuth)
                    <li class="nav-item">
                        <a class="nav-link active colorTextWhite" data-bs-toggle="offcanvas" href="#sideBar"
                            role="button" aria-controls="offcanvasExample">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="sideBar"
                            aria-labelledby="offcanvasExampleLabel" style="width: 20rem; !important">
                            <div class="offcanvas-header">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle offcanvas-title" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                        style="background-color: #ffffff; ">
                                        <i class="fa-solid fa-user fa-sm" style="color: #000000;"></i> Olá
                                        {{ $userAuth->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                                        <form action="{{ route('authlogout.logout') }}" method="post">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Sair da conta</button>
                                        </form>
                                    </ul>
                                </div>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav d-flex flex-column">
                                    @if ($roleUser->role_id == 1)
                                        <p>
                                            <a class="" data-bs-toggle="collapse" href="#collapseExample"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Entrar em contato
                                            </a>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                Some placeholder content for the collapse component. This panel is
                                                hidden by
                                                default but revealed when the user activates the relevant trigger.
                                            </div>
                                        </div>
                                        <li class="nav-item">
                                            <a class="nav-link active" href=""></a>
                                        </li>
                                    @elseif ($roleUser->role_id == 2)
                                        <li class="nav-item">
                                            <a class="nav-link active" href="">Portal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                                href="{{ route('studantActivity.index') }}">Atividades</a>
                                        </li>
                                    @elseif ($roleUser->role_id == 3)
                                        <li class="nav-item">
                                            <a class="nav-link active" href="">Portal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('student.index') }}">Alunos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="">Atividades</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                                href="{{ route('diciplines.index') }}">Diciplinas</a>
                                        </li>
                                    @elseif ($roleUser->role_id == 4)
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="collapse" href="#dashboard"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa-solid fa-house" style="color: #000000;"></i> Portal <i
                                                    class="fa-solid fa-chevron-down fa-xs" style="color: #000000;"></i>
                                            </a>
                                            @include('layouts.collapseSideBar.dashboard')

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="collapse" href="#diciplines"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa-solid fa-book-open fa-sm" style="color: #000000;"></i> Diciplinas <i
                                                    class="fa-solid fa-chevron-down fa-xs" style="color: #000000;"></i>
                                            </a>
                                            @include('layouts.collapseSideBar.diciplines')
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="collapse" href="#activities"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa-solid fa-book" style="color: #000000;"></i> Atividades <i
                                                    class="fa-solid fa-chevron-down fa-xs" style="color: #000000;"></i>
                                            </a>
                                            @include('layouts.collapseSideBar.activities')
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="collapse" href="#students"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                Alunos <i class="fa-solid fa-chevron-down fa-xs"
                                                    style="color: #000000;"></i>
                                            </a>
                                            @include('layouts.collapseSideBar.students')
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="collapse" href="#teaches"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-chalkboard-user" style="color: #000000;"></i>
                                                Professores <i class="fa-solid fa-chevron-down fa-xs"
                                                    style="color: #000000;"></i>
                                            </a>
                                            @include('layouts.collapseSideBar.teaches')
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active colorTextWhite" href="/">JL Cursos</a>
                    </li>
                @endif
                @if (!$userAuth)
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('authlogin.index') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/">JL Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('authregister.index') }}">Registro</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
