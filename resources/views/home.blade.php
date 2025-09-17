<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Latest Chirps</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="{{ route('chirps.store') }}">
                    @csrf
                    <div class="form-controll w-full">
                        <textarea name="message" id="message" rows="2" placeholder="What's on your mind?"
                            class="textarea textarea-bordered w-full">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <button type="submit" class="btn btn-primary btn-sm">Chirp</button>
                    </div>
                </form>

            </div>
        </div>



        @forelse ($chirps as $chirp)
            <x-chirp :chirp="$chirp" />
        @empty
            <p class="text-gray-500">There are no Chirps yet. Be the first to chirp!</p>
        @endforelse

    </div>
</x-layout>
