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
    <div class="postbox" id="submitdiv">
        <h3 class="hndle"><span>Publish</span></h3>
        <div class="inside">
            <div id="submitpost" class="submitbox">
                <div id="minor-publishing">
                    <div id="misc-publishing-actions">
                        <div class="misc-pub-section misc-pub-visibility" id="visibility">
                            Visibility: 
                            <select name="active" id="active" class="form-control pull-right">
                                <option value="0">Private</option>
                                <option value="1" {{ !isset($event) || $event->active ? 'selected="1' : '' }}>Public</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="major-publishing-actions">
                    @if(isset($event) && !$event->trashed())
                        <div id="delete-action">
                            <a class="submitdelete deletion" href="{{ crud_url('events', 'cms/event/'.$event->id.'/delete') }}">Move to Trash</a>
                        </div>
                    @endif

                    <div id="publishing-action">
                        <input type="submit" class="button button-primary button-large" id="publish" value="{{ isset($event) ? 'Update' : 'Publish' }}">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="postbox">
        <h3 class="hndle"><span>Event dates</span></h3>
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
</div>
