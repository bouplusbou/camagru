<?php 
$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$_SESSION['token'] = $token;
?>

<section class="section">
  <div class="container">
    <h1 class="title">Post</h1>
  </div>
</section>

<div class="container">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <?= $post['username']; ?>
            </p>
        </header>
        <div class="card-image">
            <figure class="image is-full">
                <img src="<?= './app/assets/images/post_img/'.$post['photo_name']; ?>" alt="">
            </figure>
        </div>
        <div class="card-content">
            <div id="comments_container" class="content">
                <div class="level">
                    <div class="level-left">
                    <?php if (isset($_SESSION['username']) && isset($_SESSION['id_user'])) { ?>
                        <span class="icon has-text-danger">
                            <i style="cursor: pointer" id="like_btn" id_post="<?= $post['id_post']; ?>" class="like_btn <?= $user_liked ? 'fas fa-heart fa-lg' : 'far fa-heart fa-lg'?>"></i>
                        </span>
                    <?php } ?>
                    </div>
                    <div class="level-right">
                        <div class="level-item has-text-weight-bold">
                            <p id_post_show_likes="<?= $post['id_post']; ?>"><?= $post['likes_count'] ? $post['likes_count'] : 0; ?></p>
                        </div>
                        <div class="level-item">
                            <p class="subtitle is-6 has-text-weight-semibold">likes</p>
                        </div>
                    </div>
                </div>
                <?php foreach ($comments as $comment): ?>
                <div class="level">
                    <div class="level-left">
                        <p><b><?= $comment['username']; ?></b>   <?= $comment['comment']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <footer class="card-footer">
            <nav class="card-footer-item">
                <div class="field has-addons">
                  <p class="control is-expanded">
                    <input id="comment_input" class="input" type="text" placeholder="Add a new comment">
                  </p>
                  <p class="control">
                    <a class="button is-info" id="comment_btn" id_post="<?= $post['id_post']; ?>" id_post_creator="<?= $post['id_user']; ?>">
                      Comment
                    </a>
                  </p>
                </div>
            </nav>
        </footer>
    </div>
</div>
<input type="hidden" name="token" id="token" value="<?= $token; ?>" />




<!-- <div class="post_container">
    <div class="post_header">
        <p><?= $post['username']; ?></p>
    </div>
    <img src="<?= './app/assets/images/post_img/'.$post['photo_name']; ?>" alt="">
    <div class="post_footer">
    <?php if (isset($_SESSION['username']) && isset($_SESSION['id_user'])) { ?>
        <button id="like_btn" id_post="<?= $post['id_post']; ?>">Like</button>
    <?php } ?>
        <div class="likes">
            <p id_post_show_likes="<?= $post['id_post']; ?>"><?= $post['likes_count'] ? $post['likes_count'] : 0; ?></p>
            <p> Likes</p>
        </div>
        <div id="comments_container">
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <b><?= $comment['username']; ?></b>
                <p> <?= $comment['comment']; ?></p>
            </div>
        <?php endforeach; ?>
        </div>
        <?php if (isset($_SESSION['username']) && isset($_SESSION['id_user'])) { ?>
		<input placeholder="Type your comment here..." type="text" value="" name="comment" id="comment_input" />
		<input type="submit" value="comment" name="submit" id="comment_btn" id_user="<?= $_SESSION['id_user']; ?>" id_post="<?= $post['id_post']; ?>" id_post_creator="<?= $post['id_user']; ?>" />
        <input type="hidden" name="token" id="token" value="<?= $token; ?>" />
        <?php } ?>
    </div>
</div> -->

<div id="message" style="color:red;"></div>

<?php if (isset($_SESSION['username'])) { ?>
<script type="text/javascript">
    let currentUsername = "<?= $_SESSION['username']; ?>";
</script>
<script type="text/javascript" src="./app/assets/js/viewPost.js"></script>
<?php } ?>
