<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $code_profile
 * @property string  $fullname
 * @property string  $gender
 * @property string  $place_of_birth
 * @property string  $nationality
 * @property string  $job
 * @property string  $face
 * @property string  $skin_color
 * @property string  $body
 * @property string  $fb_link
 * @property int     $age
 * @property int     $id_image_resource
 * @property int     $created_at
 * @property int     $updated_at
 * @property boolean $is_delete
 */
class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profile';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_profile';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_profile', 'fullname', 'age', 'gender', 'place_of_birth', 'nationality', 'job', 'face', 'skin_color', 'body', 'id_image_resource', 'fb_link', 'is_delete'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code_profile' => 'string', 'fullname' => 'string', 'age' => 'int', 'gender' => 'string', 'place_of_birth' => 'string', 'nationality' => 'string', 'job' => 'string', 'face' => 'string', 'skin_color' => 'string', 'body' => 'string', 'id_image_resource' => 'int', 'fb_link' => 'string', 'is_delete' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    protected $dateFormat = 'Y-m-d H:i:s';

    // Scopes...

    // Functions ...

    public function imageResource()
    {
        if($this->id_image_resource && $this->id_image_resource > 0) {
            $image = $this->hasOne('App\Models\ImageResource', 'id_image_resource', 'id_image_resource');
            return $image->first()->url;
        }
        
        return '';
    }

    // Relations ...
}
