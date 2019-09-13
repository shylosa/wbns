<form method="post" action="" name="input_form" id="input_form" class="formWithValidation">
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

    <button type="submit" class="btn btn-primary">Save entry</button>
</form>
