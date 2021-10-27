@extends('layouts.app')

@section('content')
<div class="max-full md:max-w-xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="w-full">
        <a href="{{ url('/') }}" class="block mx-auto mb-6" style="max-width: 150px;">
            <h1 class="text-yellow-500 text-5xl" id="logo">Levana</h1>
        </a>
    </div>
    <div class="w-11/12 mx-auto bg-gray-100 rounded-2xl py-3" style="font-family:'Poppins', sans-serif">
        <div class="w-11/12 mx-auto">
            <p class="text-center text-xl font-semibold text-yellow-500" style="font-weight: 600;">New User Registration</p>
            <hr style="height: 1px; background:pink;margin-top: 5px;">
            <div class="py-6 sm:px-0 w-full mx-auto">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div id="togglebar" class="relative w-full mx-auto rounded bg-gray-300">
                      <div class="flex justify-between">
                          <div class="px-2 py-2 w-1/2">
                              <a style="display: block;text-align:center;height:30px;line-height:30px;" class="selected text-sm md:text-md font-semibold" id="client" onclick="registerToggle('client')">Client</a>
                          </div>
                          <div class="px-2 py-2 w-1/2">
                              <a style="display: block;text-align:center;height:30px;line-height:30px;" class="text-sm md:text-md font-semibold" id="escort" onclick="registerToggle('escort')">Escort</a>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <div id="accountAlert" class="text-xs mt-2"><p style="font-weight: 500; font-size:0.9rem;">You are registering as an Client</p></div>
                   <div id="radio-btn">
                    <input type="text" name="account_type" id="account_type" value="client" hidden="">
                  </div>



                    <label class="block mb-8">
                        <input id="full_name" type="text" class="h-10 form-input mt-2 block w-full @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autofocus placeholder="Preferred Name" style="border:1px solid #999; padding:25px 15px;">
                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </label>
                    <label class="block mb-8">
                        <input id="name" type="text" class="h-10 form-input mt-2 block w-full @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Username" style="border:1px solid #999; padding:25px 15px;">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </label>

                  <label class="block mb-8">
                      <input id="email" type="email" class="h-10 form-input mt-2 block w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus placeholder="E-mail" style="border:1px solid #999; padding:25px 15px;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                        </label>
                  <label class="block mb-8">
                      <input id="password" type="password" class="h-10 form-input mt-2 block w-full @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" style="border:1px solid #999; padding:25px 15px;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                        </label>
                  <label class="block mb-2">
                      <input id="password-confirm" type="password" class="h-10 form-input mt-2 block w-full " name="password_confirmation" required autocomplete= "new-password" placeholder="Confirm Password" style="border:1px solid #999; padding:25px 15px;">
                                        </label>

                                        <label class="block mb-4 mt-3" id="gender-selection" style="display: none; ">
                                            <div style="display: flex;justify-content: space-between; align-items: center;flex-direction: row;
                                    flex-wrap: nowrap;align-content: stretch;">
                                <span style="font-family: 'Poppins', sans-serif; color: gray; float: left;font-size: 1rem;">Gender:</span>
                                <input id="gender1" type="radio" name="gender" value="Male" style="font-family: 'Poppins', sans-serif; border:1px solid #999; width: 15px !important; margin-top:0px !important;"><span style="float: left; font-family: 'Poppins', sans-serif; font-size: 1rem;">Male</span>
                                <input id="gender2" type="radio" name="gender" value="Transsexual" style="font-family: 'Poppins', sans-serif; border:1px solid #999; width: 15px !important; margin-top:0px !important;"><span style=" font-family: 'Poppins', sans-serif;float: left;font-size: 1rem;">Transsexual</span>
                                <input id="gender3" type="radio" name="gender" value="Female" style="font-family: 'Poppins', sans-serif; border:1px solid #999; width: 15px !important; margin-top:0px !important;"><span style=" font-family: 'Poppins', sans-serif;float: left;font-size: 1rem;">Female</span>
                            </div>
                        </label>
                        <div>
                            <label class="flex items-center font-bold text-xs">
                                <input type="checkbox" class="form-checkbox" name="agreement" required >
                                <span class="ml-2" style="color: #999; font-size:0.9rem;">I agree to the <span class="text-yellow-500">Terms &amp; Conditions</span></span>
                            </label>
                            <div></div>
                        </div>
                        <div class="flex mt-6 w-4/5 mx-auto">
                            <button type="submit" class="w-full appearance-none text-white text-base font-semibold tracking-wide p-2 rounded bg-yellow-500"> Register </button>
                        </div>
                        <input id="gender0" type="radio" name="gender" hidden checked="checked" value="Male">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function registerToggle(item){
        
        console.log(item);
        $("#togglebar a").removeClass('selected');
        $("#togglebar a#"+item).addClass('selected');
        $("#account_type").val(item);
        if(item=='client'){
            $("div#accountAlert p").text('You are registering as an Client');
            $("#gender-selection").hide();
            $("#gender0").attr('checked','checked');
            }
        else{
            $("div#accountAlert p").text('You are registering as a Escort');
            $("#gender-selection").show();
            $("#gender0").removeAttr('checked');
            }
        }
        
    </script>
@endsection
