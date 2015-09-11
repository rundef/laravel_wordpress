@if($errors->count())
    <div id="message" class="error notice notice-error is-dismissible below-h2">
        <p>Please check the form carefully for errors.</p>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text">Dismiss this message.</span>
        </button>
    </div>
@endif


@if (Session::has('message'))
    <div id="message" class="updated notice notice-success is-dismissible below-h2">
        <p>{{ Session::get('message') }}</p>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text">{{ Session::get('message') }}</span>
        </button>
    </div>
@endif





<div class="col-xs-9">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Name : *', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description :', ['class' => 'control-label']) !!}
        <?php 
        $content = Input::old('description', isset($event->description) ? $event->description : '');
        wp_editor($content, 'description', ['editor_height' => 300]); 
        ?>
    </div>
</div>




<div class="col-xs-3">
    <div class="postbox">
        <h3 class="hndle"><span>Informations</span></h3>
        <div class="inside">
            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                {!! Form::label('start_date', 'Start : *', ['class' => 'control-label pull-left']) !!}
                {!! Form::text('start_date', null, ['class' => 'form-control date-picker pull-right', 'maxlength' => '10']) !!}
                <div class="clear"></div>
            </div>

            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                {!! Form::label('end_date', 'End : *', ['class' => 'control-label pull-left']) !!}
                {!! Form::text('end_date', null, ['class' => 'form-control date-picker pull-right', 'maxlength' => '10']) !!}
                <div class="clear"></div>
            </div>
        </div>
    </div>


    <div class="postbox">
        <h3 class="hndle"><span>Publish</span></h3>
        <div class="inside">
            <input type="submit" class="button button-primary button-large" value="Publish">
        </div>
    </div>


    <div class="postbox">
        <h3 class="hndle"><span>Visibility</span></h3>
        <div class="inside">
            <div class="form-group">
                {!! Form::label('active', 'Public', ['class' => 'control-label', 'style' => 'margin-top:3px']) !!}
                {!! Form::hidden('active', 0, ['id' => null]) !!}
                {!! Form::checkbox('active', 1, null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
