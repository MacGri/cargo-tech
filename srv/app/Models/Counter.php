<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Counters
 *
 * @property int    $id
 * @property string $table
 * @property int    $count
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Counter extends Model
{
    protected $table = 'counters';

    protected $fillable
        = [
            'table', 'count',
            'created_at', 'updated_at',
        ];
}
