<div id="$Name" class="$HolderClasses" $HolderAttributes>
    <label class="control-label" for="$ID">$Title</label>
    <div class="controls">    
        <% if AppendedText || PrependedText %>
        	<div class="<% if AppendedText %>input-append<% end_if %><% if PrependedText %> input-prepend<% end_if %>">
        		<% if PrependedText %><span class="add-on">$PrependedText</span><% end_if %>$Field<% if AppendedText %><span class="add-on">$AppendedText</span><% end_if %>
        	</div>
        <% else %>
          $Field
        <% end_if %>

        <% if HelpText %>
        <p class="help-block">$HelpText</p>
        <% end_if %>
        <% if InlineHelpText %>
        <span class="help-inline">$InlineHelpText</span>
        <% end_if %>

    </div>
</div>