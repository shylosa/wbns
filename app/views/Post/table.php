<?php if(!empty($posts)):?>
<div class="container">
  <table class="table table-bordered text-center" id="main_table">
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
          <a href="<?=PATH . '/post/edit?id=' . $post['id']?>" class="fas fa-pencil-alt js-edit" title="Изменить запись"></a>
          <form method="post" class="form_delete" action="<?=PATH . '/post/delete?id=' . $post['id']?>">
            <button onclick="return confirm('are you sure?')" type="submit" class="delete ml-2" title="Удалить запись">
              <i class="fas fa-times"></i>
            </button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <div>
<?php endif;?>
