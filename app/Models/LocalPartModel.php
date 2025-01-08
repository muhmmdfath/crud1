<?php
namespace App\Models;
use CodeIgniter\Model;

class LocalPartModel extends Model
{
    protected $table = 'parts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['part_code', 'part_name'];
}
