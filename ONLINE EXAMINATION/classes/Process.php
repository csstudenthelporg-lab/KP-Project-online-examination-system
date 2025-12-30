<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Session.php');
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');

class Process
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }
  public function getProcessData($data)
  {
    $selectAns = isset($data['ans']) ? $this->fm->validation($data['ans']) : '';
    $quesnumber = $this->fm->validation($data['quesnumber']);
    $selectAns = mysqli_real_escape_string($this->db->link, $selectAns);
    $quesnumber = mysqli_real_escape_string($this->db->link, $quesnumber);
    $next = (int) $quesnumber + 1;

    if (!isset($_SESSION['score'])) {
      $_SESSION['score'] = 0;
    }

    $total = $this->getTotal();
    $right = $this->rightAns($quesnumber);
    if ($right == $selectAns) {
      $_SESSION['score']++;
    }
    if ($quesnumber == $total) {
      header("Location:final.php");
      exit();
    } else {
      header("Location:test.php?q=" . $next);
    }
  }
  private function getTotal()
  {
    $query = "SELECT * FROM tbl_ques";
    $result = $this->db->select($query);
    if ($result) {
      $resultData = $result->num_rows;
      return $resultData;
    }
    return 0;
  }
  private function rightAns($quesnumber)
  {
    $query = "SELECT * FROM tbl_ans WHERE quesNo = '$quesnumber' AND rightAns = '1'";
    $result = $this->db->select($query);
    if ($result) {
      $resultData = $result->fetch_assoc();
      return $resultData['id'];
    }
    return false;
  }
}
?>