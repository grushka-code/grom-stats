<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Каждая директория может иметь 1 родителя и множество дочерних директорий и страниц в ней
 * Если родительская директория закрыта для просмотра - все ее дочерние директории и стрнаицы так же не видны
 * Class Directory
 * @package App\Models
 * @property integer $id
 * @property string $name
 * @property Collection $pages
 * @property Collection $childs
 * @property Directory $parent
 */
class Directory extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'visible'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
