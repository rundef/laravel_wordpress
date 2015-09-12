@extends('admin_layout')
 

@section('scripts')
	@parent


	<script type="text/javascript">
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
		<h2>Add an event</h2>

		<div id="entity-edit-container">
			<div id="post-body">
			    {!! Form::model(new App\Models\Event, ['method' => 'POST', 'url' => crud_url('events', 'cms/event/create')]) !!}
			        @include('cms/events/partials/_form')
			    {!! Form::close() !!}
		    </div>
		</div>
	</div>
@endsection
