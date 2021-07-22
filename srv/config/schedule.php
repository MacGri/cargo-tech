<?php

return [
    /*
     * Вкл/выкл для всех консольных команд
     */
    'enable'     => env('SCHEDULE_ENABLE', false),

    /*
     * Вкл/выкл выполнение команды cargo:sync
     */
    'cargo_sync' => env('CARGO_SYNC', false),
];
