  <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-lg">
           
                <a class="navbar-brand" href="">
                    <i class="fa fa-server"></i> &nbsp; Server Inventory System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <a class="nav-link ml-5" href="{{ url('/home') }}">
                           <i class="fa fa-home"></i>&nbsp; Home
                        </a>

                    @if (Auth::user()->premission == "1")

                         <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                                <a id="users" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i>&nbsp; Users
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="users">
                                    <a class="dropdown-item" href="{{ route('registration') }}">
                                        {{ __('User Registration') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('all_users') }}">
                                        {{ __('All Users') }}
                                    </a>
                                  
                                </div>
                            </li>
                    </ul>

                    @else
                        
                    @endif
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle"></i>&nbsp; {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                     
                </div>
          
        </nav>