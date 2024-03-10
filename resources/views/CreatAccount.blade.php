@extends('indexPage')
@section('title')
Create Account
@endsection
@section('styline')
<style>
  * { margin: 0;
      padding: 0;
            box-sizing: border-box; }
      @import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


      body {
      font-family: 'Rubik', sans-serif;
      }

      .container {
      display: flex;
      height: 100vh;
      }

      .left {
      overflow: hidden;
      display: flex;
      flex-wrap: wrap;
      flex-direction: column;
      justify-content: center;
      animation-name: left;
      animation-duration: 1s;
      animation-fill-mode: both;
      animation-delay: 1s;
      gap: 15px
      /* background: #1B1A55; */
      }

      .right {
      flex: 1;
      background-color: black;
      transition: 1s;
      background-image: url(https://images.pexels.com/photos/303383/pexels-photo-303383.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      }



      .header > h2 {
      margin: 0;
      color: #252525;
      }

      .header > h4 {
      margin-top: 10px;
      font-weight: normal;
      font-size: 15px;
      color: 252525;
      }

      .form {
      max-width: 80%;
      display: flex;
      flex-direction: column;
      gap: 8px
      }

      .form > p {
         
        text-align: right;
      }

      .form > p > a {
     
      color: #252525;
      font-size: 14px;
      text-decoration: none;
      padding: 15px;
      }

      .form-field {
      height: 46px;
      padding: 0 16px;
      border: 2px solid #dddddd00;
      border-radius: 4px;
      font-family: 'Rubik', sans-serif;
      outline: 0;
      transition: .2s;
      margin-top: 20px;
      background-color: #e8e8e8cf
      }
      .form-field::placeholder{
      color: #141414d6
      }

      .form-field:focus {
      border-color:  #344955;
      }

      .form > button {
      padding: 12px 10px;
      border: 0;
      background: linear-gradient(to right, #344955 0%,#78A083 100%); 
      border-radius: 3px;
      margin-top: 10px;
      color: #fff;
      letter-spacing: 1px;
      font-family: 'Rubik', sans-serif;
      }

      .animation {
      animation-name: move;
      animation-duration: .4s;
      animation-fill-mode: both;
      animation-delay: 2s;
      }

      .a1 {
      animation-delay: 2s;
      }

      .a2 {
      animation-delay: 2.1s;
      }

      .a3 {
      animation-delay: 2.2s;
      }

      .a4 {
      animation-delay: 2.3s;
      }

      .a5 {

      animation-delay: 2.4s;
      }

      .a6 {
      animation-delay: 2.5s;
      }

      @keyframes move {
      0% {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-40px);
      }

      100% {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
      }
      }

      @keyframes left {
      0% {
        opacity: 0;
        width: 0;
      }

      100% {
        opacity: 1;
        padding: 20px 40px;
        width: 440px;
      }

      }
      .btn{
        cursor: pointer;
      }
      .rest a{
        width: 100%;
        color: #232222c7;
        text-decoration: none;
        text-align: right;
        padding: 15px
      }
      .erreur{
        font-size: 15px;
         color: #eee;
          padding:15px;
          background: rgba(220, 20, 60, 0.742);
          border-radius: 10px ;
          text-align: center;
      }
</style>
  
@endsection
@section('content')
<div class="content">

    {{-- <h1>Sing in</h1>
    <form action="{{ route('CreateAccountPost.page') }}" method="post">
        @csrf
        <input type="text" name="firstName" id="firstNam" placeholder="firstName">
        <input type="text" name="lastName" id="LastNam" placeholder="lastName">
        <input type="email" name="email" id="email" placeholder="Your Email">
        <input type="password" name="password" id="password" placeholder="Your password">
        <button type="submit"> Create Now </button>
    </form> --}}
    <div class="container">
        <div class="left">
          <div class="header">
            <h2 class="animation a1">Create Account</h2>
            <h4 class="animation a2">sing up email and password</h4>
          </div>
        
         
          @error('AccountError')<span class="animation a2 erreur" >{{ $message }} </span>@enderror   
            <form action="{{ route('CreateAccountPost.page') }}" method="post">
                @csrf
                <div class="form">
                <input type="text" class="form-field animation a3" required name="fisrtName" value="{{ old('firstName') }}" placeholder="First Name">
                <input type="text" class="form-field animation a3" required    name="lastName" value="{{ old('LastName') }}" placeholder="Last Name">
                <input type="email" class="form-field animation a3" name="email" value="{{ old('email') }}" placeholder="Email Address">
                @error('email')<span  style="font-size: 12px; color: crimson">{{ $message }} </span>@enderror
                <input type="password" class="form-field animation a4" name="password" placeholder="Password">
                 @error('password')<span style="font-size: 12px; color: crimson">{{ $message }} </span>@enderror
                <button class="animation a6">LOGIN</button> 
               
                <p class="animation a5"><a href="{{ route('login.page') }}">Login In your Account</a></p>
              </div>
              
            </form> 

   
 
    
          
        
        </div>
        <div class="right"></div>
      </div>
      
    
</div>
@endsection