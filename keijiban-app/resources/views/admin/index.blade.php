<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('管理画面') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8 grid gap-y-2">
    @if ($threads->count())
        @foreach ($threads as $thread)
            <x-admin-card :thread="$thread" />
        @endforeach
    @else
        There is no thread.
    @endif
  </div>
</x-app-layout>
