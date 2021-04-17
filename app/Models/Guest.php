<?php

namespace App\Models;

// use Eloquent;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Cms\Base\Traits\Uuid;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Cms\Guest\Models\Guest
 *
 * @mixin \Eloquent
 */
// class Guest extends Eloquent
// class Guest extends Model
class Guest extends Authenticatable
{
    use SoftDeletes;
    // use Uuid;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expopropertys_guest';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'status',
        'desc',
        'email',
        'password',
        'wa',
        'gender',
        'dob',
        'rand_auth',
        'user_by',
        'otp',
        
    ];
    
    public function save(array $options = [])
    {
        if( Auth::user() ){
            $this->user_by = Auth::user()->id;
        }

        if(!$this->id){
            $this->uuid = Str::uuid();
        }
        
        if($this->rand_auth == ''){
            $this->rand_auth = $this->unique_random();
        }

        if(!$this->password){
            if(!$this->id){
                $this->password = bcrypt( 'password' );
            } else {
                $password = parent::where('id', $this->id )->first();
                if( $password->password ){
                    $this->password = $password->password;
                } else {
                    $this->password = bcrypt( 'password' );
                }
            }
        } else {
            // bcrypt
            $this->password = bcrypt( $this->password );
        }

        parent::save();
    }

    public function userBy(){
        return $this->belongsTo(User::class, 'user_by');
    }

    private function unique_random($col='rand_auth', $chars = 16){
            $table = $this->table;
            $unique = false;
            // Store tested results in array to not test them again
            $tested = [];
            do{
                // Generate random string of characters
                $random = Str::random($chars);
                // Check if it's already testing
                // If so, don't query the database again
                if( in_array($random, $tested) ){
                    continue;
                }
                // Check if it is unique in the database
                $count = DB::table($table)->where($col, '=', $random)->count();
                // Store the random character in the tested array
                // To keep track which ones are already tested
                $tested[] = $random;
                // String appears to be unique
                if( $count == 0){
                    // Set unique to true to break the loop
                    $unique = true;
                }
                // If unique is still false at this point
                // it will just repeat all the steps until
                // it has generated a random string of characters
            }
            while(!$unique);
        return $random;
    }


}
