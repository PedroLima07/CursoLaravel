<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Http\Services\ProductsService;
use App\Http\Returns\Sucess;
use App\Http\Returns\Error;
use Throwable;

class CategoriesService
{
    public function all(): object{
        return Category::all();
    }

        public function findById(int $category_id): object {
        return Category::find($category_id);
    }
        
    public function create(array $data): array{
        try{
            DB::beginTransaction();

            $category = new Category($data);
            $category->save(); 
            
            DB::commit();
        
            return Sucess::execute('Categoria cadastrada com sucesso');
        }

        catch(Throwable $th){
            DB::rollBack();
            return Error::execute($th->getMessage(), 'Problemas ao cadastrar categoria');
        }

    }   
        public function update(array $data, int $id): array{
        try{
            DB::beginTransaction();

            $category = $this->findById($id);
            $category->update($data); 
            
            DB::commit();
        
            return Sucess::execute('Categoria atualizada com sucesso');
        }

        catch(Throwable $th){
            DB::rollBack();
            return Error::execute($th->getMessage(), 'Problemas ao atulizar categoria');
        }
    }

    public function delete(int $id): array {
        try{

            $productService = new ProductsService();

            $category = $this->findById($id);

            if($productService->hasProductByCategoryId($category->id)){
                return Error::execute(null, 'Esta categoria não pode ser excluida');
            }

            DB::beginTransaction();

            $category->delete();
            
            DB::commit();
        
            return Sucess::execute('Categoria axcluida com sucesso');
        }

        catch(Throwable $th){
            DB::rollBack();
            return Error::execute($th->getMessage(), 'Problemas ao excluir categoria');
        }
    }

}