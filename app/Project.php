<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'Thumb_id',
        'title',
        'sub_title',
        'location',
        'city',
        'prech_price',
        'telephone',
        'status',
        'facilities',
        'description'
    ];

    public function Thumb_image()
    {
        return $this->belongsTo('App\Image','Thumb_id');
    }

    public function images()
    {
        return $this->belongsTo('App\GalleryImage','id', 'portfolio_id')->with('image');
    }
}