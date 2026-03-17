<?php 
date_default_timezone_set('America/Sao_Paulo');
function tempo_relativo($data) {
    $agora = new DateTime();
    $post = new DateTime($data);
    $diff = $agora->diff($post);

    if ($diff->y > 0) {
        return "há " . $diff->y . " ano" . ($diff->y > 1 ? "s" : "");
    } elseif ($diff->m > 0) {
        return "há " . $diff->m . " mês" . ($diff->m > 1 ? "es" : "");
    } elseif ($diff->d > 0) {
        return "há " . $diff->d . " dia" . ($diff->d > 1 ? "s" : "");
    } elseif ($diff->h > 0) {
        return "há " . $diff->h . " hora" . ($diff->h > 1 ? "s" : "");
    } elseif ($diff->i > 0) {
        return "há " . $diff->i . " minuto" . ($diff->i > 1 ? "s" : "");
    } else {
        return "agora mesmo";
    }
}
?>