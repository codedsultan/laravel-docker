@use("App\Models\Channel")

@extends("layouts.app")

@section("content")
    <div class="flex w-full items-center justify-between px-2 py-1.5">
        <!-- Window actions -->
        <div class="flex gap-x-2">
            <span class="h-3 w-3 rounded-full bg-red-400"></span>

            <span class="h-3 w-3 rounded-full bg-yellow-400"></span>

            <span class="h-3 w-3 rounded-full bg-green-400"></span>
        </div>

        <!-- Controls -->
        <div class="flex w-1/2 items-center gap-x-2">
            <x-icons.back class="w-5 h-5 text-white/20" />

            <x-icons.forward class="w-5 h-5 text-white/20" />

            <x-icons.clock class="h-5 w-5 text-white" />

            <input
                type="search"
                class="w-full rounded bg-white/20 px-3 py-1 text-base text-sm placeholder:text-white"
                placeholder="Search Laravel"
            />
        </div>

        <!-- Help -->
        <form action="{{ route("reset") }}" method="post">
            @method("DELETE")
            @csrf
            <button type="submit">
                <x-icons.question class="h-5 w-5 text-white" />
            </button>
        </form>
    </div>

    <div class="flex w-full">
        <!-- Sidebar -->
        <div class="flex flex-col justify-between py-2 pl-3.5 pr-5">
            <ul class="flex flex-col gap-y-4">
                <li>
                    <img
                        src="{{ asset("images/laravel.png") }}"
                        alt="Avatar"
                        class="h-10 w-10 rounded-md"
                    />
                </li>

                <li
                    class="flex h-10 w-10 items-center justify-center rounded-md bg-white/20 text-white"
                >
                    <x-icons.home class="h-6 w-6" />
                </li>
            </ul>

            <form
                action="{{ route("auth.destroy") }}"
                method="post"
                class="mb-2"
            >
                @csrf
                @method("delete")

                <button type="submit" class="relative">
                    <img
                        src="{{ Auth::user()->avatar }}"
                        alt="{{ Auth::user()->name }}"
                        class="h-10 w-10 rounded-md"
                    />

                    <span class="absolute -bottom-1 -right-1">
                        <span class="flex h-3.5 w-3.5 items-center justify-center rounded-full bg-fuchsia-600">
                            <span class="flex h-2 w-2 rounded-full border bg-green-600 border-green-600"></span>
                        </span>
                    </span>
                </button>
            </form>
        </div>

        <!-- Workspace -->
        {{ $slot }}
    </div>
@endsection
