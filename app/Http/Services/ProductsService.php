<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Returns\Sucess;
use App\Http\Returns\Error;
use Throwable;

class ProductsService
{
    public function all(): object {
        return Product::all();
    }

    public function create(array $data): array{
        try{
            DB::beginTransaction();

            $product = new Product($data);
            $product->save(); 
            
            DB::commit();
        
            return Sucess::execute('Produto cadastro com sucesso');
        }

        catch(Throwable $th){
            DB::rollBack();
            return Error::execute($th->getMessage(), 'Problemas ao cadastro produto');
        }
    }
}

