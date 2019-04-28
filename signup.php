<?php
include_once 'header.php';
?>

    <section>
        <div>
            <h1>Sign Up</h1>
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
    </section>


<?php
include_once 'footer.php';
?>