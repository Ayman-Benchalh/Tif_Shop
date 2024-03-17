<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Product;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function Laravel\Prompts\password;

class GlobalController extends Controller
{
   public function  firstPage(){
   session()->flush();
    return view('firstpage');
   }
   public function  login(){
      return view('loginpage');
   }
   public function  CreateAccount(){
      return view('CreatAccount');
   }
   public function  loginPost(Request $request){
      $email = $request->email;
      $password = $request->password;
      request()->validate([
         'email'=>['email','required','min:8'],
         'password'=>['required','min:8'],
      ]);
   
      $values=['email'=>$email,'password'=>$password];
      if(Auth::attempt($values)){
         $dataUser = User::where('email',$email)->first();
       
         $datasession =  Session::where('email_User',$dataUser->email)->first();


            session([
               'idUser'=>$dataUser->idUser ,
               'fisrtName'=>$dataUser->fisrtName ,
               'lastName'=>$dataUser->lastName,
               'email'=>$dataUser->email,
            ]);

         // dd(session()->all() ,$datasession );
            if(!$datasession){
               Session::create([
                     'id'=>session()->token(),
                     'user_id'=>session()->get('idUser'),
                     'email_User'=>session()->get('email'),
                     'ip_address'=>request()->ip(),
                     'user_agent'=>request()->userAgent(),
                     'payload'=>request()->getContent(),
                     'last_activity'=>time(),
                     'created_at'=>date('Y-m-d H:i:s'),
                     'updated_at'=>date('Y-m-d H:i:s')
                  ]);


            }else{
                Session::where('email_User',$dataUser->email )->update([
                        'id'=>session()->token(),
                        'user_id'=>session()->get('idUser'),
                        'email_User'=>session()->get('email'),
                        'ip_address'=>request()->ip(),
                        'user_agent'=>request()->userAgent(),
                        'payload'=>request()->getContent(),
                        'last_activity'=>time(),
                        'updated_at'=>date('Y-m-d H:i:s')
                     ]);
            }

            return to_route('shope.page')->with('success','Login success in your Account , verifie your email and validate account');


      }else{
        return back()->withErrors(['error'=>"You don't have account Create One or Password incorecct"]);

      }
     

   }
   public function  CreateAccountPost(Request $request){
      $fisrtName = $request->fisrtName;
      $lastName = $request->lastName;
      $email = $request->email;
      $password = $request->password;


         request()->validate([
                     'fisrtName'=>['required','min:4'],
                     'lastName'=>['required','min:4'],
                     'email'=>['email','min:8','required'],
                     'password'=>['min:8','required'],
         ]);
         
     
      $values=['email'=>$email,'password'=>$password];
 
      if(Auth::attempt($values)){
         return back()->withErrors(['AccountError'=>' Your Have An Account plez Login ']);
      }else{
         User::create([
            'fisrtName'=>$fisrtName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => hash::make($password),
            'email_verfic'=>false
      ]);

            $token=Str::random(64);
             Mail::send('VerfTemp',['token'=>$token,'email'=>$email],
            function($message) use ($request){
               $message->to($request->email);
               $message->subject('verif email');
            });
            session(['varif_token'=>$token]);

         return to_route('login.page')->with('success','Your Account is created seccuss ,check Your email and verif now');
      }

     
   }



   public function shop(){
      $product = Product::all();
      $dataCommanUser = Command::where('idUser',session()->get('idUser'))->count();
      session(['totalCommandUser'=>$dataCommanUser]);

      return view('shopPage' ,['product'=>$product]);
   }
   public function VerfiMail(){

      return view('VerfTemp');
   }
   public function logOUt(){
     
      session()->flush();
      Auth::logout();
      return to_route('login.page');
   }
   public function goToPageVerf($email){
      
      session(['emailVerfi'=>true]);
      if($email==session()->get('email')){
         User::where('email',$email)->update([
            'email_verfic'=>true,
         ]);
         return to_route('login.page')->with('success','your Account is verif , thank your for this ');

      }else{
         return back()->withErrors('error','verif not good ');
      }



   }
   public function About(){

      return view('About');
   }
   public function Contact(){

      return view('Contact');
   }
   public function InserdataView(){

      return view('InsertProduct');
   }
   public function Inserdataprod(Request $request){
      $image=request()->image;
      $nameProd=request()->nameProd;
      $desination=request()->desination;
      $Categories=request()->Categories;
      $prix=request()->prix;
      $stars=request()->stars;

 
     $imageName = time().'.'.$request->image->extension();  
  
     $request->image->move(public_path('images'), $imageName);
 
     $product = new Product();
     $product->imageProd = '/images/'.$imageName;
     $product->nameProd = $nameProd;
     $product->desination = $desination;
     $product->Categories = $Categories;
     $product->prix = $prix;
     $product->stars = $stars;
     $product->save();
      return view('InsertProduct')->with('success',' insert data is success ');
   }

   public function shopSingle($id_Product){
    $data_Prod_One = Product::where('idProduct',$id_Product)->first();
    $get_All_data_Prod = Product::all();
   
        
      return view('SinglPage',['dataProdOne'=>$data_Prod_One,'get_All_data_Prod'=>$get_All_data_Prod]);
   }

   public function bUy(){
  
        $product_size=request()->product_size;
        $product_quanity=request()->product_quanity;
        $idProd=request()->idProd;
        $prix=request()->prix;
        $totalPrix=$prix*$product_quanity;

      Command::create([
         'idProduct'=>$idProd,
         'idUser'=>session()->get('idUser'),
         'quantite'=>$product_quanity,
         'dateCommand'=>date('Y-m-d H:i:s'),
         'statut'=>'not Paid',
         'Size'=>$product_size,
         'TotelPrix'=>$totalPrix,
      ]);
      
      return to_route('shope.page')->with('success','command buy success ');
   }
   public function CartPage(){
      $dataCommandForOneUser=Command::where('idUser',session()->get('idUser'))->get();
      // $dd=Command::findOrFail(5);   
      // dd($dataCommandForOneUser->product->idProduct);
// dd(session()->all());
      return view('CartPage',['dataCommandForOneUser'=>$dataCommandForOneUser]);
      // $command = Command::where('idUser',session()->get('idUser'))->first();
      //   $prod= Product::find($command->idProduct);
      // $products = $command->products->idProduct;
      
     

   
   }



}
