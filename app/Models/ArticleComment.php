<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public function article()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Article');
    }
}
