<?php
require_once '_config.php';
function getpost($file)
{
    require_once("postlist/$file");
    return array(
        'title' => $title,
        'date' => $date ?? date('Y-m-d'),
        'content' => $content
    );
}
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
        <?= $blog_desc ?? ''; ?>
    </CENTER>
    <HR>
    <H2>POSTS</H2>
    <UL>
        <?php
        $posts = [];
        foreach (scandir('./postlist/') as $postfile) {
            if (!str_ends_with($postfile, '.php')) continue;
            $postid =  explode('.', $postfile)[0];
            $post = getpost($postfile);
            $title = $post['title'];
            $date = $post['date'];
            $posts[] = array($date, "<LI><A HREF=\"post.php?id=$postid\">$title</A> ($date)</LI>");
        }
        foreach ($posts as $post) $posts_dates[] = $post;
        array_multisort($posts, SORT_DESC, $posts_dates);
        foreach ($posts as $post) echo $post[1];
        ?>
    </UL>
    <HR>
    <?= $owner ?? '' ?>
</BODY>

</HTML>