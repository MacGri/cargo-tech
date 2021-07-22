<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Services\Cargotech\Casts\TruckCast;
use App\Services\Cargotech\Dto\TruckDto;

/**
 * Class Cargo
 *
 * @property int       $id
 * @property int       $weight
 * @property int       $volume
 * @property TruckDto  $truck
 * @property Carbon    $created_at
 * @property Carbon    $updated_at
 * @property Carbon    $deleted_at
 */
class Cargo extends Model
{
    use SoftDeletes, Notifiable;

    protected $table = 'cargos';

    protected $fillable
        = [
            'id', 'weight', 'volume', 'truck',
            'created_at', 'updated_at', 'deleted_at',
        ];

    protected $casts
        = [
            'id'     => 'int',
            'weight' => 'int',
            'volume' => 'int',
            'truck'  => TruckCast::class,
        ];
}
