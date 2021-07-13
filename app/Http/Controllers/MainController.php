<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;

class MainController extends Controller
{
    protected $data=[];
    protected $product_model=null;

    public function __construct()
    {
        $this->product_model = new Product();
    }

    function home(){

        $sliders =  Slider::all()->where('deleted_at','=',null);
        $latest_products = $this->product_model->getRows([]);

        $this->data['sliders'] = $sliders;
        echo 'Testing upload to heroku using changes not uploaded';
        $this->data['latest_products'] = $latest_products;
        return view('front.home',$this->data);
    }
}
