<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Realestates extends Model
{
    protected $guarded = [];

    protected $table = 'realestates';


    public function path() {

        return url('') . '/realestates'.'/'.$this->id . '/' . str_replace(' ','-', str_replace('%','', $this->title) );

  }


  public function preview_path() {

    return url('') . '/preview-realestates'.'/'.$this->id . '/' . str_replace(' ','-', str_replace('%','', $this->title) );

}



public function user() {

    return $this->belongsTo(User::class , 'user_id');

}


public function photos() {

    return $this->hasMany(RealestatePhotos::class , 'realestate_id');

}




}
