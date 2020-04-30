<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{    protected $guarded=[];
    protected $dates=[
        'published_at'
    ];
    use SoftDeletes;
    public function scopePublised($query){
        return $query->where('published_at','<=',now());
    }
public function categorie(){
	return $this->belongsTo(Categorie::class);
    }
    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
    public function hastag($tag){
        return in_array($tag,$this->tag->pluck('id')->toArray());
    }
  public function user(){
      return $this->belongsTo(user::class);
  }
  public function scopeSearched($query){
   $search=request()->query('search');
   if(!$search){
       return $query->publised();
   }
   return $query->publised()->where('title','like',"%{$search}%");
  }
 
}
