@props(['thread' => $thread])

<div class="p-4 block grid bg-white sm:rounded-lg border-1 shadow-sm">

    <span>
            {{  $thread->user->name }}
    </span>

    <span>
            {{ $thread->title }}
    </span>

    <form action="{{ route('admin.destroy', $thread) }}" method="post" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">{{ __('Delete') }}</button>
    </form>

</div>



