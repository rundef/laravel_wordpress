@extends('admin_layout')
 

@section('scripts')
	@parent


	<script type="text/javascript">
		var MEDIA_DELETE_TARGET = null;

		(function($) {
			$(document).ready(function () {
				$('.date-picker').datepicker({
			        autoclose: true,
			        format: 'yyyy-mm-dd',
			    });
			});
		})(jQuery);
	</script>
@endsection


@section('content')
	<div class="wrap" id="poststuff">
		<h2>Edit an event</h2>

		<div id="entity-edit-container">
			<div id="post-body">
				{!! Form::model($event, ['method' => 'POST', 'url' => crud_url('events', 'cms/event/'.$event->id.'/edit')]) !!}
			        @include('cms/events/partials/_form', ['event' => $event])
			    {!! Form::close() !!}
		    </div>
		</div>
	</div>
@endsection

