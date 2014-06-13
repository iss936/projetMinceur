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
    "FrameBgColor" => "#1A3055",
    "FrameFontColor" => "#FFFFFF",
    "FrameFontHover" => "#DBDBDB",
    "FrameFontFamily" => "\"Georgia\", \"Times New Roman\", \"Times\", \"Serif\"",
    "ContentBgColor" => "#FFFFFF",
    "ContentTitleColor" => "#32CAED",
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
