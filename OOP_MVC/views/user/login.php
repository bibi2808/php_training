<div class="content">
   <h3>Login</h3>
   <form action="index.php?controller=user&action=login" method="POST" name="form-login" id="form-login">
        <div class="errors">
            <?php 
                echo !empty($this->errors) ?  $this->errors : '';
            ?>
        </div>
       <div class="row">
           <p>Username</p>
           <input type="text" name="username">
           <p>Password</p>
           <input type="password" name="password">
       </div>
       <div class="row">
           <input type="submit" name="submit" value="Login">
       </div>
   </form>
</div>