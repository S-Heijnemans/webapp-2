<body>
    <main class="main">
        <div class="log-in-title">
        <h1>Log in</h1>
        </div>
        <div class="login-container">
            <div class="login">
                <form class='register_form' name="register_logic" action="../includes/register-includes/register_logic.php" method="POST">
                    <div class="row">
                        <input type="text" placeholder="Username" name="username" required/>
                    </div>
                    <div class="row">
                        <input type="email" placeholder="Email" name="email" required/>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input type="password" name="password" placeholder="Password" required id="myInput">
                        </div>
                    </div>
                    <div class="row">
                    <input type="submit" name="register" value='register'>
                </form>
            </div>
        </div>
</main>
</body>