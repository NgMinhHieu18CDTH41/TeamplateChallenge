<?php

namespace App\Http\Controllers;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Mail;
use Session;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);
        $categories = Category::with('products')->orderByDesc('id')->get();
        return view('home.products', compact('categories','products'));
    }
   public function search(Request  $request)
   {       
        $search = $request->get('search');
        $products= Product::where('name','like','%'.$search. '%')->paginate(5);
        $categories= Category::all();
        return view('home.products',compact('products','categories'));

   }
    public function show($id)
    {
        $categories = Category::all();
        $products = Product::where('categories_id', $id)->get();
        return view('home.type-products', compact('products','categories'));
    }

    public function cart(){
        $categories= Category::all();
        // $cartItem = Cart::Content()->count();
        $cart = Session::get('cart'); 
       
        return view('cart.cart',compact('cart','categories'));
    }
    public function addToCart($id){
   
   
        // $add=(
        // [
        //     'id' => $pro->id,
        //     'name' => $pro->name,
        //     'quantity' => 1,
        //     'price' => $pro->price,
        //     'options' => ['storage'.str_replace('public', '', $pro->image)],
        // ]);
        $pro = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $categories = Category::all();
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $pro->id,
                "name" => $pro->name,
                "quantity" => 1,
                "price" => $pro->price,
                'options' => ['storage'.str_replace('public', '', $pro->image)],
            ];
        }
        // Cart::add($add);
        Session::put('cart', $cart);

        return back()->with('success','Đã thêm sản phẩm '.$pro->name.' thành công');

    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            if (empty($cart)) return 0;

            $totalPrice = 0;
            foreach ($cart as $key => $item){
                $itemTotalPrice = ($item['price'] * $item['quantity']);
                $totalPrice += $itemTotalPrice;
            }
            $countQty = 0;
            foreach ($cart as $key => $item){
                $countQty += $item['quantity'];
            }
            session()->put('cart', $cart);
            return response()->json([
                'data' => $cart,
                'total'=>$totalPrice,
                'amount'=>$countQty,
                'message' => 'Cập nhật sản phẩm thành công!',
            ]);
        }
    }

    public function removeFromCart( request $request)

    {
       
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success','Đã xóa sản phẩm thành công');;
        }
    }
    // public  function cartdestroy(){
    //     Cart::destroy();
    //     return back();

    // }

}
