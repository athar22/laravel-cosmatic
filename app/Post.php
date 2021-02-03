<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];




    public function photos() {

        return $this->hasMany('App\PostsPhotos' );
    }

    public function properties() {

        return $this->hasOne('App\PostsProperties' , 'post_id' );
    }

    public function offers() {

        return $this->hasMany('App\PostsOffers' , 'post_id' );
    }

    public function products() {

        return $this->hasMany('App\PostsProducts' , 'post_id' );
    }

    public function path() {

          return url('') . '/' . str_replace(' ','-', $this->category ) .'/'.$this->id . '/' . str_replace(' ','-', str_replace('%','', $this->title) );

    }


    public function preview_path() {

        return url('/') . '/preview/' . str_replace(' ','-', $this->category ) . '/' . date('Y/m/d', strtotime($this->created_at)) .'/'.$this->id . '/' . str_replace(' ','-', str_replace('%','', $this->title) );

  }



         public function publish_date() {

            return date('Y/m/d', strtotime($this->created_at));

        }

        public function photo_title() {

            $photo = ImagesLibrary::where('file_name' , $this->photo)->first() ;

            if (isset($photo)) {
                $title =  $photo->title;
            } else {
                $title = null;
            }

            return $title;

        }



}
