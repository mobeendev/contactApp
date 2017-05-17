<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model {

    use SoftDeletes;

    protected $table = 'contacts';

    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['name', 'email', 'phone',
        'address',
        'company',
        'dob',
        'user_id',
        'created_at', 'updated_at'];

    public function getAgeAttribute() {
        return \Carbon\Carbon::parse($this->attributes['dob'])->age;
    }
    
    public function getTotalAttribute(){
        return $this->all()->count();
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}
