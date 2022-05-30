<?php
namespace App\Repositories;

use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface{

    /**
     * @param int $locationId
     * @return Movie
     */
    public function getAllMoviesByLocation(int $locationId)
    {
         return Movie::where('location_id', $locationId)->latest()->get();

    }

    /**
     * @param int $movieId
     * @param int $locationId
     * @return Movie
     */
    public function getMovieFromLocation(int $movieId, int $locationId)
    {
         return Movie::where(['id' => $movieId, 'location_id' => $locationId])->first();
    }

    /**
     * @param int $movieId
     * @param int $locationId
     * @return bool
     */
    public function deleteMovie(int $movieId, int $locationId)
    {
        return Movie::find($movieId)->delete();
    }

    /**
     * @param StoreMovieRequest $movieDetails
     * @return Movie
     */
    public function createMovie(StoreMovieRequest $movieDetails)
    {
        return Movie::create($movieDetails->validated() + ['user_id' => auth()->user()->id]);
    }

    /**
     * @param int $movieId
     * @param UpdateMovieRequest $newDetails
     * @return Movie
     */
    public function updateMovie(int $movieId, UpdateMovieRequest $newDetails)
    {
        return Movie::whereId($movieId)->update($newDetails->validated());
    }
}
