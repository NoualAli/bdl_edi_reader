<?php

namespace App\Filters;

use Carbon\Carbon;

abstract class QueryFilter
{
    protected $query;
    protected $clause;

    public function __construct($query)
    {
        $this->query = $query;
    }

    protected function datesFromString($dates)
    {
        return explode(' - ', $dates);
    }

    protected function formatDate(?string $date = null, bool $addDay = false, bool $subDay = false)
    {
        if ($date) {
            $date = Carbon::parse($date);
        } else {
            $date = Carbon::today();
        }

        if ($addDay) {
            $date->addDay();
        }

        if ($subDay) {
            $date->subDay();
        }

        return $date->format('Y-m-d');
    }
}