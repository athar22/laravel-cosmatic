<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];
 
public static function LanguageList() {

return \Cache::rememberForever('LanguageList', function() {
    return Language::whereStatus(1)->orderby('order_list','asc')->get();
});
   
}


}
