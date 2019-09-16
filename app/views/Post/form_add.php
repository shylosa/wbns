<form method="post" action="<?=PATH?>" name="input_form" id="input_form" class="formWithValidation">
    <div class="form-group">
        <div><h5><label for="firstName">Create new entry</label></h5></div>
        <input type="text" name="first_name" class="form-control field" id="firstName"
               placeholder="Enter first name">
    </div>
    <div class="form-group">
        <input type="text" id="secondName" name="second_name" class="form-control field"
               placeholder="Enter second name">
    </div>
    <div class="form-group">
        <input type="text" id="email" name="email" class="form-control field"
               placeholder="Enter email">
    </div>

    <button type="submit" class="btn btn-primary validateBtn">Add entry</button>
</form>
