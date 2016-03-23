<?php
namespace Model;

// Model\Posts
class Posts extends Model
{
    protected $table = 'posts';

    public function getPostsByCommentId( $id ) {
        $sql = '';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }

    public function getPostsByCategorieId( $id ) {
        $sql = '';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }
}
