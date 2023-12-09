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
     * @OA\Get(
     *      path="/items/{id}",
     *      operationId="get item by id",
     *      tags={"Items"},
     *      summary="Get Item information",
     *      description="Returns item data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Item id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
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
     *          response=404,
     *          description="Not found"
     *      )
     * )
     */
    public function show(Item $item)
    {
        return response()->json($item);
    }

    /**
     * @OA\Put(
     *      path="/items/{id}",
     *      operationId="update Item",
     *      tags={"Items"},
     *      summary="Update existing item",
     *      description="Returns updated item data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Item id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
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
     *          response=404,
     *          description="Resource Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable entity"
     *      )
     * )
     */

    public function update(ItemRequest $request, Item $item)
    {
        return response()->json( $item->update($request->all()) );
    }

    /**
     * @OA\Delete(
     *      path="/items/{id}",
     *      operationId="delete item",
     *      tags={"Items"},
     *      summary="Delete existing item",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Item id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Item $item)
    {
        return response()->json($item->delete());
    }
}
