<div id="$Name" class="$HolderClasses" $HolderAttributes>
    <label for="$ID" class="$LabelClasses">$Title</label>
    $Field        
    <% if $HelpText %>
    <p class="help-block">$HelpText</p>
    <% end_if %>
    <% if $InlineHelpText %>
    <span class="help-inline">$InlineHelpText</span>
    <% end_if %>    
</div>

