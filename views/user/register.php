<?php
if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') {
    echo '<div class="alert">Sign In ' . $_SESSION['register'] . '</div>';
    Utils::deleteSession('register');
} elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') {
    echo '<div class="alert">Sign In ' . $_SESSION['register'] . '</div>';
    Utils::deleteSession('register');
}
?>

<form class="form" action="<?php echo base_url ?>user/save" method="post">
    <h2>Register</h2>

    <label for="name">Name: </label>
    <input class="input" type="text" name="name" id="name" required>

    <label for="lastName">Last Name: </label>
    <input class="input" type="text" name="lastName" id="lastName" required>

    <label for="email">Email: </label>
    <input class="input" type="email" name="email" id="email" required>

    <label for="passwd">Password: </label>
    <input class="input" type="password" name="passwd" id="passwd" required>

    <button class="btn btn-primary" type="submit">Register</button>
</form>