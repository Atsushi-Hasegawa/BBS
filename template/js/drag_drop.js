$(function()
{
	$("#drop_zone").on('dropover', function()
	{
		e.preventDefault();
		var text = e.originalEvent.dataTransfer.getData('text');
		this.textContent = text + 'がドロップされました';
	});
});

