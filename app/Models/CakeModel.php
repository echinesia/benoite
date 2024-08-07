<?php

namespace App\Models;

use CodeIgniter\Model;

class CakeModel extends Model
{
    protected $table = 'cakes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'image_url'];

}

