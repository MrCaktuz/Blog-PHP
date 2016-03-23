<h1>See every posts</h1>
<ul>
    <?php foreach ( $datas[ 'posts' ] as $post ) :?> <!-- list les posts un par un dans la variable $post -->
            <li><a href="index.php?a=show&e=posts&id=<?php echo $post -> id; ?>&with=comments,categories"><?php echo $post -> title; ?></a></li> <!-- lien vers la page du post -->
    <?php endforeach; ?>
</ul>
