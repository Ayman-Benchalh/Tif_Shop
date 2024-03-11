@extends('index2')
@section('title')
Login
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
        padding: 15px;
        gap: 10px
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
        color: #252525;
        }

        form {
        max-width: 80%;
        display: flex;
        flex-direction: column;
        gap: 8px;
        }

        form > p {
        text-align: right;
        }

        form > p > a {
        color: #141414;
        font-size: 14px;
        text-decoration: none;
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

      form > button {
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
        .success{
        font-size: 15px;
         color: #ffffff;
          padding:15px;
          background: rgba(17, 232, 13, 0.678);
          border-radius: 10px ;
          text-align: center;
      }
        .error{
        font-size: 15px;
         color: #ffffff;
          padding:15px;
          background: crimson;
          border-radius: 10px ;
          text-align: center;
      }
  
</style>
@endsection
@section('content')
<div class="content">
     <div class="container">
        <div class="left">
          <div class="header">
            <h2 class="animation a1">Login</h2>
            <h4 class="animation a2">Log in to your account using email and password</h4>
          </div>
          @if(session()->has('success'))
          <span class=" animation a2 success" >{{ session()->get('success') }} </span>
          @endif
            @error('error')<span class=" animation a2 error" >{{ $message }}</span>@enderror
          <div class="form">
            <form action="{{ route('loginPost.page') }}" method="POST">
              @csrf
                  <input type="email" class="form-field animation a3" name="email" value="{{ old('email') }}" placeholder="Email Address">
                  @error('email')<span  style="font-size: 12px; color: crimson">{{ $message }} </span>@enderror
                  <input type="password" class="form-field animation a4" name="password" placeholder="Password">
                  @error('password')<span  style="font-size: 12px; color: crimson">{{ $message }} </span>@enderror
                  <button class="animation a6 btn">Sing Up</button>

                  <p class="animation a5 rest"><a href="{{ route('CreateAccount.page') }}">  Create new Accout </a></p>
            </form>
            
          </div>
        </div>

        <div class="right"></div>
      </div>
      
    
</div>
@endsection