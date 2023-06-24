<?php
    $url = @$_GET["kisallat_ID"];

    if(isset($url))
    {
        if($url > 0)
        {
            $kisallat_sql = new sql();
            $kisallat_data = $kisallat_sql->lekerdezes("Select * From kisallatok Where kisallatok.ID = ".$url);
            $kisallat = new kisallat();
            $kisallat->KisallatBetolt($kisallat_data[0]);

        ?>
            <div class="panel">
                <div class="panel content details">
                    <p class="bold"><?php echo($kisallat->Nev); ?></p>
                    <p ><?php echo("<span class='bold'>Faja: </span>".$kisallat->Faj); ?></p>
                    <p ><?php echo("<span class='bold'>Kora: </span>".$kisallat->Kor." éves"); ?></p>
                    <p ><?php echo("<span class='bold'>Szine: </span>".$kisallat->Szine); ?></p>
                    <p ><?php echo("<span class='bold'>Neme: </span>".($kisallat->Neme == 0 ? "Fiú" : "Lány")); ?></p>
                    <p ><?php echo("<span class='bold'>Súlya: </span>".$kisallat->Sulya." kg"); ?></p>
                    <p ><?php echo("<span class='bold'>Engedély: </span>".$kisallat->Engedely); ?></p>
                    <p ><?php echo("<span class='bold'>Élőhely: </span>".$kisallat->Elohely); ?></p>
                    <p ><?php echo("<span class='bold'>Ára: </span>".$kisallat->Ara." HUF"); ?></p>
                    <p ><?php echo("<span class='bold'>Elérhető: </span>".$kisallat->Elerheto); ?></p>
                    <p ><?php echo("<span class='bold'>Lábak száma: </span>".$kisallat->Labak." darab"); ?></p>
                    <p><?php echo("<a href='/ogy-db/feladat/index.php?page=insert&kisallat_ID=".$kisallat->ID."'>Adatok módosítása</a>"); ?></p>
                </div>
            </div>
        <?php
        }
    }
?>


<div class="panel">
    <p  class="panel title">Regisztrált kisállatok</p>
    <div class="panel content">
        <table class="lista">
            <?php
                $sql = new sql();
                $table = $sql->lekerdezes("Select * From kisallatok Order By ID");

                $kisallat_lista = array();

                foreach ($table as $sor)
                {
                    $kisallat = new kisallat();
                    $kisallat->KisallatBetolt($sor);
                    array_push($kisallat_lista, $kisallat);
                }
                if (count($table) > 0)
                {
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
                    echo("<tr><td>Nincs felvíve kisállat!</td></tr>");
                }
            ?>
        </table>
    </div>
</div>