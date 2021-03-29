<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class MaterialFilter extends Filter
{
    /**
     * Filter the products by the given string.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function type(string $value = null): Builder
    {
        return $this->builder->where('type', $value);
    }

    /**
     * Filter the products by the given status.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function category(string $value = null): Builder
    {
        return $this->builder->where('category', $value);
    }

    /**
     * Filter the products by the given category.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function addition_date(string $value = null): Builder
    {
        return $this->builder->where('addition_date', $value);
    }

    // /**
    //  * Sort the products by the given order and field.
    //  *
    //  * @param  array  $value
    //  * @return \Illuminate\Database\Eloquent\Builder
    //  */
    // public function sort(array $value = []): Builder
    // {
    //     if (isset($value['by']) && ! Schema::hasColumn('products', $value['by'])) {
    //         return $this->builder;
    //     }

    //     return $this->builder->orderBy(
    //         $value['by'] ?? 'created_at', $value['order'] ?? 'desc'
    //     );
    // }
}