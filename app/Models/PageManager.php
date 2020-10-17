<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class PageManager
{
    /**
     * @var Builder
     */
    private $pageContainer;

    public function __construct(Page $page)
    {
        $this->pageContainer = $page;
    }

    public function getPagesByDirectory($directoryId, $limit = 10)
    {
        return $this->pageContainer->where('directory_id', '=', $directoryId)
            ->limit($limit)
            ->pluck('title', 'slug');
    }

    public function getPagesByType($type, $limit = 5)
    {
        return $this->pageContainer->where('type', '=', $type)
            ->limit($limit)
            ->latest()
            ->pluck('title', 'slug');
    }
}
