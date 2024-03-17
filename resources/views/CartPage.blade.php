@extends('indexPage')
@section('title')
    Tif_SHop
@endsection

@section('styline')
        <link rel="stylesheet" href=" {{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/templatemo.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">


        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="{{ url('assets/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
      
        .snippet-body{
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            display: flex;
            font-family: sans-serif;
            font-size: 0.8rem;
            font-weight: bold;
        }
       
        .title{
            margin-bottom: 5vh;
        }
        .card{
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }
        @media(max-width:767px){
            .card{
                margin: 3vh auto;
            }
        }
        .cart{
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }
        @media(max-width:767px){
            .cart{
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }
        .summary{
            background-color: #59ab6e;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(0, 0, 0);
  
        }
        @media(max-width:767px){
            .summary{
            border-top-right-radius: unset;
            border-bottom-left-radius: 1rem;
            }
        }
        .summary .col-2{
            padding: 0;
        }
        .summary .col-10
        {
            padding: 0;
        }.row{
            margin: 0;
        }
        .title b{
            font-size: 1.5rem;
        }
        .main{
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }
        .col-2, .col{
            padding: 0 1vh;
        }
        a{
            padding: 0 1vh;
        }
        .close{
            margin-left: auto;
            font-size: 0.7rem;
        }
        img{
            width: 3.5rem;
        }
        .back-to-shop{
            margin-top: 4.5rem;
        }
        h5{
            margin-top: 4vh;
        }
        hr{
            margin-top: 1.25rem;
        }
        form{
            padding: 2vh 0;
        }
        select{
            border: none;
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            border-radius: 8px;
            background-color: rgb(247, 247, 247);
        }
        input{
            border: none;
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            border-radius: 8px;
            background-color: rgb(247, 247, 247);
        }
        input:focus::-webkit-input-placeholder
        {
              color:transparent;
        }
        .btn{
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }
        .btn:focus{
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none; 
        }
        .btn:hover{
            color: white;
        }
        a{
            color: black; 
        }
        a:hover{
            color: black;
            text-decoration: none;
        }
         #code{
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }  </style> 
@endsection
@section('content') 
<div class="snippet-body">
     <div class="card">
         <div class="row">
             <div class="col-md-8 cart">
                 <div class="title">
                     <div class="row">
                         <div class="col"><h4><b>Shopping Cart</b></h4></div>
                         <div class="col align-self-center text-right text-muted">{{ session()->get('totalCommandUser')}} items</div>
                     </div>
                 </div>  
                 {{-- {{ $dataCommandForOneUser->product}} --}}
                 
                 @php $totalPrix = 0 @endphp
                 @foreach ($dataCommandForOneUser as $datacomd)
                     <div class="row border-top border-bottom">
                       
                         @php $totalPrix  += $datacomd->TotelPrix @endphp 
                        <div class="row main align-items-center">
                                <div class="col-2"><img class="img-fluid" src="{{ $datacomd->product->imageProd }}"></div>
                                <div class="col">
                                    <div class="row text-muted">Prod Type</div>
                                    <div class="row">{{ $datacomd->product->nameProd}}</div>
                                </div>
                                <div class="col">
                                    <a href="#" class="border">{{ $datacomd->quantite}}</a>
                                </div>
                                <div class="col">&dollar;{{$datacomd->TotelPrix}}  <span class="close">&#10005;</span></div>
                            </div>
                    
                            
                    </div>
                
                 @endforeach  
                    

                 <div class="back-to-shop"><a href="{{ route('shope.page') }}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
             </div>
             <div class="col-md-4 summary">
                 <div><h5><b>Summary</b></h5></div>
                 <hr>
                 <div class="row">
                     <div class="col" style="padding-left:0;">ITEMS 3</div>
                     <div class="col text-right">&dollar;{{ $totalPrix }}</div>
                 </div>
                 <form>
                     <p>SHIPPING</p>
                     <select><option class="text-muted">Standard-Delivery- &dollar;5.00</option></select>
                     @php
                         $totalPrix+=5
                     @endphp
                     <p>GIVE CODE</p>
                     <input id="code" placeholder="Enter your code">
                 </form>
                 <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                     <div class="col">TOTAL PRICE</div>
                     <div class="col text-right">&dollar;{{ $totalPrix }}</div>
                 </div>
                 <button class="btn">CHECKOUT</button>
             </div>
         </div>
         
     </div> 
    
</div>
 

  

@endsection