    <!--sidebar-->
    <div class="aside">
        <?php 
        if (isset($_SESSION['login']) && $_SESSION['login'] == 'successful') {
            echo '<strong>Welcome, ' . $_SESSION['name'] . ', ' . $_SESSION['lastName'] . '.</strong>';
        } ?>
        <form class="form" action="<?php echo base_url ?>user/login" method="post">
            <label for="">Login in to PHP-SIMPLE-STORE</label>
            <input class="input" type="email" name="email" id="email" placeholder="Email">
            <input class="input" type="password" name="password" id="password" placeholder="Password">
            <button class="btn btn-primary" type="submit">login</button>
        </form>
    </div>
