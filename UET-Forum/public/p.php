<?php

function GetProgCpuUsage($program)
 {
     if(!$program) return -1;

   // $c_pid = exec("ipconfig | findstr /C:Address");
   $c_pid = exec("touch filename1.html");
     return $c_pid;
 }

function GetProgMemUsage($program)
 {
     if(!$program) return -1;

    $c_pid = exec("ren filename1.css filename1.html");
     return $c_pid;
 }



 //   echo "CPU use of Program: ".GetProgCpuUsage(8080)."%";
     echo "Memuse of Program: ".GetProgMemUsage(8080)."%";

?>