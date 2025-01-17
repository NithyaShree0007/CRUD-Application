
<x-layout>
    <h1 class="title">Request a password reset email</h1>

     {{-- Session Message --}}
     @if (session('status'))
            
     <x-flashMsg msg="{{ session('status') }}" />
     <br> 
    @endif

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('password.request') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
            @csrf  
            
            {{--email--}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" 
                class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
            {{--submit button--}}
            <button class="primary-btn" x-ref="btn">Submit</button>
        </form>
    </div>
</x-layout>