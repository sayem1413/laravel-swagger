<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel OpenApi Learing Documentation",
     *      description="L5 Swagger OpenApi learing project",
     *      @OA\Contact(
     *          name="Abu Shahadat Md. Sayem",
     *          url="https://www.amiprobashi.com/",
     *          email="sayem1413@gmail.com",
     *      ),
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_LOCAL_HOST,
     * )
     * 
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_DEV_HOST,
     * )
     */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}