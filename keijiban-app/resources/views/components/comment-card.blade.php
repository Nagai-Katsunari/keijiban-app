@props(['comment' => $comment])

<div class="border-b-2 p-4">
<span class="text-sm font-bold">{{ $comment->user->name }}</span>
   <span class="text-sm text-gray-600">{{ $comment->created_at->toDateTimeString() }}</span>

   <p>{{ $comment->body }}</p>

   @can('delete', $comment)
    <form action="{{ route('comments.destroy', $comment) }}" method="post" class="mt-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">{{ __('Delete') }}</button>
    </form>
    @endcan

    @can('delete', $comment)
    <form action="{{ route('comments.edit',  ['comment' => $comment]) }}" method="post" class="mt-2">
        @csrf

        <button type="submit" class="text-blue-500">{{ __('Edit') }}</button>
    </form>
    @endcan

</div>

