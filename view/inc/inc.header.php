<?php
    global $nomSite;

    if(isset($menu['page']) && $menu['page'])
        $page = $menu['page'];
    else $page = null;

?>
<div class="container">
    <header class="d-flex flex-wrap py-3 mb-4 border-bottom">
        <a href="/" class="title-site d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
<!--            <img src="assets/img/logo.png" alt="Logo" class="logo">-->
            <span class="fs-4"><?=$nomSite?></span>
        </a>

        <ul class="nav nav-pills main-header">
            <li class="nav-item">
                <a href="/" class="nav-link <?php if($page=='accueil') echo 'active';?>">Accueil</a>
            </li>
            <li>
                <a href="produits/" class="nav-link <?php if($page=='produits') echo 'active';?>">Produits</a>
            </li>
            <li class="nav-item">
                <a href="post/" class="nav-link <?php if($page=='post') echo 'active';?>">Blog</a>
            </li>
            <li>
                <a href="panier/" class="nav-link <?php if($page=='panier') echo 'active';?>">Panier</a>
            </li>
        </ul>
    </header>
</div>
<main>