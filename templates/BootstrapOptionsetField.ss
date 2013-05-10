       
        <% if Options.Count %>
            <% loop Options %>
                <label class="radio <% if Top.Inline %>inline<% end_if %>" for="$ID">
                    <input id="$ID" class="radio" name="$Name" type="radio" value="$Value"<% if isChecked %> checked<% end_if %><% if isDisabled %> disabled<% end_if %>>
                    $Title
                </label>
            <% end_loop %>
        <% else %>
            <li>No options available</li>
        <% end_if %>
