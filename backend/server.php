<?php

    $connection = mysqli_connect("localhost", "root", "", "cpns-kkp");

    if (mysqli_connect_errno()){
        echo "Failed connection: " . mysqli_connect_error();
    }

    // password
    // qtUlWkk6aK4D0GPBFp99vg
    // postgresql://wahid:qtUlWkk6aK4D0GPBFp99vg@cpsn-kkp-3359.6xw.cockroachlabs.cloud:26257/cpns-kkp?sslmode=verify-full