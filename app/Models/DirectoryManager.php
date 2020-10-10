<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;

class DirectoryManager
{
    /**
     * @var
     */
    private $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function getMainDirectories()
    {
        return $this->query->whereNull('parent_id')
            ->where('visible', '=', true)
            ->pluck('title', 'id');
    }
}
