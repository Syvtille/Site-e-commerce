<?php
    global $nomSite;

    if(isset($menu['page']) && $menu['page'])
        $page = $menu['page'];
    else $page = null;

?>
<div class="container">
    <header class="d-flex flex-wrap py-3 mb-4 border-bottom">
        <a href="/" class="title-site d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none header-left">
<!--            <img src="assets/img/logo.png" alt="Logo" class="logo">-->
            <span class="fs-4"><?=$nomSite?></span>
        </a>

        <ul class="nav nav-pills main-header">
            <li class="nav-item">
<!--                <a href="commander/" class="nav-link --><?php //if($page=='commander') echo 'active';?><!--">-->
<!--                    Commander-->
<!--                    <span></span><span></span><span></span><span></span>-->
<!--                </a>-->
<!--                <a href="paiement/" class="nav-link --><?php //if($page=='paiement') echo 'active';?><!--">-->
<!--                    Paiement-->
<!--                    <span></span><span></span><span></span><span></span>-->
<!--                </a>-->
                <a href="/" class="nav-link <?php if($page=='accueil') echo 'active';?>">
                    Accueil
                    <span></span><span></span><span></span><span></span>
                </a>
            </li>
            <li>
                <a href="produits/" class="nav-link <?php if($page=='produits') echo 'active';?>">
                    Produits
                    <span></span><span></span><span></span><span></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="post/" class="nav-link <?php if($page=='post') echo 'active';?>">
                    Blog
                    <span></span><span></span><span></span><span></span>
                </a>
            </li>
            <li>
                <a href="panier/" class="nav-link <?php if($page=='panier') echo 'active';?>">
                    Panier
                    <span></span><span></span><span></span><span></span>
                </a>
            </li>
        </ul>
    </header>
</div>
<main>