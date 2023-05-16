<?php 
function styleTitreNiveau1($text, $color){
    $txt = "<h1 class='text-center my-3 cursor-pointer  ".$color." perso_policeTitre perso_textShadow'>";
    $txt .= $text;
    $txt .= "</h1>";
    return $txt;
}

function afficherAlert($text, $type){
    $alertType = "";
    if($type === ALERT_SUCCESS) $alertType = "success";
    if($type === ALERT_DANGER) $alertType = "danger";
    if($type === ALERT_INFO) $alertType = "info";
    if($type === ALERT_WARNING) $alertType = "warning";
    $txt = '<div class="alert alert-'.$alertType.' m-2" role="alert">';
    $txt .= $text; 
    $txt .= '</div>';
    return $txt;
}
?>