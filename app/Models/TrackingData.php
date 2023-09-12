<?php
namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTime $timestamp
 * @property string $ipAddress
 * @property string $location
 * @property string $os
 * @property string $device
 * @property string $referrer
 * @property string $url
 * @property string $language
 *
 */
class TrackingData extends Model {

    protected $table = 'tracking_data';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $attributes = [
        'location' => 'Local'
    ];

    protected $fillable = [
        'timestamp',
        'ipAddress'
    ];
}
