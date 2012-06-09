    <% if Options.Count %>
            <% loop Options %>
                <label class="checkbox <% if Top.Inline %>inline<% end_if %>" for="$ID">
                    <input id="$ID" class="checkbox" name="$Name" type="checkbox" value="$Value"<% if isChecked %> checked="checked"<% end_if %><% if isDisabled %> disabled="disabled"<% end_if %>>
                    $Title
                </label>
            <% end_loop %>
        <% else %>
            <li>No options available</li>
    <% end_if %>
