<?php
require_once '_config.php';
?>
<!-- DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional //EN" -->
<HTML>

<HEAD>
    <TITLE><?= $blog_title ?></TITLE>
    <META http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
</HEAD>

<BODY>
    <CENTER>
        <H1><EM><?= $blog_title ?></EM></H1>
    </CENTER>
    <HR>
    <H2>POSTS</H2>
    <?php
    $posts = [];
    foreach (scandir('./postlist/') as $postfile) {
        if (!str_ends_with($postfile, '.php')) continue;
        require_once("postlist/$postfile");
        $postid =  explode('.', $postfile)[0];
        $posts[] = "<A HREF=\"post.php?id=$postid\">$title</A><BR>";
    }

    foreach (array_reverse($posts) as $post) echo $post;
    ?>
</BODY>

</HTML>