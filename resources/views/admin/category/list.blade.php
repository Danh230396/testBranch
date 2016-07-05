@foreach($categories AS $category)
	{{ $category['name'] }}<br />
	{{ $category['description'] }}<br /><hr />
@endforeach