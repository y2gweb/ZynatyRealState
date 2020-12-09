<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $fillable=[
        'project_id',
        'image_id'

    ];

    public function multiImage()
    {
        return $this->belongsTo('App\Image','image_id');
    }

}