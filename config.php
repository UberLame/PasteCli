<?php
ob_start();

class config{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db = 'test';

	protected function con()
	{
		$b = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
		return $b;
	}

	public function paste($paste,$ip)
	{
		if (!empty($paste)) {	
			$b = $this->con();
			$date=getdate();
			$dte = $date["year"]. "-" . $date["mday"].'-'.$date["mon"] ;	
			echo $dte;
			$ex = $b->prepare("INSERT INTO pastes(`date`,`paste`,`ip`) VALUES(?,?,?)");
			$ex->bindParam(1, $dte);
			$ex->bindParam(2, $paste);
			$ex->bindParam(3, $ip);	
			$ex->execute();
			#$id = $ex->lastInsertId();
			#return $id;
		}


	}

	public function view($id)
	{
		$b = $this->con();
		$ex = $b->prepare("SELECT `date`,`paste` FROM pastes WHERE `id` = ?");
		@$ex->execute(array($id));
		$rows = $ex->fetchAll(PDO::FETCH_ASSOC);
		#print_r($rows);
		$res = array('date' => $rows[0]['date'],'paste' => $rows[0]['paste']);
		return $res;
	}

}
