<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    @if (session()->has('success'))
                        <p style="color:red;">{{ session('success') }}</p>
                    @endif
                    @if (session()->has('error'))
                        <p style="color:red;">{{ session('error') }}</p>
                    @endif
                    <form wire:submit.prevent="save">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="email" placeholder="enter email" class="form-control"
                                wire:model.live="email">
                            @error('email')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" placeholder="enter password" class="form-control"
                                wire:model.live="password">
                            @error('password')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div> --}}
                        <div class="form-group">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Role</label>
                            <select class="form-control" wire:model.live="role">
                                <option selected>Choose a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> --}}
                            <button type="submit" class="btn btn-info btn-md">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
