<?php

namespace App\Traits;

use App\Image;

/**
 * SaveImage Trait
 * 
 * PHP version 7.1.9
 */
trait SaveImageTrait
{
    /**
     * Save image for desired model
     * 
     * @param object $model The model
     * @param App\Image $image The image for the model
     * @return void
     */
    public function saveImage($model, $image) {
        $img = count($model->image) == 0 ? new Image() : Image::find($model->image[0]->id);
        $saveToFolder = preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(get_class($model) . 's'));
        $image_path = $image->store($saveToFolder);

        $img->path = $image_path;
        $img->name = $image->getClientOriginalName();
        $model->image()->save($img);

        if (count($model->image) !== 0) {
            \Storage::delete($model->image[0]->path);
        } else {
            $model->image()->save($img);
        }
    }
}
