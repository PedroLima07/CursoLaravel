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

    public function findById(int $id): object {
        return Product::find($id);
    }

    public function hasProductByCategoryId(int $categoryId): bool {
            $hasProduct = Product::where('category_id', '-', $categoryId)->get();

            if($hasProduct->IsEmpty())
                {
                    return false;
                }
                
            return true;
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

    public function update(array $data, int $id): array{
        try{
            DB::beginTransaction();

            $product = $this->findById($id);
            $product->update($data); 
            
            DB::commit();
        
            return Sucess::execute('Produto atualizado com sucesso');
        }

        catch(Throwable $th){
            DB::rollBack();
            return Error::execute($th->getMessage(), 'Problemas ao atulizar o produto');
        }
    }

    public function delete(int $id): array {
        try{
            DB::beginTransaction();

            $product = $this->findById($id);
            $product->delete(); 
            
            DB::commit();
        
            return Sucess::execute('Produto axcluido com sucesso');
        }

        catch(Throwable $th){
            DB::rollBack();
            return Error::execute($th->getMessage(), 'Problemas ao excluir o produto');
        }
    }

    
}

