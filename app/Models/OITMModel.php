<?php
namespace App\Models;
use CodeIgniter\Model;

class OITMModel extends Model
{
    protected $DBGroup = 'default'; 
    protected $table = 'OITM';
    protected $primaryKey = 'ItemCode';
    protected $allowedFields = ['ItemCode', 'ItemName'];

    public function searchItem($keyword)
    {
        return $this->like('ItemCode', $keyword)
                    ->orLike('ItemName', $keyword)
                    ->findAll(10);
    }
}
