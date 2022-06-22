<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Kyslik\ColumnSortable\Sortable;

class Agent extends Model
{
    use Searchable,HasFactory,Sortable;

    protected $fillable = [
        'uuid',
        'line',
    ];

    public function toSearchableArray()
    {
        return [
            'uuid' => $this->uuid,
            'line'=>$this->line,
            
            
        ];
    }

    public $sortable=[
        'uuid',
        'line',
        
    ];
}
