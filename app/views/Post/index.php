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
          <td><?= $post['first_name']?></td>
          <td><?= $post['second_name']?></td>
          <td><?= $post['email']?></td>
          <td class="fit">
            <a href="" class="fas fa-pencil-alt" title="Изменить запись"></a>
            <form method="delete" class="form">
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

  <!--Form start -->
<form method="post" action="" name="input_form">
  <div class="form-group">
    <div><h5><label for="firstName">Create new entry</label></h5></div>
    <input type="text" name="first_name" class="form-control" id="firstName"
           placeholder="Enter first name">
  </div>
  <div class="form-group">
    <input type="text" id="secondName" name="second_name" class="form-control"
           placeholder="Enter second name">
  </div>
  <div class="form-group">
    <input type="text" id="email" name="email" class="form-control"
           placeholder="Enter email">
  </div>

    <button type="submit" class="btn btn-primary">Add entry</button>
</form>
  <!--Form end -->
