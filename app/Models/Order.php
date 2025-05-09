<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    /**
     * Check if this is a dummy record (for display purposes)
     *
     * @return bool
     */
    public function isDummy()
    {
        return !$this->exists;
    }
}
