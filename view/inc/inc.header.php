<?php

    if(isset($menu['page']) && $menu['page'])
        $page = $menu['page'];
    else $page = null;

?>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Nom du site</span>
        </a>

        <ul class="nav nav-pills">
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