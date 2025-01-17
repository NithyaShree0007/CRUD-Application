
<x-layout>
    <h1 class="title">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register')}}" method="post" x-data="formSubmit" @submit.prevent="submit">
            @csrf  
            {{--username--}}
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" class="input @error('name') ring-red-500 @enderror">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{--email--}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{--password--}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{--confirm password--}}
            <div class="mb-8">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="input @error('password') ring-red-500 @enderror">
            </div>

            <div class="mb-4">
                <input type="checkbox" name="subscribe" id="subscribe">
                <label for="subscribe">Subscribe to our newsletter</label>
            </div>

            {{--submit button--}}
            <button class="primary-btn" x-ref="btn">Register</button>
        </form>
    </div>
</x-layout>