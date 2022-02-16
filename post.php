<?php
require_once "_config.php";
$postid = $_GET['id'];
if (!preg_match('/^[a-z0-9]+$/i', $postid)) {
    http_response_code(404);
    die('Are you trying to hack me?');
} else if (!file_exists('postlist/' . $postid . '.php')) {
    http_response_code(404);
    die('Post not found.');
}
require_once "postlist/$postid.php";
?>
<!-- DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional //EN" -->
<HTML>

<HEAD>
    <TITLE><?= $title ?> - <?= $title ?></TITLE>
    <META http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
</HEAD>

<BODY>
    <H1><?= $title ?></H1>
    <?= $content ?>
    <HR>
    <?= $blog_title ?><BR>
    <?= $owner ?? '' ?>
</BODY>

</HTML>