<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">

                {{-- MOSTRA NOME USUARIO LOGADO  --}}

                {{-- <li class="nav-item">
                    <hr style="margin-top: 0px; margin-bottom: 0px; margin: 0px">
                    <a style="margin-top: 0px !important;">
                        <i class="fas fa-user"></i>
                        <p>@if (strlen(Auth::user()->name) > 19)
                            {{ substr(Auth::user()->name, 0, 16).'...'}}
                @else
                {{ Auth::user()->name }}
                @endif
                </p>
                </a>
                <hr style="margin-top: 0px; margin-bottom: 5px;">
                </li> --}}

                <li class="nav-item {{ (request()->Is('/')) ? 'active' : '' }}" class="sr-only">
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <p>Menu Incial</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('lista')) || (request()->is('cadastro'))  ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne" href="#base">
                        <i class="fas fa-users"></i>
                        <p>Pessoa</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse {{ (request()->routeIs('')) || (request()->routeIs('')) || (request()->routeIs('pdf')) ? 'show' : '' }}"
                        aria-controls="collapseOne" id="base">
                        <ul class="nav nav-collapse ">
                            
                                <a href="{{ url('cadastro') }}">
                                    <span class="sub-item">Cadastro</span>
                                </a>
                            </li>
                            
                                <a href="{{ url('tabela') }}">
                                    <span class="sub-item">Lista</span>
                                </a>
                            </li>
                    
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-sun" style="font-size:20px" actived></i>
                        <p>Protocolo</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li class="{{ (request()->routeIs('cadastroprotocolo')) ? 'active' : '' }}">
                                <a href="{{ url('cadastroprotocolo') }}">
                                    <span class="sub-item">Cadastro</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ url('tabelaprotocolo') }}">
                                    <span class="sub-item">Lista</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts2">
                        <i class="fas fa-bed" actived></i>
                        <p>Auditoria</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse" id="sidebarLayouts2">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="{{ url('auditoria') }}">
                                    <span class="sub-item">Auditoria</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Sair</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- End Sidebar -->