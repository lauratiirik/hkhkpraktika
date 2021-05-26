<?php

function db_connect() {
    $conn = new mysqli("localhost","ltiirik","Bv08Wx/0anAgp+O5","ltiirik"); #login
    if(!$conn){
        die("DB ERROR!");
    }
    $conn->set_charset("utf8");
    return $conn;
}