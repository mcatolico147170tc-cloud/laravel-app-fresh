<x-layout>
    <div class="min-h-screen bg-black text-green-400 font-mono p-6">

        <!-- TERMINAL CONTAINER -->
        <div class="max-w-5xl mx-auto border border-green-500 p-6 bg-black relative">

            <!-- fake scanline overlay -->
            <div class="pointer-events-none absolute inset-0 opacity-10 
                bg-[linear-gradient(#00ff9c_1px,transparent_1px)] 
                bg-[size:100%_3px]"></div>

            <!-- HEADER -->
            <div class="mb-8">
                <h1 class="text-2xl uppercase tracking-widest">
                    [ CENTRAL REGISTRY TERMINAL ]
                </h1>
                <p class="text-xs text-green-600">
                    STATUS: ACTIVE • SURVEILLANCE: ENABLED • NODE: 03
                </p>
            </div>

            <!-- FORM -->
            <form action="/user-registration" method="POST"
                class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                @csrf

                <!-- INPUT TEMPLATE -->
                <div>
                    <label class="block text-green-600 text-xs mb-1">FIRST_NAME</label>
                    <input type="text" name="first-name"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:outline-none focus:bg-green-500 focus:text-black transition"
                        autocomplete="off" required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">LAST_NAME</label>
                    <input type="text" name="last-name"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">MIDDLE_ID</label>
                    <input type="text" name="middle-name"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">ALIAS_TAG</label>
                    <input type="text" name="nickname"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black"
                        required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-green-600 text-xs mb-1">EMAIL_NODE</label>
                    <input type="email" name="email"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">! VALIDATION_ERROR</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">AGE_VALUE</label>
                    <input type="number" name="age"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">CONTACT_ID</label>
                    <input type="text" name="contact-number"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black"
                        required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-green-600 text-xs mb-1">LOCATION_STRING</label>
                    <input type="text" name="address"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black"
                        required>
                </div>

                <!-- BUTTON -->
                <div class="md:col-span-2 mt-4">
                    <button type="submit"
                        class="w-full border border-green-500 py-2 hover:bg-green-500 hover:text-black transition uppercase tracking-widest">
                        EXECUTE REGISTRATION
                    </button>
                </div>
            </form>

            <!-- TABLE -->
            <div class="mt-12 border border-green-500">

                <div class="p-3 border-b border-green-500 text-sm uppercase">
                    [ REGISTERED SUBJECTS ]
                </div>

                <table class="w-full text-xs">
                    <thead class="text-green-600 border-b border-green-500">
                        <tr>
                            <th class="p-2 text-left">ID</th>
                            <th class="p-2 text-left">IDENTITY</th>
                            <th class="p-2 text-left">ALIAS</th>
                            <th class="p-2 text-left">NODE</th>
                            <th class="p-2 text-left">AGE</th>
                            <th class="p-2 text-left">CONTACT</th>
                            <th class="p-2 text-left">LOCATION</th>
                            <th class="p-2 text-left">CMD</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-green-900">
                        @forelse ($users as $user)
                            <tr class="hover:bg-green-900/20">

                                <td class="p-2">#{{ $user->id }}</td>

                                <td class="p-2">
                                    {{ $user['first-name'] }} {{ $user['last-name'] }}
                                    <div class="text-green-700 text-[10px]">
                                        {{ $user['middle-name'] }}
                                    </div>
                                </td>

                                <td class="p-2 text-green-300">
                                    {{ $user['nickname'] }}
                                </td>

                                <td class="p-2">{{ $user->email }}</td>

                                <td class="p-2">{{ $user->age }}</td>

                                <td class="p-2 font-mono">
                                    {{ $user['contact-number'] }}
                                </td>

                                <td class="p-2 truncate max-w-[150px]">
                                    {{ $user->address }}
                                </td>

                                <td class="p-2 flex gap-2">

                                    <a href="/user-registration/{{ $user->id }}/edit"
                                        class="border border-green-500 px-2 hover:bg-green-500 hover:text-black">
                                        EDIT
                                    </a>

                                    <form action="/user-registration/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="border border-red-500 text-red-400 px-2 hover:bg-red-500 hover:text-black">
                                            PURGE
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="p-6 text-center text-green-700 uppercase">
                                    NO SUBJECTS DETECTED
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-layout>