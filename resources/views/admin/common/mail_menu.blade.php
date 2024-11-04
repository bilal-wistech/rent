<div class="mb-3">
	<div class="text-dark w-100">
		<strong>Email Template Management</strong>
	</div>
	<div class="p-0">
		<ul class="nav flex-column nav-pills">
			@if(Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_email_template'))
				@php
					$templates = [
						'1' => 'Account Info Default Update',
						'2' => 'Account Info Update',
						'3' => 'Account Info Delete',
						'4' => 'Booking',
						'5' => 'Email Confirm',
						'6' => 'Forget Password',
						'7' => 'Need Payment Account',
						'8' => 'Payout Sent',
						'9' => 'Booking Cancelled',
						'10' => 'Booking Accepted/Declined',
						'11' => 'Booking Request Send',
						'12' => 'Booking Confirmation',
						'13' => 'Property Booking Notify',
						'14' => 'Property Booking Payment',
						'15' => 'Payout Request Received',
						'16' => 'Property Listing Approve',
						'17' => 'Payout Request Approved'
					];
				@endphp
				@foreach($templates as $key => $name)
					<li class="nav-item">
						<a href="{{ url("admin/email-template/$key") }}"
						   class="nav-link {{ isset($list_menu) && $list_menu == 'menu-' . $key ? ' selected' : 'text-dark' }}">
							{{ $name }}
						</a>
					</li>
				@endforeach
			@endif
		</ul>
	</div>
</div>

<style>
	.nav-link.selected {
		position: relative;
		font-weight: bold;
	}

	.nav-link.selected::after {
		content: '';
		position: absolute;
		bottom: -4px;
		left: 0;
		width: 100%;
		height: 2px;
		background-color: #007bff; /* Customize the color to match your theme */
		border-radius: 2px;
	}
</style>
