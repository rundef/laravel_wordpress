@section('scripts')
	<link rel="stylesheet" href="{{ URL::to('css/bootstrap_backend.css') }}">
	<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>

	<link href="{{ URL::to('css/bootstrap-datepicker.css') }}" rel="stylesheet" type="text/css">
	<script src="{{ URL::to('js/bootstrap-datepicker.js') }}"></script>

	<style type="text/css">
		input[type=checkbox].form-control {margin-top:0px;}
		#entity-edit-container {margin-top: 45px;visibility: hidden;}
		#entity-edit-container .no-pl {padding-left: 0 !important;}
		#entity-edit-container .no-pr {padding-right: 0 !important;}
		#entity-edit-container .postbox .inside {padding-top: 12px;}
		#entity-edit-container .hndle {cursor:default !important;}
		#poststuff.wrap {padding-top: 0 !important;}
		a.glyphicon {text-decoration: none;}
		.clear {clear:both;}
		.tab-content {margin-top: 20px;}
	</style>

	<script type="text/javascript">
		(function($) {
			$(window).load(function () {
				$('#entity-edit-container').css('visibility', 'visible');
			});
		})(jQuery);
	</script>
@show


@yield('content')