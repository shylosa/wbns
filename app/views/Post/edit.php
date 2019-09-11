<!--Table-->
<?php if(!empty($posts)):?>
<div class="container">
  <table class="table table-bordered text-center">
    <thead class="thead-light">
    <tr>
      <th scope="col">First name</th>
      <th scope="col">Second name</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
      <tr>
        <td class="text-left"><?= $post['first_name']?></td>
        <td class="text-left"><?= $post['second_name']?></td>
        <td><?= $post['email']?></td>
        <td class="fit">
          <a href="<?=PATH . '/post/edit?id=' . $post['id']?>" class="fas fa-pencil-alt" title="Изменить запись"></a>
          <form class="form" action="<?=PATH . '/post/delete?id=' . $post['id']?>">
            <button onclick="return confirm('are you sure?')" type="submit" class="delete ml-2" title="Удалить запись">
              <a href="" class="fas fa-times"></a>
            </button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <div>
      <?php endif;?>
    <!--EndTable-->

  <!--Form start -->
<form method="post" name="input_form" class="formWithValidation">
  <div class="form-group">
    <div><h5><label for="firstName">Edit entry</label></h5></div>
    <input type="text" name="first_name" class="form-control field" id="firstName"
           placeholder="Enter first name" value="<?= $currentPost['first_name'] ?>">
  </div>
  <div class="form-group">
    <input type="text" id="secondName" name="second_name" class="form-control field"
           placeholder="Enter second name" value="<?= $currentPost['second_name'] ?>">
  </div>
  <div class="form-group">
    <input type="text" id="email" name="email" class="form-control field"
           placeholder="Enter email" value="<?= $currentPost['email'] ?>">
  </div>

    <button type="submit" class="btn btn-primary" onclick="window.location.href = <?=PATH?>">Save entry</button>
</form>
  <!--Form end -->
