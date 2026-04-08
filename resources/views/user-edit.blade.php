<x-layout>
    <div class="min-h-screen bg-black text-green-400 font-mono p-6">

        <div class="max-w-2xl mx-auto border border-green-500 p-6 bg-black relative">

            <!-- scanlines -->
            <div class="pointer-events-none absolute inset-0 opacity-10 
                bg-[linear-gradient(#00ff9c_1px,transparent_1px)] 
                bg-[size:100%_3px]"></div>

            <!-- HEADER -->
            <div class="mb-8">
                <h1 class="text-xl uppercase tracking-widest">
                    [ MODIFY SUBJECT RECORD ]
                </h1>
                <p class="text-xs text-green-600">
                    TARGET ID: {{ $user->id }} • STATUS: TRACKED • ACCESS LEVEL: AUTHORIZED
                </p>
            </div>

            <!-- BOOT LOG -->
            <div class="text-xs text-green-700 mb-6">
                > Fetching subject data...<br>
                > Record located.<br>
                > Editing privileges granted.<br>
            </div>

            <!-- FORM -->
            <form action="/user-registration/{{ $user->id }}" method="POST"
                class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                @csrf
                @method("PATCH")

                <div>
                    <label class="block text-green-600 text-xs mb-1">FIRST_NAME</label>
                    <input type="text" name="first-name"
                        value="{{ $user['first-name'] }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">LAST_NAME</label>
                    <input type="text" name="last-name"
                        value="{{ $user['last-name'] }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">MIDDLE_ID</label>
                    <input type="text" name="middle-name"
                        value="{{ $user['middle-name'] }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">ALIAS_TAG</label>
                    <input type="text" name="nickname"
                        value="{{ $user->nickname }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-green-600 text-xs mb-1">EMAIL_NODE</label>
                    <input type="email" name="email"
                        value="{{ $user->email }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">AGE_VALUE</label>
                    <input type="number" name="age"
                        value="{{ $user->age }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <div>
                    <label class="block text-green-600 text-xs mb-1">CONTACT_ID</label>
                    <input type="text" name="contact-number"
                        value="{{ $user['contact-number'] }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-green-600 text-xs mb-1">LOCATION_STRING</label>
                    <input type="text" name="address"
                        value="{{ $user->address }}"
                        class="w-full bg-black border border-green-500 px-2 py-1 focus:bg-green-500 focus:text-black outline-none"
                        required>
                </div>

                <!-- ACTIONS -->
                <div class="md:col-span-2 mt-6 space-y-3">

                    <button type="submit"
                        class="w-full border border-green-500 py-2 hover:bg-green-500 hover:text-black transition uppercase tracking-widest">
                        EXECUTE UPDATE
                    </button>

                    <a href="/user-registration"
                        class="block text-center border border-red-500 text-red-400 py-2 hover:bg-red-500 hover:text-black transition uppercase tracking-widest">
                        ABORT / RETURN
                    </a>

                </div>
            </form>

        </div>
    </div>
</x-layout>