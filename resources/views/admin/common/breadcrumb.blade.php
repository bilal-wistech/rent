@php 
		$breadcrumb = Route::current()->uri();
	$breadcrumbs = array(
		'admin/dashboard' => array('admin/dashboard' => 'Dashboard'),
		'admin/profile' => array('admin/profile' => 'Profile'),
		'admin/users' => array('admin/users' => 'Users'),
		'admin/add_user' => array('admin/users' => 'Users', 'admin/add_user' => 'Add User'),
		'admin/edit_user' => array('admin/users' => 'Users', 'admin/edit_user' => 'Edit User'),
		'admin/addons' => array('admin/addons' => 'Addons'),
	);

	$breadcrumb = isset($breadcrumbs[$breadcrumb]) ? $breadcrumbs[$breadcrumb] : '';
@endphp

<ol class="breadcrumb float-end mb-4"
	style="font-size: 1rem; padding: 0.5rem 1rem; background-color : transparent; border-radius: 0.25rem; margin: 0;">
	<li class="breadcrumb-item">
		<a href="{{ url('admin/dashboard') }}" class="text-dark">
			<i class="fa fa-dashboard pr-1"></i> Home
		</a>
	</li>
	@if (is_array($breadcrumb))
		@php $i = 1;
		$cnt = count($breadcrumb); @endphp
		@foreach ($breadcrumb as $key => $value)
			@if ($cnt == $i)
				<li class="breadcrumb-item active" aria-current="page">{{ $value }}</li>
			@else
				<li class="breadcrumb-item">
					<a href="{{ url($key) }}">{{ $value }}</a>
				</li>
			@endif
			@php $i++; @endphp
		@endforeach
	@endif
</ol>