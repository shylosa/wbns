<?php if(!empty($posts)):?>
<div class="container">

    <?php foreach ($posts as $post): ?>

        <div class="card mb-md-3">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?= 'Автор: ' . $post['author'] . ' | Опубликовано: ' .  $post['published_at'] ?>
            </h6>
            <p class="card-text"><?= mb_substr($post['text_post'], 0, 100) . '...' ?>
              <div class="card-subtitle mb-2 text-muted">Комментарии: <?=$post['comment_qty']?></div>
            </p>
            <a href="/post/?id=<?=$post['id']?>" class="card-link">(Читать полностью)</a>
          </div>
        </div>

    <?php endforeach; ?>
<div>
<?php endif;?>

  <!--Form start -->
  <form method="post" action="" >
    <div class="form-group">
      <h5><label for="exampleInputEmail1">Create new post</label></h5>

      <input type="text" name="author" class="form-control" id="exampleInputName" aria-describedby="NameHelp"
             placeholder="Enter your name">
    </div>
    <div class="form-group">
      <textarea class="form-control" id="exampleInputMessage" name="text_post" placeholder="Message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create post</button>
  </form>
  <!--Form end -->
