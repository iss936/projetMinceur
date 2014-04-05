<?php
//Définition du type de fichier
header("Content-type: text/css;");

//Initialisation
$ParentPath = "../../";
require $ParentPath."config.inc.php";

//Variables CSS
$_VARCSS = array(
    "DirImg" => $ParentPath.$_CONFIG['DIR_Image'],
    "BgBody" => "#EEEEEE",
    "FrameBgColor" => "#5F0021",
    "FrameFontColor" => "#FFFFFF",
    "FrameFontHover" => "#DBDBDB",
    "FrameFontFamily" => "\"Georgia\", \"Times New Roman\", \"Times\", \"Serif\"",
    "ContentBgColor" => "#FFFFFF",
    "ContentTitleColor" => "#226D48",
    "ContentBorderColor" => "#BDBDBD",
    "ContentFontColor" => "Black",
    "ContentFontHover" => "#DBDBDB",
    "ContentFontFamily" => "\"Arial\", \"Helvetica\", \"Sans-Serif\"",
    "FootFontColor" => "#808080",
    "FootFontHover" => "#9C9C9C",
    "InputBorderColor" => "#BDBDBD",
    "TableBorderColor" => "#BDBDBD",
    "TableHoverColor" => "#D0F0E0",
    "MsgConfirm" => "Green",
    "MsgError" => "Red",
);
?>
