<?php
function renderError($error) {
    if ($error && $error!='') {
        $output="<div class='error'>";
        $output .=$error;
        $output .="</div>";
        return $output;
    }
}
?>