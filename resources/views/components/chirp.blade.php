@props(['chirp'])
<div class="card bg-base-100 shadow mt-2">

    <div class="card-body">
        <div class="flex space-x-3">
            <div class="avatar">
                <div class="size-12 rounded-full">
                    <img class="rounded-full" src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                        alt="{{ $chirp->user->name }}'s avatar" />
                </div>
            </div>

            <div class="min-w-0 flex-1">
                <div class="flex justify-between items-center w-full">
                    <div class="flex items-center gap-1">
                        <span class="font-semibold text-sm">{{ $chirp->user->name }}</span>
                        <span class="text-base-content/60"> . </span>
                        <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                        @if ($chirp->updated_at->gt($chirp->created_at->addMinutes(5)))
                            <span class="text-base-content/60">.</span>
                            <span class="text-base-content/60 text-sm italic">edited</span>
                        @endif
                    </div>
                    @can('update', $chirp)
                        <div class="flex gap-1">
                            <a href="{{ route('chirps.edit', $chirp->id) }}" class="btn btn-ghost btn-xs">Edit</a>
                            <form method="POST" action="{{ route('chirps.destroy', $chirp->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-ghost btn-xs text-error">Delete</button>
                            </form>
                        </div>
                    @endcan
                </div>
                <p class="mt-1">{{ $chirp->message }}</p>
            </div>
        </div>
    </div>

</div>
