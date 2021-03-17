<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    public function getAll($perPage = 10): LengthAwarePaginator
    {
        return User::query()->paginate($perPage);
    }

    public function store(Request $request)
    {
        $requestData = $request->except(['_token', 'location']);
        if (isset($request->location)) {
            $location = explode(',', $request->location);
            $requestData['country'] = $location[0];
            $requestData['state'] = $location[1];
            $requestData['city'] = $location[2];
        }
        return User::query()->create($requestData);
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->except(['_token', 'location']);
        if (isset($request->location)) {
            $location = explode(',', $request->location);
            $requestData['country'] = $location[0];
            $requestData['state'] = $location[1];
            $requestData['city'] = $location[2];
        }
        return User::query()->findOrFail($id)->update($requestData);
    }

    public function getById($id)
    {
        return User::query()->findOrFail($id);
    }

    public function delete($id)
    {
        self::getById($id)->delete();
    }
}
