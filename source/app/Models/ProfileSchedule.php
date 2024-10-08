<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id_profile
 * @property int    $id_timezone
 * @property int    $is_delete
 * @property int    $created_at
 * @property int    $updated_at
 * @property string $code_profile
 * @property string $title
 * @property string $location
 * @property string $description
 * @property Date   $date
 */
class ProfileSchedule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profile_schedule';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_profile_schedule';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_profile', 'code_profile', 'start_time', 'end_time', 'id_timezone', 'date', 'title', 'location', 'description', 'is_delete'
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
        'id_profile' => 'int', 'code_profile' => 'string', 'id_timezone' => 'int', 'date' => 'date', 'title' => 'string', 'location' => 'string', 'description' => 'string', 'is_delete' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date', 'created_at', 'updated_at'
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

    // Relations ...
}
