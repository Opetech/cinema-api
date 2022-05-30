<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\LocationRepositoryInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $locationRepository;

    /**
     * LocationController constructor.
     *
     * @param LocationRepositoryInterface $locationRepository
     */
    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function getLocations()
    {
        return $this->successResponse($this->locationRepository->all());
    }

}
