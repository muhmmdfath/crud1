<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'username', 'password'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validasi data pengguna (jika dibutuhkan)
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'username' => 'required|is_unique[users.username]',
        'password' => 'required|min_length[8]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Email sudah terdaftar.',
        ],
        'username' => [
            'is_unique' => 'Username sudah terdaftar.',
        ],
    ];
}