<?php
namespace Controller;

use Model\Posts;

class PostsController
{
    private $posts_model = null;

    public function __construct() {
        $this -> posts_model = new posts;
    }

    public function index() {
        $data[ 'posts' ] = $this -> posts_model -> all();
        $data[ 'view' ] = 'views/'.$GLOBALS[ 'a' ].$GLOBALS[ 'e' ].'.php';

        return $data;
    }

    public function show() {

    }
}
