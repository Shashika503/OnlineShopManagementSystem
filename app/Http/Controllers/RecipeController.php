<?php

namespace App\Http\Controllers;

use App\Models\Manufact;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class RecipeController extends Controller
{
    public function store(Request $request){

         $recipe = new Recipe;
         
         $this->validate($request,[
             'mProduct'=>'required|max:1000|min:3',
             'mRecipe'=>'required|max:1000|min:3',
             'steps'=>'required|max:1000|min:3',
             'pCost'=>'required|numeric' ,
             'mCost'=>'required|numeric' ,
             ]);

         $recipe->manufacturingProductName=$request->mProduct; 
         $recipe->recipe=$request->mRecipe;
         $recipe->steps=$request->steps;
         $recipe->production_cost=$request->pCost;
         $recipe->manufacturing_cost=$request->mCost;
         $recipe->total_cost=$request->pCost + $request->mCost;
         $recipe->save();
        
         $data=Recipe::all();//getting all data from recipes table to data variable to display
         

         return redirect('/Manufacturing')->with('Recipe1',$data)->with('success', 'Manufactures recipe added successfully!'); //return Recipe view with data to display 
         return view('Manufacturing/insertManufact')->with('manuData',$data); 
         //return view('Manufacturing/updateManufact')->with('manufactData',$data); 
       
    }
    public function searchRecipe(){
        $search_text = $_GET['query'];
        $searchRecipe = Recipe::where('manufacturingProductName','LIKE','%'.$search_text.'%')->get();
        
        return view('Manufacturing.search',compact('searchRecipe'));
    }
    public function searchManufact(){
        $search_text = $_GET['query2'];
        $searchManufact = Manufact::where('product_name','LIKE','%'.$search_text.'%')->get();

        return view('Manufacturing.searchManu',compact('searchManufact'));
    }

    public function deleterecipe($id){

        $recipe=Recipe::find($id);
        $recipe->delete();
        return redirect()->back()->with('success', 'Manufacturing recipe deleted successfully!');
    }
    public function manufacturing(Request $request){
        $this->validate($request,[
            'price'=>'required|numeric' ,
            'numOfUnits'=>'required|numeric' ,
            ]);
        $manufact = new Manufact;
        $manufact -> product_name=$request->dropdown;
        $manufact -> cost=$request->price;
        $manufact -> num_of_units=$request->numOfUnits;
        $manufact -> cost_for_all_units=$request->numOfUnits * $request->price;
        $manufact -> save();

        $data2 = Manufact::all();
        return redirect('displayManufact')-> with('displayManufact',$data2)->with('success', 'Manufacturing details added successfully!');
         
    }
    public function DeleteManufact($id){
        $manufact=Manufact::find($id);
        $manufact->delete();
        return redirect()->back()->with('success', 'Manufacturing details deleted successfully!');
    }
    public function updateManufact($id){
        $manufact=Manufact::find($id);
        $productName = Recipe::all(['id','manufacturingProductName']);
        return view('Manufacturing/updateManufact')->with('manufactData',$manufact)->with('productName',$productName);    
    }
    public function updateManufact2(Request $request){
        $this->validate($request,[
            'price'=>'required|numeric' ,
            'numOfUnits'=>'required|numeric' ,
            ]);
        //variable -- name(updated one)
        $id=$request->id;
        $price=$request->price;
        $numOfUnits=$request->numOfUnits;
        $Productname=$request->	dropdown;
        $updateData = Manufact::find($id);
        
        $updateData->product_name=$Productname;
        $updateData->cost=$price;
        $updateData->num_of_units=$numOfUnits;
        $updateData->cost_for_all_units=$price * $numOfUnits;
        $updateData->save();

        $data2 = Manufact::all();
        return Redirect('displayManufact')->with('displayManufact',$data2)->with('success', 'Manufacturing details updated successfully!');
    }
    public function updateRecipe($id){
        $manufactRecipe=Recipe::find($id); //contain all data of manufact in manufactRecipe object
        return view('Manufacturing/updateRecipe')->with('recipeData',$manufactRecipe);
    
    }
    public function updateRecipe2(Request $request){
        $this->validate($request,[
            'mProduct'=>'required|max:1000|min:3',
            'mRecipe'=>'required|max:1000|min:3',
            'steps'=>'required|max:1000|min:3',
            'pCost'=>'required|numeric' ,
            'mCost'=>'required|numeric' ,
            ]);
        
        $id=$request->id;
        $product=$request->mProduct;
        $recipe=$request->mRecipe; 
        $steps=$request->steps;
        $pCost=$request->pCost;
        $mCost=$request->mCost;
        $updateData2= Recipe::find($id);

        $updateData2->manufacturingProductName=$product;
        $updateData2->recipe=$recipe;
        $updateData2->steps=$steps;
        $updateData2->production_cost=$pCost;
        $updateData2->manufacturing_cost=$mCost;
        $updateData2->total_cost=$pCost+$mCost;
        $updateData2->save();

        $data3 = Recipe::all();
        return redirect('Manufacturing')->with('Recipe1',$data3)->with('success', 'Manufacturing recipe updated successfully!');;
        
    }
   
    public function downloadReport(){
        $RecipeReport = Recipe::all();
        $pdf = PDF::loadView('Manufacturing/RecipeReport',compact('RecipeReport'));
        return $pdf->download('ManufacturingRecipesReport.pdf');
    }
    public function getManufactReport(){
        $RecipeReport = Manufact::all();
        $pdf = PDF::loadView('Manufacturing/ManufactReport',compact('RecipeReport'));
        return $pdf->download('ManufacturingDetailsReport.pdf');
    }
   
}
