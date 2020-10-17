<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;

class DirectoryManager
{
    /**
     * @var Builder
     */
    private $directoryContainer;

    public function __construct(Directory $directory)
    {
        $this->directoryContainer = $directory;
    }

    public function getPageMenuWidget(Page $model)
    {
        $directories = $this->getMainDirectories();
        return view('components.page-menu', [
                'directories' => $directories, 'model' => $model,
            ]
        )->render();
    }

    public function getMainDirectories()
    {
        return $this->directoryContainer
            ->visible()
            ->mainDirectories()
            ->with('pages')
            ->get();
    }
}
