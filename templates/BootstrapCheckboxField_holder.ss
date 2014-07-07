<div id="$Name" class="checkbox $HolderClasses" $HolderAttributes>
    <label>
        <input $AttributesHTML>
        $Title
    </label>
    <% if $HelpText %>
    <p class="help-block">$HelpText</p>
    <% end_if %>
    <% if $InlineHelpText %>
    <span class="help-inline">$InlineHelpText</span>
    <% end_if %>    
</div>

