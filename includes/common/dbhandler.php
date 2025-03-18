<?php
/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables 
 */
//$dbconn = new dbconnect();

ini_set('display_errors', 0);

class dbhandler
{
    private $conn;
	public function __construct($dbtype = null)
	{	
		try
		{
			require_once dirname(__FILE__) . '/config.php';		
			
				$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);	

			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->conn->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		}
		catch(PDOException  $e)
		{
			echo "Error Connecting Host :" .$e->getMessage();
		}
		catch(Exception  $e)
		{
			echo $e->getMessage();
		}
	}	
	public function GetLastRecord($tbl,$sf,$wf,$val,$order)
	{
		try
	   {
	      $SQL = "SELECT ".$sf." FROM ".$tbl." WHERE ".$wf." = '".$val."' ORDER BY ".$order." LIMIT 1";
	      $res = $this->conn->query($SQL);
		// echo $SQL;
		  $sf_value ='';
		   if ($res->rowCount() > 0)
			$sf_value = $res->fetchColumn();
	    	return $sf_value;	
	   }
	    catch(Exception  $e)
		{
			echo $e->getMessage();
		}
	}
	public function GetSingleReconrd($tbl,$sf,$wf,$val)
	{	
	   try
	   {
	      $SQL = "SELECT ".$sf." FROM ".$tbl." WHERE ".$wf." = '".$val."' ";
	      $res = $this->conn->query($SQL);
			// echo $SQL;
			$sf_value ='';
		    if ($res->rowCount() > 0)
				$sf_value = $res->fetchColumn();
	    	return $sf_value;	
		}
	    catch(Exception  $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function GetCount($tbl,$wf,$val)
	{
		$nos = 0;
		$SQL = "SELECT COUNT(*) as records_count FROM ".$tbl." WHERE ".$wf." = '".$val."' ";		
		$res = $this->conn->query($SQL);			
		$records_count = $res->fetchColumn();
		return $records_count;		
	}
	
	public function GetCountDistinct($tbl,$wf,$val,$fld){
		$nos = 0;
		$SQL = "SELECT COUNT(DISTINCT ".$fld.") as records_count  FROM ".$tbl." WHERE ".$wf." = '".$val."' ";
		//echo $SQL;
		$res = $this->conn->query($SQL);
		$records_count = $res->fetchColumn();
		return $records_count;		
	}
	
	public function GetMaxValue($tbl,$sf,$wf,$val)
	{
		$SQL = "SELECT MAX(".$sf.") AS val FROM ".$tbl." WHERE ".$wf." = '".$val."'";
		//echo $SQL;
		$res = $this->conn->query($SQL);			
		$records_count = $res->fetchColumn();
		return $records_count;		
	}
	
	public function GetSum($tbl,$sf,$wf,$val)
	{
		$SQL = "SELECT coalesce(sum(".$sf."),0) AS val FROM ".$tbl." WHERE ".$wf." = '".$val."'";
		//echo $SQL;
		$res = $this->conn->query($SQL);			
		$records_count = $res->fetchColumn();
		return $records_count;		
	}
	
	
	public function fnFillComboFromTable_Where( $field1, $field2, $table, $field3, $where )
	{
		$strOption = ""; $result = ""; $SQL = "";
		$SQL = "SELECT $field1 AS a,$field2 AS b FROM $table $where ORDER BY $field3";
		$result = $this->conn->query($SQL);
		if ($result->rowCount() > 0)
		{
			while ($obj = $result->fetch())
			{
				$strOption .="<option value=\"". $obj->a ."\">". $obj->b ."</option>";		
			}
			return $strOption;
		}
	}
}
   
?>