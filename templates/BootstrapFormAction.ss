<button type="<% if Type='resetformaction' %>reset<% else %>submit<% end_if %>" class="btn <% if ButtonStyle %>btn-{$ButtonStyle}<% end_if %> <% if ButtonSize %>btn-{$ButtonSize}<% end_if %>">
	<% if ButtonContent %>$ButtonContent<% else %>$Title<% end_if %>
</button>