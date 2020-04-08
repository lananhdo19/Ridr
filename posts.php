<!DOCTYPE html>
<html>
<head>
    <title>Ridr: Posts</title>
    <?php include('base/doc-heading.html') ?>
</head>

<body>  

    <!-- HEADER -->
    <?php include('base/header.html'); ?>

    <!-- FILTERS -->
    <?php include('filter-posts.html') ?>

    <!-- BODY -->
    <div class="main">
        <div class="posts-pg flex-container-stretch">
            <div class="posts-div" style="flex-grow: 5">
                <?php include('posts/posts-header.html') ?>
                <?php include('posts/posts-body.html') ?>
            </div>
        </div>
        <?php include('posts/create-post.html') ?>
    </div>

    <!-- FOOTER -->
    <?php include('base/footer.html') ?>

<?php include('base/bottom-scripts.html') ?>

</body>
</html>
