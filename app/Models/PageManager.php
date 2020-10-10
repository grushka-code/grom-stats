<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class PageManager
{

    /**
     * @var
     */
    private $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function getByDirectoryId($directoryId)
    {
        return $this->query->where('directory_id', '=', $directoryId)
            ->limit(5)
            ->pluck('title', 'slug');
    }
}
