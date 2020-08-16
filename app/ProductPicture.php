<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    protected $fillable = ["product_id", "name",
    ];

    public function getPath(){
        return asset("storage".DIRECTORY_SEPARATOR.config("project.pictures_directory").DIRECTORY_SEPARATOR.$this->name);
    }
}
