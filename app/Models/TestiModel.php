<?php

namespace App\Models;

use CodeIgniter\Model;

class TestiModel extends Model
{
    protected $table         = 'testimoni';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['image', 'nama','title', 'deskripsi'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
