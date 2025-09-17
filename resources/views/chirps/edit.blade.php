<x-layout>
    <x-slot name="title">Edit Chirp</x-slot>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Chirp</h1>

        <div class="card bg-base-00 shadow mt-8">
            <div class="card-body">
                <form action="{{ route('chirps.update', $chirp->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <textarea name="message" class="textarea textarea-bordered w-full @error('message') textarea-error @enderror"
                            rows="4">{{ old('message', $chirp->message) }}</textarea>

                        @error('message')
                            <span class="text-sm text-error mt-1">{{ $message }}</span>
                        @enderror

                        <div class="card-actions justify-end mt-4">
                            <button type="submit" class="btn btn-primary btn-sm">Update Chirp</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>
