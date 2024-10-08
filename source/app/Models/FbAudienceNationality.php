<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $uid
 * @property string $nationality
 * @property int    $value
 * @property int    $created_at
 * @property int    $updated_at
 * @property Date   $date
 */
class FbAudienceNationality extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fb_audience_nationality';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_fb_audience_nationality';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'nationality', 'value', 'date'
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
        'uid' => 'string', 'nationality' => 'string', 'value' => 'int', 'date' => 'date', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
