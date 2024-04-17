<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="Febrafar - Teste - Documentação API",
 *    version="1.0.0",
 *     @OA\Contact(
 *         name= "Nick Roger",
 *         email="nick@mundoartistico.com.br"
 *     ),
 * ),
 *   @OA\SecurityScheme(
 *       securityScheme="bearerAuth",
 *       in="header",
 *       name="bearerAuth",
 *       type="http",
 *       scheme="bearer",
 *       bearerFormat="JWT",
 *    ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
