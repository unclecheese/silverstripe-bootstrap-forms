<button type="submit" class="btn <% if ButtonStyle %>btn-{$ButtonStyle}<% end_if %>">
	<% if ButtonContent %>$ButtonContent<% else %>$Title<% end_if %>
</button>