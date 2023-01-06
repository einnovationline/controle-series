<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use app\Models\Series;

interface SeriesRepository {
    public function add(SeriesFormRequest $request): Series;
}