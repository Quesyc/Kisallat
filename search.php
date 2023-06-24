<div class="panel">
    <p  class="panel title">Kisállatok keresése</p>
    <div class="panel content">
        <table class="lista">
            <?php
                if (isset($_POST["search"]))
                {
                    $sql_com = "Select * From kisallatok Where 1 ";

                    if(isset($_POST["nev"]) && $_POST["nev"] != "")
                    {
                        $sql_com.= "and kisallatok.Nev = '".$_POST["nev"]."' "; 
                    }
                    if(isset($_POST["faj"]) && $_POST["faj"] != "")
                    {
                        $sql_com.= "and kisallatok.Faj = '".$_POST["faj"]."' ";
                    }
                    else if((isset($_POST["ar_ig"]) && $_POST["ar_ig"] != "")
                        && (isset($_POST["ar_ig"]) && $_POST["ar_ig"] != ""))
                    {
                        $sql_com.= "and kisallatok.Ara Between ".$_POST["ar_tol"]." and ".$_POST["ar_ig"]." ";
                    }
                    if(isset($_POST["ar_tol"]) && $_POST["ar_tol"] != "")
                    {
                        $sql_com.= "and kisallatok.Ara >= ".$_POST["ar_tol"]." ";
                    }
                    else if(isset($_POST["ar_ig"]) && $_POST["ar_ig"] != "")
                    {
                        $sql_com.= "and kisallatok.Ara >= ".$_POST["ar_ig"]." ";
                    }
                    

                    $sql = new sql();
                    $table = $sql->lekerdezes($sql_com);
                    
                    $kisallat_lista = array();

                    
                    if (isset($table))
                    {
                        if (count($table) > 0)
                        {
                            foreach ($table as $sor)
                            {
                                $kisallat = new kisallat();
                                $kisallat->KisallatBetolt($sor);
                                array_push($kisallat_lista, $kisallat);
                            }
                            echo("<tr>
                                    <th>Neve</th>
                                    <th>Faja</th>
                                    <th>Kora</th>
                                    <th>Ára</th>
                                    <th>Elérhető</th>
                                    <th><br /></th>
                                </tr>");
                            foreach ($kisallat_lista as $kisallat)
                            {
                                echo("<tr>
                                        <td>". $kisallat->Nev ."</td>
                                        <td>". $kisallat->Faj ."</td>
                                        <td>". $kisallat->Kor ." éves</td>
                                        <td>". $kisallat->Ara ." HUF</td>
                                        <td>". $kisallat->Elerheto."</td>
                                        <td><a href='/ogy-db/feladat/index.php?kisallat_ID=".$kisallat->ID."'>Adatlap</a></td>
                                    </tr>");
                            }
                        }
                        else
                        {
                            echo("<tr><td>Nincs találat!</td></tr>");
                        }
                        }
                    else
                    {
                        echo("<tr><td>Nincs találat!</td></tr>");
                    }
                }
            ?>
        </table>
    </div>
</div>
<br>
<div class="panel">
    <p  class="panel title">Bejelentkezés</p>
    <div class="panel content">
        <form actions="" method="POST">
            <p class="input_label">Név alapján</p>
            <input type="text" name="nev" class="input-text"/>
            <p class="input_label">Faj alapján</p>
            <select name="faj" class="input-select">
                <option value="">- Mindegy -</option>
                <option value="Hörcsög">- Hörcsög -</option>
                <option value="Tengeri malac">- Tengeri malac -</option>
                <option value="Kígyó">- Kígyó -</option>
                <option value="Bagoly">- Bagoly -</option>
                <option value="Kutya">- Kutya -</option>
                <option value="Patkány">- Patkány -</option>
            </select>
            <p class="input_label">Minimum ár</p>
            <input type="number" name="ar_tol" class="input-text" placeholder="0"/>
            <p class="input_label">Maximum ár</p>
            <input type="number" name="ar_ig" class="input-text" placeholder="30000"/>


            <div class="input-sor">
                <input type="submit" name="search" class="input-submit" value="Keresés"/>
            </div>
        </form>
    </div>
</div>