<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 25.11.2019
 * Time: 16:39
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use LisDev\Delivery\NovaPoshtaApi2;

class ApiController extends Controller
{
    public function getCities(Request $request)
    {
        $np = new NovaPoshtaApi2('14e531339007f5b8f24bdea4ce0b6fd3');
        $wh = $np->getWarehouses($request->getCities, '');
        return $wh;

    }
    public function getWarehouse(Request $request)
    {

        $np = new NovaPoshtaApi2('14e531339007f5b8f24bdea4ce0b6fd3');
        $wh = $np->getWarehouses($request->getCities, '');
        return $wh;
    }

    public function getArea()
    {

    }
}