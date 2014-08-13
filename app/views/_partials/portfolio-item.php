<div class="row">
    <div class="col-sm-6 desktop-view">
        <div class="wrapper">
            <img class="img-responsive" src="{{ item.desktop }}" alt=""/>
        </div>
    </div>
    <div class="{{#if item.mobile}} col-sm-4 {{/if}} {{#unless item.mobile}} col-sm-6 {{/unless}} description">
	    {{#unless item.url }}
            <h3>{{ item.name }}{{#if item.employer}}*{{/if}}</h3>
	    {{/unless}}

	    {{#if item.url }}
	        <h3><a href="{{ item.url }}" target="_blank">{{ item.name }}{{#if item.employer}}*{{/if}}</a></h3>
	    {{/if }}

        <p>{{{ item.description }}}</p>
    </div>
	{{#if item.mobile}}
		<div class="col-sm-2 mobile-view hidden-xs">
	        <div class="wrapper">
	            <img class="img-responsive" src="{{ item.mobile }}" alt=""/>
	        </div>
	    </div>
	{{/if}}
</div>