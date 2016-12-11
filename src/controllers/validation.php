<?php

if (!isset($_SESSION['authenticated'])){
    header("Location: ../");
    exit;
}