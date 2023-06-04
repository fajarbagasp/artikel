<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    // ...

    // Metode aksesornya untuk mengubah konten sebelum ditampilkan
    public function getContentAttribute($value)
    {
        return $this->sanitizeContent($value);
    }

    // Metode mutator untuk membersihkan konten sebelum disimpan
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $this->sanitizeContent($value);
    }

    // Metode untuk membersihkan konten dari editor WYSIWYG
    private function sanitizeContent($value)
    {
        return strip_tags($value, '<p><a><ul><ol><li><strong><em><br>');
    }
}
