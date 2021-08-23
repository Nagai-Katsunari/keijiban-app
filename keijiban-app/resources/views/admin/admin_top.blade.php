@extends('layouts.admin')


<div class="container">
	<div class="card">
		<div class="card-header">管理側TOP</div>
		<div class="card-body">
			<div>
            @if ($threads->count())
                @foreach ($threads as $thread)
                    <x-admin-card :thread="$thread" />
                @endforeach
            @else
                There is no thread.
            @endif
			</div>

			<form method="post" action="{{ url('admin/logout') }}">
				@csrf
				<input type="submit" class="btn btn-danger" value="ログアウト" />
			</form>
		</div>
	</div>
</div>

