<?php
namespace Model;

// Model\Comments
class Comments extends Model
{
    protected $table = 'comments';

    public function getCommentsByPostId( $id ) {
        $sql = '';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }
}
