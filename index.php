<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pevas</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="main-wrapper">
                    <div class="nav-login">
                        <form action="login.php" method="POST">
                            <input type="text" name="uid" placeholder="Username/e-mail">
                            <input type="password" name="pwd" placeholder="Password">
                            <button type="submit" name="submit">Login</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        
        
        <section class="main-container">
    <div class="main-wrapper">
        <h2>Sign up</h2>
        <form class="signup-form" action="signuplogin-db.php" method="POST">
            <input type="text" name="first" placeholder="Firstname">
            <input type="text" name="last" placeholder="Lastname">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
</section>
        
    </body>
</html>
