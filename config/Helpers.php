<?php

function headerAdmin($data="")
    {
        $view_header = "Views/Template/header_admin.php";
        require_once ($view_header);
    }

    function footerAdmin($data="")
    {
        $view_footer = "Views/Template/footer_admin.php";
        require_once ($view_footer);        
    }

    function NavAdmin($data="")
    {
        $view_nav = "Views/Template/nav_admin.php";
        require_once ($view_nav);        
    }

?>