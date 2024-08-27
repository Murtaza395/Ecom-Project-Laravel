<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function view_category(){
        $category = Category::orderBy("id","desc")->paginate(5);
        return view("admin.category",[
            "category"=> $category
        ]);
    }
    public function add_category(Request $request){
        
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        toastr()->closeButton()->addSuccess("Category added successfully");
        return redirect()->route('view.category')->with('success','category added successfully');
    }
    public function edit($id){
        $cat = Category::findOrFail($id);
        return view('admin.EditCategories',[
            'cat'=> $cat
        ]);
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'category_name'=>'required|min:4'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('view.category')->with('success','Category updated successfully');

    }
    public function delete($id,Request $request){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('view.category')->with('success','Category deleted successfully');
    }   
    public function add_product(){
        $category= Category::all();
        return view('admin.add_product',[
            'category'=> $category,
        ]);
    }
    public function upload_product(Request $request){
        $rules=[
                'title'=> 'required|min:5',
                'description'=>'required',
                'price'=>'required|numeric',
                'quantity'=>'required|numeric',
                'category'=>'required'
            ];
            if(!empty($request->image)){
                $rules['image'] = 'image';
            }

    $validator = Validator::make($request->all(), $rules);
    if($validator ->fails()){
        return redirect()->route('addProduct')->withInput()->withErrors($validator);
    }
    $category = new Product();
    $category->title = $request->title;
    $category->description = $request->description;
    $category->price = $request->price;
    $category->quantity = $request->quantity;
    $category->category = $request->category;
    $category->save();

    $image=$request->image;
    $ext=$image->getClientOriginalExtension();
    $imageName=time().'.'.$ext;
    $image->move(public_path('uploads/products/'), $imageName);
    $category->image = $imageName;
    $category->save();
    return redirect()->route('addProduct')->with('success','Product uploaded successfully');
}
    public function showProducts(Request $request){
        $search=$request->search;
        $products =Product::where('title','LIKE','%'.$search.'%')->orderBy('created_at','desc');
        $products=$products->paginate(5);
        return view("admin.showProducts",[
            'products'=> $products,
        ]);
    }
    public function editProducts($id){
        $pro = Product::findorFail($id);
        $cat=Category::all();
        return view('admin.editProducts',[
            'pro'=>$pro,
            'cat'=>$cat
        ]);
    }
    public function guestUsers(){
        $guest = Contact::all();
        return view('admin.guest',[
            'guest'=>$guest,
        ]);
    }

    Public function updateProducts($id, Request $request){
        $rules=
            [
                'title'=> 'required|min:4',
                'description'=> 'required|min:5',
                'price'=> 'required|numeric',
                'quantity'=>'required|numeric',
                'category'=> 'required',
    
            ];
        if(!empty($request->image)){
            $rules['image']='image';
        }
        $validator = VAlidator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('showProduct')->withErrors($validator)->withInput();
        }
        $product = Product::findorFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category; 
        $product->save();

        if(!empty($request->image)){
        File::delete(public_path('uploads/products/'.$product->image));
        $image=$request->image;
        $ext=$image->getClientOriginalExtension();
        $imageName=time().'.'.$ext;
        $image->move(public_path('uploads/products/'), $imageName);
        $product->image = $imageName;
        $product->save();
    }
    return redirect()->route('showProduct')->with('success','Product updated successfully');

   
    }
    public function destroyProducts($id){
       $product= Product::findorFail($id);
       $product ->delete();
       return redirect()->route('showProduct')->with('success','Product Deleted Successfully');
    }
    public function viewOrders(){
        $order = Order::orderBy('created_at','desc')->paginate(2);
        return view('admin.order',[
            'order'=> $order
        ]);
    }
    public function ontTheWay($id){
        $place_order=Order::findorFail($id);
        $place_order->status='on the way';
        $place_order->save();
        return redirect()->route('viewOrders');
    }
    public function delivered($id){
        $place_order=Order::findorFail($id);
        $place_order->status='Delivered';
        $place_order->save();
        return redirect()->route('viewOrders');
    }
    public function printPDF($id){
        $data = Order::findOrFail($id);
        $pdf = Pdf::loadView('admin.invoice',[
            'data'=> $data
        ]);
        return $pdf->download('invoice.pdf',);
    }
    public function viewUsers(){
        $usr= User::where('usertype','user')->get();
        return view('admin.totalusers',[
            'usr'=> $usr,
        ]);
    }
    public function deleteUsers($id){
        $usr= User::findOrFail($id);
        $usr->delete();
    }
    public function changePass($id){
        User::findOrFail($id);
        return view('admin.reset');
    }
    public function resetPassword($id,Request $request){
        $validator = Validator::make($request->all(),[
            'current_password'=>'required',
            'new_password'=>'required',
            'password_confirmation'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user= User::findOrFail($id);
        if(Hash::make($request->password==$user->password && $request->new_password==$request->password_confirmation)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect()->back()->with('success', 'Password updated successfully.'); 
        }
        else{
            return redirect()->back();
        }
 
    }

}
