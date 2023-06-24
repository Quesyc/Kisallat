<?php
date_default_timezone_set("europe/Budapest");
error_reporting(E_ALL);
ini_set("display_errors","1");
session_start();
include "sql.php";
include "kisallat.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>feladat</title>
    <link rel="stylesheet" href="index.css">
    <script type="text/javascript" src="index.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Nyílvántartó Rendszer</h1>
            <div class="menu">
                <ul>
                    <li><a href="/ogy-db/feladat/index.php?page=insert" >Új adat bevitele</a></li>
                    <li><a href="/ogy-db/feladat/index.php" >Adatok listázása</a></li>
                    <li><a href="/ogy-db/feladat/index.php?page=search" >Keresés</a></li>
                    <li><a href="#" onclick="GetLogout();" >Kijelentkezés</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <?php
            //session_destroy();
                if(isset($_SESSION["user"]))
                {
                    $url = @$_GET["page"];

                    if(isset($url))
                    {
                        switch ($url)
                        {
                            case "search":
                            {
                                include_once("search.php");
                                break;
                            }
                            case "insert":
                            {
                                include_once("insert.php");
                                break;
                            }
                            case "logout":
                            {
                                include_once("logout.php");
                                break;
                            }
                            default:
                            {
                                include_once("list.php");
                                break;
                            }
                            }
                    }
                    else
                    {
                        include_once("list.php");
                    }
                }
                else
                {
                    include_once("login.php");
                }
            ?>
        </div>
    </body>
</html>