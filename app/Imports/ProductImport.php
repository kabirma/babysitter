<?php

namespace App\Imports;

use App\Product;
use App\Gallery;
use App\Variation;
use App\ParentVariation;
use App\ProductVariation;
use App\Category;
use Session;
use Input;
use DB;
use Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $extensionsarray=array("jpg","png","jpeg");
        $emptyerror=false;
        $numbererror=false;
        $categoryerror=false;
        $imageerror=false;
        $variationerror=false;
        foreach($rows as $request){
            $request = json_decode(json_encode($request), FALSE);
            // dd($request);
            if(is_null($request->heading) ||is_null($request->category_id) ||is_null($request->price) ||is_null($request->discount_price) ||is_null($request->description) ||is_null($request->image) ||is_null($request->gallery) ||is_null($request->variration) ||is_null($request->skuvariration) ||is_null($request->pricevariration) ||is_null($request->qtyvariration)){
                $emptyerror=true;
            }
            else{
                $variration=explode(",",$request->variration);
                $sku=explode(",",$request->skuvariration);
                $quantity=explode(",",$request->qtyvariration);
                $price=explode("-",$request->pricevariration);
                $countarray=array(count($variration),count($sku),count($quantity),count($price));
            
                if(count(array_unique($countarray))!=1){
                    $variationerror=true;
                }
                if(!is_null($price)){
                    foreach($price as $pr){
                        if(!is_numeric($pr)){
                            $numbererror=true;
                        }
                    }
                }

                foreach($quantity as $qty){
                    if(!is_numeric($qty)){
                        $numbererror=true;
                    }
                }

                if(!is_null($request->image)){
                    foreach(explode(',',$request->category_id) as $item){
                        $cate=Category::where('title',$item)->first();
                        if(is_null($cate)){
                            $categoryerror=true;
                        }
                    }
                    $image=explode(".",$request->image);
                    if(count($image)>1){
                        if(!in_array($image[1],$extensionsarray)){
                            $imageerror=true;
                        }
                    }
                    else{
                        $imageerror=true;
                    }
                }
                if(!is_null($request->gallery)){
                    foreach(explode(",",$request->gallery) as $gallery){
                        $image=explode(".",$gallery);
                        if(count($image)>1){
                            if(!in_array($image[1],$extensionsarray)){
                                $imageerror=true;
                            }
                        }
                        else{
                            $imageerror=true;
                        }
                    }
                }
                if(!is_numeric($request->price) || !is_numeric($request->discount_price)){
                    $numbererror=true;
                }


            }
            
            
            
           
           

        }
        $errorarray=array($numbererror,$emptyerror,$imageerror,$categoryerror,$variationerror);
        
        
        if(!in_array(true,$errorarray)){
            try{
                foreach($rows as $request){
                    
                    $request = json_decode(json_encode($request), FALSE);

                    $categoryarray=explode(",",$request->category_id);
                    $assignedcat="";
                    foreach($categoryarray as $category){
                        $cate=Category::where('title',$category)->first();
                        $assignedcat.=$cate->id.",";
                    }
                    
                    $quantityvariration=explode(",",$request->qtyvariration);
                    $quantity=array_sum($quantityvariration);
                    
                    $product=new Product;
                    $product->title=$request->heading;
                    $product->category_id=$assignedcat;
                    $product->discount_price=$request->discount_price;
                    $product->price=$request->price;
                    $product->stock=$quantity;
                    $product->feature_image="storage/images/product/".$request->image;
                    $product->description=$request->description;
                
                    if($product->save()){
                        $product_id=$product->id;
                        $variration=explode(",",$request->variration);
                        $skuvariration=explode(",",$request->skuvariration);
                        $pricevariration=explode("-",$request->pricevariration);
                        foreach($quantityvariration as $key=>$item){
                            $productvariation=new ProductVariation;
                            $productvariation->variation=$variration[$key];
                            $productvariation->product_id=$product_id;
                            $productvariation->quantity=$item;
                            $productvariation->price=$pricevariration[$key];
                            $productvariation->sku=$skuvariration[$key];
                            $productvariation->save();
                        }
                        $gallery=explode(",",$request->gallery);
                        foreach($gallery as $image){
                            $gallery=new Gallery;
                            $gallery->image = "storage/product/gallery/".$image;
                            $gallery->product_id=$product_id;
                        
                            $gallery->save();
                        }
                    }
                
                }
                $this->data=  "done";
            }
            catch(Exception $e) {
                $errorarray[0]=true;
                $this->data=$errorarray;
            }
        
        }
        else{
            $this->data=$errorarray;
        }
    }
}
