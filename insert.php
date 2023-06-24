<div class="panel">
    <div class="panel content">
        <?php
        if(isset($_POST["insert"]) || isset($_POST["update"]))
        {
            $hiba = "";
            if(!isset($_POST["nev"]) || $_POST["nev"] == "")
            {
                $hiba .= "<br /> - Név nem lehet üres!";
            }
            if(!isset($_POST["kor"]) || $_POST["kor"] == "")
            {
                $hiba .= "<br /> - Kora nem lehet üres!";
            }
            if(!isset($_POST["sulya"]) || $_POST["sulya"] == "")
            {
                $hiba .= "<br /> - Súlya nem lehet üres!";
            }
            if(!isset($_POST["szine"]) || $_POST["szine"] == "")
            {
                $hiba .= "<br /> - Színe nem lehet üres!";
            }
            if(!isset($_POST["elohely"]) || $_POST["elohely"] == "")
            {
                $hiba .= "<br /> - Élőhely nem lehet üres!";
            }
            if(!isset($_POST["ara"]) || $_POST["ara"] == "")
            {
                $hiba .= "<br /> - Ára nem lehet üres!";
            }
            if(!isset($_POST["labak"]) || $_POST["labak"] == "")
            {
                $hiba .= "<br /> - Lábak száma nem lehet üres!";
            }
            if ($hiba == "")
            {
                if(isset($_POST['ID']) && $_POST['ID'] > 0)
                {
                    $sql_com = "Update kisallatok Set
                    Nev = '".$_POST['nev']."',
                    Faj = '".$_POST['faj']."',
                    Kor = '".$_POST['kor']."',
                    Szine = '".$_POST['szine']."',
                    Neme = '".$_POST['neme']."',
                    Sulya = '".$_POST['sulya']."',
                    Engedely = ".$_POST['engedely'].",
                    Elohely = '".$_POST['elohely']."',
                    Ara = '".$_POST['ara']."',
                    Elerheto = '".$_POST['elerheto']."',
                    Labak = '".$_POST['labak']."'
                    Where kisallatok.ID = '".$_POST['ID']."'";

                    

                    $sql = new sql();

                    try
                    {
                        $sql->vegrehajtas($sql_com);
                    }
                    catch(Exception $ex)
                    {
                        echo("Felviteli hiba: ".$ex->getMessage());
                        return;
                    }
                    echo("Sikeres módosítás!");
                }
                else
                {
                    $sql_com = "Insert Into kisallatok (
                    ID,
                    Nev,
                    Faj,
                    Kor,
                    Szine,
                    Neme,
                    Sulya,
                    Engedely,
                    Elohely,
                    Ara,
                    Elerheto,
                    Labak,
                    Datum
                    ) Values (
                    null,
                    '".$_POST["nev"]."',
                    '".$_POST["faj"]."',
                    ".$_POST["kor"].",
                    '".$_POST["szine"]."',
                    ".$_POST["neme"].",
                    ".$_POST["sulya"].",
                    ".$_POST["engedely"].",
                    '".$_POST["elohely"]."',
                    ".$_POST["ara"].",
                    ".$_POST["elerheto"].",
                    ".$_POST["labak"].",
                    '".date("Y-m-d H:i:s")."')";

                    $sql = new sql();

                    try
                    {
                        $sql->vegrehajtas($sql_com);
                    }
                    catch(Exception $ex)
                    {
                        echo("Felviteli hiba: ".$ex->getMessage());
                        return;
                    }
                    echo("Sikeres felvitel!");
                    }
                }
            else
            {
                echo("Hiba: ".$hiba);
            }
        }
        ?>
    </div>
</div>
<br />
<?php
$kisallat_ID = @$_GET["kisallat_ID"];
$torol_ID = @$_GET["torol_ID"];
$kisallat = new kisallat();

if(isset($kisallat_ID))
{
    if(!empty($kisallat_ID))
    {
        $kisallat_sql = new sql();
        $kisallat_data = $kisallat_sql->lekerdezes("Select * From kisallatok Where kisallatok.ID = ".$kisallat_ID);
        $kisallat->KisallatBetolt($kisallat_data[0]);
    }
}

if(isset($torol_ID))
{
    if(!empty($torol_ID))
    {
        $sql = new sql();

        try
        {
            $sql->vegrehajtas("Delete From kisallatok Where kisallatok.ID = ".$torol_ID);
        }
        catch (Exception $ex)
        {
            echo("Felviteli hiba: ".$ex->getMessage());
            return;
        }
        header("Location:/ogy-db/feladat/index.php");
    }
}

