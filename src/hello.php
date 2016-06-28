<?php

if (isset($_POST['form_click'])) {
    if (isset($_POST['inputtext']) && $_POST['inputtext'] != '') {
        echo 'Xin Chao:' . $_POST['inputtext'];
    }
}
?>