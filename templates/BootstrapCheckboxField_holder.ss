<div id="$Name" class="checkbox $HolderClasses" $HolderAttributes>
    <label class="$labelClasses">
        $Title
        <input $AttributesHTML class="$inputClasses">
    </label>
    <% if $HelpText %>
    <p class="help-block">$HelpText</p>
    <% end_if %>
    <% if $InlineHelpText %>
    <span class="help-inline">$InlineHelpText</span>
    <% end_if %>
</div>

