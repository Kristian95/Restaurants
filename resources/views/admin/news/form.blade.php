{!! Form::label('name', trans('common.name'),
	['class' => 'control-label text-right col-sm-3']) !!}
	<div class="col-sm-9">
	    {!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
<div class="clearfix"></div>

<div>
    <h3>{{ trans('common.news') }}</h3>
    <ul class="nav nav-tabs">
        @foreach($languages as $i => $language)
            <li @if($i === 0) class="active" @endif>
                <a href="#content-tab-{{ $i }}" data-toggle="tab">
                    {!! $language->small_image !!}
                    {{ $language->code }}
                </a>
            </li>
        @endforeach
    </ul> 
    <div class="tab-content">
        @foreach ($languages as $i => $language)
            <div id="content-tab-{{ $i }}" class="tab-pane fade
                {{ $i === 0 ? 'in active' : '' }}">
                <br>
                <div class="form-group">
                    {!! Form::label('title', trans('common.title'),
                    ['class' => 'control-label text-right col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('languages[' . $language->id . '][title]',
                        isset($newsLanguageData[$language->id]->pivot->title) ?
                        $newsLanguageData[$language->id]->pivot->text : null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::label('', trans('common.text'),
                    ['class' => 'control-label col-sm-3 text-right']) !!}
                    <div class="col-sm-9">
                        {!! Form::textarea('languages[' . $language->id . '][text]',
                        isset($newsLanguageData[$language->id]->pivot->text) ?
                        $newsLanguageData[$language->id]->pivot->text : null,
                        ['class' => 'form-control', 'rows' => '5']) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
{!! Form::submit('Submit', array('class' => 'btn btn-info')); !!}
<div class="clearfix"></div>
