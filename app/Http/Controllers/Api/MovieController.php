<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Interfaces\MovieRepositoryInterface;
use App\Models\Location;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    private $movieRepository;

    /**
     * MovieController constructor.
     *
     * @param MovieRepositoryInterface $movieRepository
     */
    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->middleware('jwt.verify', ['except' => ['getAllMoviesByLocation', 'show']]);
        $this->movieRepository = $movieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Location $location
     * @return JsonResponse
     */
    public function getAllMoviesByLocation(Location $location)
    {
        return $this->successResponse($this->movieRepository->getAllMoviesByLocation($location->id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMovieRequest $request
     * @return JsonResponse
     */
    public function store(StoreMovieRequest $request)
    {
        if (!Location::find($request->location_id)) {
            return $this->errorResponse('Invalid Location Provided');
        }

        return $this->successResponse($this->movieRepository->createMovie($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Movie $movie
     * @param Location $location
     * @return JsonResponse
     */
    public function show(Movie $movie, Location $location)
    {
        $this->movieRepository->getMovieFromLocation($movie->id, $location->id);

        return $this->successResponse($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMovieRequest $request
     * @param Movie $movie
     * @return JsonResponse
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $this->movieRepository->updateMovie($movie->id, $request);

        return $this->successResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @param Location $location
     * @return JsonResponse
     */
    public function destroy(Movie $movie, Location $location)
    {
        $this->movieRepository->deleteMovie($movie->id, $location->id);

        return $this->successResponse();
    }
}
