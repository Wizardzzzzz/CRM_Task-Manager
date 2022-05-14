<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Отримання всіх майбутніх тасків
Route::get("/upcoming", function () {
    $upcoming = \App\Models\Upcoming::all();

    return \App\Http\Resources\UpcomingResource::collection($upcoming);

    return $upcoming;
});
// Додати новий таск
Route::post('/upcoming', function (Request $request) {
    return \App\Models\Upcoming::create([
        'title' => $request->title,
        'taskId' => $request->taskId,
        'waiting' => $request->waiting
    ]);
});
// Видалення майбутнього таску
Route::delete('/upcoming/{taskId}', function ($taskId) {
    DB::table('upcoming')->where('taskId', $taskId)->delete();
    return 204;
});

//Сьогоднішній таск
Route::post('/dailytask', function (Request $request) {
    return \App\Models\Today::create([
        'id' => $request->id,
        'title' => $request->title,
        'taskId' => $request->taskId
    ]);

});
//Видалення сьогоднішнього таску
Route::delete('/dailytask/{taskId}', function ($taskId) {
    DB::table('todays')->where('taskId', $taskId)->delete();
    return 204;
});
