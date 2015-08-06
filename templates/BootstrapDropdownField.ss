<span class="btn-group">
	<select name="$Name" id="{$id}_select" class="dropdown-select">
    <% loop $Options %>
        <option <% if $Selected %>selected="selected"<% end_if %> value="$Value">$Label</option>
    <% end_loop %>
  </select>
	<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
    <% loop $Options %>
      <% if $Selected %>
          <span id="{$Top.id}_label" data-default="$Top.Title" class="dropdown-label">$Label</span>
      <% end_if %>
    <% end_loop %>
      <span class="caret"></span>
  </button>
	<ul class="dropdown-menu" role="menu" aria-labelledby="{$id}_label">
    <% loop $Options %>
        <li role="presentation">
            <a data-value="$Value" rel="#$Top.id" role="menuitem" tabindex="-1"
               href="#">$Label
            </a>
        </li>
    <% end_loop %>
  </ul>
</span>