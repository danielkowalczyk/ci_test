<h2>Logowanie</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('user/sign_in'); ?>

    <label for="username">Nazwa użytkownika:</label>
    <input type="text" name="username" id="username" value="<?php set_value('username'); ?>"><br>
    
    <label for="password">Hasło:</label>
    <input type="password" name="password" id="password"><br>
    
    <input type="submit" value="Zaloguj się">

</form>