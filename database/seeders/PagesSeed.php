<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PagesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

        for ($i = 0; $i < 40; $i++) {
            $page = new Page();
            $title = 'Random title ' . Str::random() . ' №' . $i;
            $page->fill([
                'text' => $text,
                'title' => $title,
                'slug' => Str::slug($title),
                'type' => rand(Page::TYPE_PAGE, Page::TYPE_ANNOUNCE),
                'status' => Page::STATUS_APPROVED,
                'directory_id' => rand(1,17),
                'author_id' => 1
            ]);
            $page->save();
        }
    }
}
