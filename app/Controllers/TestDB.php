<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class TestDB extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        try {
            $query = $db->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE'");
            $result = $query->getResult();

            echo "Koneksi Berhasil!<br>";
            echo "Daftar Tabel:<br>";

            foreach ($result as $row) {
                echo " - " . $row->TABLE_NAME . "<br>";
            }
        } catch (DatabaseException $e) {
            echo "Koneksi Gagal: " . $e->getMessage();
        }
    }
}
