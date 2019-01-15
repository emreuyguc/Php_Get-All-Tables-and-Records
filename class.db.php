<?php

namespace Db;

class Engine{
	
	private $admin = db_admin;
	private $pass = db_pass;
	private $ip = db_ip;
	private $db = db;
	
	private $conn;
	
	private $query_result;
	private $query_rows;
	private $query_data = array();
	
	private $query;
	

	public function __construct(){
		$this->conn = mysqli_connect($this->ip,$this->admin,$this->pass,$this->db);
	
		if( !$this->conn ){
			die('Mysql Bağlantı Hatası');
		}
	}
	
	public function run_query($sorgu){
		$this->query = mysqli_query($this->conn,$sorgu);
		
		if( !$this->query ) {
			die('Query Hatası');
		}
		
	}
	
	public function return_query_ass($sorgu){
		$this->query = mysqli_query($this->conn,$sorgu);
		if( $this->query ){
			while($this->query_rows = mysqli_fetch_assoc($this->query)){
			$this->query_data[] = $this->query_rows;
			}
			return($this->query_data);
		}
		else{
		die('Query Hatası');
		}
	}
	
	public function insert_into($tablo,$sutunlar,$satirlar){
		$sorgu = "INSERT INTO $tablo ($sutunlar) values ($satirlar)";
		print $sorgu;
		$this->run_query($sorgu);
	}
	
	public function __destruct(){
		mysqli_close($this->conn);
	}
}