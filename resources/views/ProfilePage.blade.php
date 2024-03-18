@extends('indexPage')
@section('content')
<div class="container m-auto row d-flex justify-content-center align-items-center">
    @if(session()->has('success'))
    <div class="alert alert-success text-center col-12 m-2">
        <strong> Success ! </strong>  {{session()->get('success')}}
    </div> 
    @endif
    <h1 class="col-6 m-5 " style="color: #59ab6e">Profile Client</h1>
<form class="col-6 m-5" method="POST" action="{{ route('EditeProfile.page') }}">
    @csrf
    @method('put')
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div data-mdb-input-init class="form-outline">
        <label class="form-label" for="form6Example1">First name</label>
   
          <input type="text" id="form6Example1" name="Firstname" value="{{ $dataUser->fisrtName }}" class="form-control" />
          
        </div>
      </div>
      <div class="col">
        <div data-mdb-input-init class="form-outline">
        <label class="form-label" for="form6Example2">Last name</label>
          <input type="text" id="form6Example2" name="Lastname"  value="{{ $dataUser->lastName }}" class="form-control" />
        
        </div>
      </div>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form6Example5">Email</label>
      <input type="email" id="form6Example5" name="email" value="{{ $dataUser->email }}" class="form-control" />
    </div>
    @if($dataUser->email_verfic)
        <div class="col-12 mt-3 mb-3 ms-2 text-success d-flex gap-3 align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
              </svg>
          <span>
            Your Account Is Verified
          </span>
        </div>
    @else
        <div class="col-12 mt-3 mb-3 ms-2 text-danger  d-flex gap-3 align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
              </svg>
        <span>
           verified your Account
        </span>
        </div>
          
   
    @endif

    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form6Example6">Password</label>
      <input type="password" id="form6Example6"   name="passwrod" placeholder="New password if you want to change" class="form-control" />
    </div>
    @error('password')<span  style="font-size: 12px; color: crimson">{{ $message }} </span>@enderror
    @if(session()->has('errors'))
    <div class="alert alert-success text-center col-12 m-2">
        <strong> Error ! </strong>
    </div> 
    @endif
   
    <div class="col-12 mt-5 mb-5 d-flex justify-content-center align-items-center gap-3">
        
       
            <button data-mdb-ripple-init type="submit" class="btn btn-success btn-block mb-4 col-6">Edite Profile</button>

        <label for="btndelete" class="btn btn-danger btn-block mb-4 col-6">Delete Profile</label>
    </div>

    
</form>
<form action="{{ route('DeletProfile.page') }}" method="post" style="display: none"  class="col-12 m-5">
    @csrf
    @method('delete')
    <input type="hidden" name="idUser" value="{{ $dataUser->idUser}}">
    <button data-mdb-ripple-init type="submit"id='btndelete' class="btn btn-danger btn-block mb-4 col-6">Delete Profile</button>
</form>

</div>

@endsection
