<?php
declare(strict_types=1);

namespace App\Services\Cargotech\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Services\Cargotech\Repositories\CounterRepository;

class CounterObserver
{
    private CounterRepository $counter;

    public function __construct(CounterRepository $counter)
    {
        $this->counter = $counter;
    }

    public function created(Model $model)
    {
        $this->counter->incrementCount($model->getTable());
    }

    public function updated(Model $model){
        if($model->wasChanged('deleted_at') && empty($model->deleted_at)){
            $this->counter->incrementCount($model->getTable());
        }

        if($model->wasChanged('deleted_at') && !empty($model->deleted_at)){
            $this->counter->decrementCount($model->getTable());
        }
    }

    public function deleted(Model $model)
    {
        $this->counter->decrementCount($model->getTable());
    }
}
