<ul style="position: relative;left: -10px;">
@foreach($childs as $child)
			<li style="cursor:pointer;">
				@if(count($child->childs))
					<i class="material-icons" data-id = "0" style="position:absolute;top:2px;left:-5px;">arrow_right</i>
				@endif
				<i class="material-icons category_edit" onclick = "attribute_edit({{$child}});">edit</i>
				<i class="material-icons category_delete" onclick="confirm('{{ __('Are you sure you want to delete?') }}') ? remove_attribute({{$child->id}}) : ''">delete</i>
				{{ $child->title }}
				@if(count($child->childs))
				@include('products.attributes.manageChild',['childs' => $child->childs])
				@endif
			</li>
@endforeach
</ul>