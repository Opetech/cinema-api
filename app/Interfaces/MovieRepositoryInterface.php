<?php
namespace App\Interfaces;

use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;

interface MovieRepositoryInterface{
    public function getAllMoviesByLocation(int $locationId);
    public function getMovieFromLocation(int $movieId, int $locationId);
    public function deleteMovie(int $movieId, int $locationId);
    public function createMovie(StoreMovieRequest $movieDetails);
    public function updateMovie(int $movieId, UpdateMovieRequest $newDetails);
}
