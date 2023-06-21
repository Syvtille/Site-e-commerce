<?php
    global $urlSiteClient;
?>
<div id="mySidebar" class="sidebar">
    <h2 class="sidebar-title ">Client</h2>
    <a class="nav-link <?php if($menu['page'] == "liste") echo "active";?>" href=<?=$urlSiteClient . "liste/";?>>Liste</a>
    <a class="nav-link <?php if($menu['page'] == "commande") echo "active";?>" href=<?=$urlSiteClient . "commande/";?>>Commande</a>
    <a class="nav-link <?php if($menu['page'] == "paiement") echo "active";?>" href=<?=$urlSiteClient . "paiement/";?>>Paiement</a>
    <a class="nav-link <?php if($menu['page'] == "api-test") echo "active";?>" href=<?=$urlSiteClient . "api-test/";?>>Test</a>
    <a class="nav-link <?php if($menu['page'] == "recherche") echo "active";?>" href=<?=$urlSiteClient . "recherche/";?>>Recherche</a>
    <div class="myName">
        <p>Escande Florian</p>
    </div>
</div>
<main>
