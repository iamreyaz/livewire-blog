<div>
    @if ($check == true)
        <div class="container z-10">
            <div class="flex flex-wrap mt-0 -mx-3">
                <div class="">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                            <h3
                                class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">
                                Admin</h3>
                            <p class="mb-0">Enter all details carefully during fill the form</p>
                        </div>
                        @if (session()->has('success'))
                            <p style="color:green;">{{ session('success') }}</p>
                        @endif
                        <div class="flex-auto p-6">
                            <form wire:submit.prevent="save">
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Name</label>
                                <div class="mb-4">
                                    <input type="text"
                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                        placeholder="Name" aria-label="Name" aria-describedby="email-addon"
                                        wire:model.live="name" />
                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                                <div class="mb-4">
                                    <input type="email"
                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                        placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                        wire:model.live="email" />
                                    @error('email')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                                <div class="mb-4">
                                    <input type="password"
                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                        placeholder="Password" aria-label="Password" aria-describedby="password-addon"
                                        wire:model.live="password" />
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Mobile No</label>
                                <div class="mb-4">
                                    <input type="number"
                                        class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                        placeholder="Mobile No" aria-label="Mobile No" aria-describedby="mobile-addon"
                                        wire:model.live="mobile" />
                                    @error('mobile')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Role</label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    wire:model.live="role">
                                    <option selected>Choose a role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <div class="text-center">
                                    <button type="submit"
                                        class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <livewire:dashboard />
    @endif
</div>
