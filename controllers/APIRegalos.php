<?php

namespace Controllers;
use Model\Regalo;

class APIRegalos {

    public static function index() {
        $regalos = Regalo::all();
        echo json_encode($regalos);
    }

    public static function regalo() {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            echo json_encode([]);
            return;
        }

        $regalo = Regalo::find($id);
        echo json_encode($regalo, JSON_UNESCAPED_SLASHES);
    }
}