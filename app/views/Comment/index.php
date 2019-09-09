<?php if(!empty($posts)):?>
  <div class="container">
    <?php foreach ($posts as $post): ?>
    <div class="card mb-md-3">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?= 'Автор: ' . $post['author'] . ' | Опубликовано: ' .  $post['published_at'] ?>
        </h6>
        <p class="card-text"><?= $post['text_post'] ?></p>
        <a href="/" class="card-link">(вернуться на главную)</a>
      </div>
    </div>
    <?php endforeach; ?>

    <?php if(!empty($comments)):?>
    <h2>Комментарии:</h2>
        <?php foreach ($comments as $comment): ?>
      <div class="card mb-md-3">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <h6 class="card-subtitle mb-2 text-muted">
              <?= 'Автор: ' . $comment['author'] . ' | Опубликовано: ' .  $comment['published_at'] ?>
          </h6>
          <p class="card-text"><?= $comment['text_comment'] ?></p>
        </div>
      </div>
        <?php endforeach; ?>
    <?php endif;?>
  <div>
<?php endif;?>

    <!--Form start -->
    <form method="post" action="" >
      <div class="form-group">
        <h5><label for="exampleInputEmail1">Create new comment</label></h5>

        <input type="text" name="author" class="form-control" id="exampleInputName" aria-describedby="NameHelp"
               placeholder="Enter your name">
      </div>
      <div class="form-group">
        <textarea class="form-control" id="exampleInputMessage" name="text_comment" placeholder="Message"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create comment</button>
    </form>
    <!--Form end -->
