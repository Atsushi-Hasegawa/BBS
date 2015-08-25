<?php
require_once(__DIR__ . "/database.php");

class BBS extends DataBase
{
	public function insert_comment($thread_id, $user, $comment, $url)
	{
		if(!is_numeric($thread_id) || !is_string($user) || !is_string($comment)) return array();
		$res  = $this->get_res_num($thread_id);
		$sql = "INSERT INTO response(thread_id, user, comment, create_date, res_id, url) ";
		$sql .= "VALUES(:thread_id, :user, :comment, :create_date, :res_id, :url)";
		$date = date('Y-m-d H:i:s');
		$bind_param = array(
				array(":thread_id", $thread_id, PDO::PARAM_INT),
				array(":user" , $user, PDO::PARAM_STR),
				array(":comment" , $comment, PDO::PARAM_STR),
				array(":create_date", $date, PDO::PARAM_STR),
				array(":url", $url, PDO::PARAM_STR),
				array(":res_id", (int)$res["count(res_id)"]+1, PDO::PARAM_INT)
				);
		return $this->query($sql, $bind_param);
	}

	public function insert_thread($title)
	{
		if(!is_string($title)) return array();
		$sql = "INSERT INTO thread(title, create_date, update_date) VALUES(:title, :create_date, :update_date)";
		$date = date('Y-m-d H:i:s');
		$bind_param = array(
				array(":title", $title, PDO::PARAM_STR),
				array(":create_date", $date, PDO::PARAM_STR),
				array(":update_date", $date, PDO::PARAM_STR)
				);
		return $this->query($sql, $bind_param);
	}

	public function update_thread($thread_id, $title)
	{
		if(!is_string($title) || !is_numeric($thread_id)) return array();
		$sql = "UPDATE thread SET title=:title, update_date=:update_date WHERE id=:thread_id";
		$update_date = date('Y-m-d H:i:s');
		$bind_param = array(
				array(":thread_id", $thread_id, PDO::PARAM_INT),
				array(":title", $title, PDO::PARAM_STR),
				array(":update_date", $update_date, PDO::PARAM_STR)
				);
		return $this->query($sql, $bind_param);
	}

	public function get_thread_list($thread_id = null)
	{
		$sql = null;
		$bind_param = array();
		if (!empty($thread_id)) 
		{
			$sql = "SELECT * FROM thread WHERE id = :thread_id ORDER BY create_date DESC";
			$bind_param = array(array(":thread_id", $thread_id, PDO::PARAM_INT));
		}
		else
		{
			$sql = "SELECT * FROM thread ORDER BY create_date DESC";
		}
		return $this->select($sql, $bind_param);
	}

	public function get_thread_num($page, $num)
	{
		$offset = ($page-1) * $num;
		$sql = "SELECT * from thread LIMIT {$num} OFFSET {$offset}";
		return $this->select($sql, array());
	}
  
  public function delete($thread_id)
  {
    if(empty($thread_id)) return array();
    $sql = "DELETE FROM thread WHERE id=:thread_id";
    $bind_param = array(array(":thread_id", $thread_id, PDO::PARAM_STR));
    return $this->query($sql, $bind_param);
  }

	public function get_res_list($thread_id = null)
	{
		if(!is_numeric($thread_id))
		{
			return array();
		}
		$sql = "SELECT * from response WHERE thread_id = :thread_id";
		$bind_param = array(array(":thread_id", $thread_id, PDO::PARAM_INT));
		return $this->select($sql, $bind_param);
	}

	public function get_res_num($thread_id)
	{
		if(!is_numeric($thread_id))
		{
			return array();
		}
		$sql = "SELECT count(res_id) from response WHERE thread_id = :thread_id";
		$bind_param = array(array(":thread_id", $thread_id, PDO::PARAM_INT));
		$result = $this->select($sql, $bind_param);
		return $result[0];
	}

	public function get_res_num_by_page($thread_id, $page, $num)
	{
		if(!is_numeric($thread_id))
		{
			return "正しい形式で入力されていません";
		}
		$offset = ($page-1) * $num;
		$sql = "SELECT * from response WHERE thread_id = :thread_id LIMIT {$num} OFFSET {$offset}";
		$bind_param = array(array(":thread_id", $thread_id, PDO::PARAM_INT));
		return $this->select($sql, $bind_param);
	}
}
?>

