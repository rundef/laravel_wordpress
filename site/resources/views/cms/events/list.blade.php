@extends('admin_layout')
 

@section('scripts')
	@parent

	<script type="text/javascript">
		(function($) {
			$(document).ready(function () {
			    $('#confirmDelete').on('show.bs.modal', function (e) {
					var form = $(e.relatedTarget).parents('tr').find('.form-delete');
					$(this).find('.modal-footer #confirm').data('form', form);
				});

				$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
					$(this).data('form').submit();
				});
			});
		})(jQuery);
	</script>
@endsection


@section('content')
	<div class="wrap">
		<h2>
			Events <a href="{{ crud_url('events', 'cms/event/create') }}" class="add-new-h2">Add</a>
		</h2>

		@if (Session::has('message'))
			<div id="message" class="updated notice notice-success is-dismissible below-h2">
				<p>{{ Session::get('message') }}</p>
				<button type="button" class="notice-dismiss">
					<span class="screen-reader-text">Dismiss this message.</span>
				</button>
			</div>
		@endif

		<ul class="subsubsub">
			<?php $i = 1; ?>
			@foreach($all_status as $key => $st)
				<li>
					<a href="{{ crud_url('events', 'cms/events/filter', ['status' => $key]) }}" @if($status == $key) class="current" @endif>{!! $st['label'] !!} 
					<span class="count">({{ $st['count'] }})</span></a>
					@if($i < count($all_status))
						|
					@endif
				</li>
				<?php $i++; ?>
			@endforeach
		</ul>


		<form method="POST" action="{{ crud_url('events', 'cms/events') }}" class="form-inline">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<p class="search-box">
				<label class="screen-reader-text" for="post-search-input">Search events:</label>
				<input type="search" id="post-search-input" name="search" value="{{ Session::get('cms_events_search') }}">
				<input type="submit" id="search-submit" class="button" value="Search events">
			</p>


			<div class="tablenav top">
				<div class="tablenav-pages">
					@include('cms.common.pagination', ['paginator' => $paginator])
				</div>
			</div>
		</form>


		@if(count($events) == 0)
			<p>No event found</p>
		@else
			<table class="wp-list-table widefat fixed striped posts">
				<thead>
					<tr>
						<th>Name</th>
						<th>Visibility</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($events as $event)
						<tr>
							<td>
								<strong>
									@if(!$event->trashed())
										<a class="row-title" href="{{ crud_url('events', 'cms/event/'.$event->id.'/edit') }}" title="Edit">
									@endif

									{{ $event->name }}

									@if(!$event->trashed())
										</a>
									@endif
								</strong>
						

								<div class="row-actions">
									@if($event->trashed())
										<span class="untrash">
											<a href="{{ crud_url('events', 'cms/event/'.$event->id.'/untrash') }}" title="Undelete this item">Undelete</a>
										</span>
									@else
										<span class="edit">
											<a href="{{ crud_url('events', 'cms/event/'.$event->id.'/edit') }}" title="Edit this item">Edit</a> | 
										</span>
										<span class="trash">
											<a class="submitdelete" title="Delete this item" href="javascript:;" data-toggle="modal" data-target="#confirmDelete">Delete</a>
										</span>
									@endif
								</div>

								{!! Form::open(['class' => 'form-inline form-delete', 'style' => 'display:none', 'method' => 'POST', 'url' => crud_url('events', 'cms/event/'.$event->id.'/delete')]) !!}
			                    {!! Form::close() !!}
							</td>
							
							<td><span class="glyphicon glyphicon-{{ $event->active ? 'ok' : 'remove' }}"></span></td>

							<td>
								@if($event->start_date == $event->end_date)
									On {{ strftime('%b %e %Y', strtotime($event->start_date)) }}
								@else
									From {{ strftime('%b %e %Y', strtotime($event->start_date)) }} to {{ strftime('%b %e %Y', strtotime($event->end_date)) }}
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>


			<div class="tablenav bottom">
				<form method="POST" action="{{ crud_url('events', 'cms/events') }}" class="form-inline">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />

					<div class="tablenav-pages">
						@include('cms.common.pagination', ['paginator' => $paginator])
					</div>
				</form>
			</div>
		@endif
	</div>


	<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Delete confirmation</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this event ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-danger" id="confirm">Delete</button>
				</div>
			</div>
		</div>
	</div>
@endsection