?>

<div class="panel">
    <p  class="panel title">Beviteli űrlap</p>
    <div class="panel content">
        <div class="panel settings">
            <a href="/ogy-db/feladat/index.php?page=insert&torol_ID=<?php echo($kisallat->ID); ?>"><input id="button delete" type="button" value="Töröl" class="input submit"></a>
        </div>
        <form actions="" method="POST">
            <p class="input_label">Kisállat neve</p>
            <input type="text" name="nev" class="input-text" value="<?php echo(($kisallat->ID > 0 ? $kisallat->Nev : "")) ?>"/>
            <p class="input_label">Faj</p>
            <select name="faj" class="input-select">
                <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Faj == "" ? "selected":""):"")); ?> value="Mindegy">- Mindegy -</option>
                <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Faj == "Hörcsög" ? "selected":""):"")); ?> value="Hörcsög">- Hörcsög -</option>
                <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Faj == "Tengeri malac" ? "selected":""):"")); ?> value="Tengeri malac">- Tengerimalac -</option>
                <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Faj == "Kígyó" ? "selected":""):"")); ?> value="Kígyó">- Kígyó -</option>
                <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Faj == "Bagoly" ? "selected":""):"")); ?> value="Bagoly">- Bagoly -</option>
                <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Faj == "Kutya" ? "selected":""):"")); ?> value="Kutya">- Kutya -</option>
                <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Faj == "Patkány" ? "selected":""):"")); ?> value="Patkány">- Patkány -</option>
            </select>
            <p class="input_label">Kora</p>
            <input type="number" name="kor" class="input-text" value="<?php echo(($kisallat->ID > 0 ? $kisallat->Kor : "")) ?>"/>
            <p class="input_label">Súlya</p>
            <input type="number" name="sulya" class="input-text" value="<?php echo(($kisallat->ID > 0 ? $kisallat->Sulya : "")) ?>"/>
            <p class="input_label">Színe</p>
            <input type="text" name="szine" class="input-text" value="<?php echo(($kisallat->ID > 0 ? $kisallat->Szine : "")) ?>"/>
            <p class="input_label">Neme</p>
            <select name="neme" class="input-select">
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Neme == "fiú" ? "selected":""):"")); ?> value="fiú">- Fiú -</option>
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Neme == "lány" ? "selected":""):"")); ?> value="lány">- Lány -</option>
            </select>
            <p class="input-label">Engedély</p>
            <select name="engedely" class="input-select">
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Engedely == "Nem szükséges" ? "selected":""):"")); ?> value="0">- Nem szükséges -</option>
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Engedely == "Alacsony fokozatú" ? "selected":""):"")); ?> value="1">- Alacsony fokozatú -</option>
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Engedely == "Magas fokozatú" ? "selected":""):"")); ?> value="2">- Magas fokozatú -</option>
            </select>
            <p class="input-label">Élőhely</p>
            <select name="elohely" class="input-select">
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Elohely == "Szárazföld" ? "selected":""):"")); ?> value="Szárazföld">- Szárazföld -</option>
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Elohely == "Tavak" ? "selected":""):"")); ?> value="Tavak">- Tavak -</option>
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Elohely == "Erdők" ? "selected":""):"")); ?> value="Erdők">- Erdők -</option>
            </select>
            <p class="input-label">Ár</p>
            <input type="number" name="ara" class="input-text" value="<?php echo(($kisallat->ID > 0 ? $kisallat->Ara : "")) ?>" />
            <p class="input-label">Elérhető</p>
            <select name="elerheto" class="input-select">
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Elerheto == 0 ? "selected":""):"")); ?> value="0">- Nem elérhető -</option>
            <option <?php echo(($kisallat->ID > 0 ? ($kisallat->Elerheto == 1 ? "selected":""):"")); ?> value="1">- Elérhető -</option>
            </select>
            <p class="input-label">Lábak száma</p>
            <input type="number" name="labak" class="input-text" value="<?php echo(($kisallat->ID > 0 ? $kisallat->Labak : "")) ?>" />
            <div class="input-sor">
                <?php
                if($kisallat->ID > 0)
                {
                    echo("<input type='submit' name='update' class='input-submit' value='Módosítás' />");
                    echo("<input type='hidden' name='ID' value='".$kisallat->ID."' />");
                }
                else
                {
                    echo("<input type='submit' name='insert' class='input-submit' value='Bevitel' />");
                }
                ?>
            </div>
        </form>
    </div>
</div>