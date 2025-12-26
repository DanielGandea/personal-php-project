<nav class="navbar navbar-expand-md">
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href="/"><img src="./assets/images/logo.png" alt="Logo"></a>
        </div>

        <!-- Burger Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Center Nav -->
            <div class="center_nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/">Acasă</a>
                    </li>
                    
                    <!-- Tools Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Instrumente
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="toolsDropdown">
                            <li><a class="dropdown-item" href="/subnet">Subnetare</a></li>
                            <li><a class="dropdown-item" href="/vlsm">VLSM</a></li>
                            <li><a class="dropdown-item" href="/conversii">Conversie</a></li>
                        </ul>
                    </li>
                    
                    <!-- Theory Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="theoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Teorie
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="theoryDropdown">
                            <li><a class="dropdown-item" href="/routing_protocols">Protocoale de rutare</a></li>
                            <li><a class="dropdown-item" href="/OSImodel">Modelul OSI</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <div class="about_me">
                            <a href="/about"><button>About Me</button></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>