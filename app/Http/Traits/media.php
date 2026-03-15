<?php

namespace App\Http\Traits;

trait media {
    public function uploadPhoto($image, $folder) {
        $photoName = uniqid() . '.' . $image->extension();
        $image->move(public_path("/imgs/$folder") , $photoName);
        return $photoName;
    }

    public function deletePhoto($photoPath){
        if(file_exists($photoPath)) {
            unlink($photoPath);
            return true;
        }
        return false;
    }
}