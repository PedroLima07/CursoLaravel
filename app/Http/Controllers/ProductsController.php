<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Services\ProductsService;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{

    private $productsService;

    public function __construct(ProductsService $productsService){
        $this->productsService = $productsService;
    }
    
    public function index():View {
        $products = $this->productsService->all();
        return view ('products.index', compact('products'));
    }

    public function create():View {
        return view ('products.create');
    }

    public function store(ProductsRequest $request): RedirectResponse{
        $created = $this->productsService->create($request->all());
        Session::flash($created ['status'], $created ['message']);
        return redirect()->back();
    }
}
