<% if $Options.Count %>
    <% if $HasColumns %>
        <div class="row">

        <% loop $Options %>
                <div class="$Up.ColumnClasses">
                    <div class="checkbox">
                        <label>
                            <input id="$ID" class="checkbox" name="$Name" type="checkbox"
                                   value="$Value"<% if $isChecked %> checked="checked"<% end_if %><% if $isDisabled %>
                                   disabled="disabled"<% end_if %>>
                            $Title
                        </label>
                    </div>
                </div>
        <% end_loop %>

        </div>
    <% else %>
        <% loop $Options %>
            <div class="checkbox<% if $Up.Inline %>-inline<% end_if %>">
                <label>
                    <input id="$ID" class="checkbox" name="$Name" type="checkbox" value="$Value"<% if $isChecked %>
                           checked="checked"<% end_if %><% if $isDisabled %> disabled="disabled"<% end_if %>>
                    $Title
                </label>
            </div>
        <% end_loop %>
    <% end_if %>
<% else %>
    <div>No options available</div>
<% end_if %>
