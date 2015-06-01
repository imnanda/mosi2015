<?php
/**
 * Created by PhpStorm.
 * User: asmunanda
 * Date: 6/1/2015
 * Time: 4:24 PM
 */
function hitung($suhu,$kelembaban)
{
    $beku = 0;
    $dingin = 0;
    $sejuk = 0;
    $normal = 0;
    $panas = 0;

}
function getData($sql, $forceSingle = false)
{
    global $conn;

    $query = mysqli_query($conn, $sql);

    if($query)
    {
        if(mysqli_num_rows($query) < 2 && $forceSingle)
        {
            return mysqli_fetch_assoc($query);
        }

        $arrData = [];
        while ($row = mysqli_fetch_assoc($query))
        {
            $arrData[] = $row;
        }

        return $arrData;
    }
}