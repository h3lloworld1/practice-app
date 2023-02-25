<?php

namespace App\Traits;

trait LoadSelectedColumnsTrait
{
    public function loadWithSelectedColumns($relation, $columns = ['*'])
    {
        return $this->load([$relation => function ($query) use ($columns) {
            $query->select($columns);
        }]);
    }
}
