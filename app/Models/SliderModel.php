<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table         = 'slider';
    protected $primaryKey    = 'slider_id';
    protected $allowedFields = ['title', 'sub_title','url', 'image'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
