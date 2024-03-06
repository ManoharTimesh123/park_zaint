<ul class="data-table-list list-group list-group-horizontal gap-3 justify-content-between">
	<li class="data-table-list-item list-group-item border-0 p-0 bg-transparent">
		<a class="edit" href="{{$editRoute}}">
			<img
				src="{{ Vite::asset('resources/images/edit.svg') }}"
				alt="edit"
			>
		</a>
	</li>
	<li class="data-table-list-item list-group-item border-0 p-0 bg-transparent">
		<a class="edit" href="{{$viewRoute ? $viewRoute : $editRoute}}">
			<img
				src="{{ Vite::asset('resources/images/view.svg') }}"
				alt="view"
			>
		</a>
	</li>
	<li class="data-table-list-item list-group-item border-0 p-0 bg-transparent">
		<form action="{{$deleteRoute}}" method="POST"
			onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button type="submit" class="p-0 border-0 bg-transparent">
				<img
					src="{{ Vite::asset('resources/images/delete.svg') }}"
					alt="delete"
				>
			</button>
			{{-- <input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" class="btn btn-xs btn-danger" value="Delete"> --}}
		</form>
	</li>
    <li class="data-table-list-item list-group-item border-0 p-0 bg-transparent">
		<a class="edit" href="{{$editRoute}}">
			<img
				src="{{ Vite::asset('resources/images/message.svg') }}"
				alt="message"
			>
		</a>
	</li>
</ul>
