<?php

namespace App\Repositories;

use App\Interfaces\LocationRepositoryInterface;
use App\Models\Location;

class LocationRepository implements LocationRepositoryInterface{

    /**
     * @return Location
     */
    public function all()
    {
        return Location::all();
    }
}
