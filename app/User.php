<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Collections\CollectionUsers;
use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function newCollection(array $models = [])
    {
        return new CollectionUsers($models);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function access(){
        return $this->hasMany('App\Access');
    }

//    public function permission(){
//        return $this->hasMany('App\Permission');
//    }

    public function menu(){
        return $this->belongsToMany('App\Menu','access')->withPivot('read', 'write','delete')->select('title','url')->where('read','1')->orderBy('sort')->get();
    }

    public function allMenu(){
        return $this->belongsToMany('App\Menu','access')->withPivot('read', 'write','delete')->orderBy('sort');
    }

    public function modules(){
        return $this->belongsToMany('App\Menu','access')->withPivot('read', 'write','delete')->select('title','url')->orderBy('sort')->get();
    }

    public function syncAccess(){
        $this->allMenu()->sync(Menu::all()->pluck('id')->toArray());
//        $this->permissions()->sync(Permission::all()->pluck('id')->toArray());
    }

//    public function permissions(){
//        return $this->belongsToMany('App\Permission','permission_user')->withPivot('read', 'write','delete');
//    }
//
//    public function permiss(){
//        return $this->permissions()->select('title')->get();
//    }


}
