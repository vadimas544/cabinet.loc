<?php
	require APPROOT . '/views/inc/header.php';
?>
<h1><?php
    foreach ($data['posts'] as $post){
        echo $post->title;
    }
    ?></h1>
<?php
	require APPROOT . '/views/inc/footer.php';
?>
