function GetLogout()
{
    var allow = confirm("Biztos ki akarsz jelentkezni?");

    if(allow)
    {
        window.open("/ogy-db/feladat/index.php?page=logout","_self");
    }
    else
    {
        return;
    }
}