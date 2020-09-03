<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;
    
    protected $fillable = ['name', 'description', 'slug'];
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'categories_products'); //segundo parametro é o nome da tabela caso nao respeite o padrão
    }
}
