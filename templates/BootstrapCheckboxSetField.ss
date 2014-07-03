    <% if $Options.Count %>
            <% loop $Options %>
                <div class="checkbox <% if $Top.Inline %>inline<% end_if %>">
                    <label>
                        <input id="$ID" class="checkbox" name="$Name" type="checkbox" value="$Value"<% if $isChecked %> checked="checked"<% end_if %><% if $isDisabled %> disabled="disabled"<% end_if %>>
                        $Title
                    </label>
                </div>
            <% end_loop %>
        <% else %>
            <li>No options available</li>
    <% end_if %>
