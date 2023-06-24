<div class="panel">
    <p  class="panel title">Bejelentkezés</p>
    <div class="panel content">
        <form actions="" method="POST">
            <p class="input_label">Felhasználónév</p>
            <input type="text" name="user" class="input-text"/>
            <p class="input_label">Jelszó</p>
            <input type="password" name="pass" class="input-text"/>
            <div class="input-sor">
                <input type="submit" name="login" class="input-submit" value="Belépés"/>
            </div>
            <?php
                if(isset($_POST["login"]))
                {
                    if(isset($_POST["user"]) && $_POST["user"] != "")
                    {
                        if (isset($_POST["pass"]) && $_POST["pass"] != "")
                        {
                            $sql = new sql();
                            $user_data = $sql->lekerdezes("Select * From felhasznalok Where felhasznalok.Nev = '". $_POST["user"] ."' and felhasznalok.Jelszo = '". $_POST["pass"] ."'");

                            if (count($user_data) > 0)
                            {
                                $_SESSION["user"] = $_POST["user"];

                                header("Location:index.php");
                            }
                            else
                            {
                                echo("<p>Helytelen felhasználónév és jelszó</p>");
                            }
                        }
                        else
                        {
                            echo("<p>Üres jelszó</p>");
                        }
                    }
                    else
                    {
                        echo("<p>Üres felhasználó</p>");
                    }
                }
            ?>
        </form>
    </div>
</div>