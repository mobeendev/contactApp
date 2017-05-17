<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Eloquent;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable {

    use AuthenticableTrait;
    
        protected $fillable = ['name', 'email','password'];

    public function contact() {
        return $this->hasMany('App\Contact');
    }

    public static function saveUser(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

//     public function getAuthIdentifier() {
//        
//    }
//
//    public function getAuthIdentifierName() {
//        
//    }
//
//    public function getAuthPassword() {
//        
//    }
//
//    public function getRememberToken() {
//        
//    }
//
//    public function getRememberTokenName() {
//        
//    }
//
//    public function setRememberToken($value) {
//        
//    }
// ... Other Code
}
