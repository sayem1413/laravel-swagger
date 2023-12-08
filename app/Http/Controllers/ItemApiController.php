<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemRequest;

/**
 * @OA\Tag(
 *     name="Items",
 *     description="API Endpoints of Items CRUD"
 * )
 */

class ItemApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/items",
     *      operationId="get list",
     *      tags={"Items"},
     *      summary="Get list of Items",
     *      description="Returns list of items",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *  )
     */
    public function index()
    {
        return response()->json(Item::all());
    }

    /**
     * @OA\Post(
     *      path="/items",
     *      operationId="Add new",
     *      tags={"Items"},
     *      summary="Store new item",
     *      description="Returns item data",
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                 required={"title"},
     *                 @OA\Property(
     *                     property="title", 
     *                     type="string",
     *                     description="Item title",
     *                     required={"title"}
     *                 ),
     *              ),
     *          ),
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 required={"title"},
     *                 example={"title": "test title"},
     *                 @OA\Property(
     *                     property="title", 
     *                     type="string",
     *                     description="Item title",
     *                     required={"title"}
     *                 ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable entity"
     *      )
     * )
     */
    public function store(ItemRequest $request)
    {
        return response()->json(Item::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
