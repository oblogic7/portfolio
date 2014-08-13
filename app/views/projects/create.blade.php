{{ Form::open(array('route' => 'projects.store', 'files' => true)) }}
    {{ Form::label('name', 'Project Name') }}<br/>
    {{ Form::text('name', Input::old('name', '')) }}
<br/>
<br/>
    {{ Form::label('description', 'Description') }}<br/>
    {{ Form::textarea('description', Input::old('description', '')) }}
<br/>
<br/>
    {{ Form::label('url', 'Website URL') }}<br/>
    {{ Form::text('url', Input::old('url', '')) }}
<br/>
<br/>
    {{ Form::label('mobile_file', 'Mobile Screenshot') }}<br/>
    {{ Form::file('mobile_file') }}
<br/>
<br/>
    {{ Form::label('desktop_file', 'Desktop Screenshot') }}<br/>
    {{ Form:: file('desktop_file') }}
<br/>
<br/>
    {{ Form::label('desktop_file', 'Built for Employer?') }}<br/>
    {{ Form:: checkbox('employer') }}
<br/>
<br/>
{{ Form::submit() }}
{{ Form::close() }}