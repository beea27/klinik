<?php 

echo "
    <nav class='navbar navbar-expand-lg navbar-dark fixed-top' id='mainNav'>
            <div class='container'>
                <a class='navbar-brand js-scroll-trigger' href='index.php'><img class='logo' src='img/logo/logo.png' alt='' /></a><button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>Menu<i class='fas fa-bars ml-1'></i></button>
                <div class='collapse navbar-collapse' id='navbarResponsive'>
                    <ul class='navbar-nav text-uppercase ml-auto'>";
                        
                        
                        session_start();
                        if (!isset($_SESSION['nome']) )
                        {   
                            echo "<li class='nav-item'><a class='nav-link js-scroll-trigger' href='login.php'><b>Login</b></a></li>";
                        }else{

                            echo "
                            <li class='nav-item'><a class='nav-link js-scroll-trigger' href='dash/admin/pages/index.php'><b>Registros</b></a></li>
                            <li class='nav-item'>
                                <div class='dropdown'>
                                    <button class='btn btn-secondary text-uppercase nav-link dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                      <b>$_SESSION[nome]</b>
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                        <a class='opt-menu nav-item dropdown-item js-scroll-trigger' href='login/logout.php'>Sair</a>
                                    </div>
                                </div>
                            </li>
                            ";
                        }
                        echo "
                    </ul>
                </div>
            </div>
        </nav>
";

?>