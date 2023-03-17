<?php

require_once('src/model.php');

function post(){
    if(isset($_GET['identifiant']) && $_GET['identifiant']){
        $unPost = get_result("SELECT * FROM post WHERE identifiant = '".$_GET['identifiant']."' AND statut=1");
        if($unPost){
            postSimple($unPost);
        }
        else{
            Header('Location: https://s4-gp98.kevinpecro.info/post/');
            exit();
        }
    }
    else{
        $lstPost = get_results("SELECT * FROM post WHERE statut=1");
        postList($lstPost);
    }
}

function postSimple($unPost)
{
    $menu['page'] = "post";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/post/v-post.php');
    include('view/inc/inc.footer.php');
}

function postList($lstPost)
{
    $menu['page'] = "post";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/post/v-post-list.php');
    include('view/inc/inc.footer.php');
}