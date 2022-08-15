<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */

class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категориц для вывода в выподающем списке
     *
     * @retyrn Collection
     */
    public function getForComboBox()
    {
//        return $this->startConditions()->all();

        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Получить категории для вывода пагинатором
     *
     * @param int|null $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;
    }

}
