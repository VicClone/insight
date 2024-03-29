<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function authors() {
        return $this->belongsToMany(Author::class);
    }

    public function headline()
    {
        return $this->belongsTo(Headline::class);
    }
}
