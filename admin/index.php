<?php
include '../templates/header.php';
?>
    <div class="container">
        <h1>Please Login to Your Data For Edit</h1>
        <form action="login.php" method="post" >
           <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="name" class="form-control">
           </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" name="name" class="form-control">
            </div>
            <br><br>
            <input type="submit" value="Login">

        </form>
    </div>

<?php
include '../templates/footer.php';
?>
    
