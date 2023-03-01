<?php

require('src/model.php');

function post(){

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

function postList()
{
    $menu['page'] = "post";

    //Traitement
    include('view/inc/inc.head.php');
    include('view/inc/inc.header.php');
    include('view/inc/inc.footer.php');
    include('view/post/v-post-list.php');
}