<?php

namespace App;


use File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Validator;


class Customer extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{




    use Authenticatable, Authorizable, CanResetPassword;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $primaryKey = "id";

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'email',
        'password',
        'pin',
        'phone',
        'country',
        'status',
        'created_at',
        'updated_at',
    ];



    protected $guarded =  ['id', 'created_at', 'updated_at'];



    public function getAuthPassword() {

        return $this->password;
    }


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $rules = array(

        'email' => array('required', 'max:255','unique:admin,email'),


    );




    public static function validate($data) {
        return Validator::make($data, static::$rules);
    }

//    public static   function getpostimage($b64){
//        $png_url = "product-".time().".jpg";
//        $path64 = public_path().'/images/admin/' . $png_url;
//
//        Image::make(file_get_contents($b64))->save($path64);
//        $retArray['mimeType'] = mime_content_type($path64);
//        $retArray['getSize'] = filesize($path64);
//        $retArray['path64'] = $path64;
//        return $retArray;
//
//    }

//    public static function sendMail($data = []){
//
//        Mail::send('admin.emailtemplate', $data, function($message) use ($data) {
//
//            $message->from('pksaqafat@bazaarkita.com', 'User Registration ');
//            $message->to($data['email'])->subject('user Registations');
//
//
//        });
//
//        return true;
//
//    }
//



}