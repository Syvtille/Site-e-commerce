<?php

require('src/model.php');

function post(){
    if(isset($_GET['identifiant']) && $_GET['identifiant']){
//        $unPost =
    }
    else{
        $lstPost = get_results("SELECT * FROM post WHERE statut=1");
        postList($lstPost);
    }
}

function postSimple()
{
    $menu['page'] = "post";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/inc/inc.footer.php');
    include('view/post/v-post.php');
}

function postList($lstPost)
{
    $menu['page'] = "post";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/inc/inc.footer.php');
    include('view/post/v-post-list.php');
}