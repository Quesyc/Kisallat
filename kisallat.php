<?php
class kisallat
{
    public function __construct()
    {

    }

    public function KisallatBetolt($sor)
    {
        $this->ID = $sor["ID"];
        $this->Nev = $sor["Nev"];
        $this->Faj = $sor["Faj"];
        $this->Kor = $sor["Kor"];
        $this->Szine = $sor["Szine"];
        $this->Neme = $sor["Neme"];
        $this->Sulya = $sor["Sulya"];
        $this->Engedely = $this->GetEngedely($sor["Engedely"]);
        $this->Elohely = $sor["Elohely"];
        $this->Ara = $sor["Ara"];
        $this->Elerheto = ($sor["Elerheto"] == 1 ? "Elérhető" : "Nem elérhető" ) ;
        $this->Labak = $sor["Labak"];
        $this->Datum = $sor["Datum"];
    }
    private function GetEngedely($engedely)
    {
        switch ($engedely)
        {
            case 0:
                {
                    return "Nem szükséges";
                }
            case 1:
                {
                    return "Alacsony fokozatú";
                }
            case 2:
                {
                    return "Magas fokozatú";
                }
            default:
                {
                    return "Még nincs megállapítva";
                }
        }
    }

    public $ID;
    public $Nev;
    public $Faj;
    public $Kor;
    public $Szine;
    public $Neme;
    public $Sulya;
    public $Engedely;
    public $Elohely;
    public $Ara;
    public $Elerheto;
    public $Labak;
    public $Datum;
}

?>