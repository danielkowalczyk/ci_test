<h2>Zarejestruj się</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('user/signup'); ?>
    
    <label for="username">Nazwa użytkownika:</label>
    <input type="tet" name="username" id="username" value="<?php set_value('username'); ?>"><br>
    
    <label for="password">Hasło:</label>
    <input type="password" name="password" id="password"><br>
    
    <label for="passconf">Potwierdź hasło:</label>
    <input type="password" name="passconf" id="passconf"><br>
    
    <label for="email">Adres e-mail:</label>
    <input type="text" name="email" id="email" value="<?php set_value('emial'); ?>"><br>
    
    <input type="submit" value="Zarejestruj się">
           
</form>