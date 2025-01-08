@extends('components.layouts.main')

@section('container')
    <section>
        <div class="container flex flex-col mx-auto bg-white rounded-lg px-5 pt-10 md:px-8 md:pt-40">
            @if (session('success'))
                <div class="relative bg-green-100 border-t-4 border-green-500 text-teal-900 px-4 py-3 shadow-md w-full sm:w-[400px] md:w-[500px] mx-auto rounded-2xl mb-6 mt-5"
                    role="alert">
                    <div class="flex justify-between items-center">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg>
                            </div>
                            <div>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                        <button type="button"
                            class="absolute top-0 right-0 mt-2 mr-2 text-teal-500 hover:text-teal-700 focus:outline-none"
                            onclick="this.parentElement.parentElement.style.display='none';">
                            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M10 9l5-5 1 1-5 5 5 5-1 1-5-5-5-5 1-1 5 5z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @if (session('failed'))
                <div class="relative bg-red-100 border-t-4 border-red-500 text-white-900 px-4 py-3 shadow-md w-full sm:w-[400px] md:w-[500px] mx-auto rounded-2xl mb-6 mt-5"
                    role="alert">
                    <div class="flex justify-between items-center">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg>
                            </div>
                            <div>
                                <p>{{ session('failed') }}</p>
                            </div>
                        </div>
                        <button type="button"
                            class="absolute top-0 right-0 mt-2 mr-2 text-teal-500 hover:text-teal-700 focus:outline-none"
                            onclick="this.parentElement.parentElement.style.display='none';">
                            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M10 9l5-5 1 1-5 5 5 5-1 1-5-5-5-5 1-1 5 5z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5">
                <div class="flex items-center justify-center w-full lg:p-12">
                    <div class="flex items-center xl:p-10">
                        <form action="{{ route('login-admin') }}" method="POST"
                            class="flex flex-col w-full sm:w-[400px] md:w-[500px] h-full pb-6 pt-6 text-center bg-white rounded-3xl">
                            @csrf
                            <h3 class="mb-3 text-3xl sm:text-4xl font-extrabold text-blue-500">GovCall Login Admin</h3>
                            <p class="mb-4 text-grey-700">Enter your email and password</p>

                            <div class="flex items-center mb-3">
                                <hr class="h-0 border-b border-solid border-grey-500 grow">
                            </div>
                            <label for="email" class="mb-2 text-sm sm:text-base text-start text-grey-900">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                placeholder="mail@mail.com"
                                class="flex items-center px-5 py-4 mb-3 text-sm sm:text-base font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('email') border-red-500 @else @enderror">
                            @error('email')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror
                            <label for="password"
                                class="mb-2 text-sm sm:text-base text-start text-grey-900">Password</label>
                            <input id="password" name="password" type="password" placeholder="Enter your password"
                                class="flex items-center px-5 py-4 mb-3 text-sm sm:text-base font-medium outline-none focus:bg-white placeholder:text-grey-700 bg-slate-100 text-dark-grey-900 rounded-2xl border @error('password') border-red-500 @else @enderror">
                            @error('password')
                                <span class="text-sm text-red-500 text-left block">{{ $message }}</span>
                            @enderror

                            <button type="submit"
                                class="px-6 py-5 mb-5 text-sm sm:text-base font-bold leading-none text-white transition duration-300 rounded-2xl hover:bg-[#003080] focus:ring-4 focus:ring-blue-500/50 bg-blue-500">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
