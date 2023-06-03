<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");


$tp = new TampilPasien();

// route
if (isset($_POST['add_data'])) {
    //memanggil addData
    $tp->addData($_POST);
} else if (isset($_GET['delete_id'])) {
    //memanggil deleteData
    $tp->deleteData($_GET['delete_id']);
} else if (isset($_POST['update_data'])) {
    //memanggil updateData
    $tp->updateData($_POST);
} else {
    $data = $tp->tampil();
}
