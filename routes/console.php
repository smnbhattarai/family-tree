<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schedule;

Schedule::command('backup:clean')->daily()->at('01:00');
Schedule::command('backup:run')->daily()->at('01:30');
