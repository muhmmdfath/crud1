<?php

namespace App\Models;

use CodeIgniter\Model;

class Karyawan extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'karyawan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_depan', 'nama_belakang', 'departemen'];
}
