$(function() {
	$('#submit').click(function() {
		if(is_valid_input() == true)
		{
			$.ajax({
			type: "POST",
			url: "index.php?url=add_user",
			data:{"name":$('#user').val(),
			      "password": $('#password').val()
					},
			success: function(msg) {
				$("#alert").text("ユーザ登録完了しました");
			}
		});
		}
	});
});

function is_valid_input()
{
	if($('#user').val() == '' && $('#password').val() == '')
	{
		$('#alert').text('ユーザ名、パスワードが入力されていません');
		return false;
	}
	else if($('#user').val() == '')
	{
		$('#alert').text('ユーザ名が入力されていません');
		return false;
	}
	else if($('#password').val() == '')
	{
		$('#alert').text('パスワードが入力されていません');
		return false;
	}
	else if($('#password').val().length < 6)
	{
		$('#alert').text('6文字以上でパスワードを入力してください');
		return false;
	}
	else
	{
		$('#alert').text('');
		return true;
	}
}
