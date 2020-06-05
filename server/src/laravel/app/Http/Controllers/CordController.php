<?php

namespace App\Http\Controllers;

use App\Cord;
use http\Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CordController extends Controller
{

    public function getAllCords() {}
    public function createCord() {}
    public function getCord($id) {}
    public function updateCord($id) {}
    public function deleteCord($id) {}
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'  => 'required|max:140',
                'detail' => 'required',
            ]
        );

        $cord = new Cord(
            [
                'title'       => $request->get('title'),
                'description' => $request->get('description')
            ]
        );
        $cord->save();

        return response()->json(['message' => 'cord created', 'cord' => $cord]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string   $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title'       => 'required',
                'description' => 'required'
            ]
        );

        $cord = Cord::find($id);
        $cord->title = $request->title;
        $cord->description = $request->description;
        $cord->save();

        return response()->json(
            [
                'message' => 'cord updated',
                'cord'    => $cord
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cord $cord
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Cord $cord)
    {
        $cord->delete();

        return response()->json(
            [
                'message' => 'cord deleted'
            ]
        );
    }
}
