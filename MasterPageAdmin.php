<?php
    function menuLeft(){
        $xau = '
            <!-- Sidebar -->
            <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center">PHP ADMIN</div>
            <hr class="sidebar-divider">
            <div class="list-group list-group-flush">
                <a href="CategoryAdmin.php" class="list-group-item list-group-item-action bg-light">
                    <i class="fa fa-table"></i>
                    <span>Categorys</span>
                </a>
                <a href="BookAdmin.php" class="list-group-item list-group-item-action bg-light">
                    <i class="fa fa-table"></i>
                    <span>Books</span>
                </a>
            </div>
            </div>
            <!-- /#sidebar-wrapper -->
        ';
        return $xau;
    }
    function toggleMenu(){
        $xau = '
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown-menu" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                    </li>
                </ul>
            </div>
            </nav>
        ';
        return $xau;
    }
?>