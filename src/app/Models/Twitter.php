<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use Laravel\Scout\Searchable;

class Twitter extends Model  implements Explored
{
    use HasFactory,Searchable;

    public $timestamps = true;
    protected $fillable = [
        'body',
        'source',
        'url',
        'created_at'
    ];

    public function toSearchableArray()
    {
        return [
            'body' => $this->body,
            'source' => $this->source,
            'created_at' => $this->created_at
        ];
    }


    public function mappableAs(): array
    {
        return [
            'body' => 'text',
            'source' => 'text',
            'created_at' => 'date'
        ];
    }
}
